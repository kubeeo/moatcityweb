<?php



/**



 Template name: Products Template



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
                    </ul>
                </div>  
            </div>
        </div>  
    </div> 
</section> 



    

<section class="innerPage listing-wrap sec-space gray-bg">

    <div class="container">


<div class="prod-topbar d-flex flex-wrap align-items-center justify-content-between">
    <div class="topbar-left">
        <div class="prod-search"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
    </div>
    <div class="topbar-right d-flex align-items-center justify-content-end">
        
        <div class="prod-filter">
            <div class="selectarea">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Choose Category
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php
                $taxonomy='category_list';
                $terms = get_terms([
                  'hierarchical' => 1,
                  'taxonomy' => $taxonomy,
                  'hide_empty' => false,
                  //'number'   => -1
                ]);
                foreach ($terms as $key => $value) {
              ?>
                  <a class="dropdown-item" href="<?php echo get_category_link($value->term_id)?>"><?= $value->name;?></a>
                <?php }?>
                </div>
            </div> 
        </div>
    </div>
</div>



        <div class="row gap-bottom justify-content-center" id="gallery">

            

        <?php

                $banner_sliders = array(

                'posts_per_page'    => -1,

                'offset'            => 0,

                'orderby'           => 'date',

                'order'             => 'ASC',

                'post_type'         => 'product',

                'post_parent'       => '',

                'author'            => '',

                'author_name'       => '',

                'post_status'       => 'publish',

                );

                $ver_sliders = get_posts($banner_sliders);

                foreach($ver_sliders AS $key => $post_sliders){

                $id = $post_sliders->ID;

                $image = get_the_post_thumbnail_url($id);

                $link = get_the_permalink($id);

                $title = $post_sliders->post_title;

                $posttxt =  $post_sliders->post_content;

            ?>  



                <div class="col-md-4 col-12 cate-col wow zoomIn" data-wow-duration="2s">

                    <a href="<?php echo $link; ?>" class="cate-box">

                        <figure><img class="img-fluid" src="<?php echo $image;?>" alt="" /></figure>

                        <h3><?php echo $title; ?></h3>

                    </a>

                </div>



              

             <?php } ?>



        </div>



        <!-- <button id="more_gallery" class="text-center" data-id="0">Load More</button> -->





    </div>

</section>







<script type="text/javascript">

    jQuery(document).ready(function($)

    {

        $('#more_gallery').click(function()

        {

            offset = $(this).attr('data-id');

            offset = parseInt(offset) + 4;

            $(this).attr('data-id',offset);

            $.ajax({

                url:"<?= admin_url('admin-ajax.php')?>",

                type:"post",

                data:{action:"more_gallery",offset:offset},

                success:function(response)

                {

                    console.log(response);

                    if(response == '')

                    {

                        $('#more_gallery').hide();

                    }

                    else

                    {

                        $('#gallery').append(response);

                    }                   

                }

            })

        })

    })

</script>



<?php get_footer(); ?>