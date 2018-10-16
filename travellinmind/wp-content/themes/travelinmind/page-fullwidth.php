<?php
/**
 *Template Name:Full Width
 *
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
			<div class="col-md-12">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
					?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer(); ?>
</div>