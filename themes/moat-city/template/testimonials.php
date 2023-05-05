<?php
/**
 Template name: Testimonials Template
*/
get_header();?>

<?php get_template_part( './template-parts/inner-banner', 'page' );?>
 
<!-- HOME TESTIMONIAL -->
<section class="testimonial-page sec-space">
    <div class="container"> 
        <div class="twrapper">
            <div class="row gap-bottom">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $testimonial_post = array(
                    'post_type'     => 'testimonials',
                    'posts_per_page'   => -1,
                    'post_status'   => 'publish',
                    'orderby' => 'date',
                    'order' => 'DSC',
                    'paged' => $paged
                );
                // The Query
                $the_query = new WP_Query($testimonial_post);
                // The Loop
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $title = get_the_title();
                        $id = get_the_ID(); 
                        $con = get_the_content($id);
                        $tcontent = apply_filters('the_content', $con); 
                        $teimg = get_the_post_thumbnail_url($id);
                        if ($teimg == '') {
                            $teimg = NO_IMAGE;
                        }
                        $author = get_field('test_designation', $id); 
                ?>
                        <div class="col-md-6 wow zoomIn" data-wow-duration="2s">
                            <div class="tbox">
                                <div class="parascroll">
                                    <?php echo $tcontent; ?>
                                </div>
                                <div class="d-flex thead mt-4 align-items-center">
                                    <figure class="ticon">
                                        <img src="<?php echo $teimg; ?>" alt="">
                                    </figure>
                                    <h3>
                                        <?php echo $title;?>
                                        <?php 
                                            if ($author != '') {?> 
                                                <span><?php echo $author;?></span>
                                        <?php }?>
                                    </h3>
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
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>