@extends('user.maindashboard')
@section('title','Dashboard')
@section('tabcontent')

<div class="row">
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> <h5>Annual revenue {{date('Y')}}</h5></div>
			<div id="chartContainer" style="height: 300px; width: 100%; border-radius: 8px;"></div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> 
				<h5>Top 5 Products in Sales Revenue {{Carbon\Carbon::now()->format('M Y')}}</h5>
			</div>
			<p class="charttext">Gross Total Sale for {{Carbon\Carbon::now()->format('M Y')}}: <span id="monthsales"></span></p>
			<div id="productschartContainer" style="height: 260px; width: 100%;"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> 
				<h5>Top 5 Products in Quantity {{Carbon\Carbon::now()->format('M Y')}}</h5>
			</div>
			<div id="qtychartContainer" style="height: 260px; width: 100%;"></div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> </div>
		</div>
	</div>
</div>

@endsection