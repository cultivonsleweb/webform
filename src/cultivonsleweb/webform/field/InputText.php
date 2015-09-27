<?php 
namespace cultivonsleweb\webform\field;

class InputText 
{
	public function getTemplate ($aAttributes=[])
	{
		$aAttributes= array_merge([
			'class' => 'form-control'
		], $aAttributes);
		$sHtml = '<input type="text"';
		if ( isset($aAttributes['class']))
		{
			$sHtml .= ' class="'.$aAttributes['class'].'" ';
		}
		if ( isset($aAttributes['id']))
		{
			$sHtml .= ' id="'.$aAttributes['id'].'" ';
		}
		if ( isset($aAttributes['style']))
		{
			$sHtml .= ' style="'.$aAttributes['style'].'" ';
		}
		if ( isset($aAttributes['placeholeder']))
		{
			$sHtml .= ' placeholder="'.$aAttributes['placeholder'].'" ';
		}
		$sHtml .= ' />' . PHP_EOL;
		return $sHtml;
	}
}