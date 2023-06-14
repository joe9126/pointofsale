
<?php $__env->startSection('title',"Login"); ?>
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-md-8 welcomediv">
            <div class="bgdiv"></div>
        </div>
         <div class="col-lg-4 col-md-4">
           <!--<img src="" class="w-75" alt="Logo"> -->
                        <h2 class="guidetext">Point of Sale</h2>
                     

             <div id="loginmsg" class="alert alert-danger alert-block statusmsg"  >
                    <button type="button" class="close" data-dismiss="alert">x</button>
                       <strong> <span id="errormsq"></span></strong>
                </div>
                        
             <div class="card card-login mx-auto text-center bg-light">
                <div class="card-header mx-auto bg-dark">
                    
                        <span class="logo_title mt-5"> Please Login  </span>
                </div>
                <div class="card-body">
                <form action="" method="post" id="loginForm">
                   <!-- for handling multiple exceptions -->
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" id="loginemail" name="email" class="form-control" placeholder="Email address" required data-parsley-type="email" data-parsley-trigger="keyup" data-parsley-required-message="Email is required!"><br/>
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key"></i></span>
                        </div>
                        <input type="password" id="loginpword"name="password" class="form-control" placeholder="Password" required data-parsley-length="[4,16]" data-parsley-trigger="keyup" data-parsley-required-message="Password is required!"><br/>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="btn" id="submit" value="Login" class="btn btn-outline-danger float-right login_btn">
                    </div>

                </form>
            </div>
        </div>

         </div>
    </div>
    
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/auths/login.blade.php ENDPATH**/ ?>