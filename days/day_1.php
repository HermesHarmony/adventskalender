<h2>Tag <?= $day ?></h2>
<p>Wow, so ein tolles Türchen!</p>
<img src="./files/test.jpg" alt="Tag <?= $day ?>">

<?= contact([
	'title' => 'Kontaktiere uns',
	'fields' => 'Name, Email, Comments|textarea'
]) ?>