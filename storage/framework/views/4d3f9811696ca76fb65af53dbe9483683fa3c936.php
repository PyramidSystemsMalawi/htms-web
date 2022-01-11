<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-4">
        <button class="btn btn-md btn-success">Create New Reports</button>
    </div>
    <div class="col-8"></div>
    <div class="col-12"><hr></div>
    <div class="col-12">
        <ul>
            <li><a href="/viewReport?report_type=Cases&rid=">>> Case Reports</a></li>
            <li><a href="/viewReport?report_type=Victims&rid=">>> Victims Reports</a></li>
            <li><a href="/viewReport?report_type=Suspects&rid=">>> Suspects Reports</a></li>
            
            
            <li><a href="/viewReport?report_type=Organisations&rid=">>> Organisations Reports</a></li>


        </ul>
    </div>
</div>

<style>
    ul li{
        list-style: none;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\htms-beta\resources\views/pages/reports/list.blade.php ENDPATH**/ ?>