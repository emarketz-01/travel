<?php 
/*
* Template Name: Home Page
*/
get_header();

?>

<!-- Featured Package  -->

<section id="light-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
          <h2>Featured Packages</h2>
          <p>View All Our Thematic Packages</p>
        </div>
      </div>
      <div class="clearfix"></div>
      <?php
	  // Query Arguments
		$args = array(
			'post_type' => array('package'),
			'post_status' => array('publish'),
			'showposts'=>3,
			'order' => 'DESC',
			'orderby' => 'date',
			'meta_key' => 'featuredpackage_91178',
			'meta_value' => '1',
		);

		// The Query
		$feturedpackage = new WP_Query( $args );

		// The Loop		$featurepac = 1;
		if ( $feturedpackage->have_posts() ) {
			while ( $feturedpackage->have_posts() ) {
				$feturedpackage->the_post();
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					}
		?>
      <div class="col-md-4">
        <div class="package-box<?=$featurepac?> wow fadeInDown" data-wow-delay="0.5s">
          <div class="package-img"> <img src="<?php echo $large_image_url[0]; ?>" class="image" alt="packages"/>
            <div class="middle"> <a href="<?php the_permalink(); ?>" class="btn-w">View More</a> </div>
          </div>
          <div class="package-conent">
            <h4>
              <?=get_the_title(get_the_ID())?>
            </h4>
            <h3><?php echo get_post_meta(get_the_ID(),'city_29191',true); ?></h3>
            <?php echo get_post_meta(get_the_ID(),'packageshortdes_45445',true);  ?>
            <div class="clearfix"></div>
            <a  href="<?php the_permalink(); ?>" class="btn-w">Inquire Now</a> </div>
        </div>
      </div>
      <?php			$featurepac++;
			}
		} else {
			echo "No Package found";
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	  ?>
    </div>
  </div>
</section>

<!--  Packages -->
<section id="second-paralax">
  <div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade"> 
      
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox"> 
        <!-- Item 1 -->
        <div class="item active slide1" style="background-image: url(<?php the_field('home_scrolling_images_first'); ?>);">
          <div class="col-md-3 text-left">
            <h3 data-animation="animated bounceInDown">
              <?php the_field('home_scrolling_images__title'); ?>
            </h3>
            <p data-animation="animated bounceInUp">
              <?php the_field('home_scrolling_images_description'); ?>
            </p>
          </div>
        </div>
        <!-- Item 2 -->
        <div class="item slide2" style="background-image: url(<?php the_field('home_scrolling_images_second'); ?>);">
          <div class="col-md-3 text-left">
            <h3 data-animation="animated bounceInDown">
              <?php the_field('home_scrolling_images__title_2'); ?>
            </h3>
            <p data-animation="animated bounceInUp">
              <?php the_field('home_scrolling_images_description_2'); ?>
            </p>
          </div>
        </div>
      </div>
      <!-- End Wrapper for slides--> 
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right"></i><span class="sr-only">Next</span> </a> </div>
  </div>
  <div class="container" style="margin-top:-881px;">
    <div class="row">
      <div class="col-md-3"> 
        <!--<div class="package-details">
   <h3>Honeymoon</h3>
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
</div>--> 
      </div>
      <div class="col-md-9 pull-right mrt wow fadeInDown content" data-wow-delay="0.5s">
        <?php
	  // Query Arguments
		/*$argspackage2 = array(
			'post_type' => array('package'),
			'post_status' => array('publish'),
			'showposts'=>3,
			'order' => 'DESC',
			'orderby' => 'date',
		);
		// The Query
		$package = new WP_Query( $argspackage2 );
		// The Loop		$packcount=1;
		if ( $package->have_posts() ) {
			while ( $package->have_posts() ) {
				$package->the_post();
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					}
		?>
        <div class="package-details-content<?php echo $packcount;?>">
          <div class="col-md-4">
            <div class="pac-img"> <img src="<?php echo $large_image_url[0]; ?>" alt="packages"/> </div>
          </div>
          <div class="col-md-8">
            <div class="pac-decs">
              <h3><?=get_the_title(get_the_ID())?></h3>
            </div>
            <div class="package-tag"> Starts From <i class="fa fa-tags" aria-hidden="true"></i> <?php echo get_post_meta(get_the_ID(),'offerprice_27518',true);  ?>/- </div>
            <div class="clearfix"></div>
            <div class="pac-per">
            <p><?php echo strip_tags(get_post_meta(get_the_ID(),'packageshortdes_45445',true));  ?></p>
            </div>
            <div class="clearfix"></div>
            <div class="pac-but text-center"> <a href="<?php the_permalink() ?>">View this tour</a> </div>
          </div>
        </div>
		<?php						$packcount++;
			}
		} else {
			echo "No Package found";
		}
		wp_reset_postdata();*/
	  ?>
        <?php 	  $terms = get_terms('package-category');	  $a=0;	  foreach($terms as $term)	  {	  $a++;	  		$argspackage2 = array(			'post_type' => array('package'),			'post_status' => array('publish'),			'showposts'=>3,			'order' => 'DESC',			'orderby' => 'date',		);		$package = new WP_Query( $argspackage2 );		$b=0;		if ( $package->have_posts() ) {			while ( $package->have_posts() ) {				$b++;								$package->the_post();					if ( has_post_thumbnail() && $b==$a) {						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );					}			}		}	  ?>
        <div class="package-details-content<?php echo $packcount;?>">
          <div class="col-md-4">
            <div class="pac-img pac1"> <img src="<?php echo $large_image_url[0]; ?>" alt="packages"/> </div>
          </div>
          <div class="col-md-8">
            <div class="pac-decs">
              <h3>
                <?=$term->name?>
              </h3>
              <div class="package-tag text-center"> <a href="<?=site_url()?>/package-category/<?=$term->slug?>/">View Packages</a> </div>
            </div>
            <div class="clearfix"></div>
            <div class="pac-per">
              <p><?php echo str_replace("||","<br><br>",$term->description); // textarea_escaped ?></p>
            </div>
            <div class="clearfix"></div>
            <div class="pac-but text-center"> </div>
          </div>
        </div>
        <?php 			if($a ==3)			{				break;			}	  }	  ?>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- Testimonial -->
<section id="third-paralax">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2> Testimonial</h2>
      </div>
      <div class="col-md-12">
        <div id="testimonial-slider" class="owl-carousel">
          <?php
	  // Query Arguments
		$argstestnml = array(
			'post_type' => array('testimonial'),
			'post_status' => array('publish'),
			'showposts'=>-1,
			'order' => 'DESC',
			'orderby' => 'date',
		);
		// The Query
		$testimnlloop = new WP_Query( $argstestnml );
		// The Loop
		if ( $testimnlloop->have_posts() ) {
			while ( $testimnlloop->have_posts() ) {
				$testimnlloop->the_post();
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
					}
					
					
		$content=strip_tags(get_the_content(get_the_ID()));
		?>
          <div class="testimonial">
            <div class="pic"> <img src="<?php echo $large_image_url[0]; ?>" alt=""> </div>
            <p class="description"> <?php echo substr($content,0,200); ?> 
			
			<?php
if(strlen($content) > 200)
{
	echo '...  <a href="'.site_url().'/testimonials">Read more</a>';
}
?>
			</p> 
		 
            <h3 class="title">
              <?php the_title(); ?>
              <span class="post"> -
              <?php travelinmind_posted_on(); ?>
              </span> </h3>
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
      <div class="col-md-12 text-center">
        <div class="tes-btn"> <a href="<?=site_url()?>/testimonials" class="btn btn-default">View All</a> <a class="btn btn-primary" data-toggle="modal" data-target="#bookcar">Add Testimonial</a> </div>
      </div>
    </div>
  </div>
</section>
<!-- End Testimonial -->
<?php
$show_popup = get_field('homeshow_popup');
?>
<div id="popupModal_<?if($show_popup[0]=="Yes"){ echo "showmodal"; }?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="modal-body text-center">
          <?php $upload_popup_image =  get_field('upload_popup_image');
					$popup_content =  get_field('popup_content');
				 ?>
          <div class="homemodal_content" style="background:url(<?=($upload_popup_image)?$upload_popup_image:""?>);">
            <p>
              <?=$popup_content?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/banner.css">
<script src='<?php bloginfo( 'template_url' ); ?>/js/banner.js'></script>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/owl.theme.min.css">
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/owl.carousel.min.js"></script> 
<script>
$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});
</script>
<div class="modal fade" id="bookcar" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Testimonial</h4>
      </div>
      <div class="modal-body">
        <form id="submitform" name="submitform" method="post" action="<?=get_template_directory_uri()?>/inc/mailphp/testimonial_process.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="First Name" id="first_name" name="first_name">
                <div id="first_nameErr" class="error"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Last Name" id="last_name" name="last_name">
                <div id="last_nameErr" class="error"></div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <input type="text" placeholder="Email" id="email1" name="email1" onkeypress="RemoveError(this.id)">
                <div id="email1Err" class="error"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-phone" aria-hidden="true"></i>
                <input type="text" placeholder="Phone" id="phone" name="phone" onkeypress="RemoveError(this.id)">
                <div id="phoneErr" class="error"></div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                <input type="text" placeholder="Visited place" id="visited_place" name="visited_place" onkeypress="RemoveError(this.id)">
                <div id="visited_placeErr" class="error"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="feild"> <i class="fa fa-calendar" aria-hidden="true"></i>
                <input type="text" name="month_year_visits" id="month_year_visits" class="date-input-css form-control" placeholder="Month Year of visit">
                <div id="month_year_visitsErr" class="error"></div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-6">
              <div class="feild profiel">
                <label >Profile Pic</label>
                <input type="file" name="ProfilePic" id="ProfilePic" placeholder="Profile Pic ">
                <div id="ProfilePicErr" class="error"></div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="feild profiel">
                <label >Visited place images </label>
                <input type="file" name="VisitedPlaceImages" id="VisitedPlaceImages" placeholder="Visited place images ">
                <div id="VisitedPlaceImagesErr" class="error"></div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
              <div class="feild"> <i class="fa fa-comments-o" aria-hidden="true"></i>
                <textarea placeholder="Message" name="message" id="message" onkeypress="RemoveError(this.id)"></textarea>
                <div id="messageErr" class="error"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="feild"> <i class="fa fa-paper-plane" aria-hidden="true"></i>
                <textarea placeholder="Write your Blog" name="writeblog" id="writeblog" onkeypress="RemoveError(this.id)"></textarea>
                <div id="writeblogErr" class="error"></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="feild"> <i class="fa fa-refresh"></i>
                <input type="text" style="width:100%;" id="captcha" name="captcha" class="form-control" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                <span id="txtCaptchaDiv" style="background-color:#4A6983;color:#FFF;padding: 16px;margin-top: -52px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                <input type="hidden" id="txtCaptcha" value="">
                <small id="captchaErr" class="error"></small></div>
            </div>
            <div class="col-lg-6">
              <div class="checkbox pul-left">
                <label>
                  <input type="checkbox" name="termscondition" id="termscondition">
                  I accept T & C and Privacy policy </label>
                <span id="termsconditionErr" class="error"></span> </div>
            </div>
            <div class="col-lg-6">
              <input type="submit" class="theme-btn color" name="SubmitBtn" onclick="return ValidateForm();" value="SEND NOW">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';
var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;
</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#popupModal_showmodal").modal('show');
	});
</script>
<style>
.pac1 img{ width:100%;}
</style>