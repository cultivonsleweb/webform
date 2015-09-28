<?php 
namespace cultivonsleweb\webform\validate;

/**
  * Validate Int
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com
  */
class Int 
{
	static public function validate ($iValue)
	{
		$bFiltered = filter_var($iValue, FILTER_VALIDATE_INT);
		if ( $bFiltered || $bFiltered === 0)
		{
			return true;
		} 
		return false;
	}
	
	static public function validateMessage ($iValue)
	{
		if ( self::validate ($iValue) )
		{
			return [
				'state' => true,
				'message' => ''
			];
		}
		return [
			'state' => false,
			'message' => i18n::t('validate', 'error_validate_type_int')
		];
	}
}