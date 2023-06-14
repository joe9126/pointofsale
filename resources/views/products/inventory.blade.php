@extends('user.maindashboard')
@section('title','Product Inventory')
@section('tabcontent')
<div class="container-fluid bg-light">
	<a href="inventory" style="text-align: center;"><h2>Product Inventory&nbsp;&nbsp;<i class="fa fa-database" aria-hidden="true"></i></h2></a>

	<div class="row btnaction" style="margin-bottom: 10px;">
		<div class="col-md-3 col-lg-3">
			<button class="btn btn-small btn-outline-secondary" id="registeritembtn">
				<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Register Item
			</button>
		</div>
		<div class="col-md-3 col-lg-3"></div>
		<div class="col-md-3 col-lg-3"></div>
		<div class="col-md-3 col-lg-3"></div>
	</div>

	<div class="tablecard">
	<div class="row">
		  <!-- Product inventory -->
		  <div class="col-md-12 col-lg-12">
		  	 
                        <div class="userstablecontainer">
                            <table class="table table-striped display nowrap" id="inventorytable">
                                <thead>
                                <tr>
                                <th></th><th>No</th><th>Product ID</th><th>Name</th><th>Category</th><th>Stock Qty</th><th>Last Updated</th><th>Updated By</th>
                               
                                </tr>
                                </thead>
                                <tbody id="opportunities_crud">
                                </tbody>
                                <tfoot></tfoot>
                            </table>

                        </div>
 	  	
		  </div>
                   
	</div>
</div>
</div>
@endsection

<div class="overlay"></div>
<div class="tabcontent addproductstock" style="display: none;width: 450px; height: auto;">
	<div id="loginmsg" class="alert alert-danger alert-block statusmsg"  >
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> <span id="errormsq"></span></strong>
     </div>
     
	 <h3>Add Stock</h3>
	 <div class="divider"></div>

	<form id="addstockform"  method="post" action="">
	 	<div class="row formrow">
	 		<div class="col-lg-5" style="text-align: left;">
	 			<label>Product ID</label>
	 		</div>
	 	<div class="col-lg-7">
	 		<input type="text" class="form-control" name="productid" id="productid" readonly="true" required data-parsley-required-message="Product ID is required!">
	 	</div>
	 </div>

	  <div class="row formrow">
	 	<div class="col-lg-5" style="text-align: left;">
	 		<label>Name</label>
	 	</div>
	 	<div class="col-lg-7" >
	 		<input type="text" class="form-control" name="productname" id="productname" readonly="true">
	 	</div>
	 </div>

	 <div class="row formrow">
	 	<div class="col-lg-5" style="text-align: left;">
	 		<label>Stock Qty</label>
	 	</div>
	 	<div class="col-lg-7">
	 		<input type="text" class="form-control" autofocus name="stockqty" id="stockqty" required data-parsley-trigger="keyup" data-parsley-required-message="Stock quantity is required!">
	 	</div>
	  </div>

	   <div class="row formrow">
	 	<div class="col-lg-5" style="text-align: left;">
	 		<label>Supplier</label>
	 	</div>
	 	<div class="col-lg-7">
	 		<select class="form-control" name="supplier" id="supplier" required data-parsley-trigger="keyup" data-parsley-required-message="Supplier is required!">
	 			<option>Select Supplier</option>
	 			<option value="EABL">EABL</option>
	 		</select>
	 	</div>
	 </div>

	 <div class="row formrow">
	 	<div class="col-lg-5">
	 		<label>Payment Status</label>
	 	</div>
	 	<div class="col-lg-7">
	 		<select class="form-control" name="paymenttype" id="paymenttype" required data-parsley-trigger="keyup" data-parsley-required-message="Supplier is required!">
	 			<option>Select Payment Type</option>
	 			<option value="Cash">Cash</option>
	 			<option value="Credit">Credit</option>
	 		</select>
	 	</div>
	 	 </div>

	 <div class="row formrow"> 
	 	<div class="col-lg-5">
	 		<label>Supplier Comment</label>
	 	</div>
	 	<div class="col-lg-7">
	 		<textarea class="form-control" type="text" rows="350" name="suppliercomment" id="suppliercomment"></textarea>
	 	</div>
	</div>

	 <div class="row formrow">
	 	<div class="col-lg-6"></div>
	 	<div class="col-lg-6">
	 		<button  class="btn btn-sm btn-danger" id="cancelbtn">
	 			<i class="fa fa-ban" aria-hidden="true" style="font-size:12px;"></i>&nbsp; Cancel
	 		</button>
	 		<button type="submit" class="btn btn-sm btn-primary" id="addstockbtn">
	 			<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp; Save
	 		</button>
	 		
	 	</div>
	  </div>
	 	
	 </form>


</div>