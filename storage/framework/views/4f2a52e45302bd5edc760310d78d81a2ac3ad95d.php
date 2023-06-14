
<?php $__env->startSection('title','Dashboard'); ?>
<?php $__env->startSection('tabcontent'); ?>

<div class="row">
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> <h5>Annual revenue <?php echo e(date('Y')); ?></h5></div>
			<div id="chartContainer" style="height: 300px; width: 100%; border-radius: 8px;"></div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> 
				<h5>Top 5 Products in Sales Revenue <?php echo e(Carbon\Carbon::now()->format('M Y')); ?></h5>
			</div>
			<p class="charttext">Gross Total Sale for <?php echo e(Carbon\Carbon::now()->format('M Y')); ?>: <span id="monthsales"></span></p>
			<div id="productschartContainer" style="height: 260px; width: 100%;"></div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="revenuediv">
			<div class="card-title"> 
				<h5>Top 5 Products in Quantity <?php echo e(Carbon\Carbon::now()->format('M Y')); ?></h5>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.maindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/user/userdashboard.blade.php ENDPATH**/ ?>