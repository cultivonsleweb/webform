<?php 
namespace cultivonsleweb\webform\i18n;

use cultivonsleweb\webform\Configuration;

class I18nBaseLang 
{
	public function t ($sKey, $sCategory=null)
	{
		if ( null === $sCategory )
		{
			if ( isset($this->aContent[$sKey]) )
			{
				return $this->aContent[$sKey];
			}
			return '';
		} else {
			
			$app = Configuration::app ();
			$sLang = $app->get('lang');
			$aLang = explode ('_', $sLang);
			$sLanguage = strtolower($aLang[0]);
			$sArea = strtolower($aLang[1]);
			
			$sClassName = 'cultivonsleweb\\webform\\i18n\\'.$sLanguage.'\\'.$sArea.'\\' . ucfirst(strtolower($sCategory));
			$oLang = new $sClassName ();
			return $oLang->t($sKey);
		}
	}
}