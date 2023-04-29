<section class="single-ser-wrap sec-space">

	<div class="inner-cont">

		<div class="container">

			<div class="single-row">  
				<div class="single-pic wow fadeInRight" data-wow-duration="2s">
					<?php
					$imageURL = get_the_post_thumbnail_url($post->ID, 'full');
					if ($imageURL == '') {
						$imageURL = DEFAULT_BANNER;
					}
					?>
					<img src="<?php echo $imageURL ?>">
				</div> 
				<div class="single-content">
					<h2 class="wow fadeInDown" data-wow-duration="1.5s"><?php echo $post->post_title; ?></h2> 
					<?php echo apply_filters('the_content', $post->post_content); ?> 
				</div> 
			</div>
		</div>

	</div>

</section>

<section class="others-section sec-space">
	<div class="container">
		<div class="text-center wow fadeInDown" data-wow-duration="2s">
			<h2>Other Services</h2>
		</div>
		<div class="owl-carousel">
			<?php
			$banner_sliders = array(
				'posts_per_page'    => -1,
				'offset'            => 0,
				'orderby'           => 'date',
				'order'             => 'ASC',
				'post_type'         => 'service',
				'post_parent'       => '',
				'author'            => '',
				'author_name'       => '',
				'post_status'       => 'publish',
			);
			$ver_sliders = get_posts($banner_sliders);
			foreach ($ver_sliders as $key => $post_sliders) {
				$id = $post_sliders->ID;
				$image = get_the_post_thumbnail_url($id);
				$link = get_the_permalink($id);
				$title = $post_sliders->post_title;
				$posttxt =  $post_sliders->post_content;
			?>
				<div class="item">
					<div class="sbox innersbox">
						<div class="simg">
							<?php
							$imageURL = get_the_post_thumbnail_url($post_sliders->ID, 'full');
							if ($imageURL == '') {
								$imageURL = NO_IMAGE_BEN;
							}
							?>
							<img src="<?php echo $imageURL; ?>" alt="" />
						</div>
						<div class="scontent">
							<h3><?php echo $title; ?></h3>
							<div class="spara">
								<?php echo shortDesc($posttxt, 100) . '...'; ?>
							</div>
							<a class="readmore" href="<?php echo $link; ?>">Read More</a>
						</div>
					</div>

				</div>
			<?php } ?>
		</div>
	</div>
</section>