<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="css/profilePage1.css">
<div class="container emp-profile">
            <form >
                <div class="row">
                    <div class="col-4">
                        <div class="profile-img">
                            <img src="<?php echo e(config('app.url')); ?>/victims/<?php echo e($victimdetails->image_url); ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                         <div class="profile-work">
                            <p>OTHER DETAILS</p>
                            <a href="">Case Ref: <?php echo e($victimdetails->case_reference); ?></a><br/>
                            <a href="">Health Status: <?php echo e($victimdetails->health_status); ?></a><br/>
                            <a href="">Date Registered: <?php echo e($victimdetails->created_at); ?></a>

                        </div>
                    </div>
                    <div class="col-8">
                        <div class="row">

                    <div class="col-md-10">
                        <div class="profile-head">
                                    <h5 >
                                        <?php echo e($victimdetails->name); ?>

                                    </h5>
                                    <h6 class="my-0">
                                        Age : <?php echo e($victimdetails->age); ?>

                                    </h6>
                                    <p class="proile-rating my-0">TIP Rating : <span>0/100</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TIP Interview</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="reset" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                        <hr>
                        <img src="img/logo.png" alt="">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Associated Case:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($case->case_name); ?> ( <?php echo e($case->reference); ?> )</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->id); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->name); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->gender); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->phone_number); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Residency Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->residency_address); ?></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <label>Home Address</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo e($victimdetails->home_address); ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">

                                        <?php if(count($interviews) > 0): ?>
                                           <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="col-12">
                                                        <h5 class="my-0">Question 1: <label for=""><?php echo e($interview['question']); ?></label></h5>
                                                        <p class="my-0 text-secondary">Answered : <span class="text-info">
                                                            <?php if($interview['responseType'] == 'boolean'): ?>
                                                                <?php if($interview['actualResponse'] == 'true'): ?>
                                                                    YES
                                                                <?php else: ?>
                                                                    NO
                                                                <?php endif; ?>
                                                            <?php else: ?>
                                                                <?php echo e($interview['actualResponse']); ?>

                                                            <?php endif; ?>
                                                            </span></p>
                                                    <hr>
                                                </div>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                    </div>
                </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\htms-beta\resources\views/pages/victims/view.blade.php ENDPATH**/ ?>