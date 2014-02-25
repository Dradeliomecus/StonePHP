<!DOCTYPE html>
<html>
<head>
	<title>StonePHP - PHP framework</title>
	<meta charset="utf-8">
</head>
<body>
	<?php echo $this->get('content') ?>

	<br /><br /><br /><br /><br />
	<h2>Page chargé en <?php echo (microtime(true) - STONEPHP_START) * 1000 ?> millisecondes</h2>
</body>
</html>