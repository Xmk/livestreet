<?php

$config = array();

/**
 * Grid type:
 *
 * fluid - резина
 * fixed - фиксированная ширина
 */
$config['view']['grid']['type'] = 'fluid';

/* Fluid settings */
$config['view']['grid']['fluid_min_width'] = '320px';
$config['view']['grid']['fluid_max_width'] = '1200px';

/* Fixed settings */
$config['view']['grid']['fixed_width'] = '1000px';

$config['head']['default']['js'] = Config::Get('head.default.js');
$config['head']['default']['js'][] = '___path.skin.assets.web___/js/init.js';


$aCss = array(
	// Base styles
	"___path.skin.assets.web___/css/base.css",
	"___path.framework.frontend.web___/js/vendor/jquery-ui/css/smoothness/jquery-ui-1.10.2.custom.css",
	"___path.framework.frontend.web___/js/vendor/jcrop/jquery.Jcrop.css",
	"___path.framework.frontend.web___/js/vendor/prettify/prettify.css",
	"___path.framework.frontend.web___/js/vendor/notifier/jquery.notifier.css",
	"___path.framework.frontend.web___/js/vendor/fotorama/fotorama.css",
	"___path.framework.frontend.web___/js/vendor/nprogress/nprogress.css",
	"___path.framework.frontend.web___/js/vendor/colorbox/colorbox.css",
	"___path.skin.assets.web___/css/grid.css",
	"___path.skin.assets.web___/css/forms.css",
	"___path.skin.assets.web___/css/common.css",

	// Components
	"___path.skin.web___/components/vote/css/vote.css",
	"___path.skin.web___/components/actionbar/css/actionbar.css",
	"___path.skin.web___/components/favourite/css/favourite.css",
	"___path.skin.web___/components/comment/css/comment.css",
	"___path.skin.web___/components/topic/css/topic.css",
	"___path.skin.web___/components/wall/css/wall.css",
	"___path.skin.web___/components/blog/css/blog.css",
	"___path.skin.web___/components/poll/css/poll.css",
	"___path.skin.web___/components/more/css/more.css",
	"___path.skin.web___/components/sort/css/sort.css",
	"___path.skin.web___/components/alphanumeric/css/alphanumeric.css",
	"___path.skin.web___/components/media/css/media.css",
	"___path.skin.web___/components/pagination/css/pagination.css",
	"___path.skin.web___/components/field/css/field.css",
	"___path.skin.web___/components/search-form/css/search-form.css",
	"___path.skin.web___/components/note/css/note.css",
	"___path.skin.web___/components/info-list/css/info-list.css",
	"___path.skin.web___/components/uploader/css/uploader.css",
	"___path.skin.web___/components/activity/css/activity.css",
	"___path.skin.web___/components/block/css/block.css",
	"___path.skin.web___/components/tags/css/tags.css",
	"___path.skin.web___/components/user/css/user.css",
	"___path.skin.web___/components/user/css/user-item.css",
	"___path.skin.web___/components/user/css/user-list-small.css",
	"___path.skin.web___/components/user/css/user-list-avatar.css",
	"___path.skin.web___/components/user-list-add/css/user-list-add.css",
	"___path.skin.web___/components/talk/css/talk.css",
	"___path.skin.web___/components/userbar/css/userbar.css",

	// Template's styles
	"___path.skin.assets.web___/css/icons.css",
	"___path.skin.assets.web___/css/tables.css",
	"___path.skin.assets.web___/css/blocks.css",
	"___path.skin.assets.web___/css/modals.css",
	"___path.skin.assets.web___/css/admin.css",
	"___path.skin.assets.web___/css/toolbar.css",
	"___path.skin.assets.web___/css/print.css",
);

// Подключение темы
if ( Config::Get('view.theme') ) {
	$aCss[] = "___path.skin.web___/themes/___view.theme___/style.css";
}

// Стили для RTL языков
if ( Config::Get('view.rtl') ) {
	$aCss[] = "___path.skin.web___/components/vote/css/vote-rtl.css";
}

// Подключение фронтенд фреймворка
$config['head']['default']['css'] = array_merge(Config::Get('head.default.css'), $aCss);


return $config;