<div class="relative z-10">
	<div data-overlay="closed" class="data-[overlay=closed]:hidden fixed left-1/2 top-16 max-h-[90vh] -translate-x-1/2 peer z-10 max-w-4xl bg-white p-8 overflow-scroll w-full copy rounded-md shadow-lg">
		
	</div>
	<div data-fog class="peer-data-[overlay=closed]:hidden backdrop-blur-md group/overlay fixed inset-0 bg-black/50 text-white flex padding-8 -z-10">
		<div class="max-w-4xl w-full mt-4 mx-auto flex justify-end">
			<button data-close-overlay class="p-1 size-8 bg-black rounded-full text-white">
				<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
					<line x1="18" y1="6" x2="6" y2="18" />
					<line x1="6" y1="6" x2="18" y2="18" />
				</svg>
			</button>
		</div>
	</div>
</div>

<!-- js -->
<script src="<?= siteUrl() ?>/dist/js/core.js"></script>

</body>
</html>