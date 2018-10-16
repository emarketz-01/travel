<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelinmind
 */

get_header();
?>
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php bloginfo('template_url') ?>/images/undis.jpg" alt="event" style="width:100%;">
      </div>
	</div>
  </div>
<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="inner-other-section">
	<div class="container">
		<div class="row">
			<div class="col-md-9">

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
					?>
			</div>
			<div class="col-md-3 text-center colornot">
				<?php echo dynamic_sidebar('groupexcurion'); ?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer(); ?>
</div>
