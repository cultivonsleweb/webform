<?php 
namespace cultivonsleweb;

class WebForm 
{
	public $aConf = [];
	protected $sHtml = '';
	protected $aListField = [];
	
	public function __construct($aConf=[])
	{
		$this->aConf = $aConf;
		$this->load ();
	}
	
	protected function load ()
	{
		$this->setListFields ($this->aConf);
		$sFormClass = 'cultivonsleweb\webform\field\Form';
		if ( !$this->hasKeyInListField ($sFormClass) )
		{
			$this->__autoload ($sFormClass);
			$oForm = new $sFormClass();
			$this->sHtml .= $oForm->getTemplateOpen ();
		}
		for ($i=0; $i < count($this->aConf); $i++)
		{
			$aList = $this->aConf[$i];
			$oClass = $aList['class'];
			$aData = $aList['data'];
			
			$this->__autoload ($oClass);
			$oObj = new $oClass ();
			if ( method_exists($oObj, 'getTemplateOpen') )
			{
				if ( 0 !== count ( $aData ))
				{
					$this->sHtml .= $oObj->getTemplateOpen ( $aData );
				} else {
					$this->sHtml .= $oObj->getTemplateOpen ();
				}
			}
			if ( method_exists($oObj, 'getTemplate') )
			{
				if ( 0 !== count ( $aData ))
				{
					$this->sHtml .= $oObj->getTemplate ( $aData );
				} else {
					$this->sHtml .= $oObj->getTemplate ();
				}
			}
			if ( method_exists($oObj, 'getTemplateClose') )
			{
				if ( 0 !== count ( $aData ))
				{
					$this->sHtml .= $oObj->getTemplateClose ( $aData );
				} else {
					$this->sHtml .= $oObj->getTemplateClose ();
				}
			}
			unset($oClass);
			unset($oObj);
			unset($aData);
		}
		if ( !$this->hasKeyInListField ($sFormClass) )
		{
			$this->sHtml .= $oForm->getTemplateClose ();
		}
	}
	
	protected function setListFields ($aConf)
	{
		for ($i=0; $i < count($aConf); $i++)
		{
			$aEntry = $this->aConf[$i];
			$this->aListField[] = $aEntry['class'];
		}
	}
	
	protected function getListField ()
	{
		return $this->aListField;
	}
	
	protected function hasKeyInListField ($mKey)
	{
		if ( isset($this->aListField[$mKey]) )
		{
			return true;
		}
		return false;
	}
	
	public function render ($bDisplay=false)
	{
		if ( $bDisplay )
		{
			echo $this->sHtml;
			return;
		}
		return $this->sHtml;
	}
	
	/**
	  * Chargement automatique des fichiers correspondant aux classes instanciées
	  *
	  * @param string $sClassName
	**/
	public function __autoload ($sClassName)
	{
		$sFileClassName = str_replace ('cultivonsleweb', '', dirname(__FILE__)) . str_replace ('\\', '/', $sClassName) . '.php';
		//echo $sFileClassName;
		if ( file_exists ($sFileClassName) )
		{
			require_once ($sFileClassName);
		}
	}
}