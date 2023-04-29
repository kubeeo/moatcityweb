<?php



/**



 Template name: banner Template



*/



?>





    <div class="innerBanner">

        <?php

        $imageURL = get_the_post_thumbnail_url($post->ID, 'full');

        if($imageURL == '') {

            $imageURL = DEFAULT_BANNER;

        }

        ?>

        <figure class="innerBannerImg">

            <img src="<?php echo $imageURL;?>" alt="<?php echo $post->post_title;?>" />

        </figure>

        <div class="innerBannerTxt">

            <div class="container">

                <div class="innerBannerWrap">  

                    <h1><?php echo $post->post_title;?></h1> 

                    <div class="breadcrumb_bottom d-flex"><?php custom_breadcrumbs();?></div> 

                </div>

            </div>

        </div>

    </div>

















