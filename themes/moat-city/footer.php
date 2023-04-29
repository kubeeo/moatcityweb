<?php



/**

 * The template for displaying the footer

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package WordPress

 * @subpackage Twenty_Twenty_One

 * @since Twenty Twenty-One 1.0

 */



?>

<?php

$copyRight = get_option('copyright');

$tell = get_option('mobile_no'); 

$facebook = get_option('facebook_link'); 

$linkedin = get_option('linkedin_link'); 

$twitter = get_option('twitter_link'); 

?>



<!--  -->

<!-- NEWSLETTER SECTION -->

<div class="container">

    <section class="subscription"> 

        <div class="row">

            <div class="col-md-6 d-flex">

                <div class="sec-head wow fadeInDown" data-wow-duration="2s">

                    <h2>Subscribe to our newsletter for financial updates</h2>

                    <?php echo do_shortcode('[email-subscribers-form id="1"]'); ?>

                </div> 

            </div>

            <div class="col-md-6 pl-lg-5">

                <img src="<?php echo BASEURL; ?>/images/newsletter-img.jpg" alt="" class="newsletter-img w-100">

            </div>

        </div>

    </section>

</div>

<footer class="mainFooter">

    <div class="container">

        <div class="fmiddle">

            <div class="row align-items-center">

                <div class="col-md-3 fcol">

                    <div class="fbox">

                        <a href="<?php echo get_home_url(); ?>" class="flogo">

                            <img src="<?php echo BASEURL; ?>/images/flogo.png" alt="Footer Logo">

                        </a>

                    </div>

                </div>

                <div class="col-md-6 fcol">

                    <div class="fbox"> 

                        <nav class="fnav">

                            <?php

                            wp_nav_menu(array(

                                'menu'              => 'Footer Menu',

                                'container'         => true,

                                'menu_class' => 'd-flex flex-wrap justify-content-center',

                            ));

                            ?>

                        </nav>

                    </div>

                </div> 

                <div class="col-md-3 ">

                    <div class="social text-right">

                        <a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>

                        <a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a>

                        <a href="<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="copyright">

        <div class="container">

            <div class="d-flex justify-content-center text-center">

                <p><?php echo $copyRight; ?> </p>

            </div>

        </div>

    </div>

</footer>



<?php wp_footer(); ?>

</body>



</html>