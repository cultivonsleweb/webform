<?php 
namespace cultivonsleweb\webform\field;

/**
  * Create field : Input Text tag
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class InputText 
{
	/**
	  * Generate and return template HTML
	  *
	  * @param array $aAttributes default []
	  */
	public function getTemplate ($aAttributes=[])
	{
		$aAttributes= array_merge([
			'class' => 'form-control',
			'value' => ''
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
		if ( isset($aAttributes['value']))
		{
			$sHtml .= ' value="'.$aAttributes['value'].'" ';
		}
		$sHtml .= ' />' . PHP_EOL;
		return $sHtml;
	}
}