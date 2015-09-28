<?php 
require_once ('..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

use cultivonsleweb\WebForm as WebForm;
use cultivonsleweb\webform\Configuration as Configuration;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>WebForm example 01</title>
		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div class="container">
		<?php 
		$app = Configuration::app ();
		$app->set ([
			'lang' => 'fr_fr'
		]);
		
		$oWebForm = new WebForm ([
			0 => [
					'class' => 'cultivonsleweb\webform\field\InputText',
					'attributes' => []
				],
			1 => [
				'class' => 'cultivonsleweb\webform\field\Button',
				'attributes' => [
					'text' => 'Save',
					'class' => 'btn btn-primary'
					]
				],
			2 => [
				'class' => 'cultivonsleweb\webform\field\Button',
				'attributes' =>  [
					'type' => 'cancel',
					'text' => 'Cancel',
					'class' => 'btn btn-default'
				]
			]
		]);
		$oWebForm->render (true);
		?>
		</div>
	</body>
</html>