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
		<div class="col-1"></div>
		<div class="col-10 content-copy">
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
		<div class="col-1"></div>
	</div>
	
<?php
$args = array(
    'post_type' => 'activities',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'theme',
            'field' => 'id',
            'terms' => '6'
        )
    )
);
$the_query = new WP_Query( $args );
while ( $the_query->have_posts() ) : $the_query->the_post();
    //content
    the_permalink;
endwhile;
?>


<?php
$the_theme = get_field("theme");
//print_r($the_theme);
/* Add your taxonomy. */
$taxonomies = array( 
    'themes',
);

$args = array(
    'orderby'           => 'name', 
    'order'             => 'ASC',
    'hide_empty'        => true, 
    'exclude'           => array(), 
    'exclude_tree'      => array(), 
    'include'           => array(),
    'number'            => '', 
    'fields'            => 'all', 
    'slug'              => '', 
    'parent'            => '',
    'hierarchical'      => true, 
    'child_of'          => 0, 
    'get'               => '', 
    'name__like'        => '',
    'description__like' => '',
    'pad_counts'        => false, 
    'offset'            => '', 
    'search'            => '', 
    'cache_domain'      => 'core'
); 

$terms = get_terms( $taxonomies, $args );
//print_r($terms);
foreach ( $terms as $term ) {

// here's my code for getting the posts for custom post type

$posts_array = get_posts(
                        array( 'showposts' => -1,
                            'post_type' => 'activities',
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'theme',
                                'field' => $the_theme,
                                'terms' => $term->name,
                                )
                            )
                        )
                    );
   // print_r( $posts_array ); 

    foreach ($posts_array as $post) {	
    	# code...
    	setup_postdata($post);
    	?>
    	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    	<?php

    }
    wp_reset_postdata();
}

?>
	
</div>

<?php
get_footer();
?>