<?php 
/*
* Template Name: Trekking Page
*/
get_header();
?>

			  <?php
			  // Query Arguments
				$args = array(
					'post_type' => array('trekking'),
					'post_status' => array('publish'),
					'showposts'=>-1,
					'order' => 'DESC',
					'orderby' => 'date',
				);
				$feturedpackage = new WP_Query( $args );
				?>
				
				
	<script src='https://www.google.com/recaptcha/api.js'></script>			

 <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?php bloginfo('template_url'); ?>/images/traking.jpg" alt="event" style="width:100%;">
      </div>
  </div>
  </div>
<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="inner-other2-section">
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
		<h2>Trekking</h2>
		</div>
	</div>
	
	<div class="trekking-section">
	<?php
	if ( $feturedpackage->have_posts() ) {		$a=0;
			while ( $feturedpackage->have_posts() ) {
				$feturedpackage->the_post();
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					}		$a++;
	?>
		<div class="col-md-6">
			<div class="trekking-box">
			<div class="col-md-5 text-center">
				<div class="treking-content" style="font-size: 20px;">
					<?=the_title()?> -<br>
					<span class="tripType"> <?php echo get_post_meta(get_the_ID(),'trekkingdaysnum_68368',true); ?> Days</span>
				 </div>
				   <div class="treking-content2">
					Starting From<span class="tripType"> ₹ <?php echo get_post_meta(get_the_ID(),'startingpricepe_33466',true); ?> </span>per person
				  </div>
				  <a href="#eventboxs<?=get_the_ID()?>" data-toggle="modal" class="btn btn-default btn-round">More Info</a>
			
			</div>
			<div class="col-md-7">
			<div class="row">
				  <div class="treking-img pull-right">
					<img src="<?=$large_image_url[0]?>" alt="packages" class="img-responsive">
				  </div></div>
				 </div>
			</div>		
		</div> 		<?php 		if($a%2 == 0)		{			?>			<div style="clear:both"></div>			<?php		}		?>
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

<div class="clearfix"></div>
</div>
</div>
</section>
<!--  -->
</div>
<!----pop up------>
 <!-- Modal -->
 	<?php
	if ( $feturedpackage->have_posts() ) {
			while ( $feturedpackage->have_posts() ) {
				$feturedpackage->the_post();
					if ( has_post_thumbnail() ) {
						$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
					}
	?>
  <div class="modal fade eventboxs" id="eventboxs<?=get_the_ID()?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=the_title()?></h4>
        </div>
        <div class="modal-body">
		   
		        <div class="col-md-8">
				    <div class="event-history">
				        <img src="<?=get_field('trekking_image')?>" alt="event images"/>
					</div>
		    
				</div>
				
				<div class="col-md-4">
				    <div class="event-discription">
					         <h3>LOOKING FOR ADVENTURE ?</h3>
				             <div id="msgloader<?=get_the_ID()?>"></div>
							 
							 <form name="event_enquiry" id="event_enquiry<?=get_the_ID()?>" action="<?=get_template_directory_uri()?>/inc/mailphp/treking_mail_process.php" method="post">
        <input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />
		<input type="hidden" name="trekking_name" value="<?=get_the_title();?>">
        
        <div class="feild">
        <i class="fa fa-user"></i>
        <input type="text" size="34" placeholder="Name" id="name<?=get_the_ID()?>" name="name">
        <small id="name<?=get_the_ID()?>Err" class="error"></small>
        </div>
		
        <div class="feild">
        <i class="fa fa-mobile"></i>
        <input class="txtBox" type="text" size="34" placeholder="Mobile Number" id="phone<?=get_the_ID()?>" name="phone">
		<small id="phone<?=get_the_ID()?>Err" class="error"></small>
        </div>
        
        <div class="feild">
        <i class="fa fa-envelope-o"></i>
        <input class="txtBox" type="text" size="34" placeholder="Email" id="email<?=get_the_ID()?>" name="email">
		<small id="email<?=get_the_ID()?>Err" class="error"></small>
        </div>
        
         <div class="twelve columns options_outer" id="options_outer2" style="margin-bottom:10px">
         <span class="subHeading two">Adult</span>
                   <select  class="two" name="adult" style="margin-top:2px; margin-bottom:2px; font-size:13px">
                   <option value="0">0</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   </select>

                   <span class="subHeading two" style="text-align:center">Child</span>
                   <select  class="two"  name="child">
                   <option value="0">0</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   </select>

                   <!--<span class="subHeading" style="text-align:center">Infant</span>
                   <select  class="two" style="margin-right:0px"  name="infant">
                   <option value="0">0</option>
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
                   </select>-->				   
                   </div>
                   
                <div class="feild"> 
                <i class="fa fa-calendar"></i>  
               <input autocomplete="off" type="text" name="date" id="date<?=get_the_ID()?>" class="date-input-css" placeholder="DD/MM/YY">
                <small id="date<?=get_the_ID()?>Err" class="error"></small>
                </div>
                            
				
				
                 <div class="feild">
                 <i class="fa fa-refresh"></i>
				  <input type="text" style="width:100%;" id="captcha<?=get_the_ID()?>" name="captcha<?=get_the_ID()?>" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                <span id="txtCaptchaDiv<?=get_the_ID()?>" style="background-color: #4A6983;color:#FFF;padding: 11px;margin-top: -42px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                <input type="hidden" id="txtCaptcha<?=get_the_ID()?>" value="">
                 
				<small id="captcha<?=get_the_ID()?>Err" class="error"></small>
                </div>
				 
				
<div class="clearfix"></div>
             <input  type="submit" id="sbmtbtn<?=get_the_ID()?>" class="banner-btn" id="submit1" onclick="return Validate_event_Form('<?=get_the_ID()?>');" value="Submit">
                       
      

    </form>
	</div>
				</div>
			<div class="col-md-12">
			             <div class="event-dis">
					      <h3>Overview</h3>
						    <?php the_content(); ?>
						 
					</div>
			</div>
		
		
        
        </div>
       
      </div>
      
    </div>
  </div>
  
<script>
var a<?=get_the_ID()?> = Math.ceil(Math.random() * 9)+ '';
var b<?=get_the_ID()?> = Math.ceil(Math.random() * 9)+ '';
var c<?=get_the_ID()?> = Math.ceil(Math.random() * 9)+ '';
var d<?=get_the_ID()?> = Math.ceil(Math.random() * 9)+ '';
var e<?=get_the_ID()?> = Math.ceil(Math.random() * 9)+ '';
var code<?=get_the_ID()?> = a<?=get_the_ID()?> + b<?=get_the_ID()?> + c<?=get_the_ID()?> + d<?=get_the_ID()?> + e<?=get_the_ID()?>;
document.getElementById("txtCaptcha<?=get_the_ID()?>").value = code<?=get_the_ID()?>;
document.getElementById("txtCaptchaDiv<?=get_the_ID()?>").innerHTML = code<?=get_the_ID()?>;
</script>
<?php			
		}
	} 
	wp_reset_postdata();
	 ?>


<!----pop up end here---->
</div>
			

<?php get_footer(); ?>

 