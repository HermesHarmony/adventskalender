<?php require_once('components/head.php'); ?>

<div class="mx-auto max-w-4xl">
	<div class="text-center mb-8">
		<h1 class="mb-4 text-3xl font-bold"><?= $title ?></h1>
		<p class="text-lg"><?= $message ?></p>
	</div>

	<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-1 w-full">
		<?php foreach($days as $day): ?>
			<a href="<?= siteUrl().'/days/day-'. $day ?>"
			 data-door="<?= $day ?>" 
			 class="relative /data-[locked=true]:cursor-not-allowed flex items-center justify-center aspect-square bg-red-500 group" aria-label="Tag <?= $day ?>" 
			 data-locked="<?= $day > $currentDay ? 'true' : 'false' ?>">
				<figure class="absolute inset-0 hover:opacity-0 transition-opacity duration-1000">
					<img class="w-full h-full object-cover" src="<?= './doors/'.$day .'.png' ?>" alt="Tag <?= $day ?>">
				</figure>

				<div class="text-2xl text-white">?</div>
			</a>
		<?php endforeach; ?>
	</div>

	<div id="success" class="hidden target:block bg-green-600 p-8 my-8 text-white">
		<p><?= $data['form_success_message'] ?></p>
	</div>

</div>

<?php require_once('components/footer.php'); ?>