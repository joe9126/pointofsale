@extends('user.maindashboard')
@section('title','Sales Reports')
@section('tabcontent')
<div class="container-fluid bg-light" >
	<a href="salesreports" style="text-align: center;">
		<h2>Sales Reports &nbsp;&nbsp;<i class="fa fa-file-excel-o" aria-hidden="true"></i></h2>
	</a>

	<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'rawsalesdata')" id="defaultOpen">General Sales</button>
  <button class="tablinks" onclick="openCity(event, 'productcomparison')">Product Performance</button>
  <button class="tablinks" onclick="openCity(event, 'salesrevenue')">Sales Revenue</button>
</div>


<!-- Tab content -->

<div id="rawsalesdata" class="tabcontents">
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

	<div class="row contentrow">
		<div class="col-md-12">
			<table class="table table-striped table-hover table-lg" id="generalsalestable">
				<thead>
					<tr>
						<th>No</th>
						<th>Transaction #</th>
						<th>Date</th>
						<th>Pay Mode</th>
						<th>Product Name</th>
						<th>Qty Sold</th>
						<th>Unit Price</th>
						<th>Gross Total</th>
						<th>Discount</th>
						<th>VAT</th>
						<th>Net Total</th>
						<th>Cashier</th>
					</tr>
				</thead>
				<tbody></tbody>
				<tfoot></tfoot>
			</table>
		</div>
	</div>
</div>
</div>


<div id="productcomparison" class="tabcontents">
	<p>comparison data</p>
</div>
<div id="salesrevenue" class="tabcontents">
	<p>revenue data</p>
</div>



@endsection