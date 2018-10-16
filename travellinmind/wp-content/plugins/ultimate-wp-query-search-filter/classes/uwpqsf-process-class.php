<?php
if(!class_exists('uwpqsfprocess')){
  class uwpqsfprocess{
	function __construct(){
	 //script
	 add_action( 'wp_enqueue_scripts', array($this, 'ufront_js') );
	 //front ajax
	 add_action( 'wp_ajax_nopriv_uwpqsf_ajax', array($this, 'uwpqsf_ajax') );
	 add_action( 'wp_ajax_uwpqsf_ajax', array($this, 'uwpqsf_ajax') );
	 add_action( 'pre_get_posts', array($this ,'uwpqsf_search_query'),1000);
	}

	function get_uwqsf_cmf($id, $getcmf){
			$options = get_post_meta($id, 'uwpqsf-option', true);
			$cmfrel = isset($options[0]['cmf']) ? $options[0]['cmf'] : 'AND';
			
			if(isset($getcmf)){
				$cmf=array('relation' => $cmfrel,'');
				foreach($getcmf as  $v){
				   $classapi = new uwpqsfclass();	
					$campares = $classapi->cmf_compare();//avoid tags stripped 
					if(!empty($v['value'])){
					if($v['value'] == 'uwpqsfcmfall'){
							$cmf[] = array(
								'key' => strip_tags( stripslashes($v['metakey'])),
								'value' => 'get_all_cmf_except_me',
								'compare' => '!='
						);
						  
						}
					elseif( $v['compare'] == '11'){
						$range = explode("-", strip_tags( stripslashes($v['value'])));
						$cmf[] = array(
								'key' => strip_tags( stripslashes($v['metakey'])),
								'value' => $range,
								'type' => 'numeric',
								'compare' => 'BETWEEN'
						);
					  
					  }
					  elseif( $v['compare'] == '12'){
						$range = explode("-", strip_tags( stripslashes($v['value'])));
						$cmf[] = array(
								'key' => strip_tags( stripslashes($v['metakey'])),
								'value' => $range,
								'type' => 'numeric',
								'compare' => 'NOT BETWEEN'
						);
					  
					  }elseif( $v['compare'] == '9' || $v['compare'] == '10' ){
						foreach($campares as $ckey => $cval)
							{  if($ckey == $v['compare'] ){ $safec = $cval;}        }
							$trimmed_array=array_map('trim',$v['value']);
						//implode(',',$v['value'])
						$cmf[] = array(
								'key' => strip_tags( stripslashes($v['metakey'])),
								'value' =>$trimmed_array,
								'compare' => $safec 
						);
					  
					  }elseif( $v['compare'] == '3' || $v['compare'] == '4' || $v['compare'] == '5' || $v['compare'] == '6'){
							
							foreach($campares as $ckey => $cval)
							{  if($ckey == $v['compare'] ){ $safec = $cval;}        }
							
							$cmf[] = array(
							'key' => strip_tags( stripslashes($v['metakey'])),
								'value' => strip_tags( stripslashes($v['value'])),
								'type' => 'DECIMAL',
								'compare' => $safec
							);
						}elseif($v['compare'] == '1' || $v['compare'] == '2' || $v['compare'] == '7' || $v['compare'] == '8' || $v['compare'] == '13'){
								
								foreach($campares as $ckey => $cval)
								{  if($ckey == $v['compare'] ){ $safec = $cval;}        }
								
								$cmf[] = array(
								'key' => strip_tags( stripslashes($v['metakey'])),
								'value' => strip_tags( stripslashes($v['value'])),
								'compare' => $safec
							);
						}
						
					   }//end isset
					}//end foreach
						$output =  apply_filters( 'uwpqsf_get_cmf', $cmf,$id, $getcmf );
						unset($output[0]);
						return $output;				
						
				}
	
	   }
	   
	  function get_uwqsf_taxo($id, $gettaxo){
			global $wp_query;
		    $options = get_post_meta($id, 'uwpqsf-option', true);
		    $savetaxo = get_post_meta($id, 'uwpqsf-taxo', true);
			$taxrel = isset($options[0]['tax']) ? $options[0]['tax'] : 'AND';
			$taxo=array('relation' => $taxrel,'');
			if(!empty($gettaxo)){
				$taxoperator =array('1'=>'IN','2'=>'NOT IN','3'=>'AND');		
				
				foreach($gettaxo as  $v){
						
				  $safopt = !empty ( $taxoperator[$v['opt']])  ?  $taxoperator[$v['opt']] : 'IN';	
				   if(!empty($v['term']))	{	
					if( $v['term'] == 'uwpqsftaxoall'){
						
						foreach($savetaxo as $key => $value){
							if($v['name'] == $value['taxname'] && !empty($value['exsearch']) && $value['exsearch'] == '1' && !empty($value['exc']) ){
								$taxo[] = array(
									'taxonomy' => strip_tags( stripslashes($v['name'])),
									'field' => 'id',
									'terms' =>  explode(',',$value['exc']),
									'operator' => 'NOT IN'
								);
							}
						}	
					  
					  
					  }
					elseif(is_array($v['term'])){
					 
					 $taxo[] = array(
							'taxonomy' =>  strip_tags( stripslashes($v['name'])),
							'field' => 'slug',
							'terms' =>$v['term'],
							'operator' => $safopt
						);
					}
					else{
				  
					$taxo[] = array(
							'taxonomy' => strip_tags( stripslashes($v['name'])),
							'field' => 'slug',
							'terms' => strip_tags( stripslashes($v['term'])),
							'operator' => $safopt
						);
					}
				   }else{
					   
					 
					   foreach($savetaxo as $key => $value){
							if(!empty($value['exsearch']) && $value['exsearch'] == '1' && !empty($value['exc']) && $v['name'] == $value['taxname']){
								$taxo[] = array(
									'taxonomy' => $value['taxname'],
									'field' => 'id',
									'terms' =>  explode(',',$value['exc']),
									'operator' => 'NOT IN'
								);
							}
						}
				   }
				 } //end foreach
								
					
			}				   
			   $output = apply_filters( 'uwpqsf_get_taxo', $taxo,$id, $gettaxo );	
				unset($output[0]);
				return $output;	
			
		}		
			
	

       function uwpqsf_search_query($query){
	 if($query->is_search()){
	    if($query->query_vars['s'] == 'uwpsfsearchtrg' && isset($_GET['uformid'])){	
		$getdata = $_GET;
		$taxo = (isset($_GET['taxo']) && !empty($_GET['taxo'])) ? $_GET['taxo'] : null;
		$cmf = (isset($_GET['cmf']) && !empty($_GET['cmf'])) ? $_GET['cmf'] : null;
		$id = absint($_GET['uformid']);
		$options = get_post_meta($id, 'uwpqsf-option', true);
		$cpts = get_post_meta($id, 'uwpqsf-cpt', true);
		$default_number = get_option('posts_per_page');
		$paged = ( get_query_var( 'paged') ) ? get_query_var( 'paged' ) : 1;
		$cpt        = !empty($cpts) ? $cpts : 'any';
		$ordermeta  = !empty($options[0]['smetekey']) ? $options[0]['smetekey'] : null;
		$ordertype = !empty($options[0]['otype']) ? $options[0]['otype'] : null;
		$order      = !empty($options[0]['sorder']) ? $options[0]['sorder'] : null;
		$number      = !empty($options[0]['resultc']) ? $options[0]['resultc'] : $default_number;
		$keyword = !empty($_GET['skeyword']) ?	 sanitize_text_field($_GET['skeyword']) : null;
		$get_tax = $this->get_uwqsf_taxo($id, $taxo);
		$get_meta = $this->get_uwqsf_cmf($id, $cmf);
		if($options[0]['snf'] != '1' && !empty($keyword)){
		 $get_tax = $get_meta = null;
		} 

		$ordermeta  = apply_filters('uwpqsf_dmeta_query',$ordermeta,$getdata,$id);
		$ordervalue = apply_filters('uwpqsf_dmeta_type',$ordertype,$getdata,$id);
		$order 	    = apply_filters('uwpqsf_dorder_query',$order,$getdata,$id);	
		$number     = apply_filters('uwpqsf_dnum_query',$number,$getdata,$id);	
				
		
		$args = array(
			'post_type' => $cpt,
			'post_status' => 'publish',
			'meta_key'=> $ordermeta,
			'orderby' => $ordertype,
			'order' => $order, 
			'paged'=> $paged,
			'posts_per_page' => $number,
			'meta_query' => $get_meta,						
			'tax_query' => $get_tax,
			's' => esc_html($keyword),
			);
							
		$arg = apply_filters( 'uwpqsf_deftemp_query', $args, $id,$getdata);	


		foreach($arg as $k => $v){
         		$query->set( $k, $v );
		}
		return $query; 
            }	
	    
	 }	
	   
   }//end for search

  function uwpqsf_ajax(){
    $postdata =parse_str($_POST['getdata'], $getdata);
    $taxo = (isset($getdata['taxo']) && !empty($getdata['taxo'])) ? $getdata['taxo'] : null;
    $cmf = (isset($getdata['cmf']) && !empty($getdata['cmf'])) ? $getdata['cmf'] : null;
    $formid = $getdata['uformid'];
    $nonce =  $getdata['unonce'];
    $pagenumber = isset($_POST['pagenum']) ? $_POST['pagenum'] : null;

	if(isset($formid) && wp_verify_nonce($nonce, 'uwpsfsearch')){
  		$id = absint($formid);
		$options = get_post_meta($id, 'uwpqsf-option', true);
		$cpts = get_post_meta($id, 'uwpqsf-cpt', true);
		$pagenumber = isset($_POST['pagenum']) ? $_POST['pagenum'] : null;
		$default_number = get_option('posts_per_page');
				
		$cpt        = !empty($cpts) ? $cpts : 'any';
		$ordermeta  = !empty($options[0]['smetekey']) ? $options[0]['smetekey'] : null;
		$ordertype = !empty($options[0]['otype'])  ? $options[0]['otype'] : null;
		$order      = !empty($options[0]['sorder']) ? $options[0]['sorder'] : null;
		$number      = !empty($options[0]['resultc']) ? $options[0]['resultc'] : $default_number;
				
		$keyword = !empty($getdata['skeyword']) ? sanitize_text_field($getdata['skeyword']) : null;
		$get_tax = $this->get_uwqsf_taxo($id, $taxo);
		$get_meta = $this->get_uwqsf_cmf($id, $cmf);
		
		if($options[0]['snf'] != '1' && !empty($keyword)){
		 $get_tax = $get_meta = null;
		}
		
		$ordermeta  = apply_filters('uwpqsf_ometa_query',$ordermeta,$getdata,$id);
		$ordervalue = apply_filters('uwpqsf_ometa_type',$ordertype,$getdata,$id);
		$order 	    = apply_filters('uwpqsf_order_query',$order,$getdata,$id);	
		$number     = apply_filters('uwpqsf_pnum_query',$number,$getdata,$id);	
					
		
				
		$args = array(
			'post_type' => $cpt,
			'post_status' => 'publish',
			'meta_key'=> $ordermeta,
			'orderby' => $ordertype,
			'order' => $order, 
			'paged'=> $pagenumber,
			'posts_per_page' => $number,
			'meta_query' => $get_meta,						
			'tax_query' => $get_tax,
			's' => esc_html($keyword),
			);
							
		$arg = apply_filters( 'uwpqsf_query_args', $args, $id,$getdata);		
				
						
					    
		$results =  $this->uajax_result($arg, $id,$pagenumber,$getdata);
		$result = apply_filters( 'uwpqsf_result_tempt',$results , $arg, $id, $getdata );	
					
		echo $result;
					
							
		}else{ echo 'There is error here';}
	    	die;	

  }//end ajax	

  function uajax_result($arg, $id,$pagenumber,$getdata){
    	$query = new WP_Query( $arg );
	$html = '';
		//print_r($query);	// The Loop
	if ( $query->have_posts() ) {
	  $html .= '<h1>'.__('Search Results :', 'UWPQSF' ).'</h1>';
	   while ( $query->have_posts() ) {
	        	$query->the_post();global $post;
				
			$hotel_active = get_post_meta(get_the_ID(),'hotel_47518',true);
			if($hotel_active=="Active"){
				$hotelclass_active = "active";
			}else{
				$hotelclass_active = "";
			}			
			$flight_active = get_post_meta(get_the_ID(),'flight_37595',true);
			if($flight_active=="Active"){
				$flightclass_active = "active";
			}else{
				$flightclass_active = "";
			}
			 $meals_active = get_post_meta(get_the_ID(),'meals_54177',true);
			if($meals_active=="Active"){
			$mealclass_active = "active";
			}else{
			$mealclass_active = "";
			}
		 	$sightseeing_active = get_post_meta(get_the_ID(),'sightseeing_38273',true);
			if($sightseeing_active=="Active"){
			$seightclass_active = "active";
			}else{
			$seightclass_active = "";
			}
			$car_active = get_post_meta(get_the_ID(),'car_11313',true);
			if($car_active=="Active"){
			$carclass_active = "active";
			}else{
			$carclass_active = "";
			}
				
			$activities = get_the_terms( $post->ID, 'tags' );
			$html .= '<div class="pack-container"><div class="col-md-5">'.get_the_post_thumbnail().'</div>';
			$html .= '<div class="col-md-7">
					<div class="pac-box-sec">
			        <h2>'.get_the_title().'</h2>
					<h3>'.get_post_meta(get_the_ID(),'days_24335',true).' days &amp; '.get_post_meta(get_the_ID(),'nights_89476',true).' nights</h3>
                    <div class="pac-other">';
			foreach( $activities as $activity ) {
			$html .= '<span class="btn-small">' .$activity->name.'</span>';
			} 		
			$html .= '	</div>
                    <div class="clearfix"></div>
					<div class="pac-price topspace1">
					      <span class="pac-price1"> Best Price </span>
                          <span class="btn btn-success round-btn">'.get_post_meta(get_the_ID(),'offerpercentage_12345',true).'%off</span> 
						  <span><a href="#" data-toggle="tooltip" title="" data-original-title="Exact prices may vary based on availability."><i class="fa fa-info-circle"></i></a></span>
                          <br>
					<span class="pac-price2">₹'.get_post_meta(get_the_ID(),'offerprice_27518',true).'/- </span> <span class="norate">₹'.get_post_meta(get_the_ID(),'baseprice_89413',true).'/-</span>
					</div>
					
                    <div class="clearfix"></div>
                    <div class="pac-price topspace1">
                    <p class="pac-price1">Cites</p>';					$arrcities = explode("||",get_post_meta(get_the_ID(),'city_29191',true));					foreach($arrcities as $rowcity)					{
						$html .= '<span class="btn-small">'.$rowcity.'</span>';					}
                    $html .= '</div>
					</div>
				</div><div class="clearfix"></div>
				<hr>';
			$html .='<div class="col-md-12">
			<div class="col-md-6">
			<div class="row">
			<div class="col-md-2 packfacilities '.$hotelclass_active.'">
	   <span class="option-1">
	        <img src="'.get_template_directory_uri().'/images/option11.png">
	   </span>

	   <span class="option-nmae">
	        Hotel
	   </span>
	 </div>
      <div class="col-md-2 packfacilities '.$flightclass_active.'">
	   <span class="option-1">
	        <img src="'.get_template_directory_uri().'/images/option15.png">
	   </span>
	   <span class="option-nmae">
	        Flight
	   </span>
	 </div>
         	 <div class="col-md-2 packfacilities '.$mealclass_active.'">
	   <span class="option-1">
	        <img src="'.get_template_directory_uri().'/images/option12.png">
	   </span>
	   <span class="option-nmae">
	       Meals
	   </span>
	 </div>
      <div class="col-md-3 packfacilities '.$seightclass_active.'">
	   <span class="option-1">
	        <img src="'.get_template_directory_uri().'/images/option13.png">
	   </span>
	   <span class="option-nmae">
	        Sightseeing
	   </span>
	 </div>
         <div class="col-md-3 packfacilities '.$carclass_active.'">
	   <span class="option-1">
	        <img src="'.get_template_directory_uri().'/images/option14.png">
	   </span>
	   <span class="option-nmae">
	       Car
	   </span>
	 </div>
          </div>
		  </div>
         <a href="'.get_permalink().'" class="btn btn-primary topspace1 pull-right">View details</a>
		 </div>';
			$html .= '</div>';

			
			
				
		  }
			$html .= $this->ajax_pagination($pagenumber,$query->max_num_pages, 4, $id,$getdata);
		 } else {
					$html .= __( '<div class="text-center topspace5">
			<img src="http://noodlesbox.in/travellinmind/wp-content/themes/travelinmind/images/new.jpg" alt="search" /> <div class="clearfix"></div><span class="fa-3x">No Package found</span><div class="clearfix"></div><span class="fa-2x">Your Requirements are unique!</span><div class="clearfix"></div><a href="'.site_url().'" class="btn btn-info">Bulid Your Own Package</a> <a href="'.site_url().'"/contact class="btn btn-info">Contact Now</a>
			</div>', 'UWPQSF' );
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				
		return $html;
			
		
  }//end result	 

  function ajax_pagination($pagenumber, $pages = '', $range = 4, $id,$getdata){
	$showitems = ($range * 2)+1;  
	 
	$paged = $pagenumber;
	if(empty($paged)) $paged = 1;

	if($pages == '')
	 {
		 
	   global $wp_query;
	   $pages = $query->max_num_pages;
			 
	    if(!$pages)
		 {
				 $pages = 1;
		 }
	}   
	 
	if(1 != $pages)
	 {
	  $html = "<div class=\"uwpqsfpagi\">  ";  
	  $html .= '<input type="hidden" id="curuform" value="#uwpqsffrom_'.$id.'">';
	
	 if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
	 $html .= '<a id="1" class="upagievent" href="#">&laquo; '.__("First","UWPQSF").'</a>';
	 $previous = $paged - 1;
	 if($paged > 1 && $showitems < $pages) $html .= '<a id="'.$previous.'" class="upagievent" href="#">&lsaquo; '.__("Previous","UWPQSF").'</a>';
	
	 for ($i=1; $i <= $pages; $i++)
	  {
		 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
		 {
		 $html .= ($paged == $i)? '<span class="upagicurrent">'.$i.'</span>': '<a id="'.$i.'" href="#" class="upagievent inactive">'.$i.'</a>';
		 }
	 }
				
	 if ($paged < $pages && $showitems < $pages){
		 $next = $paged + 1;
		 $html .= '<a id="'.$next.'" class="upagievent"  href="#">'.__("Next","UWPQSF").' &rsaquo;</a>';}
		 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
		 $html .= '<a id="'.$pages.'" class="upagievent"  href="#">'.__("Last","UWPQSF").' &raquo;</a>';}
		 $html .= "</div>\n";$max_num_pages = $pages;
		 return apply_filters('uwpqsf_pagination',$html,$max_num_pages,$pagenumber,$id);
	 }
		 
		 
   }// pagination
  	
  function ufront_js(){
      $variables = array('url' => admin_url( 'admin-ajax.php' ),);
	$themeopt = new uwpqsfclass();	
	$themeops = $themeopt->uwpqsf_theme();
	$themenames= $themeopt->uwpqsf_theme_val();
	if(isset($themenames)){
	  foreach($themeops as $k){
		if(in_array($k['themeid'],$themenames) ){
				wp_register_style( $k['themeid'], $k['link'], array(),  'all' );
				wp_enqueue_style( $k['themeid'] );
			}
		
	  wp_enqueue_script(  'uwpqsfscript', plugins_url( '/scripts/uwpqsfscript.js', __FILE__ ) , array('jquery'), '1.0', true);
          wp_localize_script('uwpqsfscript', 'ajax', $variables);
	}// end foreach
      }//end if
  }
 

  
 }//end class
}//end check 
global $uwpqsfprocess;
$uwpqsfprocess = new uwpqsfprocess();
?>
