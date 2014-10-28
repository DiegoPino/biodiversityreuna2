<?php foreach ($rows as $id => $row): ?>
		<div
		<?php if ($classes_array[$id]): ?>
        <?php print ' class="' . $classes_array[$id]; ?>
        <?php if ($id == 0) { print ' active'; } ?>
        <?php print '"'; ?>
		>
<?php endif; ?>
<?php print $row; ?> </div>
<?php endforeach; ?>
	
	
