/**
 * Подгрузка контента
 *
 * @module ls/more
 *
 * @license   GNU General Public License, version 2
 * @copyright 2013 OOO "ЛС-СОФТ" {@link http://livestreetcms.com}
 * @author    Denis Shakhov <denis.shakhov@gmail.com>
 */

(function($) {
	"use strict";

	$.widget( "livestreet.lsMore", {
		/**
		 * Дефолтные опции
		 */
		options: {
			// Селектор блока с содержимым
			target: null,
			// Добавление контента в конец/начало контейнера
			// true - в конец
			// false - в начало
			append: true,
			// Ссылка
			url: null,
			// Название переменной с результатом
			result: 'html',
			// Параметры запроса
			params: {},
			// Проксирующие параметры
			proxy: {}
		},

		/**
		 * Конструктор
		 *
		 * @constructor
		 * @private
		 */
		_create: function () {
			this.options = $.extend({}, this.options, ls.utils.getDataOptions(this.element, this.widgetName));
			this.options.proxy = $.extend({}, this.options.proxy, ls.utils.getDataOptions(this.element, 'proxy'));

			this.target = $( this.options.target );
			this.counter = this.element.find('.js-more-count');

			this._on({
				click: function (e) {
					! this.isLocked && this.load();
					e.preventDefault();
				}
			});
		},

		/**
		 * Блокирует блок подгрузки
		 */
		lock: function () {
			this.isLocked = true;
			this.element.addClass(ls.options.classes.states.loading);
		},

		/**
		 * Разблокировывает блок подгрузки
		 */
		unlock: function () {
			this.isLocked = false;
			this.element.removeClass(ls.options.classes.states.loading);
		},

		/**
		 * Получает значение счетчика
		 */
		getCount: function () {
			return this.counter.length && parseInt( this.counter.text(), 10 );
		},

		/**
		 * Устанавливает значение счетчика
		 */
		setCount: function ( number ) {
			this.counter.length && this.counter.text( number );
		},

		/**
		 * Подгрузка
		 */
		load: function () {
			this._trigger("beforeload", null, this);

			this.options.params = $.extend({}, this.options.params, ls.utils.getDataOptions(this.element, 'param'));
			this.lock();

			var params=$.extend({}, this.options.params, this.options.proxy);

			ls.ajax.load(this.options.url, params, function (oResponse) {
				if (oResponse.count_loaded > 0) {
					var html = $('<div></div>').html( $.trim( oResponse[this.options.result] ) );

					if ( html.find( this.options.target ).length ) {
						html = html.find( this.options.target ).first();
					}

					this.target[ this.options.append ? 'append' : 'prepend' ]( html.html() );
					this.element.attr( 'data-param-last_id', oResponse.last_id );

					// Обновляем счетчик
					if (this.counter.length) {
						var iCountLeft = this.getCount() - oResponse.count_loaded;

						if (iCountLeft <= 0) {
							this.element.remove();
						} else {
							this.setCount( iCountLeft );
						}
					}

					// Обновляем параметры
					$.each(this.options.proxy,function( k, v ) {
						if ( oResponse[k] ) {
							this.options.proxy[k] = oResponse[k];
						}
					}.bind(this));

					if ( oResponse.bHideMore ) {
						this.element.remove();
					}
				} else {
					// Для блоков без счетчиков
					// TODO: i18n
					ls.msg.notice(null, 'Больше нечего подгружать');
					this.element.remove();
				}

				this.unlock();

				this._trigger("afterload", null, { context: this, response: oResponse });
			}.bind(this));
		}
	});
})(jQuery);