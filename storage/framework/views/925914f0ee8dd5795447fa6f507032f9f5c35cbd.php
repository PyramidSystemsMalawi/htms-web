<?php $__env->startSection('content'); ?>
    <h1 class="bg-danger text-white p-1">Create New User Account </h1>
    <hr>
    <?php echo Form::open(['url' => '/users', 'method' => 'post']); ?>

        <div class="ui form grid">
            <div class="fields two">
                <div class="four wide field">
                    <label for="">First Name</label>
                    <input type="text" name="firstname">
                </div>
            </div>
        </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\htms-beta\resources\views/pages/users/create.blade.php ENDPATH**/ ?>