<?php



/**

 Template name: Contact Template

 */ 

$email = get_option('store_email_id');  

$tell = get_option('mobile_no');

$email = get_option('store_email_id'); 

$address = get_option('store_address');

get_header(); ?>





<?php get_template_part('./template-parts/inner-banner', 'page'); ?>

<section class="innerPage sec-space pt-0 contact-page">

    <div class="innerCont">

        <div class="container">

            <div class="row align-items-center justify-content-center">

                <div class="col-lg-4 wow fadeInLeft" data-wow-duration="2s">

                    <div class="row contact-info"> 

                        <div class="col-lg-12 col-md-4">

                            <div class="contact-box">

                                <span><i class="fa fa-location-arrow" aria-hidden="true"></i></span> 

                                <?php echo $address; ?>

                            </div>

                        </div>

                        <div class="col-lg-12 col-md-4">

                            <div class="contact-box">

                                <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                                <a href="mailto:<?php echo $email; ?>"> <?php echo $email; ?></a>

                            </div>

                        </div> 

                        <div class="col-lg-12 col-md-4">

                            <div class="contact-box">

                                <span><i class="fa fa-phone" aria-hidden="true"></i></span>

                                <a href="tel:<?php echo $tell; ?>"> <?php echo $tell; ?></a>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-6 wow fadeInRight" data-wow-duration="2s">

                    <div class="contact-form">

                        <h2 class="text-center mb-4">Send a Message</h2>

                        <?php echo do_shortcode('[contact-form-7 id="33" title="Contact form 1"]'); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<?php get_footer(); ?>