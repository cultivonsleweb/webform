<?php 
namespace cultivonsleweb\webform;

/**
  * Manage request browser, get data request browser
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class Request 
{
	/**
	  * Return full url
	  *
	  * @return string
	  * @access public
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	static public function getUrl ()
	{
		$sHttp = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
		$sUrl = $sHttp . '://' . $_SERVER['SERVER_NAME'];
		if ( 80 != $_SERVER['SERVER_PORT'])
		{
			$sUrl .= ':' . $_SERVER['SERVER_PORT'];
		}  
		$sUrl .=  $_SERVER['REQUEST_URI'];
		return $sUrl;
	}
	
	/**
	  * Return base url
	  *
	  * @return string
	  * @access public
	  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
	  */
	static public function getBaseUrl ()
	{
		$sHttp = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
		$sUrl = $sHttp . '://' . $_SERVER['SERVER_NAME'];
		return $sUrl;
	}
	
	static public function getParams ()
	{
		$aParams = [];
		foreach($_REQUEST as $sKey => $sValue)
		{
			if ( !empty($sValue) ){
				$sKey = htmlentities($sKey);
				$aParams[$sKey] = ctype_digit(htmlentities((string)$sValue));
			}
		}
		return $aParams;
	}
	
	static public function getParam($key)
	{
		$aParams = self::getParams();
		if ( isset($aParams[$key]) )
		{
			return $aParams[$key];
		}
		return $aParams;
	}
	
	static public function hasParam ($key)
	{
		$aParams = self::getParams();
		if ( isset($aParams[$key]) )
		{
			return true;
		}
		return false;
	}
}