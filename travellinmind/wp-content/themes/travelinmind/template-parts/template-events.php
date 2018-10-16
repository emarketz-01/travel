<?php 
/*
* Template Name: Events
*/
get_header();
?>
<div id="inner-banner-section-event">
    <div class="container">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="inner-box-sec">
          <div class="head-box">
<h2>EVENTS IN BANGALORE TODAY</h2>
<p>Events, Things to do, Outdoors and Kids</p></div>

        </div>
      </div>
    </div>
  </div>
<!----inner-sectuion-star here---->
<div class="inner-wrapper">
<section id="event-section">
	<div class="event-box">
		<div class="container">
		<div class="tab-content">
			<div class="tab-pane fade in active">
			  
			  <?php


			  // Query Arguments
				$args = array(
					'post_type' => array('event'),
					'post_status' => array('publish'),
					'showposts'=>-1,
					'order' => 'DESC',
					'orderby' => 'date',
				);

				// The Query
				$feturedpackage = new WP_Query( $args );
				$comingsoon =  get_field('check_to_show_coming_soon');
					if($comingsoon[0] =="Yes"){ 
					echo '<img src="'.get_template_directory_uri().'/images/coming-soon.png" alt="coming soon" style="margin: 0 auto;
    text-align: center;
    display: block;">';
					} else{
						echo "<h3> parties and nightlife</h3>";
				// The Loop
				if ( $feturedpackage->have_posts() ) {
					while ( $feturedpackage->have_posts() ) {
						$feturedpackage->the_post();
							if ( has_post_thumbnail() ) {
								$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
							}
							
							
				?>
				<div class="col-md-3">
					<div class="package-box wow fadeInDown" data-wow-delay="0.5s"  data-toggle="modal" 
					data-target="#eventboxs<?=get_the_ID();?>">
						<div class="package-img">
							<img src="<?=$large_image_url[0]?>" alt="packages" class="img-responsive">
						</div>
						<div class="package-conent">
							<h4> <?php the_title();?>
							</h4>
						</div>
						<div class="package-offer-price">
						<h4> <?php echo get_post_meta(get_the_ID(),'eventdate_51318',true); ?>, 
						<?php  echo get_post_meta(get_the_ID(),'eventtimehours_97146',true); ?>:<?php  echo get_post_meta(get_the_ID(),'eventtimeminute_67351',true); ?> <?php  echo get_post_meta(get_the_ID(),'eventdaynight_86922',true); ?></h4>
						</div>
					</div>
				</div>
				<?php			
						}
					} else {
						echo "No Package found";
					}
					/* Restore original Post Data */
					wp_reset_postdata();
				
					} /*else close*/
					?>
				
				
			</div>
		</div>
		</div>
	</div>
<div class="clearfix"></div>
</section>
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
  <div class="modal fade eventboxs" id="eventboxs<?=get_the_ID();?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 id="eventitle" class="modal-title"><?php the_title();?></h4>
        </div>
        <div class="modal-body">
		   
		        <div class="col-md-8">
				    <div class="event-history" id="event_img" >
				        <img src="<?=$large_image_url[0]?>" alt="event images"/>
					</div>
		    
				</div>
				
				<div class="col-md-4">
				    <div class="event-discription">
					         <h3>LOOKING FOR ADVENTURE ?</h3>
		<form name="event_enquiry" id="event_enquiry<?=get_the_ID()?>" action="<?=get_template_directory_uri()?>/inc/mailphp/events_mail_process.php" method="post">
        
        <input type="hidden" name="event_name" value="<?=get_the_title();?>">
        <div class="feild">
        <i class="fa fa-user"></i>
        <input class="txtBox" type="text" size="34" placeholder="Name" id="name<?=get_the_ID()?>" name="name">
		<span id="name<?=get_the_ID()?>Err" class="error"></span>
        </div>
        
        <div class="feild">
        <i class="fa fa-mobile"></i>
        <input class="txtBox" type="text" size="34" placeholder="Mobile Number" id="phone<?=get_the_ID()?>" name="phone">
		<span id="phone<?=get_the_ID()?>Err" class="error"></span>
        </div>
        
        <div class="feild">
        <i class="fa fa-envelope-o"></i>
        <input class="txtBox" type="text" size="34" placeholder="Email" id="email<?=get_the_ID()?>" name="email">
		<span id="email<?=get_the_ID()?>Err" class="error"></span>
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

                    
                   </div>
                   
                   <div class="feild">
                   <i class="fa fa-calendar"></i>
               <input type="text" name="date" id="date<?=get_the_ID()?>" class="date-input-css" placeholder="DD/MM/YY">
                                                                
                            
				<span id="date<?=get_the_ID()?>Err" class="error"></span>
                </div>
				
				<div class="feild">
                <i class="fa fa-refresh"></i>
				<input type="text" style="width:100%;" id="captcha<?=get_the_ID()?>" name="captcha<?=get_the_ID()?>"  placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                <span id="txtCaptchaDiv<?=get_the_ID()?>" style="background-color: #4A6983;color:#FFF;padding: 11px;margin-top: -42px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                <input type="hidden" id="txtCaptcha<?=get_the_ID()?>" value="">
                 
				<small id="captcha<?=get_the_ID()?>Err" class="error"></small>
                </div>
				

             <input type="submit" class="banner-btn" id="submit1" onclick="return Validate_event_Form('<?=get_the_ID()?>');" value="Submit">
                       
      

    </form>
	</div>
				</div>
			<div class="col-md-12">
			        <div class="event-dis" id="event_content">
					      <h3>Overview</h3>
						<?=the_content();?>	
						 
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

<?php get_footer(); ?>