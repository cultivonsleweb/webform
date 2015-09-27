<?php 
if ( !defined(DS) )
{
	define ('DS', DIRECTORY_SEPARATOR);
}
if ( !defined(__PATH_CULTIVONSLEWEB_WEBFORM__))
{
	define ('__PATH_CULTIVONSLEWEB_WEBFORM__', str_replace(DS . 'examples', DS . 'src' , dirname(__FILE__)));
}

/**
  * Function autoload class
  *
  * @param string $sClassName
  * @author Arnaud Méhat <amehat@cultivonsleweb.com>
  */
function __autoload ($sClassName)
{
	$sClassName = str_replace('\\', '/',$sClassName);
	if ( file_exists (__PATH_CULTIVONSLEWEB_WEBFORM__ . DS . $sClassName . '.php'))
	{
		require_once (__PATH_CULTIVONSLEWEB_WEBFORM__ . DS . $sClassName . '.php');
	}
}