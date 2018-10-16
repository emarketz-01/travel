<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelinmind
 */

get_header();
?>

<div id="inner-banner-section">
    <div class="container">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="inner-box-sec">
          <h2>Choose your Destination</h2>
         <form method="post" action="<?=site_url()?>/search-results" name="search_form" id="search_form">
            <ul class="row topspace25">
              <!--======= INPUT NAME =========-->
              <li class="col-sm-4 col-xs-12">
                <div class="form-group">
					<input type="text" class="form-control countries" name="destination_name" placeholder="Type Destination">
                  <span class="fa fa-map-marker" style="font-size:22px; margin-left: 10px; margin-top: -2px;"></span> </div>
              </li>
              <li class="col-sm-4 col-xs-12">
                <div class="form-group">
                  <select class="form-control" name="duration_days">
					    <option value="">Select Duration</option>
						<?php 
						global $wpdb; 
						$durations = $wpdb->get_results( 
						   "SELECT DISTINCT(meta_value) 
							FROM $wpdb->postmeta
							WHERE meta_key = 'days_24335'
							ORDER BY abs(meta_value)"
						);
						if($durations){ 
							foreach ( $durations as $duration ) {
							echo '<option value="' .$duration->meta_value .'">';
								echo $duration->meta_value.' Days';
								echo '</option>';
							}

						} 
						?>
                        <option value="ND">Not decided</option>
                      </select>
                  <span class="fa fa-calendar"></span> </div>
              </li>
              <!-- <li class="col-sm-3 col-xs-12">
                <div class="form-group">
                  <select class="form-control" name="duration_night">
					    <option value="">Select Nights</option>
						<?php 
						global $wpdb; 
						$durations = $wpdb->get_results( 
						   "SELECT DISTINCT(meta_value) 
							FROM $wpdb->postmeta
							WHERE meta_key = 'nights_89476'
							ORDER BY abs(meta_value)"
						);
						if($durations){ 
							foreach ( $durations as $duration ) {
							echo '<option value="' .$duration->meta_value .'">';
								echo $duration->meta_value.' Nights';
								echo '</option>';
							}

						} 
						?>
                        <option value="">Not decided</option>
                      </select>
                  <span class="fa fa-calendar"></span> </div>
              </li>-->
              <!--======= INPUT SELECT =========-->
              <li class="col-md-2 col-xs-12">
                <button type="submit" class="banner-btn"  onclick="return ValidateSearchForm()">Explore</button>
              </li>
            </ul>
            
            <!--======= BUTTON =========-->
            
          </form>
        </div>
      </div>
    </div>
  </div>
<!----inner-sectuion-star here---->
<div class="container">
  <div class="lower-breadcrum">
   <ul class="breadcrumbs">
        <li class="home"><a href="<?=site_url()?>">Home</a></li>
		<li class="current"><?php single_cat_title(); ?> </li>
      </ul>
  </div>
</div>
  
 <div class="inner-wrapper">
<section id="inner-other-section">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
<h2><?php single_cat_title(); ?> </h2> 
</div>
<div class="packages-sec">

<!----- Filter Package------->
<div class="col-md-3">
<?php echo do_shortcode('[ULWPQSF id=133]');
?>
</div>
<!---------End Filter --->
<!---------secobnd-content---->

<div class="col-md-9">
	<div id="content">
	<?php
	if ( have_posts() ) :
	  while ( have_posts() ) :
				the_post();
				if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					}
		?>
		<div class="pack-container">
			  <div class="col-md-5">
				  <img src="<?php echo $large_image_url[0]; ?>" alt="packages" style="width: 100%; height: 277px;"/>
			  </div>
			  <div class="col-md-7">
				  <div class="pac-box-sec">
						<h2><?=get_the_title(get_the_ID())?></h2>
						<h3>&nbsp; <?php echo get_post_meta(get_the_ID(),'days_24335',true); ?> Days & <?php echo get_post_meta(get_the_ID(),'nights_89476',true); ?> Nights </h3>
						<div class="pac-other">
						<?php 
							$activities = get_the_terms( $post->ID, 'tags' );
							foreach( $activities as $activity ) {
								echo '<span class="btn-small">' .$activity->name . '</span>';
							} 
						?>
						<!--<span class="btn-small">Ideal for couples</span>
						<span class="btn-small">Beaches</span>
						<span class="btn-small">Island Tours</span>
						<span class="btn-small">Water Activities</span>-->
						</div>
						<div class="clearfix"></div>
						<div class="pac-price topspace1">
							  <span class="pac-price1"> Best Price </span>
							  <span class="btn btn-success round-btn">
							  <?php echo get_post_meta(get_the_ID(),'offerpercentage_12345',true);  ?>%off</span> 
							  <span><a href="#" data-toggle="tooltip" title="Exact prices may vary based on availability."><i class="fa fa-info-circle"></i></a></span>
							  <br>
						<span class="pac-price2">₹<?php echo get_post_meta(get_the_ID(),'offerprice_27518',true); ?>/- </span> <span class="norate">₹<?php echo get_post_meta(get_the_ID(),'baseprice_89413',true); ?>/-</span>
						</div>
						
						<div class="clearfix"></div>
						<div class="pac-price topspace1">
							<p class="pac-price1">Cites</p>
							<?php 							$arrcities = explode("||",get_post_meta(get_the_ID(),'city_29191',true));							?>														<?php 							foreach($arrcities as $rowcity)							{								?>									<span class="btn-small"><?php echo $rowcity; ?></span>								<?php							}							?>
						</div>
						
				  </div>
			  </div>
			  <div class="clearfix"></div>
			  <hr/>
				<?php   
				    $hotel_active = get_post_meta(get_the_ID(),'hotel_47518',true); 
					$flight_active = get_post_meta(get_the_ID(),'flight_37595',true);
					$meals_active = get_post_meta(get_the_ID(),'meals_54177',true);
					$sightseeing_active = get_post_meta(get_the_ID(),'sightseeing_38273',true);
					$car_active = get_post_meta(get_the_ID(),'car_11313',true);
				  ?>
			 <div class="col-md-12">
				<div class="col-md-6">
			  <div class="row">
			<div class="col-md-2 packfacilities <?php if($hotel_active=="Active"){ echo "active";}?>">
		   <span class="option-1">
				<img src="<?php bloginfo('template_url'); ?>/images/option11.png">
		   </span>
		   <span class="option-nmae">
				Hotel
		   </span>
		 </div>
				   <div class="col-md-2 packfacilities <?php if($flight_active=="Active"){ echo "active";}?>">
		   <span class="option-1">
				<img src="<?php bloginfo('template_url'); ?>/images/option15.png">
		   </span>
		   <span class="option-nmae">
				Flight
		   </span>
		 </div>
				 <div class="col-md-2 packfacilities <?php if($meals_active=="Active"){ echo "active";}?>">
		   <span class="option-1">
				<img src="<?php bloginfo('template_url'); ?>/images/option12.png">
		   </span>
		   <span class="option-nmae">
			   Meals
		   </span>
		 </div>
				 <div class="col-md-3 packfacilities <?php if($sightseeing_active=="Active"){ echo "active";}?>">
		   <span class="option-1">
				<img src="<?php bloginfo('template_url'); ?>/images/option13.png">
		   </span>
		   <span class="option-nmae">
				Sightseeing
		   </span>
		 </div>
			 <div class="col-md-3 packfacilities <?php if($car_active=="Active"){ echo "active";}?>">
		   <span class="option-1">
				<img src="<?php bloginfo('template_url'); ?>/images/option14.png">
		   </span>
		   <span class="option-nmae">
			   Car
		   </span>
		 </div>
			  </div></div>
			  
				<a href="<?php the_permalink(); ?>" class="btn btn-primary topspace1 pull-right">View details</a>
			 </div> 
		</div>

		<?php			
			endwhile;
			the_posts_navigation();
		else :
			echo "No Package found in this Category";
		endif;
		/* Restore original Post Data */
	  ?>
		
		
	</div>
</div>

<!---------End secobnd-content---->


</div>
</div>

<div class="clearfix"></div>

</div>
</div>

</section>


<!--  -->
</div> 



<?php
get_footer(); ?>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
