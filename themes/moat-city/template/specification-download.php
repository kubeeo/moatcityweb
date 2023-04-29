<?php
/*
Template Name: Specification Download
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
                        <li class="item-current item-1349"><strong class="bread-current bread-1349" title="Specification Download">Specification Download</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="innerPage listing-wrap sec-space gray-bg">
    <div class="container">
        <div class="row gap-bottom justify-content-center">
            <?php
            while (have_posts()) : the_post(); ?>
                <div class="col-md-12">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        </header>

                        <div class="entry-content">
                            <?php
                            the_content();

                            // Get the specification files from ACF
                            $specification_files = get_field('specification_files');

                            if ($specification_files) {
                                echo '<h2>Specification Files</h2>';
                                echo '<ul class="specification-files">';
                                foreach ($specification_files as $file) {
                                    echo '<li><a href="' . esc_url($file['url']) . '">' . esc_html($file['title']) . '</a></li>';
                                }
                                echo '</ul>';
                            }
                            ?>
                        </div>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
