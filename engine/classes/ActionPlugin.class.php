<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

require_once('Action.class.php');
/**
 * Абстрактный класс экшена
 *
 */
abstract class ActionPlugin extends Action {
	/**
	 * Путь к шаблонам с учетом наличия соответствующего skin`a
	 *
	 * @var string
	 */
	protected $sTemplatePathAction=null;
	
	public function getTemplatePathAction() {	
		if(is_null($this->sTemplatePathAction)) {	
			preg_match('/^Plugin([\w]+)_Action([\w]+)$/i',$this->GetActionClass(),$aMatches);
			/**
			 * Проверяем в списке шаблонов
			 */
			$sTemplateName=in_array(Config::Get('view.skin'),array_map('basename',glob(Config::Get('path.root.server').'/classes/plugins/'.$aMatches[1].'/templates/skin/*',GLOB_ONLYDIR)))
				? Config::Get('view.skin')
				: 'default';
			
			$this->sTemplatePathAction=Config::Get('path.root.server')."/classes/plugins/{$aMatches[1]}/templates/skin/{$sTemplateName}";
		}
		
		return $this->sTemplatePathAction;
	}
	
	/**
	 * Устанавливает какой шаблон выводить
	 *
	 * @param string $sTemplate Путь до шаблона относительно каталога шаблонов экшена
	 */
	protected function SetTemplateAction($sTemplate) {
		$this->sActionTemplate==preg_match('/^Plugin([\w]+)_Action([\w]+)$/i',$this->GetActionClass(),$aMatches)
			? $this->getTemplatePathAction().'/actions/Action'.ucfirst($aMatches[2]).'/'.$sTemplate.'.tpl'
			: null;
	}
	
	/**
	 * Получить шаблон
	 * Если шаблон не определен то возвращаем дефолтный шаблон евента: action/{Action}.{event}.tpl
	 *
	 * @return unknown
	 */
	public function GetTemplate() {
		if (is_null($this->sActionTemplate)) {
			$this->sActionTemplate=preg_match('/^Plugin([\w]+)_Action([\w]+)$/i',$this->GetActionClass(),$aMatches)
				? $this->getTemplatePathAction().'/actions/Action'.ucfirst($aMatches[2]).'/'.$this->sCurrentEvent.'.tpl'
				: null;
		}

		return $this->sActionTemplate;
	}
}
?>