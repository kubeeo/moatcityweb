<section class="single-prod-page sec-space">

	<div class="inner-cont">

		<div class="container">

		<div class="row align-items-center">
			<div class="col-lg-6 col-12">
				<div class="prod-single-image">
					<?php
					$imageURL = get_the_post_thumbnail_url($post->ID, 'full');
					if ($imageURL == '') {
						$imageURL = DEFAULT_BANNER;
					}
					?>
					<img src="<?php echo $imageURL ?>">
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="prod-single-cont">
					<!-- Add an inline CSS style to the h2 tag -->
					<h2><?php echo $post->post_title; ?></h2>
					
					<?php echo apply_filters('the_content', $post->post_content); ?> 
			
					<?php echo get_field('application_scope')?>
					<h3 class="blue-title">Technical Parameters</h3>
					<?php echo get_field('technical_parameters')?>
				</div>
			</div>
		</div>

		</div>

	</div>

</section>





