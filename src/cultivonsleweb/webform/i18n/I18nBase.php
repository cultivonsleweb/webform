<?php 
namespace cultivonsleweb\webform\i18n;

class I18nBase 
{
	public function t ($sKey)
	{
		if ( isset($this->aContent[$sKey]) )
		{
			return $this->aContent[$sKey];
		}
		return '';
	}
}