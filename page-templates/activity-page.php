<?php
/**
 * Template Name: Activity Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
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
	
	
	<div class="row entry-header">
		<div class="col-12">
			<h1 class="centered"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="row">
		<div class="col-12 content-copy">	
		<?php while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
	        <div class="entry-content-page">
	            <?php the_content(); ?> <!-- Page Content -->
	        </div><!-- .entry-content-page -->
	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>
		</div>
	</div>

	<div class="row">
		<div class="col-12 content-copy">
		<?php

	$the_theme = get_field("theme");

	$args = array(
	    'post_type' => 'activities',
	    'post_status' => 'publish',
	    'orderby'        => 'rand',
	    'posts_per_page' => 9,
	    'tax_query' => array(
	        array(
	            'taxonomy' => 'themes',
	            'field' => 'id',
	            'terms' => $the_theme
	        )
	    )
	);
	$the_query = new WP_Query( $args );
	echo "<h3>Here's a selection of activities from our directory<h3>";
	echo "<div class=\"activity-container\">";
	while ( $the_query->have_posts() ) : $the_query->the_post();
	    // content
	    unset($entries); // reset current entry
		$entries["link"] = get_permalink();
		$entries["title"] = get_the_title();
		$wl_link = $entries["link"];
		$wl_title = $entries["title"];

		$wl_api_logo_description = get_field("logo_description");
		$wl_api_logo_url = get_field("logo_url");

		if ( $websiteurl !="" ) {
			$activity_link[0] = "<a href=\"" . $websiteurl . "\" title=\"" . $wl_api_logo_description . "\" target=\"_blank\">";
			$activity_link[1] = "</a>";
		} else {
			$activity_link[0] = "";
			$activity_link[1] = "";
		}

		if ( $wl_api_logo_url!="" ){
			// echo "
			// 	<div class=\"activity-logo\">
			// 		" . $activity_link[0] . "<img src=\"" . $wl_api_logo_url . "\" title=\"" . $wl_api_logo_description . "\">" . $activity_link[1] . "
			// 	</div>
			// ";
		}

		$wl_summary = "<a href=\"". $wl_link . "\">" . $wl_title . "</a>";

	   // echo $wl_summary;


	    ?>

	    <div class="activity-card__item">
	    	<div class="activity-card__img" style="background-image: url('<?php echo $wl_api_logo_url ;?>');">
	    		<!-- <img src="<?php echo $wl_api_logo_url ;?>"> -->
	    	</div>
	    	<div class="activity-card__summary">
	    		<?php echo $wl_summary ;?>
	    	</div>
	    </div>
	    <?php

	endwhile;
	echo "</div>";
    wp_reset_query(); //resetting the page query

	?>
	</div>	
</div>

<div class="container-cta">
	<div class="row">
		<div class="col-12 content-copy">
			<h1 class="centered"><?php the_field('cta_button_title'); ?></h1>
			<?php 
			$link = get_field('cta_button');
			if( $link ): 
			    $link_url = $link['url'];
			    $link_title = $link['title'];
			    $link_target = $link['target'] ? $link['target'] : '_self';
			    $modifier = get_field('modifier');
		        if(!empty($modifier)){
		        	$modifier_class = " call-to-action-btn--" . $modifier ;
		        }
			    ?>
			    <a class="call-to-action-btn <?php echo $modifier_class ;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
?>