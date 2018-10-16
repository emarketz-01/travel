<?php 
/*
* Template Name: Undiscovered Page
*/
get_header();
?>

<?php
// Query Arguments
$args = array(
	'post_type' => array('undiscovered'),
	'post_status' => array('publish'),
	'showposts'=>-1,
	'order' => 'DESC',
	'orderby' => 'date',
);
$feturedpackage = new WP_Query( $args );
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
<div class="col-md-10 col-md-offset-1">
<div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
<h2>“WHY DO THE DONE?  DO THE NEW!!!!”<br/>
DISCOVER THE DESTINATIONS BEFORE EVERYBODY ELSE DOES"</h2>
</div></div>
<div class="clearfix"></div>
<div class="col-md-9">

	<?php
		if ( $feturedpackage->have_posts() ) {
				while ( $feturedpackage->have_posts() ) {
					$feturedpackage->the_post();
						if ( has_post_thumbnail() ) {
							$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
						}
	?>
	<div class="untarks-page">
		<img src="<?=$large_image_url[0]?>" alt="event">
		<div class="bg-success-new">
			  <span class="pull-left"><h2><?=the_title()?></h2></span>
			  <span class="pull-right">
			  <button type="button" data-toggle="modal" data-target="#group-ex" class="btn btn-lg rnone btn-primary">Send Enquiry</button></span>
		</div>
		<div class="undis-pra">
			<?=the_content()?>
		</div>
	</div>	
	<?php			
			}
		} else {
			echo "No Package found";
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	 ?>
	</div>
<!---------secobnd-content---->

<div class="col-md-3 text-center colornot">
<?php echo dynamic_sidebar('undiscovered'); ?>
</div>

</div>
</div>
</section>
			
<!-------------pop Start-here----------->
<div id="group-ex" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enquiry Now</h4>
      </div>
	  <div class="modal-body">
      <div class="row">
			<div id="msgloader"></div>
			<form name="excursion_enquiry" id="excursion_enquiry" action="<?=get_template_directory_uri()?>/inc/mailphp/undiscover_mail_process.php" method="post">
			<input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />
			<input type="hidden" id="templatemailurl" value="undiscover_mail_process.php" />
			
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="First Name" id="First_name" name="First_name">
					<span id="First_nameErr" class="error"></span>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Last Name" id="Last_name" name="Last_name">
					<span id="Last_nameErr" class="error"></span>
                  </div>
                </div>
				    <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <input type="text" placeholder="Email" id="email" name="email" onkeypress="RemoveError(this.id)">
					<span id="emailErr" class="error"></span>
                  </div>
                </div>
                 <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-mobile" aria-hidden="true"></i>
                    <input type="text" placeholder="Phone" id="phone" name="phone" onkeypress="RemoveError(this.id)">
					<span id="phoneErr" class="error"></span>
				  </div>
                </div>
				  
				 <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-male" aria-hidden="true"></i>
                    <input type="text" placeholder="No of people" id="no_of_people" name="no_of_people">
					<span id="no_of_peopleErr" class="error"></span>
                  </div>
                </div>
				 <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" class="date-input-css form-control" name="tour_date" id="tour_date" placeholder="DD/MM/YY">
					<span id="tour_dateErr" class="error"></span>
                  </div>
                </div>
				 
                <div class="col-lg-12">
                  <div class="feild"> <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <textarea placeholder="Queries" name="message" id="message"></textarea>
                    <span id="messageErr" class="error"></span>
                  </div>
                </div>
				
				<div class="col-lg-12">
                  <div class="feild"> 
                  <i class="fa fa-refresh"></i>
                     <input type="text" style="width:100%;" id="captcha" name="captcha" class="form-control" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                <span id="txtCaptchaDiv" style="background-color: #4A6983;color:#FFF;padding: 16px;margin-top: -52px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                <input type="hidden" id="txtCaptcha" value="">
                    <span id="captchaErr" class="error"></span>
                  </div>
                </div>
				
                <div class="col-lg-12">
				<div id="loading" style="display:none;"><img src="<?php bloginfo('template_url'); ?>/images/loading_e.gif"></div>
                  <input type="submit" id="sbmtbtn" name="Submit" class="theme-btn color" onclick="return Validate_excurion_Form();" value="SEND NOW">
                </div>
			</form>
              </div>
     </div>
    </div>

  </div>
</div>
<?php get_footer(); ?>
<script>
var a= Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';
var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;
</script>
</div>