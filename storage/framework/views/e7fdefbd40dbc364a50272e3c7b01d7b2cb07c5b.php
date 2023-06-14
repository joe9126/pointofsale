

<?php $__env->startSection('title','Product Register'); ?>
<?php $__env->startSection('tabcontent'); ?>

<div class="container-fluid bg-light" >
	<a href="products" style="text-align: center;"><h2>Product Register&nbsp;&nbsp;<i class="fa fa-list-ol" aria-hidden="true"></i></h2></a>
	
	<div class="row btnaction" style="margin-bottom:10px; width:100%;">
		<div class="col-lg-4">
			<button class="btn btn-small btn-outline-secondary" id="addproducts">
				<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;New Product
			</button>

			<a href="inventory"><button class="btn btn-small btn-outline-secondary" id="addproducts">
				<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Stock
			</button></a>

    	</div>
    	<div class="col-lg-4"></div>
    	<div class="col-lg-4"></div>
	</div>
<div class="tablecard">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			
			<div class="userstablecontainer">
  						<table class="table table-hover table-lg table-striped" id="productstable">
  						  <thead>
  						      <tr>
      							 <th scope="col"> </th>
      							   <th scope="col">No</th>
      							    <th scope="col">Item ID</th>
      							   <th scope="col">Item Name</th>
      							   <th scope="col">Category</th>
      							   <th scope="col">Cost price</th>
      							   <th scope="col">Sale Price</th>
      							   <th scope="col">Stock Alarm Notice</th>
      							    <th scope="col">Status</th>
      							   <th scope="col">Added By</th>
      							</tr>
  						   </thead>
  							<tbody>					
   
  							</tbody>
						</table>

		</div>
		</div>
 	</div>
	</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<div class="overlay"></div>

<div class="container newproductcontainer card draggable" style="display: none;">
	<div id="loginmsg" class="alert alert-danger alert-block statusmsg"  >
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> <span id="errormsq"></span></strong>
     </div>

		 <h3 id="cardtitle">Register Item</h3>
		 	<div class="divider"></div>
		   <div class="card-body">
		   	<form id="newitemform"action="" method="Post">
		   			 <div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel" for="productid">ID</label></div>
		   				<div class="col-sm-7">
		   					<input class="form-control" id="productid" name="productid"  readonly value="Auto"  />
		   				</div>
		   			</div>
		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel" for="productname">Name</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="productname" name="productname"  placeholder="Brand name"
		   				 data-parsley-trigger="keyup" data-parsley-required-message="Name is required!"/></div>
		   			</div>
		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="category">Category</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="category" name="category"  placeholder="Category eg. Beer, whisky"
		   				 data-parsley-trigger="keyup" data-parsley-required-message="Category is required!"/></div>
		   			</div>
		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="costprice">Cost Price</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="costprice" name="costprice"  placeholder="0.00"
		   					required data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required-message="Cost price required!"/></div>
		   			</div>

		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="saleprice">Sale Price</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="saleprice" name="saleprice"  placeholder="0.00" 
		   					required data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required-message="Sale price required"/></div>
		   			</div>
		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="profit">Profit</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="profit" name="profit"  placeholder="0.00" readonly/></div>
		   			</div>
		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="stockalarm">Stock Alarm</label></div>
		   				<div class="col-sm-7"><input class="form-control" id="stockalarm" name="stockalarm"  placeholder="0.00" 
		   					required data-parsley-type="number" data-parsley-trigger="keyup" data-parsley-required-message="stock alarm quantity required"/></div>
		   			</div>

		   			<div class="row form-row">
		   				<div class="col-sm-5"><label class="formlabel"for="status">Status</label></div>
		   				<div class="col-sm-7">
		   					<select class="form-control" id="status" name="status">
		   						<option value="1">Active</option>
		   						<option value="0">Lock</option>
		   					</select>
		   				</div>
		   			</div>

		   			<div class="row form-row">
		   				<div class="col-md-6"></div>
		   				<div class="col-md-6">
		   					<button class="btn btn-danger btn-sm" id="Cancelproductbtn">
		   						<i class="fa fa-ban" aria-hidden="true" style="font-size:12px;"></i>&nbsp;Cancel
		   					</button>
		   					<button id="saveitemBtn" class="btn btn-primary btn-sm" type="submit">
		   						<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp; Save
		   					</button>
		   					
		   				</div>
		   				
					</div>
		   		
		    </form>
		</div>
	
	</div>
<?php echo $__env->make('user.maindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/products/products.blade.php ENDPATH**/ ?>