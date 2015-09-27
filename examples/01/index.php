<?php 
require_once ('..' . DIRECTORY_SEPARATOR . 'bootstrap.php');

use cultivonsleweb\WebForm as WebForm;

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>WebForm example 01</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	</head>
	<body>
		<div class="container">
		<?php 
		$oWebForm = new WebForm ([
			0 => [
					'class' => 'cultivonsleweb\webform\field\InputText',
					'data' => []
				],
			1 => [
				'class' => 'cultivonsleweb\webform\field\Button',
				'data' => [
					'text' => 'Save',
					'class' => 'btn btn-primary'
					]
				],
			2 => [
				'class' => 'cultivonsleweb\webform\field\Button',
				'data' =>  [
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