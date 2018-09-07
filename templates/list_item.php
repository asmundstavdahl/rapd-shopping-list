<div class="item flex row <?= $item->checked ?"checked" :"" ?>">
	<div class="buttons">
		<a class="icon button" href="<?= route("check_item", [$item->id]) ?>">
			<?php if ($item->checked): ?>
				&#x2a2f;
			<?php else: ?>
				&#x2713;
			<?php endif ?>
		</a>
		<!-- <a class="button" onclick="return confirm('<?= tr("Confirm deletion") ?>')" href="<?= route("delete_item", [$item->id]) ?>">
			&#x2a2f;
		</a> -->
	</div>
	<span class="title"><?= $item->title ?></span>
	<div class="spacer"></div>
	<span class="info"><?= $item->checked_info ?></span>
</div>
