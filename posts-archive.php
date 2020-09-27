<?php
/**
 * Template Name: Posts Archive
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div class="container-fluid">
	
	<?php if ( has_post_thumbnail() ): ?>
		<?php $thumb = get_the_post_thumbnail_url(); ?>
			<div class="hero" style="background-image: url('<?php echo $thumb; ?>') ;"></div>
			<div class="hero_inner" style="background-image: url('<?php echo $thumb; ?>') ;"></div>	
	<?php endif ?>
	<?php
		$modifier = get_field('modifier');
	?>
	
	<div class="row entry-header">
		<div class="col-12">
			<h1 class="centered"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12 content-copy">	
		<?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
	        <div class="entry-content-page">


<?php the_post(); ?>
  <?php
  $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
  if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;

  $my_query = new WP_Query('post_type=post&nopaging=1');
  if($my_query->have_posts()) {


	echo "<div class=\"activity-container\">";
	while ( $the_query->have_posts() ) : $the_query->the_post();
	    // content
	    unset($entries); // reset current entry
		$entries["link"] = get_permalink();
		$entries["title"] = get_the_title();
		$wl_link = $entries["link"];
		$wl_title = $entries["title"];


		$wl_link_parts["start"] = "<a href=\"" . $wl_link . "\" title=\"" . $wl_title . "\">";
		$wl_link_parts["end"] = "</a>";
		$wl_summary = $wl_link_parts["start"] . $wl_title . $wl_link_parts["end"];


		// Processing functions
        if(!empty($modifier)){
        	$modifier_class = " activity-card_pseudoimg--" . $modifier ;
        }
        $wl_title_short = substr($wl_title, 0, 48) ;
        $wl_title_short = explode(" ", $wl_title);
        $wl_title_short = array_slice($wl_title_short,0,5);
        $wl_title_short = implode(" ", $wl_title_short);
	    ?>

	    <div class="activity-card__item">
	    	<?php echo $wl_link_parts["start"] ;?>
	    	<?php

			if(trim($wl_api_logo_url)==""){
				$activity_card__img = "<div class=\"activity-card_pseudoimg " . $modifier_class . "\"><h2>" . substr($wl_title_short, 0, 48) . "</h2></div>";
			} else {
		    	$activity_card__img = "
		    	<div class=\"activity-card__img\" style=\"background-image: url('" . $wl_api_logo_url . "');\">
		    		<!-- <img src=" . $wl_api_logo_url . "> -->
		    	</div>";		
			}

			echo $activity_card__img;

	    	?>


	    	<div class="activity-card__summary">
	    		<?php echo $wl_summary ;?>
	    	</div>
	    	<?php echo $wl_link_parts["end"] ;?>
	    </div>
	    <?php

	endwhile;
	echo "</div>";


    wp_reset_postdata();
  }
  ?>



	        </div><!-- .entry-content-page -->
	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>
		</div>
	</div>



<?php
get_footer();
?>
