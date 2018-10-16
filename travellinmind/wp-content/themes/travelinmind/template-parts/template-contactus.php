<?php 
/*
* Template Name: Contact Us
*/
get_header();
?>
<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="inner-other2-section">
<div class="container">
<div class="row">
<div class="contact-us-contant">
<?php while(have_posts()):the_post(); ?>
          <div class="container">
          <div class="contact-content">
          <div class="col-md-4"> 
			<?php the_content(); ?>
          </div>
          <div class="col-md-4">
          <h2>Let us hear from you</h2>
         			<div id="msgloader"></div>
          <form name="contact_us" id="contact_us" action="<?=get_template_directory_uri()?>/inc/mailphp/contactus_mail_process.php" method="post">								<input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />
              <div class="row topspace25">				
                <div class="col-lg-12">
                  <div class="form-group">
                    <input type="text" placeholder="First Name" class="form-control" id="first_name" name="first_name">
                  <span id="first_nameErr" class="error"></span>
				  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group"> 
                    <input type="text" placeholder="Last Name" class="form-control" id="last_name" name="last_name">
<span id="last_nameErr" class="error"></span>                 
				 </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group"> 
                    <input type="text" placeholder="Email" class="form-control" id="email" name="email">
                  <span id="emailErr" class="error"></span>
				  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group"> 
                    <input type="text" placeholder="Phone" class="form-control" id="phone" name="phone">
                  <span id="phoneErr" class="error"></span>
				  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group"> 
                    <textarea placeholder="Message" row="5" name="message" class="form-control" id="message"></textarea>
                  <span id="messageErr" class="error"></span>
				  </div>
                </div>
				
				<div class="col-lg-12">
                  <div class="form-group"> 
                     <input type="text" style="width:100%;" id="captcha" name="captcha" class="form-control" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                <span id="txtCaptchaDiv" style="background-color: #4A6983;color:#FFF;padding: 7px;margin-top: -34px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                <input type="hidden" id="txtCaptcha" value="">
                    <span id="captchaErr" class="error"></span>
				  </div>
                </div>
				
                <div class="col-lg-12">
                  <input type="submit" id="sbmtbtn" class="btn btn-primary pull-right" name="submit" onclick="return Validate_contact_Form();" value="SEND NOW" />
                </div>
              </div>
            </form>      
          </div>
          
            <div class="contact-info-content">
          <div class="col-md-4">
         
          <div class="about_img map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3889.0636102273083!2d77.62521921437443!3d12.903631290900503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae14ea5374acf3%3A0xb66b1b8f9e4b4f6e!2sBeratana+Agrahara!5e0!3m2!1sen!2sin!4v1516690945856" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe></div>
      
          </div>
          </div>
          </div>
          </div>
	<?php endwhile; ?>
 </div>
<!---------secobnd-content---->

<div class="clearfix"></div>



</div>
</div>

</section>



<!--  -->
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