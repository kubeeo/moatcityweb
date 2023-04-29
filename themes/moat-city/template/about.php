<?php

/**

 Template name: About Template

*/

get_header();?>



<?php get_template_part( './template-parts/inner-banner', 'page' );?>



<section class="innerPage about-page sec-space">

    <div class="innerCont">

        <div class="container"> 

            <div class="row align-items-center">

            <?php

                $aboutImg = get_field('about_image', $id);

                if ($aboutImg == '') {

                    $aboutImg = NO_IMAGE;

                } ?>

                <div class="mb-4 mb-lg-0 col-lg-5 col-md-6 wow fadeInLeft" data-wow-duration="2s"><figure class="about-img"><img src="<?php echo $aboutImg;?>" alt="About"></figure></div>

                

                <div class="col-lg-7 pl-lg-5 col-md-6 wow fadeInRight" data-wow-duration="2s">

                    <div class="about-content">

                        <?php echo apply_filters('the_content', $post->post_content);?> 

                    </div>

                </div>

            </div>



            



    	</div>

    </div>

</section>



<!-- BIG BANNER -->

<?php $bigbanner = get_field('big_banner', 23); ?>

<section class="big-banner">

    <img class="w-100" src="<?php echo $bigbanner;?>" alt="">

</section>





<section class="mission-section pt-5">

    <div class="container">

        <?php echo get_field('our_mission')?>

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