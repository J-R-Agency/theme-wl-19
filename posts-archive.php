<?php
/*
Template Name: Archives
*/
get_header(); ?>

<section id="primary" class="content-area">
<div id="content" class="site-content" role="main">


<?php the_post(); ?>
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

<?php wp_get_archives('type=postbypost'); ?>

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