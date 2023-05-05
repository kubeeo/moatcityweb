<?php

/**

 Template name: Services Template

 */

get_header(); ?>
<?php get_template_part('./template-parts/inner-banner', 'page'); ?>

<section class="service-page sec-space">
    <div class="container"> 
        <div class="row gap-bottom justify-content-center">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $gallery_post = array(
                'post_type'     => 'service',
                'posts_per_page'   => -1,
                'post_status'   => 'publish',
                'orderby' => 'date',
                'order' => 'DSC',
                'paged' => $paged
            );

            // The Query
            $the_query = new WP_Query($gallery_post);

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
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="sbox innersbox wow zoomIn" data-wow-duration="2s">
                            <div class="simg">
                                <img src="<?php echo $image; ?>">
                            </div>
                            <div class="scontent">
                                <h3><?php echo $title; ?></h3>
                                <div class="spara">
                                    <p><?php echo shortDesc($posttxt,100). '...' ;?></p>
                                </div> 
                                <a class="readmore" href="<?php echo $link; ?>">READ MORE</a>
                            </div>
                        </div>
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
    </div>
</section>


<?php get_footer(); ?>