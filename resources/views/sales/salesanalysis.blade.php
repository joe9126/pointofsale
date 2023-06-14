@extends('user.maindashboard')
@section('title','Sales Analysis')
@section('tabcontent')
<div class="container-fluid bg-light" >
	<a href="products" style="text-align: center;"><h2>Sales Analysis &nbsp;&nbsp;<i class="fa fa-bar-chart" aria-hidden="true"></i></h2></a>

	<div class="row">
		<div class="col-md-5">
			<div class="btnaction">
				<button class="btn btn-outline-secondary btn-lg reportactionbtn" id="todaygrossBtn">Today</button>
				<button class="btn btn-outline-secondary btn-lg reportactionbtn">Yesterday</button>
				<button class="btn btn-outline-secondary btn-lg reportactionbtn">This Week</button>
				<button class="btn btn-outline-secondary btn-lg reportactionbtn" id="monthlygrossbtn">This Month</button>
			</div>
			
		</div>
		<div class="col-md-4">
			<div class="row btnaction">
				<div class="col-md-6">
					<div class="input-group date" data-provide="datepicker">
    					<input type="text" class="form-control" data-provide="datepicker-inline" placeholder="From">
    					<div class="input-group-addon">
        					<i class="fa fa-calendar"></i>
    					</div>
					</div> 
				</div>
				<div class="col-md-6">
					<div class="input-group date" data-provide="datepicker" >
    					<input type="text" class="form-control" placeholder="To">
    					<div class="input-group-addon">
        					<i class="fa fa-calendar spanicon"></i>
    					</div>
					</div>
				</div>
			</div>
			 
			
		</div>
		<div class="col-md-3">
			 <div class="btnaction">
			 	<select class="form-control" id="employees" class="select">
      					<option value=""> All Employees</option>
      					<option>2</option>
      					<option>3</option>
      
    			</select>
			 </div>
		</div>
		 		 
	</div>

	<div class="card formrow">
		<div class="row formrow">
			<div class="col-md-3 header">
				<h3>Gross Sales</h3>
				<strong><h4 id="gross_sale"></h4></strong>
			</div>
			<div class="col-md-3 header">
				<h3>Discounts</h3>
				<h4 id="annual_discs"></h4>
			</div>
			<div class="col-md-3 header">
				<h3>Net Sales</h3>
				<h4 id="net_sale"></h4>
			</div>
			<div class="col-md-3">
				<h3>Gross Profit</h3>
				<h4 id="gross_profit"></h4>
			</div>
		</div>

		<div class="row formrow">
			<div class="col-md-12">
				
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
			</div>
			
		</div>
	</div>

</div>
@endsection