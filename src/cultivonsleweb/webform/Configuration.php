<?php 
namespace cultivonsleweb\webform;

/**
  * Application configuration
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class Configuration 
{
	public $aConf = [
			'lang' => 'FR_fr'
		];
		
	static private $_oInstance;
	
	private function __construct ()
	{
		//
	}
		
	static public function app ()
	{
		if ( is_null(self::$_oInstance) )
		{
			self::$_oInstance = new Configuration ();
		}
		return self::$_oInstance;
	}
	
	public function set ($aConf)
	{
		$this->aConf = $aConf;
	}
	
	public function setKey ($sKey, $aData)
	{
		$this->aConf[$sKey] = $aData;
	}
	
	public function get ($sKey=null)
	{
		if ( null !== $sKey )
		{
			if (isset($this->aConf[$sKey]))
			{
				return $this->aConf[$sKey];
			}
		}
		return $this->aConf;
	} 
}