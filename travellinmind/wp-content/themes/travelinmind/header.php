<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelinmind
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Librarory css files -->
	<link href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/font-awesome.min.css" rel="stylesheet">
	<!-- Custom Css File -->
	<link href="<?php bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/animate.css" rel="stylesheet">
	<!--  -->
	<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash|Cookie|Lato|Lobster" rel="stylesheet">
	<!--  -->
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.mobile.datepicker.css" />
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/jquery.mobile.datepicker.theme.css" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/custome.css" />
</head>
<body <?php body_class(); ?>>
<!-- Header -->
<header>
<?php if(is_front_page() and is_page('home')){ ?>
  <div class="header-section">
    <div id="top-zone">
      <div class="container">
        <div class="row">
          <div class="col-md-7"> 
          <div class="col-md-3">
			  <span class=" up-socail">
              	  <a href="https://www.facebook.com/" title="facebook" class=""><i class="fa fa-facebook-f"> </i></a>
				  <a href="https://www.youtube.com/" title="Youtube" class=""><i class="fa fa-youtube"> </i> </a> 
				  <a href="https://www.instagram.com/" title="Instagram" class=""><i class="fa fa-instagram"> </i></a>
			 </span></div>
              <div class="col-md-9 topspace1">
				<span class="up-email"> <i class="fa fa-envelope" aria-hidden="true"></i> info@travellinmind.com <span class="sep"> |</span> 
				</span> 
			   <span class=""> <i class="fa fa-phone" aria-hidden="true"></i>  +91 9449915623
 </span></div> 
		  </div>
          <div class="col-md-5 ">
            <div class="top-nav">
              <ul>
			  <?php if(!is_user_logged_in()){ ?>
               <li class="trekking-new"><a class=" cd-signup signup-tab" href="javascript:;" data-toggle="modal" data-target="#loginModal">LOGIN</a ></li>
			  <?php } else{ ?>
			  <li class="trekking-new"><a class=" cd-signup signup-tab" href="<?php echo wp_logout_url(site_url()); ?>" >Logout</a ></li>
			  <?php } ?>
                <li><a class="trekking" href="<?=site_url()?>/our-undiscovered">Undiscovered</a></li>
                <li><a class="trekking" href="<?=site_url()?>/trekkings">Trekking</a></li>
				<?php if(is_user_logged_in()){
							global $current_user;
							$user_id = $current_user->ID;
							$userdata = get_user_meta ($user_id);
							//echo "<pre>";
							//print_r($userdata);
							$userdata['nickname'][0]
				?>
				<li class="usern">Welcome <?=ucfirst($userdata['nickname'][0])?></li>
				<?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
   <div class="carousel-inner">
  <?php
  
  $argsBannerContent = array(
			'post_type' => array('banner_content'),
			'post_status' => array('publish'),
			'order' => 'DESC',
			'orderby' => 'date'
		);
  $QueryBannerContent = new WP_Query( $argsBannerContent );
  //echo count($QueryBannerContent);
  //print_r($QueryBannerContent);
  if ( $QueryBannerContent->have_posts() ) 
  { $counter=1;
 while ( $QueryBannerContent->have_posts() )
 {
	$QueryBannerContent->the_post();			
  ?>  
<div class="item <?=($counter==1)?"active":""?>">
<div class="banner-heading">
<h1 class="wow animated bounceInDown" data-wow-delay="0.5s"><?=get_the_title(get_the_ID())?></h1>
</div>
</div>
  <?php $counter++; }?>
<a class="left carousel-control" style="display: none;" href="#myCarousel" data-slide="prev"></a>
<a class="right carousel-control" style="display: none;" href="#myCarousel" data-slide="next"></a>
  <?php }   ?>
</div>
  </div>
        </div>
        <div class="col-md-2 nav-bar">
          <div class="logo text-center"> 
		  <?php the_custom_logo(); ?>
			<!--<a href="index.php"><img src="images/logo.png" class="img-responsive" ></a> -->
			</div>
          <div id='main_nav' class="pull-right">
            <ul class="topspace3">
              <!--<li><a href='index.php'><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
			   <li><a href='about.php'><i class="fa fa-home" aria-hidden="true"></i> About Us </a></li>-->
              <li><a href="<?=site_url()?>/packages"><i class="fa fa-briefcase" aria-hidden="true"></i> Packages </a></li>
              <li><a href='<?=site_url()?>/group-excursions'><i class="fa fa-users" aria-hidden="true"></i> Group Excursion</a></li>
              <li><a href='<?=site_url()?>/cab-rentals'><i class="fa fa-car" aria-hidden="true"></i> Cab Rentals</a></li>
              <!--<li><a href="offer.php"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Offers</a></li>-->
              <li><a href="<?=site_url()?>/events"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a></li>
              <li><a href="<?=site_url()?>/contact"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us​</a></li>
            </ul>
          </div>
        </div>
        <div class="b-form">
          <div class="col-md-5 col-md-offset-1">
            <div class="banner-form-heading">
              <h2>Begin with Amazing</br> tour packages</h2>
			  
              <form method="post" action="<?=site_url()?>/search-results" name="search_form" id="search_form">
                <ul class="row topspace25">
                  <!--======= INPUT NAME =========-->
                  <li class="col-sm-4">
                    <div class="form-group">
						<input type="text" class="form-control countries" name="destination_name" placeholder="Type Destination">
						<span class="fa fa-map-marker" style="font-size:22px; margin-left: 3px; margin-top: -2px;"></span> </div>
                  </li>
                  <!--======= INPUT EMAIL =========-->
                  <!--<li class="col-sm-5">
                    <div class="form-group">
                    
                      <select class="form-control" name="duration">
					    <option value="">Select Duration</option>
						<?php 
						 global $wpdb; 
						$durations = $wpdb->get_results( 
						   "SELECT DISTINCT(meta_value) 
							FROM $wpdb->postmeta
							WHERE meta_key = 'days_24335'
							ORDER BY meta_value"
						);
						if($durations){ 
							foreach ( $durations as $duration ) {
							echo '<option value="' .$duration->meta_value .'">';
								echo $duration->meta_value.' Days';
								echo '</option>';
							}
						}  
						?>
                        <option value="">Not decided</option>
                      </select>
                       <span class="fa fa-calendar"></span>  </div>
                  </li>-->
				  <li class="col-sm-4">
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
                       <span class="fa fa-calendar"></span>  </div>
                  </li>				  
				 <!-- <li class="col-sm-3">
                    <div class="form-group">
                      <select class="form-control" name="duration_night">
					    <option value="">Select Nights</option>
						<?php 
						global $wpdb; 
						$durations = $wpdb->get_results( 
						   "SELECT DISTINCT(meta_value) 
							FROM $wpdb->postmeta
							WHERE meta_key = 'nights_89476'
							ORDER BY meta_value"
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
                       <span class="fa fa-calendar"></span>  </div>
                  </li>-->
				  
                  <li class="col-sm-2">
                    <button type="submit" class="banner-btn" onclick="return ValidateSearchForm()">Explore</button>
                  </li>
                </ul>         
                <!--======= BUTTON =========-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } else{ ?>
  <div id="inner-top-zone">
    <div class="container">
      <div class="row">
      <div class="col-md-2">
          <div class="inner-logo"> 
		  <?php the_custom_logo(); ?>
			<!--<a href="<?=site_url()?>">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/logo.png" class="img-responsive" alt="logo"/>
			</a>-->		
			</div>
        </div>
        <div class="col-md-6  topspace51 text-left" style="padding-right:0px;">
			<span class=" up-socail">
			<a href="https://www.facebook.com/" title="facebook" class=""><i class="fa fa-facebook-f"> </i></a>
			<a href="https://www.youtube.com/" title="Youtube" class=""><i class="fa fa-youtube"> </i> </a> 
			<a href="https://www.instagram.com/" title="Instagram" class=""><i class="fa fa-instagram"> </i></a> 
			<span class="sep"> |</span></span>
			<span class="up-email"> 
			<a href="mailto:info@travelinmind.com" itemprop="email">
			<i class="fa fa-envelope" aria-hidden="true"></i> info@travellinmind.com </a> 
			<span class="sep"> |</span></span>
			
			<span class="up-phone"> <i class="fa fa-phone" aria-hidden="true"></i>+91 9449915623<?php if(basename($_SERVER['REQUEST_URI']) == 'contact-us'){?>, +91 9449917624 <?php }?> </span>
		</div>   
        <div class="col-md-4">
          <div class="top-nav">
            <ul>
				<?php if(is_user_logged_in()){
							global $current_user;
							$user_id = $current_user->ID;
							$userdata = get_user_meta ($user_id);
							//echo "<pre>";
							//print_r($userdata);
							$userdata['nickname'][0]
				?>
				<li class="usern">Welcome <?=ucfirst($userdata['nickname'][0])?></li>
				<?php } ?>
              <li><a href="<?=site_url()?>/trekkings">Trekking </a></li>
              <li><a href="<?=site_url()?>/our-undiscovered">Undiscovered</a></li>
              <?php if(!is_user_logged_in()){ ?>
               <li class="trekking-new"><a class=" cd-signup signup-tab" href="javascript:;" data-toggle="modal" data-target="#loginModal">Login</a ></li>
			  <?php } else{ ?>
			  <li class="trekking-new"><a class=" cd-signup signup-tab" href="<?php echo wp_logout_url(site_url()); ?>" >Logout</a ></li>
			  <?php } ?>			  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
<?php } ?>
</header>
			<?php			
			
			/* wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) ); */
			?>	