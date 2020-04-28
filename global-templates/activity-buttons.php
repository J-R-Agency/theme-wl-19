 <div class="row highlight">
		<div class="row">
			<div class="col-12">
				<h1 class="centered">What would you like to try?</h1>
			</div>
		</div>
		
		<div class="row">



			<?php 
			if( have_rows('activity') ) {
			 	while( have_rows('activity') ): the_row(); 
			 //var_dump( the_row() );
					// vars
					$image = get_sub_field('activity_icon');
					$name = get_sub_field('activity_name');
					$description = get_sub_field('activity_description');
					$link = get_sub_field('activity_link');


					$suggestions[] = array( $image, $name, $description, $link);
				endwhile; 


				//var_dump($suggestions);

				shuffle($suggestions);

				$shuffled_rows = array_slice($suggestions, 0, 4);

				foreach ($shuffled_rows as $suggested_row) {

					echo "<pre>";
					var_dump($suggested_row);
					echo "</pre>";
					# code...
				}

			}
			?>





			<?php if( have_rows('activity') ): ?>
						
				<?php while( have_rows('activity') ): the_row(); 
			
					// vars
					$image = get_sub_field('activity_icon');
					$name = get_sub_field('activity_name');
					$description = get_sub_field('activity_description');
					$link = get_sub_field('activity_link');
					
					if ($link!=""){
					?>
					<div class="col-md-3 col-12 activity">
						<!-- Activity icon -->
						<div class="col-md-12 col-4 centered">
							<?php if( $link ): ?>
								<a href="<?php echo $link['url']; ?>">
							<?php endif; ?>
				
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" class="icon centered"/>
						
							<?php if( $link ): ?>
								</a>
							<?php endif; ?>
						</div>
						
						<!-- Activity copy -->
						<div class="col-md-12 col-8">
							
							
							<h2 class="activity-name">
								<?php if( $link ): ?>
									<a href="<?php echo $link['url']; ?>">
								<?php endif; ?>							
							    	<?php echo $name; ?>
								<?php if( $link ): ?>
									</a>
								<?php endif; ?>	
							</h2>					    	
						    	
						    <p class="activity-description"><?php echo $description; ?></p>
						</div>
						
					</div>
					<?php } // End if ?>
					
				<?php endwhile; ?>
			
			<?php endif; ?>
		</div>
	</div>