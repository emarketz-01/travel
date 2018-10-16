<?php 

/*

* Template Name: All Testimonials

*/

get_header();

?>

<!----inner-sectuion-star here---->

<div class="inner-wrapper">

<section id="inner-other2-section">

<div class="container">

<div class="row">

<div class="col-md-12">

	<div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">

		<h2>Testimonials</h2>

	</div>

</div>



<!---------secobnd-content---->

<div class="inner-wrapper">

<section id="event-section">

	<div class="event-box">

		<div class="container">

		<div class="tab-content">

			<div class="tab-pane fade in active ">

			  <?php

			  // Query Arguments

				$args = array(

					'post_type' => array('testimonial'),

					'post_status' => array('publish'),

					'showposts'=>-1,

					'order' => 'DESC',

					'orderby' => 'date',

				);



				// The Query

				$feturedpackage = new WP_Query( $args );



				// The Loop

				if ( $feturedpackage->have_posts() ) {

					while ( $feturedpackage->have_posts() ) {

						$feturedpackage->the_post();

							if ( has_post_thumbnail() ) {

								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

							}

				?>

				<div class="col-md-8 col-md-offset-2">
				<div class="testimonial">
            <div class="pic"> <img src="<?=$large_image_url[0]?>" alt="" class="img-responsive"> </div>
            <p class="description">
				<?php echo strip_tags(get_the_content(get_the_ID())); ?>
			</p>
            <h3 class="title"><?php the_title(); ?><span class="post"> - <?php travelinmind_posted_on(); ?></span> </h3>
          </div>




					<!--<div class="package-box testimonialbox wow fadeInDown" data-wow-delay="0.5s">

						<div class="package-img">

							<img src="<?=$large_image_url[0]?>" alt="packages" class="img-responsive">

						</div>

						<div class="package-conent">

							<h4> <?php the_title();?></h4>

						</div>

						<div class="package-offer-price">

						<?php the_content(); ?>

						</div>

					</div>-->

				</div>

				<?php			

						}

					} else {

						echo "No Testimonial found";

					}

					/* Restore original Post Data */

					wp_reset_postdata();

				  ?>

				

			</div>

		</div>

		</div>

	</div>

<div class="clearfix"></div>

</section>

</div>



<div class="clearfix"></div>





</div>

</div>

</section>



<!--  -->

</div>

<?php get_footer();