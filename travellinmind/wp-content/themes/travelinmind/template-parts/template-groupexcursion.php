<?php 
/*
* Template Name: Group Excursion
*/
get_header();
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
		  <div class="item active">
			<img src="<?php bloginfo('template_url'); ?>/images/7.jpg" alt="event" style="width:100%;">
		  </div>
		  <div class="item">
			<img src="<?php bloginfo('template_url'); ?>/images/5.jpg" alt="event" style="width:100%;">
		  </div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>
  </div>
  
  <div class="container">
  <div class="lower-breadcrum">
   <ul class="breadcrumbs">
        <li class="home"><a href="index.php">Home</a></li>
        <li class="current"> Group Excursion</li>
      </ul>
  </div>
  </div>

<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="inner-second">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
<h2>Group Excursion</h2>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>
</section>


<!--  -->
<section id="inner-third">

<div class="container">
<div class="row">
<div class="col-md-9">

	  <?php
	  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	  $i=1;
	  // Query Arguments
		$args = array(
			'post_type' => array('group-excursion'),
			'post_status' => array('publish'),
			'posts_per_page'=>3,
			'paged' => $paged,
			'order' => 'DESC',
			'orderby' => 'date',
		);

		// The Query
		$feturedpackage = new WP_Query( $args );

		// The Loop
		if ( $feturedpackage->have_posts() ) {
			while ( $feturedpackage->have_posts() ) {
				$feturedpackage->the_post();
		?>
   <div class="inner-package-details">
      <div class="camp-heading">
	      <span class="camp-date"><?=$i?></span>
		  <span class="capp-name"><?php the_title() ?></span>
	  </div>
	  <div class="camps-content">
	      <div class="coam-imges">
		  <ul id="flexiselgrpexcursion<?=$i?>">
		  
		<li><img src="<?php echo get_field('excursion_image_1'); ?>" alt="event"/></li>
		<li><img src="<?php echo get_field('excursion_image_2'); ?>" alt="event"/></li>
	  <?php if(get_field('excursion_image_3')){ ?>
       <li><img src="<?php echo get_field('excursion_image_3'); ?>" alt="event"/></li>
	  <?php } ?>
	 <?php if(get_field('excursion_image_4')){ ?>
       <li><img src="<?php echo get_field('excursion_image_4'); ?>" alt="event"/></li>
	  <?php } ?>
	  <?php if(get_field('excursion_image_5')){ ?>
	  <li><img src="<?php echo get_field('excursion_image_5'); ?>" alt="event"/></li>
	  <?php } ?>
			 
		   </ul>
		  </div>
          <div class="bg-success">
	      <span class="book"> Starts Now <i class="fa fa-rupee"></i><?php the_field('starting_price'); ?>(per person)</span>
          <span class="pull-right"><button type="button"  data-toggle="modal" data-target="#group-ex" class="btn btn-lg rnone btn-primary">Send Inquiry</button></span>
	  </div>
		  <div class="capm-content">
		  <?php the_content(); ?>
		  </div>
	  </div>
	</div>

	<?php			
		$i++;
		}
		} else {
			echo "No Group Excursion found";
		}
		/* Restore original Post Data */
		wp_reset_postdata();
	  ?>

<div class="clearfix"></div>
<div class="col-md-12 text-center">
<!--<ul class="pagination pagination-lg">
  <li><a href="#">1</a></li>
  <li class="active"><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
</ul>-->
<?php 
 wp_pagenavi(array( 'query' => $feturedpackage));
 ?>

</div>

</div> <!------- End Left Content---->

<!------- Right Sidebar ---->
<div class="col-md-3 text-center topspace2 colornot">
	<?php echo dynamic_sidebar('groupexcurion'); ?>
</div>


</div>

</div>

</section>
<!--  -->


<!----pop up------>
 <!-- Modal -->


<!----pop up end here---->
<!-------------pop Start-here----------->
<div id="group-ex" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inquiry Now</h4>
      </div>
	  <div class="modal-body">
      <div class="row">		<div id="msgloader"></div>
		<form name="excursion_enquiry" id="excursion_enquiry" action="<?=get_template_directory_uri()?>/inc/mailphp/excursion_mail_process.php" method="post">		<input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />						<input type="hidden" id="templatemailurl" value="excursion_mail_process.php" />			
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
for(var i=1;i<=50;i++){
    $("#flexiselgrpexcursion"+i).flexisel({
        visibleItems: 1,
        animationSpeed: 1000,
        autoPlay: true,
        autoPlaySpeed: 6000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,        responsiveBreakpoints: { 

            portrait: { 
                changePoint:480,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 1
            },
            tablet: { 
                changePoint:768,
                visibleItems: 1
            }
        }
    });
}
$('#carousel2').carousel({
      interval: 2000,
 });
</script>

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
  

