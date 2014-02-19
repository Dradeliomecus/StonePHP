
<?php $this->bloc('content') ?>

	<?php foreach($posts as $v): ?>
		<h1><?php echo $v['name'] ?></h1>
		<p><?php echo $v['content'] ?></p>
	<?php endforeach; ?>

<?php $this->end() ?>

<?php $this->bloc('sidebar') ?>

	<h4>Je suis une sidebar !!</h4>

<?php $this->end() ?>