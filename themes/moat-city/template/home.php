<?php



/**

 Template name: Home Template

 */

get_header(); ?>

<?php

$tell = get_option('mobile_no');

$email = get_option('store_email_id');

$homepage = get_post($post->ID);

$address = get_option('store_address');

?>

<!-- Banner Start Here -->



<section class="homebanner">

    <div class="bannerbox position-relative">

        <div class="owl-carousel home-slider">

            <?php

            $banner_sliders = array(
                'posts_per_page'    => -1,
                'offset'            => 0,
                'orderby'           => 'date',
                'order'             => 'ASC',
                'post_type'         => 'home_banner',
                'post_parent'       => '',
                'author'            => '',
                'author_name'       => '',
                'post_status'       => 'publish',
            );
            $ver_sliders = get_posts($banner_sliders);
            foreach ($ver_sliders as $key => $post_sliders) {
                $id = $post_sliders->ID;
                $image = get_the_post_thumbnail_url($id);
            ?>
                <div class="item">
                    <figure class="bannerimg">
                        <?php
                        $imageURL = get_the_post_thumbnail_url($post_sliders->ID, 'full');
                        if ($imageURL == '') {
                            $imageURL = NO_IMAGE;
                        }
                        ?>
                        <img src="<?php echo $imageURL; ?>" alt="<?php the_title(); ?>" />
                    </figure>
                </div>
            <?php } ?>
        </div>
        <div class="banner-text">
            <div class="container">
                <div class="bannertextwrap wow zoomIn" data-wow-duration="2s">
                    <?php echo apply_filters('the_content', $post->post_content); ?> 
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner End Here -->



<!-- CLICK TO BOTTOM ARROW -->

<div class="click-to-bottom">

    <a href="#menuscroll">

        <lottie-player src="<?php echo BASEURL;?>/js/banner-arrow.json" background="transparent" speed="1" style="width: 50px; height: 50px;" loop autoplay></lottie-player>

    </a>

</div>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>



<!-- BANNER BOTTOM SMALL PARA -->

<?php $smallpara = get_field('small_paragraph', $post->ID); ?>

<section class="sec-space small-paragraph">

    <div class="container">

        <div class="text-center">

            <?php echo $smallpara;?>

        </div>

    </div>

</section>



<!-- CATEGORY SECTION -->

<section id="menuscroll" class="sec-space big-gap menu-section">

    <div class="container">

        <div class="sec-head text-center mb-lg-5">

            <h2>Product Categories</h2>

        </div> 

        <div class="row gap20">

            <?php

            $taxonomy = 'category_list';

            $terms = get_terms([

                'hierarchical' => 1,

                'taxonomy' => $taxonomy,

                'hide_empty' => false,



                //'number'   => -1

            ]);

            foreach ($terms as $key => $value) {

            ?>

                <div class="col-lg-3 col-md-6 col-12 cate-col wow zoomIn" data-wow-duration="2s">

                    <a href="<?php echo get_category_link($value->term_id) ?>" class="cate-box">

                        <figure><img src="<?php echo get_field("category_image", $value); ?>"></figure>

                        <h3><?= $value->name; ?></h3>

                    </a>

                </div>

            <?php } ?>

        </div> 

    </div>

</section>

<!-- HOME ABOUT -->

<?php

$aboutsec = get_field('about_section', $post->ID);

$about_heading = (!empty($aboutsec['about_heading'])) ? $aboutsec['about_heading'] : 'No Content';

$about_text = (!empty($aboutsec['about_content'])) ? $aboutsec['about_content'] : 'No Content';

?>

<section class="home-about sec-space big-gap">

    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6 abt-left wow fadeInLeft" data-wow-duration="2s"> 

                <?php echo $about_heading;?>

            </div>

            <div class="col-lg-6 col-md-6 ml-auto abt-right wow fadeInRight" data-wow-duration="2s"> 

                <?php echo $about_text;?>

                <a href="<?php echo get_the_permalink(6);?>" class="readmore">Read More . . .</a>

            </div>

        </div>

    </div>

</section>

<!-- BIG BANNER -->

<?php $bigbanner = get_field('big_banner', $post->ID); ?>

<section class="big-banner">

    <img class="w-100" src="<?php echo $bigbanner;?>" alt="">

</section>



<!-- HOME BLOGS -->

<section class="home-blog sec-space">

    <div class="container"> 

        <h2 class="text-center">Latest Blogs</h2>

        <div class="d-flex flex-wrap blog-row justify-content-center">

            <?php

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $blog_post = array(

                'post_type'     => 'post',

                'posts_per_page'   => 3,

                'post_status'   => 'publish',

                'orderby' => 'date',

                'order' => 'DCS',

                'paged' => $paged

            );



            // The Query

            $the_query = new WP_Query($blog_post);



            // The Loop

            if ($the_query->have_posts()) {

                while ($the_query->have_posts()) {

                    $the_query->the_post();

                    $title = get_the_title();

                    $id = get_the_ID();

                    $link = get_the_permalink($id);

                    $content = get_the_content(); 

                    $posttxt = get_the_content($id);

                    $image = get_the_post_thumbnail_url($id);

                    if ($image == '') {

                        $image = NO_IMAGE;

                    }

            ?>

                    <div class="blog-col">

                        <a href="<?php echo $link; ?>" class="blog-box wow zoomIn" data-wow-duration="2s">

                            <div class="bimg">

                                <img src="<?php echo $image; ?>"> 

                            </div>

                            <div class="bcontent">

                                <h3><?php echo $title; ?></h3>

                                <div class="bpara">

                                    <p><?php echo shortDesc($posttxt,100). '...' ;?></p>

                                </div>  

                                <div class="readmore">Read More . . .</div>

                            </div>

                        </a>

                    </div>



                <?php

                }

            } else {

                ?>

                <div class="col-lg-12">

                    <div class="blank_found">No Post Found!</div>

                </div>

            <?php

            }

            // Restore original Post Data /w

            wp_reset_postdata();

            ?>

        </div>

        <div class="btn-center text-center">

            <a href="<?php echo get_the_permalink(73);?>" class="btn">VIEW ALL</a>

        </div>

    </div>

</section>   



<!-- OUR CLIENT -->

<section class="sec-space">

    <div class="container"> 

        <div class="owl-carousel client-slider">

            <?php

            $banner_sliders = array(



                'posts_per_page'    => -1,



                'offset'            => 0,



                'orderby'           => 'date',



                'order'             => 'ASC',



                'post_type'         => 'client',



                'post_parent'       => '',



                'author'            => '',



                'author_name'       => '',



                'post_status'       => 'publish',



            );



            $ver_sliders = get_posts($banner_sliders);



            foreach ($ver_sliders as $key => $post_sliders) {



                $id = $post_sliders->ID;



                $image = get_the_post_thumbnail_url($id);



            ?>



                <div class="item">

                    <figure class="client-logo wow zoomIn" data-wow-duration="2s">

                        <?php

                        $imageURL = get_the_post_thumbnail_url($post_sliders->ID, 'full');



                        if ($imageURL == '') {

                            $imageURL = NO_IMAGE;

                        }

                        ?>

                        <img src="<?php echo $imageURL; ?>" alt="<?php the_title(); ?>" />



                    </figure>





                </div>



            <?php } ?>



        </div>

    </div>

</section> 



<?php get_footer(); ?>