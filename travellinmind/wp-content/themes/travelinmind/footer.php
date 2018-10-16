<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelinmind
 */

?>
<!--  -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 wow fadeInDown" data-wow-delay="0.5s" >
		<?php the_custom_logo(); ?>
        <div class="footer-section1">
          <div class="socialwidget"> 
		  <a href="https://www.facebook.com/" title="facebook" class=""><i class="fa fa-facebook-f"> </i></a>
		  <a href="https://www.youtube.com/" title="Youtube" class=""><i class="fa fa-youtube"> </i> </a> 
	      <a href="https://www.instagram.com/" title="Instagram" class=""><i class="fa fa-instagram"> </i></a>
		  </div>
          <div class="clearfix"></div>
<?php echo dynamic_sidebar('footer'); ?></span>
        </div>
      </div>
	       <div class="col-md-3 wow fadeInDown" data-wow-delay="0.5s">
        <div id="recent-event">
          <h3 class="widget-title">Travel Guide</h3>
          <ul>
            <li> <a href="<?=site_url()?>/package-category/honeymoon-romantic/">Honeymoon/Romantic Packages </a> </li>
			 <li> <a href="<?=site_url()?>/package-category/pilgrimage/">Piligrimage/Spiritual</a> </li>
            <li> <a href="<?=site_url()?>/package-category/family/">Family Packages </a> </li>
            <li><a href="<?=site_url()?>/package-category/picnic/">Picnic/Weekend retreats</a></li>
            <li><a href="<?=site_url()?>/trekkings">Trekking/Adventure Packages </a></li>
<!--            <li><a href="#">Pilgrimage/Spiritual Packages </a></li>-->
          </ul>
        </div>
      </div>
      <div class="col-md-3  wow fadeInDown" data-wow-delay="0.5s">
        <div id="recent-event" >
          <h3 class="widget-title">Quick Links</h3>
          <ul>
            <li> <a href="<?=site_url()?>">Home</a> </li>
            <li> <a href="<?=site_url()?>/packages">Packages </a> </li>
            <li> <a href="<?=site_url()?>/group-excursions"> Group Excursion </a> </li>
            <li><a href="<?=site_url()?>/cab-rentals"> Cab Rentals</a></li>
            <li><a href="<?=site_url()?>/events"> Events </a></li>
            <li><a href="<?=site_url()?>/contact"> Contact Us​ </a></li>
          </ul>
        </div>
      </div>
 
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      <div class="col-lg-5 col-md-7">
        <div class="copyright-foo">
        <ul>
            <li><a href="<?=site_url()?>/term-condition">Terms &amp; Condition </a> |</li>
            <li><a href="<?=site_url()?>/privacy-policy">Privacy Policy </a> |</li>
            <li><a href="<?=site_url()?>/faqs">FAQ </a> |</li>
			<li><a href="<?=site_url()?>/sitemap">Sitemap</a> |</li>
			<li><a href="<?=site_url()?>/about-us">About Us</a> |</li>
          </ul>	 
        </div>
		  <div class="clearfix"></div>
      </div>
	  <div class="col-md-4"> <p  style="padding: 10px;color:#fff;">© 2018 Travellinmind. All Rights Reserved.</p></div>
    </div>
  </div>
</footer>
<!---sign in pop up-------> 
<!-- Trigger the modal with a button --> 
<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
  <div class="modal-dialog">   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
          <div class="form sign-up-form">
            <ul class="tab-group">
              <li class="tab active"><a href="#signup">Sign Up</a></li>
              <li class="tab"><a href="#login">Log In</a></li>
            </ul>
            <div class="tab-content">
              <div id="signup">
			   <div id="register_success"></div>
			  <div id="successErr"></div>
                <form id="signupForm" name="signupForm"  method="post"> 
                  <div class="field-wrap">
				  <input type="text" name="username" class="form-control" placeholder="Full Name" id="username">
				  <span class="error error1" id="usernameErr"></span>
                  </div>
				   <div class="field-wrap">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" id="email"> 
					<span class="error error1" id="emailErr"></span>
                  </div>
                  <div class="field-wrap">
                   <input type="password" class="form-control" name="password" placeholder="Password" id="password"> 
						<span class="error error1" id="passwordErr"></span>
                  </div>
				   <div class="field-wrap">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation"> 
						<span class="error error1" id="password_confirmationErr"></span>
                  </div>
				  
				    <div class="field-wrap">
				  <div class="row">
					<div class="col-sm-3 padding-right"> <input type="text"  autocomplete="off" placeholder="+91"/></div>
					<div class="col-sm-9"> <input type="text" name="phone_no" id="phone_no" autocomplete="off" placeholder="Phone number"/></div>
					<div class="col-sm-12"><span class="error error1" id="phone_noErr"></span></div>
				  </div>                  
                  </div>				  
			    <div class="sign-up-details">
                    <p><input name="reg_terms" id="reg_terms" type="checkbox" value="" class="clickbox"> I Accepted <a href="terms-and-condition.php">Terms and Conditions</a> and <a href="policy.php">Privacy Policy</a></p>
					<span class="error error1" id="reg_termsErr"></span>
                  </div>
				  <button class="button button-block" onclick="return SignUpfunc();" type="button">Sign Up</button>
                </form>
              </div>
              <div id="login">
					<?php echo do_shortcode('[login-with-ajax]'); ?>					              
              </div>
            </div>
            <!-- tab-content -->            
          </div>
          <!-- /form --> 
        </div>
        <div class="col-md-6">
          <div class=" login-socal1">
			<?php do_action( 'wordpress_social_login' ); ?>						
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
<!-- Javascript File --> 
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.min.js" type="text/javascript"></script> 
<!-- <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/bootstrap.min.js" ></script> -->
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/main-nav.js" ></script> 
<script src="<?php bloginfo( 'template_url' ); ?>/js/responsiveslides.js"></script> 
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.flexisel.js"></script> 
<script src="<?php bloginfo( 'template_url' ); ?>/js/wow.min.js"></script> 

<script>
     new WOW().init();
</script> 
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
         });
    });
 </script> 
 <script>
 $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 313;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Read more >";
    var lesstext = "Read less";    
    $('.more').each(function() {
        var content = $(this).html(); 
        if(content.length > showChar) {
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar); 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>'; 
            $(this).html(html);
        }
    });
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>
<style>.morecontent span {
    display: none;
}
.morelink {
    display: block;
}</style> 
<!-- write script to toggle class on scroll --> 
<script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.fix-header').addClass("sticky");
    }
    else{
        $('.fix-header').removeClass("sticky");
    }
});
</script> 
<?php ?> 
<script src="<?php bloginfo( 'template_url' ); ?>/external/jquery-ui/datepicker.js"></script>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/easy-autocomplete.css">
<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.easy-autocomplete.js"></script> 
<script>
		$(function(){
			$( ".date-input-css" ).datepicker({
				minDate: '+1',
			});
			
			 $("input,textarea").keypress(function(){
      var id=this.id;
	  $("#"+id+"Err").html("");
    });		
	$("input,textarea").change(function(){
      var id=this.id;
	  $("#"+id+"Err").html("");
    });		
$("select").change(function(){
      var id=this.id;
	  $("#"+id+"Err").html("");
    });							
		})
	</script> 
<script>
$('.form').find('input, textarea').on('keyup blur focus', function (e) { 
  var $this = $(this),
      label = $this.prev('label');
	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }
});

$('.tab a').on('click', function (e) {  
  e.preventDefault();  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  target = $(this).attr('href');
  $('.tab-content > div').not(target).hide();  
  $(target).fadeIn(600); 
});
</script> 
<script>
var options = {
url: "js/countries.json",
getValue: "name",
list: { match: {enabled: true}},
theme: "square"};
$(".countries").easyAutocomplete(options);
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
       
        $('#back-to-top').tooltip('show');
});
  </script>
<script src="<?php bloginfo( 'template_url' ); ?>/js/validation.js"></script> 
<script src="<?=get_template_directory_uri()?>/js/registration_validation.js"></script>
<?php wp_footer(); ?>
<script>
function ValidateSearchForm()
{
	if(document.search_form.destination_name.value=="")
	{
	alert("Please enter destination name");
	return false;
	}	
	
	if(document.search_form.duration_days.value=="")
	{
	alert("Please select durtion");
	return false;
	}	
}
</script>
</body>
</html>
