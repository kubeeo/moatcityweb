<?php

/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

	<div class="main_content">



<div class="innerBanner">
        <?php
        $imageURL = get_the_post_thumbnail_url($post->ID, 'full');
        if($imageURL == '') {
            $imageURL = DEFAULT_BANNER;
        }
        ?>
        <img class="baner_img_page" src="<?php echo timthumb($imageURL,372,1349);?>" alt="<?php echo $post->post_title;?>" />
        <div class="title_breadcrumb d-flex">
            <div class="title_breadcrumb-inner align-self-center">
                <div class="container">
                    <span>
                        <h1>Blogs</h1> 
                         <div class="breadcrumb_bottom">
                         	<ul id="breadcrumbs" class="breadcrumbs">
                         		<li class="item-home"><a class="bread-link bread-home" href="<?php echo site_url().''; ?>" title="Home">Home</a></li>
                         		<li class="separator separator-home"> / </li>
                         		<li class="item-home">Blog</li>
                         	</ul>
                     	</div>
                    </span>
                </div>
            </div>
        </div>
    </div>





<section class="latest-blog-area">

    <div class="container">

        <div class="inner-cont">

        <div class="row">  


            
            <div class="col-lg-9 col-md-8">
				<div class="row">
                

            <?php if ( have_posts() ) : ?>

            <?php while( have_posts() ) : the_post(); ?>



            <div class="col-lg-6 col-md-12">

                <div class="single-blog-post">

                    <div class="media text-holder">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-box" data-aos="zoom-in" data-aos-duration="2500">
                                <div class="blog-thumb">
                                        <?php       
                                            $imageURL = get_the_post_thumbnail_url($ser->ID, 'full');        
                                            if($imageURL == ''){            $imageURL = NO_IMAGE_BEN;}      
                                            ?> 
                                            <img class="img-fluid" src="<?php echo $imageURL;?>" alt="" />
                                 </div>
                           

                           
                                <div class="blog-cont">
                                    <div class="blog-info">
                                        <div class="blog-date">
                                            <span class="c-blog-date-s"> <?php echo $publish_date = get_the_date( 'j' );?> </span>
                                            <span class="c-blog-month-s"> <?php echo $publish_date = get_the_date( 'M' );?> </span>
                                            <span class="c-blog-yeaer-s"> <?php echo $publish_date = get_the_date( 'Y' );?> </span>
                                        </div>
                                         <div class="blog-title"><?php the_title(); ?></div>    
                                         <div class="blog-des"><p><?php echo shortDesc($post->post_content,75) ; ?></p></div>
                                         <div class="more-btn"><a href="<?php the_permalink(); ?>">Read More </a></div>
                                    </div>
                                </div>
                            
                        </div>
                            </div>

                            
                        </div>
                    </div>

                </div>

            </div>



            <?php endwhile;?>



            <div class="col-md-12 text-center">

                <div class="paginationList">



                    <?php



                        // Previous/next page navigation.



                        the_posts_pagination( array(



                            'prev_text'          => __( 'Prev', 'twentysixteen' ),

                            'next_text'          => __( 'Next', 'twentysixteen' ),



                        ) );

                    ?>



                </div>

				</div>

            </div>



            <?php endif;



                // Make sure the default query stays intact



                wp_reset_query(); ?>

            </div>


            <div class="col-lg-3 col-md-4">

               <div class="blog-sidebar">

                    <?php get_sidebar(); ?>

                </div>

            </div> 
              



        </div>

  </div>

</div>

</section>

</div>
<?php get_footer(); ?>




