<?php 
namespace cultivonsleweb\webform\field;

class Form 
{
	public function getTemplateOpen ($aAttributes=[])
	{
		$aAttributes= array_merge([], $aAttributes);
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
		$sHtml .= '>' . PHP_EOL;
		return $sHtml;
	}
	
	public function getTemplateClose ()
	{
		$sHtml = '</form>' . PHP_EOL;
		return $sHtml;
	}
}