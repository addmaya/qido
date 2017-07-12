<?php
	$pageList = array();
	foreach (get_pages('sort_column=menu_order&sort_order=asc') as $page) {
		$pageList[] += $page->ID;
	}
	$currentPage = array_search(get_the_ID(), $pageList);
	$nextPageID = $pageList[$currentPage+1];
?>
<?php if (!empty($nextPageID)): ?>
	<a href="<?php echo get_permalink($nextPageID); ?>" class="c-button-next">
		<span class="o-subtitle">Next</span>
		<span class="o-heading"><?php echo get_the_title($nextPageID); ?></span>
		<i class="o-icon s--arrow-ltr"></i>
		<figure style="background-image:url('<?php echo get_field('cover_image', $nextPageID); ?>')"></figure>
	</a>
<?php endif ?>