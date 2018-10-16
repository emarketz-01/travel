<?php 
/*
* Template Name: FAQ
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
		<h2>FREQUENTLY ASKED QUESTIONS</h2>
	</div>
</div>

<!---------secobnd-content---->
<div class="terms-section">
       <div class="terms-container faq-asection">
	        <div class="container demo">

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php
			  // Query Arguments
				$args = array(
					'post_type' => array('faq'),
					'post_status' => array('publish'),
					'showposts'=>-1,
					'order' => 'DESC',
					'orderby' => 'date',
				);
			$i=1;
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
	
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne<?=get_the_ID()?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=get_the_ID()?>" aria-expanded="true" aria-controls="collapseOne<?=get_the_ID()?>">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                       <?php the_title(); ?>? #<?=$i?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne<?=get_the_ID()?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?=get_the_ID()?>">
                <div class="panel-body">
					<?=the_content();?>
                </div>
            </div>
        </div>
		<?php			$i++;
						}
					} else {
						echo "No Package found";
					}
					/* Restore original Post Data */
					wp_reset_postdata();
				  ?>

    </div><!-- panel-group -->
    
    
</div><!-- container -->
	 
	   </div>
</div>

<div class="clearfix"></div>


</div>
</div>
</section>

<!--  -->
</div>
<!-----pop uop------>
</div>
<?php get_footer();