<?php foreach($posts as $v): ?>
	<h1><?php echo $v->name ?></h1>
	<p><?php echo $v->content ?></p>
<?php endforeach; ?>