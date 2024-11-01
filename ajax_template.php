<tr class="app-entry<?php echo $expired ? ' app-entry-expired' : ''; ?>" data-categories="<?php echo $category; ?>">
	<td class="app-entry-thumbnail">
		<a href="<?php echo $url; ?>" target="_blank">
			<img src="<?php echo $thumbnail; ?>">
		</a>
	</td>
	<td class="app-entry-content">
	<div class="app-entry-name"><a href="<?php echo $url; ?>" target="_blank"><?php echo $title; ?></a></div>
		<ul class="app-entry-categories">
			<?php foreach(explode(',', $category) as $cat): ?>
				<li class="app-entry-category app-entry-category-<?php echo $cat; ?>"></li>
			<?php endforeach; ?>
		</ul>
		<div class="app-entry-price">
			<div class="app-entry-price-old">$<?= $price_old; ?></div>
			<div class="app-entry-price-new"><?= $price_new; ?></div>
		</div>
	</td>
</tr>