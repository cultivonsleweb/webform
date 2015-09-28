<?php 
namespace cultivonsleweb\webform\field;

use cultivonsleweb\webform\Request as Request;
/**
  * Create field : form tag
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class Form 
{
	/**
	  * Generate and return template HTML
	  *
	  * @param array $aAttributes default []
	  */
	public function getTemplateOpen ($aAttributes=[])
	{
		$aAttributes= array_merge([
			'action' => Request::geturl (),
			'method' => 'POST',
			'enctype' => 'multipart/form-data'
		], $aAttributes);
		$sHtml  = '<form';
		if ( isset($aAttributes['action']))
		{
			$sHtml .= ' action="'.$aAttributes['action'].'" ';
		}
		if ( isset($aAttributes['class']))
		{
			$sHtml .= ' class="'.$aAttributes['class'].'" ';
		}
		if ( isset($aAttributes['style']))
		{
			$sHtml .= ' style="'.$aAttributes['style'].'" ';
		}
		if ( isset($aAttributes['method']))
		{
			$sHtml .= ' method="'.$aAttributes['method'].'" ';
		}
		if ( isset($aAttributes['enctype']))
		{
			$sHtml .= ' enctype="'.$aAttributes['enctype'].'" ';
		}
		
		$sHtml .= '>' . PHP_EOL;
		return $sHtml;
	}
	
	public function getTemplateClose ()
	{
		$sHtml = '</form>' . PHP_EOL;
		return $sHtml;
	}
}