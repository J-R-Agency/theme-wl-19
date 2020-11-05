<?php
	$placeholder_image = get_field('placeholder_blog_image', 'options');
	$featured_image = get_the_post_thumbnail_url();
	
	if (!$featured_image) {
		$blog_image = $placeholder_image['url'];
	} else {
		$blog_image = $featured_image;
	}
	
?>	

<div class="article__item">
	<a href="<?php the_permalink() ?>" rel="bookmark">
	<div class="article__img" style="background-image: url('<?php echo $blog_image; ?>');">
	</div>
	<h3 class="article__title"><?php the_title(); ?></h3>
	<div class="article__summary">
		<?php the_excerpt(); ?>
	</div>
	</a>
</div>