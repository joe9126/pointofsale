
<?php $__env->startSection('title','User Accounts'); ?>
<?php $__env->startSection('tabcontent'); ?>

<div class="container-fluid bg-light" >
	<a href="products" style="text-align: center;">
		<h2>Users &nbsp;&nbsp;<i class="fa fa-users" aria-hidden="true"></i></h2>
	</a>

	<div class="row ">
		<div class="col-md-12">
			
              <div class="row contentrow">
                <div class="col-lg-6">
                  	<button class="btn btn-lg btn-outline-secondary" id="adduserbtn">
                  		<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add User 
                  	</button>

                  	<button class="btn btn-lg btn-outline-secondary" id="manageuserbtn">
                  		<i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Manage User 
                  	</button>
                </div>
                <div class="col-lg-6">
                  <div class="userstatus">
                     <span><i class="fa fa-circle" aria-hidden="true" style="color: green;"></i>Active</span>&nbsp; &nbsp;&nbsp;
                     <span><i class="fa fa-circle" aria-hidden="true" style="color: red;"></i>Inactive</span>
                  </div>                 
                </div>
              </div>

            <div class="row contentrow">
            <div class="tablecard">
              <table class="table table-hover table-striped table-sm" id="userstable" name="userstable">
                <thead>
                    <tr>
                       <th >No</th>
                       <th >User ID No </th>
                       <th >Name </th>
                       <th >Email</th>
                       <th >Phone</th>
                       <th >Role</th>
                       <th >Status </th>
                       <th > </th>
                    </tr>
                 </thead>
                <tbody></tbody>
              </table>
              </div>
              </div>  
            
		</div>
	</div>
</div>

 

<?php $__env->stopSection(); ?>

<div class="overlay"></div>
<div class="container newusercontainer card draggable" style="display: none;">
	<div id="loginmsg" class="alert alert-danger alert-block statusmsg"  >
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong> <span id="errormsq"></span></strong>
     </div>

		 <h3 id="cardtitle">New User</h3>
		 <div class="divider"></div>
		 <div class="card-body">
		 	<form id="userform" action="" method="post">
		 		<div class="row formrow">
		 			<div class="col-md-4"><label>ID No</label></div>
		 			<div class="col-md-8">
		 				<input type="text" class="form-control" name="id" id="id" required 
		 					data-parsley-trigger="keyup" data-parsley-required-message="ID number is required!"  value="Auto" readonly/>
		 			</div>
		 		</div>
		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Full Name</label></div>
		 			<div class="col-md-8">
		 				<input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required 
		 					data-parsley-trigger="keyup" data-parsley-required-message="Name is required!">
		 			</div>
		 		</div>
		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Phone No</label></div>
		 			<div class="col-md-8">
		 				<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required 
		 					data-parsley-trigger="keyup" data-parsley-type='number' data-parsley-required-message="Name is required!">
		 			</div>
		 		</div>
		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Email</label></div>
		 			<div class="col-md-8">
		 				<input type="text" class="form-control" name="email" id="email" placeholder="Email Address" required 
		 					data-parsley-trigger="keyup" data-parsley-type='email' data-parsley-required-message="Name is required!">
		 			</div>
		 		</div>
		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Password</label></div>
		 			<div class="col-md-8">
		 				<input type="password" class="form-control" name="password" id="password" placeholder="Password" required 
		 					data-parsley-trigger="keyup" data-parsley-required-message="Password is required!">
		 			</div>
		 		</div>
		 		

		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Role</label></div>
		 			<div class="col-md-8">
		 				<select class="form-control" name="role" id="role" required 
		 					data-parsley-required-message="Role is required!">
		 						<option value="User">User</option>
		 						<option value="Admin">Administrator</option>
		 					</select>
		 			</div>
		 		</div>

		 		<div class="row formrow">
		 			<div class="col-md-4"><label>Status</label></div>
		 			<div class="col-md-8">
		 				<select class="form-control" name="status" id="status" required 
		 					data-parsley-required-message="Status is required!">
		 						<option value="1">Active</option>
		 						<option value="0">Locked</option>
		 				</select>
		 			</div>
		 		  </div>
		 		  <div class="row formrow" style="margin-top: 10px;">
		 		  	<div class="col-md-6"></div>
		 		  	<div class="col-md-3">
		 		  		<button type="submit" name="submituserformbtn" id="submituserformbtn" class="btn btn-primary btn-sm">
		 		  			<i class="fa fa-floppy-o" aria-hidden="true"style="font-size:12px;" ></i>&nbsp; Save
		 		  		</button>
		 		  	</div>
		 		  	<div class="col-lg-3">
		 		  		<button type="button" name="canceluserformbtn" id="canceluserformbtn" class="btn btn-danger btn-sm">
		 		  			<i class="fa fa-ban" aria-hidden="true" style="font-size:12px;"></i>&nbsp; Cancel
		 		  		</button>
		 		  	</div>
		 		  </div>
				</form>
		 	</div>
		 
		 </div>
</div>
<?php echo $__env->make('user.maindashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/user/useraccounts.blade.php ENDPATH**/ ?>