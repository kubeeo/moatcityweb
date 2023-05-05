<div class="single-blog-wrap"> 
		<div class="content-img">
			<?php
	           $imageURL = get_the_post_thumbnail_url($post->ID, 'full');
				if($imageURL == ''){
					$imageURL = NO_IMAGE;
				}
	        ?>
	        <img src="<?php echo $imageURL;?>" alt="<?php echo $post->post_title;?>" />

		</div>
		<div class="blog-date">
			<span class="blog-date"> <?php echo $publish_date = get_the_date( 'j,F,Y' );?> </span>
			<?php
            /* <span class="c-blog-date-s"> <?php echo $publish_date = get_the_date( 'j' );?> </span>
            <span class="c-blog-month-s"> <?php echo $publish_date = get_the_date( 'F' );?> </span>
            <span class="c-blog-yeaer-s"> <?php echo $publish_date = get_the_date( 'Y' );?> </span> */ 
			?>
        </div>
		<h2 class="mt-3"><?php echo $post->post_title;?></h2> 
		<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID));?>

</div>



























