<?php 
namespace cultivonsleweb\webform;

class I18n 
{
	static public function t ($sKey=null, $sCategory=null)
	{
		if ( null === $sKey )
		{
			return '';
		}
		$app = Configuration::app ();
		$sLang = $app->get('lang');
		$aLang = explode ('_', $sLang);
		$sLanguage = strtolower($aLang[0]);
		$sArea = strtolower($aLang[1]);
		$sClassName = 'cultivonsleweb\\webform\\i18n\\'.$sLanguage.'\\'.ucfirst(strtolower($sArea)); 
		$oLang = new $sClassName ();
		return $oLang->t($sCategory, $sKey);
	}
}