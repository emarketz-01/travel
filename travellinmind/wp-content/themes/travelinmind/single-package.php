<?php
/**
 * The template for displaying all single Package Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travelinmind
 */
get_header();
?>
<?php
	while ( have_posts() ) :
		the_post();
	?>
<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="inner-other2-section">
<div class="container">
<div class="row">
<div class="col-md-12">

<div class="car-for-rent-book">
<div class="col-md-8 col-xs-12">
<h4><?php the_title() ?>
<small class="text-warning"> &nbsp; <?php echo get_post_meta(get_the_ID(),'days_24335',true); ?> Days & <?php echo get_post_meta(get_the_ID(),'nights_89476',true); ?> Nights </small></h4>

<hr>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php the_field('package_slider_image1'); ?>" alt="event" style="width:100%;">
      </div>
      <div class="item">
        <img src="<?php the_field('package_slider_image_2'); ?>" alt="event" style="width:100%;">
      </div>
	  <?php if(get_field('package_slider_image_3')){ ?>
      <div class="item">
        <img src="<?php echo get_field('package_slider_image_3'); ?>" alt="event" style="width:100%;">
      </div>
	  <?php } ?>
	 <?php if(get_field('package_slider_image_4')){ ?>
      <div class="item">
        <img src="<?php echo get_field('package_slider_image_4'); ?>" alt="event" style="width:100%;">
      </div>
	  <?php } ?>
	  <?php if(get_field('package_slider_image_5')){ ?>
      <div class="item">
        <img src="<?php echo get_field('package_slider_image_5'); ?>" alt="event" style="width:100%;">
      </div>
	  <?php } ?>
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
  
<?php the_content(); ?>
  
<div class="clearfix"></div>
<hr/>

<div class="clearfix"></div>
<div class="tab2 topspace25">
  <button class="tablinks active" onclick="openCity(event, 'inclusions')">Inclusions</button>
  <button class="tablinks" onclick="openCity(event, 'exclusions')">Exclusions</button>
</div>

<!-- Tab content -->
<div id="inclusions" class="tabcontent2" style="display:block;">
<?php echo get_post_meta(get_the_ID(),'packageincludes_56167',true); ?>
 <div class="clearfix"></div>
</div>
<div id="exclusions" class="tabcontent2">
<?php echo get_post_meta(get_the_ID(),'packageexcludes_33793',true); ?>
</div>

</div>   
   

<div class="col-md-4 col-xs-12"> 
 <h4>&nbsp;</h4>
 <hr/>
  
 <div class="pac-price topspace1">
	<p class="pac-price1">City</p>	<?php 	$arrcities = explode("||",get_post_meta(get_the_ID(),'city_29191',true));	?>		<?php 	foreach($arrcities as $rowcity)	{		?>			<span class="btn-small"><?php echo $rowcity; ?></span>		<?php	}	?>
	
   </div>                     
<div class="clearfix"></div>

<div class="booking-sections-box">
	<?php  $hotel_active = get_post_meta(get_the_ID(),'hotel_47518',true); 
			$flight_active = get_post_meta(get_the_ID(),'flight_37595',true);
			 $meals_active = get_post_meta(get_the_ID(),'meals_54177',true);
		 	$sightseeing_active = get_post_meta(get_the_ID(),'sightseeing_38273',true);
			$car_active = get_post_meta(get_the_ID(),'car_11313',true);
		?>
        
        <div class="tour-pk">
        <ul>
        <li>
        <div class="packfacilities <?php if($hotel_active=="Active"){ echo "active";}?>">
	   <span class="option-1">
	        <img src="<?php bloginfo('template_url');?>/images/option11.png">
	   </span>
	   <span class="option-nmae">
	        Hotel
	   </span>
	 </div>
        </li>
        <li>
        <div class="packfacilities <?php if($flight_active=="Active"){ echo "active";}?>">
	   <span class="option-1">
	        <img src="<?php bloginfo('template_url');?>/images/option15.png">
	   </span>
	   <span class="option-nmae">
	        Flight
	   </span>
	 </div>
        </li>
        <li>
        <div class="packfacilities <?php if($meals_active=="Active"){ echo "active";}?>">
	   <span class="option-1">
	        <img src="<?php bloginfo('template_url');?>/images/option12.png">
	   </span>
	   <span class="option-nmae">
	       Meals
	   </span>
	 </div>
        </li>
        <li>
        <div class="packfacilities <?php if($sightseeing_active=="Active"){ echo "active";}?>">
	   <span class="option-1">
	        <img src="<?php bloginfo('template_url');?>/images/option13.png">
	   </span>
	   <span class="option-nmae">
	        Sightseeing
	   </span>
	 </div>
        </li>
        <li>
        <div class="packfacilities <?php if($car_active=="Active"){ echo "active";}?>">
	   <span class="option-1">
	        <img src="<?php bloginfo('template_url');?>/images/option14.png">
	   </span>
	   <span class="option-nmae">
	       Car
	   </span>
	 </div>
        </li>
        </ul>
        
        
        </div> 
</div>

	<div class="car-price text-center" style="padding-top:20px;">
	     <h3>Starting from</h3>
		 <h2 class="topspace1">₹<?php echo get_post_meta(get_the_ID(),'offerprice_27518',true); ?> <small class="norate">₹<?php echo get_post_meta(get_the_ID(),'baseprice_89413',true); ?>/-</small></h2>
         <p>Per Person on dual sharing</p>
   </div>            
<div class="clearfix"></div>
<!------ Book Form  ------>
<div class="padd btn-block bg-primary topspace25">
<h3>Book Now</h3></div>
<div class="car-for-rent-book">
<div class="col-md-12">
 <div id="msgloader"></div>	
 <form name="book_package" id="book_package" action="<?=get_template_directory_uri()?>/inc/mailphp/book_package_mail_process.php" method="post">
 <input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />
<div class="inner-box-sec">
<div class="form-group">
<input type="hidden" name="package_name" value="<?=get_the_title();?>">
<label>Select Date</label>
	<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
		<input type="text" class="date-input-css form-control" name="tour_date" id="tour_date" placeholder="DD/MM/YY">
	</div>
    <span id="tour_dateErr" class="error"></span>
</div>
 
  <div class="form-group">
 <label>From</label>
 <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    <input type="text" class="form-control" id="from_destination" name="from_destination" placeholder="Type Destination">
	
  </div>
  <span id="from_destinationErr" class="error"></span>
  </div>
  
    <div class="form-group">
    <label>To</label>
<div class="input-group">
    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
    <input type="text" class="form-control" id="to_destination" name="to_destination" placeholder="Type Destination">
  </div>
  <span id="to_destinationErr" class="error"></span>
  </div>
  

   <div class="form-group">
 <label>Name</label>
 <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" placeholder="Name" class="form-control" id="name" name="name">
  </div>
  <span id="nameErr" class="error"></span>
  </div>
  
  <div class="form-group">
 <label>Email Id</label>
 <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
  </div>
  <span id="emailErr" class="error"></span>
  </div>
  
  <div class="form-group">
 <label>Mobile</label>
 <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
    <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile">
  </div>
  <span id="phoneErr" class="error"></span>
  </div>
  
  
  <div class="form-group">
 <label>Captcha</label>
 <div class="">
<input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
		<span id="txtCaptchaDiv" style="background-color: #4A6983;color:#FFF;padding: 7px; margin-top: -34px; float: right; right: 15px;border-radius: 0px 5px 5px 0px;"></span>
		<input type="hidden" id="txtCaptcha" value="">
			<span id="captchaErr" class="error"></span>
					
  </div></div>
  
  
  <div class="checkbox">
    <label><input type="checkbox" name="termscondition" id="termscondition"> <a href="<?=site_url()?>/term-condition">Terms & Conditions</a></label>
	<span id="termsconditionErr" class="error"></span>
  </div>
  <input type="submit" id="sbmtbtn" class="btn btn-default pull-right" onclick="return Validate_book_package_Form();" value="Submit" />
</div>
</form>

</div>
</div>
<!------ End Form ------>
<div class="clearfix"></div>
<!------ Hotel ------>
<div class="car-for-rent-book">
<div class="col-md-12 text-center">
<h4>Hotel</h4>
<small><?php echo get_post_meta(get_the_ID(),'hotelshortdescr_36979',true); ?></small></div>
<div class="clearfix"></div>
<hr/>
<div class="col-md-12">
   <div class="car-for-rent">
       <div class="car-img">
	      <img src="<?php echo get_post_meta(get_the_ID(),'hotelimage_93186',true); ?>" class="img-responsive">
	   </div>
	   <h3 class="topspace2"><?php echo get_post_meta(get_the_ID(),'hotelname_73146',true); ?></h3>
	   <p><?php echo substr(get_post_meta(get_the_ID(),'hotelcontent_16111',true),0, 100); ?></p>
       <div class="pull-right">
       <a href="#" data-toggle="modal" data-target="#bookcar">Read More</a>
       </div>
   </div>
   </div>
</div>
<!------ End Hotel ------>
      
</div> <!--- End 4 Col ---->


</div>

</div>
<!---------secobnd-content---->

<div class="clearfix"></div>
</div>
</div>

</section>
<!------model-box--->
<div class="container">

  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="bookcar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?php echo get_post_meta(get_the_ID(),'hotelname_73146',true); ?></h4>
        </div>
        <div class="modal-body">
		<?php echo get_post_meta(get_the_ID(),'hotelcontent_16111',true); ?>

        </div>
        
      </div>
      
    </div>
  </div>
  
</div>


<!--  -->
</div>

<?php
endwhile; // End of the loop.
get_footer(); ?>
<script>
//the $(document).ready() function is down at the bottom

(function ( $ ) {
 
    $.fn.rating = function( method, options ) {
		method = method || 'create';
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
			limit: 5,
			value: 0,
			glyph: "glyphicon-star",
            coloroff: "gray",
			coloron: "gold",
			size: "2.0em",
			cursor: "default",
			onClick: function () {},
            endofarray: "idontmatter"
        }, options );
		var style = "";
		style = style + "font-size:" + settings.size + "; ";
		style = style + "color:" + settings.coloroff + "; ";
		style = style + "cursor:" + settings.cursor + "; ";
	

		
		if (method == 'create')
		{
			//this.html('');	//junk whatever was there
			
			//initialize the data-rating property
			this.each(function(){
				attr = $(this).attr('data-rating');
				if (attr === undefined || attr === false) { $(this).attr('data-rating',settings.value); }
			})
			
			//bolt in the glyphs
			for (var i = 0; i < settings.limit; i++)
			{
				this.append('<span data-value="' + (i+1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
			}
			
			//paint
			this.each(function() { paint($(this)); });

		}
		if (method == 'set')
		{
			this.attr('data-rating',options);
			this.each(function() { paint($(this)); });
		}
		if (method == 'get')
		{
			return this.attr('data-rating');
		}
		//register the click events
		this.find("span.ratingicon").click(function() {
			rating = $(this).attr('data-value')
			$(this).parent().attr('data-rating',rating);
			paint($(this).parent());
			settings.onClick.call( $(this).parent() );
		})
		function paint(div)
		{
			rating = parseInt(div.attr('data-rating'));
			div.find("input").val(rating);	//if there is an input in the div lets set it's value
			div.find("span.ratingicon").each(function(){	//now paint the stars
				
				var rating = parseInt($(this).parent().attr('data-rating'));
				var value = parseInt($(this).attr('data-value'));
				if (value > rating) { $(this).css('color',settings.coloroff); }
				else { $(this).css('color',settings.coloron); }
			})
		}

    };
 
}( jQuery ));

$(document).ready(function(){
$("#stars-default").rating();

var a= Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';
var code = a + b + c + d + e;
 
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;

	
});

</script>
 
<!--
<div class="modal fade" id="bookcar" role="dialog">
      <div class="modal-dialog"> 
        
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cab Booking</h4>
          </div>
          <div class="modal-body">
            <form id="support-form" name="submitform" method="post" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Name" id="name" name="name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Last Name" id="lasename" name="name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <input type="text" placeholder="Email" id="email" name="email" onkeypress="RemoveError(this.id)">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-phone" aria-hidden="true"></i>
                    <input type="text" placeholder="Phone" id="Phonr" name="phone" onkeypress="RemoveError(this.id)">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="feild"> <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <textarea placeholder="Message" name="message" id="message" onkeypress="RemoveError(this.id)"></textarea>
                    <div id="messageErr" class="error"></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <input type="submit" class="theme-btn color" name="SubmitBtn" onclick="return ValidateForm();" value="SEND NOW">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
-->