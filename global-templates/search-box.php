<div class="action-box w-100">
	<h1>What activity would you like to try?</h1>
	<?php // get_search_form( 'echo', 'Activity Search');?>
	<?php echo do_shortcode( '[searchandfilter fields="search,postcodes,costs,activities" types="multiselect, multiselect, multiselect, multiselect" submit_label="Find activities" class="find-activities" search_placeholder="Search for an activity..."]' ); ?>
	<div>Or use our <a href="/advanced-search/" title="Advanced Search">Advanced Search</a></div>
</div>