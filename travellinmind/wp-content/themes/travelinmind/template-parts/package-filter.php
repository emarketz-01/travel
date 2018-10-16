<aside id="sidebar">
<div class="packages">
<form name="package_filter" action="" id="package_filter" method="post">
	<div class="pac-filter-box">
		<ul>
			<li><button type="button" class="btn btn-primary" id="filter1" >Filters</button></li>
			<li><span class="sep">|</span></li>
			<li class="reset"><a href="#" onClick="reset();" >Reset</a></li>
		</ul>
	</div>
	<div class="filter-start">
		<div class="filter1">
			<h3>Categories</h3>
			<div class="filrter-choose">
			
			<?php
				$terms = get_terms('package-category');
				foreach($terms as $term){ ?>
				<label class="container"> <?=$term->name?>
					<input type="checkbox" name="category_id[]" value="<?=$term->term_id;?>">
					<span class="checkmark"></span>
				</label>
			<?php } ?>
			</div>
		</div>
	</div>
<!---second---->
	<div class="filter-start2">
		<div class="filter1">
		<h3>Duration (in days)</h3>
		<div class="filrter-choose">
		<?php 
		for($i=2;$i<=10;$i++){
		?>
			<label class="container"><?=$i?> days
				<input type="checkbox" name="days_number[]" value="<?=$i?>">
				<span class="checkmark"></span>
			</label>
		<?php } ?>
		</div>
		</div>
	</div>	
<!------thierd--->
	<div class="filter-start3">
		<div class="filter1">
		<h3>Budget Per Person (in Rs.)</h3>
		<div class="filrter-choose">
			<label class="container">Less Than 5000
				<input type="checkbox" name="price_range[]" value="1-5000">
				<span class="checkmark"></span>
			</label>
			<label class="container">5001 to 10000
				<input type="checkbox" name="price_range[]" value="5001-10000">
				<span class="checkmark"></span>
			</label>
			<label class="container">10001 to 15000
				<input type="checkbox" name="price_range[]" value="10001-15000">
				<span class="checkmark"></span>
			</label>
			<label class="container">More Than  15000
				<input type="checkbox" name="price_range[]" value="15000-50000">
				<span class="checkmark"></span>
			</label>
		</div>
		</div>
	</div>	
<!---fouur---->
	<div class="filter-start">
		<div class="filter1">
		<h3>Activities</h3>
		<div class="filrter-choose">
			<?php
				$act=1;			
				$activities = get_terms('tags');
				foreach( $activities as $activity ) { ?>
				<label class="container"> <?=$activity->name?>
					<input type="checkbox" name="activities[]" id="activities-<?=$act?>" value="<?=$activity->term_id?>">
					<span class="checkmark"></span>
				</label>
				<?php $act++;
				} 
			?>


		</div>
		</div>
	</div>
	<div class="col-sm-12 text-center center-block">
		<!--<input type="submit" name="filter" class="btn btn-primary" id="filter" value="Filter">-->
		<button type="button" class="btn btn-primary" id="filter2">Filter</button>
	</div>
</form>
</div>
</aside>