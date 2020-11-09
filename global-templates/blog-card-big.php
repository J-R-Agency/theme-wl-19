<div class="lead_story__card flex-container">
	<div class="lead_story__image flex-item">
		<img src="<?php echo get_the_post_thumbnail(); ?>"> 
	</div>
	<div class="lead_story__details flex-item">
		<h3><a href="<?php echo $the_permalink; ?>"><?php echo $post->post_title; ?></a></h3>
		<p class="lead_story__excerpt"><?php echo $post->post_excerpt; ?></p>
		<div class="lead_story__button"><a href="<?php echo $the_permalink; ?>"> Read more &gt;</a></div>
	</div>
</div>