<?php
/**
 * Template Name: Posts Archive
 *
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
	            <?php the_content(); ?> <!-- Page Content -->
	        </div><!-- .entry-content-page -->
	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>
		</div>
	</div>

<?php
$theme_title = get_the_title();

if (1==1){
?>
	<div class="row">
		<div class="col-12 content-copy">
		<?php

	$the_theme = get_field("theme");
	$args = array(
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'posts_per_page' => 30
		);
	$the_query = new WP_Query( $args );
	echo "<div class=\"activity-container\">";
	while ( $the_query->have_posts() ) : $the_query->the_post();
	    // content
	    unset($entries); // reset current entry
		$entries["link"] = get_permalink();
		$entries["title"] = get_the_title();
		$wl_link = $entries["link"];
		$wl_title = $entries["title"];



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

		$wl_link_parts["start"] = "<a href=\"" . $wl_link . "\" title=\"" . $wl_title . "\">";
		$wl_link_parts["end"] = "</a>";
		$wl_summary = $wl_link_parts["start"] . $wl_title . $wl_link_parts["end"];

	   // echo $wl_summary;


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

			if( has_post_thumbnail() ){

		    	$activity_card__img = "
		    	<div class=\"activity-card__img\" style=\"background-image: url('" . get_the_post_thumbnail_url() . "');\">
		    		<!-- <img src=" . $wl_api_logo_url . "> -->
		    	</div>";

			} else {

				$activity_card__img = "<div class=\"activity-card_pseudoimg " . $modifier_class . "\"><h2>" . substr($wl_title_short, 0, 48) . "</h2></div>";

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
    wp_reset_query(); //resetting the page query

	?>
	</div>	
</div>
<?php
} // End theme check
?>
<div class="container-cta">
	<div class="row">
		<div class="col-12 content-copy">
			<?php
			$cta_button_title = get_field('cta_button_title');
			if ( $cta_button_title != "" ) {
				echo "<h1 class=\"centered\">$cta_button_title</h1>" ;
			}
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