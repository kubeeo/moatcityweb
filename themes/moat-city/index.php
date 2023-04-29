<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
          $img = get_field("inner_banner", $post->ID); 
           if(!empty($img)){
                $img = $img;
            }else{
                $img = DEFAULT_BANNER;

            }
      ?>

    <img src="<?php echo $img ?>">

        <div class="title_breadcrumb d-flex">
            <div class="title_breadcrumb-inner align-self-center">
                <div class="container">
                    <span>
                        <h1>Blogs</h1> 
                         <div class="breadcrumb_bottom">
                         	<ul id="breadcrumbs" class="breadcrumb">
                         		<li class="item-home"><a class="bread-link bread-home" href="<?php echo site_url().''; ?>" title="Home">Home</a></li>
                         		<li class="separator separator-home"> <i class="fa fa-angle-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i> </li>
                         		<li class="item-home">Blog</li>
                         	</ul>
                     	</div>
                    </span>
                </div>
            </div>
        </div>
    </div>




<section class="latest-blog-area black-bg-wrap">

    <div class="container">

        <div class="inner-cont">

        <div class="row">  


            
            <div class="col-lg-12">
				<div class="row">
                <?php



                $default_posts_per_page = get_option('post_per_page');

                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                $actualLinkArry = explode("/", $actual_link);

                $actualLinkArryFilter = array_filter($actualLinkArry);

                $page_no = end($actualLinkArryFilter);

                if($page_no != null) {

                    $paged = $page_no;

                } else {

                    $paged = 1;

                }

                $post = query_posts( array( 



                    'post_type' => 'post', 

                    'post_status' => 'publish', 

                    'orderby' => 'date', 

                    'order' => 'DESC', 

                    'paged' => $paged, 

                    'posts_per_page' => $default_posts_per_page 



                    ) );

                $author = get_field('author_name', $id);

                    // echo "<pre>";



                    // print_r($post); die;



            ?>

            <?php if ( have_posts() ) : ?>

            <?php while( have_posts() ) : the_post(); ?>



            <div class="col-md-4">

                <div class="blog-box">

                                <div class="blog-thumb">
                                        <?php       
                                        $imageURL = get_the_post_thumbnail_url($ser->ID, 'full');        
                                        if($imageURL == ''){            $imageURL = NO_IMAGE_BEN;}      
                                        ?> 
                                        <img class="img-fluid" src="<?php echo $imageURL;?>" alt="" />
                                        <div class="blog-date">
                                            <span><?php echo $publish_date = get_the_date( 'M j' );?></span>
                                            <span><?php echo $publish_date = get_the_date( 'Y' );?></span>  
                                        </div>
                                 </div>
                           

                           
                                <div class="blog-info">
                                    <div class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div> 
                                    <div class="blog-des"><?php echo shortDesc($post->post_content,120) ; ?></div>
                                        <div class="blog-btn">
                                            <div class="top-btn"><a href="<?php the_permalink(); ?>">Read More</a></div>
                                            <div class="top-btn comment">
                                                <a href="<?php echo $link; ?>">Comment <?php echo $commentcount = get_comments_number( $id );?> </a>
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



                            'prev_text'          => __( 'Prev', 'twentytwentyone' ),

                            'next_text'          => __( 'Next', 'twentytwentyone' ),



                        ) );

                    ?>



                </div>

				</div>

            </div>



            <?php endif;



                // Make sure the default query stays intact



                wp_reset_query(); ?>

            </div>


            



        </div>

  </div>

</div>

</section>

</div>
<?php get_footer(); ?>
