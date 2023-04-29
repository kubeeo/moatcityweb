<?php

/**

 Template name: Thank You Template

*/

get_header();?>





<!-- <?php //get_template_part( './template-parts/inner-banner', 'page' );?> -->



<section class="inn-page">

    <div class="inner-cont">

        <div class="container">

        	<div class="success-wrap">

        		<img src="<?php echo BASEURL; ?>/images/success.png" alt="">

        		<?php echo apply_filters('the_content', $post->post_content);?>

    		</div>

    	</div>

    </div>

</section>

<?php get_footer(); ?>