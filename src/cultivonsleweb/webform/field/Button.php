<?php 
namespace cultivonsleweb\webform\field;

/**
  * Create field : Button tag
  *
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
class Button 
{
	/**
	  * Generate and return template HTML
	  *
	  * @param array $aAttributes default []
	  */
	public function getTemplate ($aAttributes=[])
	{
		$aAttributes= array_merge([
			'class' => 'btn btn-default',
			'type' => 'submit',
			'text' => ''
		], $aAttributes);
		$sHtml = '<button ';
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
		if ( isset($aAttributes['type']))
		{
			$sHtml .= ' type="'.$aAttributes['type'].'" ';
		}
		$sHtml .= ' >';
		if ( isset($aAttributes['text']))
		{
			$sHtml .= $aAttributes['text'];
		}
		$sHtml .= '</button>';
		return $sHtml;
	}
}