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

<!--

<h2>Recent Articles</h2>
<ol><?php wp_get_archives('type=postbypost&limit=10'); ?></ol>
<h2>Archives by Month:</h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
<h2>Archives by Category:</h2>
<ul><?php wp_list_categories(); ?></ul>

// Display weekly archives

<?php wp_get_archives('type=weekly'); ?>

// Last 10 weeks archive

<?php wp_get_archives('type=weekly&limit=10'); ?>  

// Monthly archive with post count

<?php wp_get_archives('show_post_count=1'); ?>

// Yearly archives

<?php wp_get_archives('type=yearly'); ?>

// Display all posts by date
-->
<?php wp_get_archives('type=postbypost'); ?>
<!--
// Display all posts alphabetically

<?php wp_get_archives('type=alpha'); ?>

// Display only top level categories

<?php wp_list_categories('depth=1'); ?>

// Display Pages and subpages

<?php wp_list_pages(); ?>

// Display only top level pages

<?php wp_list_pages('depth=1' ); ?>

// Display tag cloud

<?php wp_tag_cloud(); ?>

// Display last 30 days post

<?php wp_get_archives('type=daily&limit=30'); ?>

-->
	        </div><!-- .entry-content-page -->
	    <?php
	    endwhile; //resetting the page loop
	    wp_reset_query(); //resetting the page query
	    ?>
		</div>
	</div>

<?php
$theme_title = get_the_title();

if ($theme_title == "Active" || $theme_title == "Calm" || $theme_title == "Creative" || $theme_title == "Social" || $theme_title == "Useful"){
?>
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
	echo "<h3>Here's a selection of organisations that offer something '" . get_the_title() . "' you could try.<h3>";
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
