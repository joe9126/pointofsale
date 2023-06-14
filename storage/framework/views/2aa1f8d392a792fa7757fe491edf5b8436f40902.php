
<?php $__env->startSection('title',"Dashboard"); ?>
<?php $__env->startSection('content'); ?>

	<div class="container-fluid">
		<div class="row" style="margin-top:5px;">
			<div class="col-lg-2 logospan" style="border-right:1px solid  #dddddf; background-image:url('<?php echo e(asset('assets/images/primepos.png')); ?>');
      background-size:180px 80px; background-position:center center;">
				
			</div>
			<div class="col-lg-10 searchbar" style="border-top:1px solid grey; box-shadow:  0 5px 15px -7px gray; height:50px;">
				<input class="search-input" type="text" placeholder="Search here" style="background:url('<?php echo e(url('assets/images/search_icn.png')); ?>'); background-size: 20px 20px;
            		 background-position: 5px 5px;  text-indent: 30px; background-repeat: no-repeat;">
				<div class="userprofileicon" style="background-image:url('<?php echo e(asset('assets/images/usericon.jpeg')); ?>')" ></div>
       
				<div class="bell"><i class="fa fa-bell-o" aria-hidden="true"></i> </div>
         		<div class="userprofileaction">
          			<a href="logout" class="useraction"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a><br>
          			<a href="#" class="useraction"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
        		</div>
			</div>
		</div>

		<div class="row bg-light" >
			<div class="col-lg-2 sidemenubardiv" >

		 		<div class="vertical-menu tab" style="background-color: inherit;border:none;">
  					<a href="dashboard" class="tablinks">
  					   <i class="fa fa-tachometer" aria-hidden="true"></i> &nbsp;&nbsp;<strong>Dashboard</strong>
  					</a>
            		<a href="pointofsale" class="menuitem tablinks" >
               			 <i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Point of Sale</strong>
            		</a>
  					<a href="#" id="productlink" class="menuitem tablinks" >
  							<i class="fa fa-archive" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Products</strong>
  					</a>
  					  					
  					<a href="salesanalysis" class="menuitem tablinks" >
  						<i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;&nbsp;<strong>Sales Analysis</strong>
  					</a>
  					<a href="salesreports" class="menuitem tablinks" >
  						<i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp;&nbsp;<strong>Sales Reports</strong>
  					</a>
  					<a href="#" class="menuitem tablinks" >
  						<i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp;&nbsp;<strong>Purchases</strong>
  					</a>
            		<a href="users" class="menuitem tablinks" >
               			<i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Users</strong>
            		</a>
  					<a href="#" class="menuitem tablinks" >
  						<i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;<strong>Settings</strong>
  					</a>
				</div>

				<div class="divider"></div>
				<div class="row">
					<div class="col-lg-6"> <span class="guidetext">Help Center</span></div>
					<div class="col-lg-6">
						<button class="btn btn-light" id="contactus">Contact Us</button>
					</div>
				</div>
				<div class="row">
					<div class="guideimage" style="background-image:url('<?php echo e(asset('assets/images/guideimage.jpeg')); ?>')"></div>
				</div>
			 </div>

			<div class="col-lg-10 bg-light">
            	<?php echo $__env->yieldContent('tabcontent'); ?>
	
			</div>
	</div>

  <?php $__env->stopSection(); ?>


<div class="overlay"></div>

<div class="menucontainer" style="display: none;">
	<fieldset class="border p-2">
		<legend class="w-auto"><i class="fa fa-info-circle" aria-hidden="true"></i> Select Function</legend>
		<a href="products" id="productregisterlink"><button class="btn btn-info btn-lg"><i class="fa fa-file-text"  style="font-size:12px" aria-hidden="true"></i> Product Register</button></a>
	<a href="#" id="productinventorylink"><button class="btn btn-info btn-lg"><i class="fa fa-database" style="font-size:12px" aria-hidden="true"></i> Product Inventory</button></a>
	</fieldset>
	
</div>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/user/maindashboard.blade.php ENDPATH**/ ?>