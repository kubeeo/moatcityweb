<?php 

/**
  
 * The template for displaying all single posts and attachments
  
 * 
 * @package WordPress 
 * @subpackage Twenty_Sixteen
 
 * @since Twenty Sixteen 1.0 
 */ 
get_header(); ?> 
<section class="innerBanner single-prod"> 
    <div class="innerBannerTxt"> 
        <div class="container"> 
            <div class="innerBannerWrap">
                <div class="breadcrumb_bottom">
                    <ul id="breadcrumb" class="breadcrumb">
                        <li class="item-home"><a class="bread-link bread-home" href="<?php echo site_url() . '/'; ?>" title="Home">Home</a></li>
                        <li class="separator separator-home"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </li>
                        <li class="item-cat item-custom-post-type-our_service"><a class="bread-cat bread-custom-post-type-our_service" href="<?php echo site_url() . '/products'; ?>" title="Our Services">Products</a></li>
                        <li class="separator"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </li>
                        <li class="item-current item-46"><strong class="bread-current bread-46" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></strong></li>
                    </ul>
                </div>  
            </div>
        </div>  
    </div> 
</section> 

<section class="main_content">  
    <section class="single-page"> 
        <?php 
        // Start the loop. 
        while (have_posts()) : the_post(); 
            // Include the single post content template. 
            get_template_part('template-parts/content', 'single-product'); 
        // End of the loop. 
        endwhile; 
        ?> 
    </section>  
</section> 
<?php get_footer(); ?>