
<?php $__env->startSection('title','Transaction Recepit'); ?>
<?php $__env->startSection('content'); ?>

 <div class="ticket">

            <img src="<?php echo e(url('assets/images/receiptlogo.jpg')); ?>" alt="Logo"/>
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p>
            <p class="centered">Transaction #:
                <span id="transid">
                    <?php echo e(Request::get('trans_no')); ?>

                </span><br>
            Date:<?php echo e(Carbon\Carbon::now()->format('d M Y H:m:i')); ?></p>
            <table id="recepittable">
                <thead>
                    <tr>
                        <th class="description">Item</th>
                        <th class="quantity">Qty.</th>
                        <th class="price">@ Price</th>
                        <th class="price">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td class="description"><?php echo e($data->productname); ?></td>
                        <td class="quantity"><?php echo e($data->qty_sold); ?></td>
                        <td class="price"><?php echo e($data->unit_price); ?></td>
                        <td class="price"><?php echo e($data->unit_price * $data->qty_sold); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </tbody>
            </table>
            <p class="centered"> You were served by: <?php echo e(Auth::user()->name); ?></p>
            <p class="centered">Thanks for your purchase!</p>
        </div>



<?php $__env->stopSection(); ?>
<script type="text/javascript">
    window.print();
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pointofsale\resources\views/sales/posreceipt.blade.php ENDPATH**/ ?>