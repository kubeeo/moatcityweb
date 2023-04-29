<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

$term_id = get_queried_object()->term_id;
$service_id = get_the_ID();
$term_description = get_queried_object()->description;;
//echo ($term_id);
$terms = get_term_by('ID', $term_id, 'menu_list');
get_header(); ?>

	<div class="innerBanner">
		<?php		
			$img = get_field('banner_image', $terms);
				if($img == '') {
				$img = DEFAULT_BANNER;
			}
		?>
		<figure class="innerBannerImg">
			<img class="baner_img_page" src="<?php echo $img;?>" alt="<?php single_term_title()?>" />
		</figure>
		<div class="innerBannerTxt">
			<div class="container">
				<div class="innerBannerWrap">
					<h1 class="page-title"><?php single_term_title()?></h1>	
					<div class="breadcrumb_bottom d-flex justify-content-center"><?php custom_breadcrumbs();?></div> 		
		        </div>
			</div>
		</div>
	</div>

	<section class="sec-space listing-wrap category-menu-list">
		<div class="container">

			<div class="prod-topbar d-flex flex-wrap align-items-center justify-content-between">
			    <div class="topbar-left">
			    	<div class="prod-search"><?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?></div>
			    </div>
			    <div class="topbar-right d-flex align-items-center justify-content-end">
			        
			        <div class="prod-filter">
			        	<div class="selectarea">
					        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					        <?php single_term_title( '<span>', '</span>' ); ?>
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

			<div class="pro_content inner_con text-center">
				
			</div>

			

			<div class="row gap-bottom justify-content-center">
				<?php
					$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$custom_post = array(
					'post_type'     => 'product',
					'posts_per_page'   => -1,
					'post_status'   => 'publish',
					'orderby' => 'date', 
					'order' => 'ASC',
					'paged' => $paged,
					'tax_query' => array(
					    array(
					    'taxonomy' => $taxonomy,
					    'field' => 'term_id',
					    'terms' => $term_id
					     )
					  )
					);
					// The Query
					$the_query = new WP_Query( $custom_post );
					// The Loop
					if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
					$the_query->the_post();
					$title = get_the_title();
					$id = get_the_ID();
					$link = get_the_permalink($id);
					$con = get_the_content($id);
	    			$content = apply_filters('the_content', $con);
	    			$trimmed_content = wp_trim_words($content,20);
	    			if($trimmed_content == '') {
					$trimmed_content = 'No Content';
					} 
					$image = get_the_post_thumbnail_url($id);
					if($image == '') {
					$image = NO_IMAGE;
					}
					?>

					<div class="col-md-4 col-sm-6">
						<a href="<?php echo $link?>" class="cate-box wow zoomIn" data-wow-duration="2s">
							<figure>
								<img src="<?php echo $image?>">
							</figure>
							<h3><?php echo $title?></h3>  
						</a>		
					</div>

					<?php
					}
					} else {
					?>
					<div class="col-lg-12"><div class="blank_found text-center">No Product Found!</div></div>
					<?php
					}
					// Restore original Post Data /w
					wp_reset_postdata();
					?>
			</div>

		</div>
	</section> 





	 

<?php
get_footer();
