<?php
/**
 Template name: Privacy Policy Template
*/
get_header();?>


<?php get_template_part( './template-parts/inner-banner', 'page' );?>

<section class="sec-space"> 
        <div class="container">

        	<?php echo apply_filters('the_content', $post->post_content);?>
        		
    	</div> 
</section>
<?php get_footer(); ?>