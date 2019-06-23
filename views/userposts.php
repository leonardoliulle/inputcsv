<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		echo $dados->nome . "<br>";
		echo $dados->sobrenome . "<br>";


		$query = get_object_vars($dados->posts);
		echo count($query) . "Is the number of data inside the class";
		var_export($query);

		$x = 0;
		while ($x <= 2) {
			echo $dados->posts->{$x}->titulo . "<br>";
			$x++;
		}
		
		echo "<br>";
		echo "<br>";



		echo "<br>";
		echo "<br>";
		echo "<pre>";
		var_export($dados);
		echo "<pre>";

	 ?>

</body>
</html>