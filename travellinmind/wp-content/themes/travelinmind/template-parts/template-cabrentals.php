<?php 
/*

* Template Name: Cab Rentals

*/
get_header();
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
  
  <!-- Wrapper for slides -->
  
  <div class="carousel-inner">
    <div class="item active"> <img src="<?php bloginfo('template_url'); ?>/images/carerentel2.jpg" alt="event" style="width:100%;"> </div>
  </div>
</div>
<div class="container">
  <div class="lower-breadcrum">
    <ul class="breadcrumbs">
      <li class="home"><a href="index.php">Home</a></li>
      <li class="current"> Cab Rentals</li>
    </ul>
  </div>
</div>

<!----inner-sectuion-star here---->

<div class="inner-wrapper">
  <section id="inner-other2-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="hm-first-content wow fadeInDown" data-wow-delay="0.5s">
            <h2> Cab Rentals</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="clearfix"></div>
            <div class="car topspace25">
              <button class="tablinks active" onclick="openCity(event, 'car')"> <img src="<?php bloginfo('template_url'); ?>/images/car.png" height="26" alt="car"/> | Cabs</button>
              <button class="tablinks" onclick="openCity(event, 'tempo')"> <img src="<?php bloginfo('template_url'); ?>/images/tempo.png" height="26" alt="car"/> | Tempo Traveller </button>
              <button class="tablinks" onclick="openCity(event, 'coches')"> <img src="<?php bloginfo('template_url'); ?>/images/bus.png" height="26" alt="car"/> | Coaches </button>
            </div>
            
            <!-- Tab content -->
            
            <div id="car" class="tabcontent3" style="display:block;">
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/tata-indica.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | 3 Luggage Bags</h5>
                    <p>Indica, Swift or similar</p>
                    <div class="car-price">
                      <h3>Economic Class </h3>
                      <h2>₹<?php echo get_option('cab_price_1'); ?><!--<span class="small">Inc. of GST</span>--></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/mhind-verito.png" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | 6 Luggage Bags</h5>
                    <p>MAHINDRA VERITO</p>
                    <div class="car-price">
                      <h3>Economic Class </h3>
                      <h2>₹ 2700<!--<span class="small">Inc. of GST</span>--></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/taveralarg.png" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 7 Seats | SUV LARGE</h5>
                    <p>TAVERA</p>
                    <div class="car-price">
                      <h3>Economic Class </h3>
                      <h2>₹ 1900<!--<span class="small">Inc. of GST</span>--></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/xilo.png" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 6 Seats | SUV LARGE</h5>
                    <p>XYLO</p>
                    <div class="car-price">
                      <h3>Economic Class </h3>
                      <h2>₹ 3800<!--<span class="small">Inc. of GST</span>--></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/fordaspire.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | SPACIOUS BOOT</h5>
                    <p>FORD ASPIRE</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹ 2800</h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/to-etos.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | MID-SIZE PLUS</h5>
                    <p>TOYOTA ETIOS</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹<?php echo get_option('cab_price_3'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/dziremidz.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | MID-SIZE PLUS</h5>
                    <p>DZIRE</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹<?php echo get_option('cab_price_4'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/innvoa.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | SUV LARGE</h5>
                    <p>INNOVA</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹<?php echo get_option('cab_price_5'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/tata-corola.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | TOYOTA COROLLA</h5>
                    <p>SPACIOUS BOOT</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('cab_price_6'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/camry.png" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | SPACIOUS BOOT</h5>
                    <p>TOYOTA CAMRY</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('cab_price_7'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/tataacourd.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | SPACIOUS BOOT</h5>
                    <p>HONDA ACCORD</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('cab_price_8'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/fordaf.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | SPACIOUS BOOT</h5>
                    <p>FORD ECO SPORT</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('cab_price_9'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/rollsryel.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | ELIGANT FEATURES</h5>
                    <p>ROLLS ROYCE</p>
                    <div class="car-price">
                      <h3>LUXURY</h3>
                      <h2>₹<?php echo get_option('cab_price_10'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/innvoa-eng.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 4 Seats | ELIGANT FEATURES</h5>
                    <p>INNOVA ELEGANCE</p>
                    <div class="car-price">
                      <h3>LUXURY</h3>
                      <h2>₹<?php echo get_option('cab_price_11'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div id="tempo" class="tabcontent3">
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/temptraveler.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>Non AC | 9 Seats | WELL MAINTAINED</h5>
                    <p>TEMPO TRAVELLER</p>
                    <div class="car-price">
                      <h3>ECONOMIC</h3>
                      <h2>₹<?php echo get_option('tempo_price_1'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/temptraveler.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 9 Seats | PUSH BACK SEAT</h5>
                    <p>TEMPO TRAVELLER</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹<?php echo get_option('tempo_price_2'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/temptravel12.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 12 Seats | DVD COACH</h5>
                    <p>TEMPO TRAVELLER</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('tempo_price_3'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/tataac.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 10 Seats | ELIGANT FEATURES</h5>
                    <p>TOYOTA HI ACE COMMUTER</p>
                    <div class="car-price">
                      <h3>LUXURY</h3>
                      <h2>₹<?php echo get_option('tempo_price_4'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div id="coches" class="tabcontent3">
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/tataadv.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 36 Seats | COMFORTABLE SEATS</h5>
                    <p>TATA LEOr</p>
                    <div class="car-price">
                      <h3>ECONOMIC</h3>
                      <h2>₹<?php echo get_option('coach_price_1'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/ashokal.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 36 Seats | COMFORTABLE SEATS</h5>
                    <p>ASHOK LEYLAND AC</p>
                    <div class="car-price">
                      <h3>COMFORT</h3>
                      <h2>₹<?php echo get_option('coach_price_2'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/marcd.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 44 Seats | PLUSH INTERIOR</h5>
                    <p>MERCEDES BENZ</p>
                    <div class="car-price">
                      <h3>PREMIUM</h3>
                      <h2>₹<?php echo get_option('coach_price_4'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="car-for-rent-book">
                  <div class="col-md-6">
                    <div class="car-for-rent">
                      <div class="car-img"> <img src="<?php bloginfo('template_url'); ?>/images/volk.jpg" class="img-responsive" alt="car"/> </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h5>AC | 15 Seats | BOARD</h5>
                    <p>VOLKSWAGEN CRAFTER</p>
                    <div class="car-price">
                      <h3>LUXURY</h3>
                      <h2>₹<?php echo get_option('coach_price_4'); ?><span></span></h2>
                      <a id="" class="cd-signup car-btn" href="javascript:;" data-toggle="modal" data-target="#bookcar"> SELECT CAB</a> </div>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
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
            <h4 class="modal-title">Cab Booking</h4>
          </div>
          <div class="modal-body">
			<div id="msgloader"></div>
            <form name="cab_rent_enquiry" id="cab_rent_enquiry" action="<?=get_template_directory_uri()?>/inc/mailphp/bookcabs_mail_process.php" method="post">
				<input type="hidden" id="templateurl" value="<?=get_template_directory_uri()?>" />
			  
			  <div class="row">
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user" aria-hidden="true"></i>
                    <input type="text" placeholder="Name" id="name" name="name">
                    <span id="nameErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-mobile" aria-hidden="true"></i>
                    <input type="text" placeholder="Phone" id="phone" name="phone">
                    <span id="phoneErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-user-secret" aria-hidden="true"></i>
                    <input type="text" placeholder="No. of Adults" id="adults_number" name="adults_number" >
                    <span id="adults_numberErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-male" aria-hidden="true"></i>
                    <input type="text" placeholder="Children" id="children" name="children" >
                    <span id="childrenErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" class="date-input-css form-control" name="arrival_date" id="arrival_date" placeholder="Arrival Date">
                    <span id="arrival_dateErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-calendar" aria-hidden="true"></i>
                    <input type="text" class="date-input-css form-control" id="depature_date" name="depature_date" placeholder="Departure Date">
                    <span id="depature_dateErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-street-view" aria-hidden="true"></i>
                    <input type="text" placeholder="Pickup Point" id="pickup_point" name="pickup_point">
                    <span id="pickup_pointErr" class="error"></span> </div>
                </div>
                <div class="col-lg-6">
                  <div class="feild"> <i class="fa fa-taxi" aria-hidden="true"></i>
                    <input type="text" placeholder="Departure" id="depature" name="depature">
                    <span id="depatureErr" class="error"></span> </div>
                </div>
                <div class="col-lg-12">
                  <div class="feild"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <input type="text" placeholder="Email" id="email" name="email">
                    <span id="emailErr" class="error"></span> </div>
                </div>
                <div class="col-lg-12">
                  <div class="feild"> <i class="fa fa-comments-o" aria-hidden="true"></i>
                    <textarea placeholder="Enter Details" name="message" id="message"></textarea>
                    <span id="messageErr" class="error"></span> </div>
                </div>
                <div class="col-lg-12">
                  <div class="feild"> <i class="fa fa-refresh"></i>
                    <input type="text" style="width:100%;" id="captcha" name="captcha" class="form-control" placeholder="Enter code as shown" onkeypress="RemoveError(this.id)" value="">
                    <span id="txtCaptchaDiv" style="background-color: #4A6983;color:#FFF;padding: 16px;margin-top: -52px;float: right;margin-right: 0px;border-radius: 0px;"></span>
                    <input type="hidden" id="txtCaptcha" value="">
                    <span id="captchaErr" class="error"></span> </div>
                </div>
                <div class="col-lg-12">
                  <div id="loading" style="display:none;"><img src="<?php bloginfo('template_url'); ?>/images/loading_e.gif"></div>
                  <input type="submit" id="sbmtbtn" class="theme-btn color" name="Submit" onclick="return Validate_cabbook_Form();" value="SEND NOW">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--  --> 
  
</div>
<?php get_footer(); ?>
<script>

function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent3");

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
<style>

.tabcontent3:after{ content:""; clear:both; display:block;}
