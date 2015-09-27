<?php 
namespace cultivonsleweb;

/**
  * WebForm's engine
  * 
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class WebForm 
{
	public $aConf = [];
	protected $sHtml = '';
	protected $aListField = [];
	
	/**
	  * Init WebForm & load conf
	  *
	  * @param array $aConf default []
	  * @return void
	  * @access public
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	public function __construct($aConf=[])
	{
		$this->aConf = $aConf;
		$this->load ();
	}
	
	/**
	  * Load data and create fields
	  *
	  * @return void
	  * @access protected
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
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
	
	/**
	  * Define list of fields
	  *
	  * @param array $aConf defaut []
	  * @return void
	  * @access protected
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	protected function setListFields ($aConf=[])
	{
		for ($i=0; $i < count($aConf); $i++)
		{
			$aEntry = $this->aConf[$i];
			$this->aListField[] = $aEntry['class'];
		}
	}
	
	/**
	  * Return list of fields
	  * 
	  * @return array
	  * @access protected
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	protected function getListField ()
	{
		return $this->aListField;
	}
	
	/**
	  * Informed if a field exists in the list of fields
	  * 
	  * @param mixed $mKey
	  * @return boolean
	  * @access protected
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	protected function hasKeyInListField ($mKey)
	{
		if ( isset($this->aListField[$mKey]) )
		{
			return true;
		}
		return false;
	}
	
	/**
	  * Return content HTML
	  *
	  * @param boolean $bDisplay default false Display or no content
	  * @return string 
	  * @access public
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
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
	  * Automatic loading of files corresponding to the instantiated class
	  *
	  * @param string $sClassName
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
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