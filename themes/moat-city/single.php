<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

<section class="innerBanner"> 
    <?php
    $img = get_field("inner_banner", $post->ID);
    if (!empty($img)) {
        $img = $img;
    } else {
        $img = DEFAULT_BANNER;
    }
    ?>
    <figure class="innerBannerImg">
        <img src="<?php echo $img ?>">
    </figure>
    <div class="innerBannerTxt"> 
        <div class="container"> 
            <div class="innerBannerWrap">
                <h1>Blog</h1>
                <div class="breadcrumb_bottom">
                    <ul id="breadcrumb" class="breadcrumb">
                        <li class="item-home"><a class="bread-link bread-home" href="<?php echo site_url() . '/'; ?>" title="Home">Home</a></li>
                        <li class="separator separator-home"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </li>
                        <li class="item-cat item-custom-post-type-our_service"><a class="bread-cat bread-custom-post-type-our_service" href="<?php echo site_url() . '/blog'; ?>" title="Blog">Blogs</a></li>
                        <li class="separator"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </li>
                        <li class="item-current item-46"><strong class="bread-current bread-46" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></strong></li>
                    </ul>
                </div>  
            </div>
        </div>  
    </div> 
</section> 
<div id="primary" class="content-area single-blog black-bg-wrap">
	<div class="single-page sec-space">
		<div class="container">
		<div class="inner-cont">
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<div class="service_cont_details">
						<main id="main" class="site-main" role="main">
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						// Include the single post content template.
						get_template_part( 'template-parts/content', 'single' );

						?>
						<div class="comments-area">
						<?php

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}

						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentytwentyone' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentytwentyone' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'twentytwentyone' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentytwentyone' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'twentytwentyone' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}

						?>
						</div>
						<?php

						// End of the loop.
					endwhile;
					?>
						</main><!-- .site-main -->
				</div>		
			</div>
			<div class="col-lg-3 col-md-4">
				 <div class="blog-sidebar">

                    <!-- <?php //get_sidebar(); ?> -->

					<div class="recent_blog">
						<h2>Recent Blogs</h2>
						<ul>
					<?php
					    $blog = array(
					    'category__in' => wp_get_post_categories($post->ID),
					    'post__not_in' => array($post->ID),	
					    'post_type' => 'post',
					    'order' => 'DSC',
					    'numberposts' =>4, 
					    'orderby'=>'date',
					    'order'=>'DESC'
					    );
					    $blogs = get_posts($blog);
					    if(!empty($blogs))
					    {
					    	foreach ($blogs as $key => $value) {
						    $link = get_the_permalink($value);
							$title = $value->post_title;
							$publish_date = get_the_date( 'j F Y',$value);
							$content = $value->post_content;
				        	$img = get_field('image',$value);
					        if(!empty($img)){
					            $img = $img;
					        }else{
					            $img = NO_IMAGE;

					        }      
						?>					
								<li><?php echo $title;?></li>				          		
							
						<?php
						  }
						
					    }
					    else
					    {
					    	?>
					    	
									<li>No Related Post Found.</li>
							</div>
					    	<?php
					    }
					    
					?>
					</ul>
				</div>

                </div>
			</div>
		</div>
		</div>
		</div>
	</div>
</div><!-- .content-area -->


<?php get_footer(); ?>
