
<?php $__env->startSection('title','Point of Sale'); ?>
<?php $__env->startSection('tabcontent'); ?>
<div class="container-fluid bg-light" >
	<a href="products" style="text-align: center;"><h2>Cashier&nbsp;&nbsp;<i class="fa fa-calculator" aria-hidden="true"></i></h2></a>

	<div id="cashiermsg" class="alert alert-danger alert-block statusmsg" style="display: none;"  >
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> <span id="errormsq"></span></strong>
     </div>

<div class="row formrow">
	<div class="col-md-12">
		<input type="text" class="form-control" name="searchbox" id="searchbox" placeholder="Search Product" autofocus autocomplete="off">
		<span class="fa fa-search searchicon"></span>
	</div>
</div>

<div class="row formrow">
	<div class="col-md-12">
		<div class="card salelistcard">
			<table class="table table-striped" id="salelist" name="salelist">
				<thead>
					<tr>
						<th class="td-remove"></th><th class="td-num">#</th><th class="td-code">Item Code</th><th>Item Name</th><th>Unit Price</th><th>Qty</th><th>Total</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>

<div class="row formrow">
	<div class="col-md-2">
		<h1><strong>Total Sale</strong></h1>
	</div>
	<div class="col-md-10">
		<input class="form-control" type="text" name="totalsale" id="totalsale" placeholder="0.00" readonly />
	</div>
</div>

<div class="row formrow">
	<div class="col-md-2">
		<h1><strong>Payment</strong></h1>
	</div>
	<div class="col-md-5">
		<button class="btn btn-primary btn-lg btn-block active paymentbtn" id="cashbtn" name="cashbtn" style="font-size: 40px;">
			Cash&nbsp;&nbsp;<i class="fa fa-money" aria-hidden="true" style="font-size: 60px;"></i>
		</button>
	</div>
	<div class="col-md-5">
		<button class="btn btn-light btn-lg btn-block paymentbtn" id="mpesabtn" alt="MPESA" style="font-size: 40px;">
			
		</button>
	</div>
</div>

</div>
<?php $__env->stopSection(); ?>

<div class="overlay"></div>

<div class="container cashsale card draggable menucontainer" style="display: none;" id="cashsale">
	<div id="transactionmsg" class="alert alert-danger alert-block statusmsg" style="display: none;"  >
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> <span id="errormsg"></span></strong>
     </div>

	<h3>Cash Transaction<h3>

	<form id="transcashform" method="post" action="">
		<div class="row formrow">
			<div class="col-md-4 col-lg-4">
				<label class="execlabel">TOTAL SALE</label>
			</div>
			<div class="col-md-8 col-lg-8">
				<input type="text" class="form-control" name="totalsaletext" id="totalsaletext" readonly />
			</div>
		</div>
		<div class="row formrow">
			<div class="col-md-4 col-lg-4">
				<label class="execlabel">CASH</label>
			</div>
			<div class="col-md-8 col-lg-8">
				<input type="text" class="form-control" name="cashtext" id="cashtext" placeholder="0.00" autocomplete="off"    data-parsley-trigger="keyup" data-parsley-required-message="Cash amount required" required data-parsley-type="number" />
			</div>
		</div>

		<div class="row formrow">
			<div class="col-md-4 col-lg-4">
				<label class="execlabel" >CHANGE</label>
			</div>
			<div class="col-md-8 col-lg-8">
				<input type="text" class="form-control" name="changetext" id="changetext" placeholder="0.00" readonly />
			</div>
		</div>
		<div class="row formrow">
			<div class="col-lg-12">
				<button class="btn btn-block btn-lg btn-primary" id="executesalebtn" name="executesalebtn">
					Transact Sale&nbsp;&nbsp;<i class="fa fa-floppy-o" aria-hidden="true"></i>
				</button>
			</div>
		</div>

	</form>

</div>
<?php echo $__env->make('user.maindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/sales/pointofsale.blade.php ENDPATH**/ ?>