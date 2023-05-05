<?php
/**
 Template name: CMS Template
*/
get_header();?>


<?php get_template_part( './template-parts/inner-banner', 'page' );?>

<section class="inn-page">
    <div class="inner-cont">
        <div class="container">

        	<?php echo apply_filters('the_content', $post->post_content);?>
        		
    	</div>
    </div>
</section>
<?php get_footer(); ?>