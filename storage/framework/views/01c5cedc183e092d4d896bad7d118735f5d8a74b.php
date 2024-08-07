<?php $__env->startSection('content'); ?>
<script>

    let activeCase

    let setActiveCase = (reference)=>{
        activeCase = reference;
    }

    let DeleteCase = async (reference)=>{
        let prompt = confirm(`Are you sure you want to delete case "${reference}" and all its contents?`);
        if(prompt){
            location.href = 'cases/delete?case_reference='+reference;
        }
    }

</script>
<div class="row">
    <div class="col-3">
        <div id="previewImage"></div>
    </div>
    <div class="col-6">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <th><i class="fa fa-edit"></i> Case Title :</th>
                    <th><?php echo e($casedetails->case_name); ?></th>
                </tr>
                <tr>
                    <th>Status :</th>
                    <th><span class="text-success"><?php echo e($casedetails->status); ?></span></th>
                </tr>
                <tr>
                    <th><i class="fa fa-step"></i> Stage :</th>
                    <th><?php echo e($casedetails->stage); ?></th>
                </tr>
                <tr>
                    <th>Qualification Index :</th>
                    <th><span class="text-danger">0%</span></th>
                </tr>
                <tr>
                    <th><i class="fa fa-clock"></i> Registered On :</th>
                    <th><?php echo e($casedetails->created_at); ?></th>
                </tr>
                <tr>
                    <th><i class="fa fa-map-marker-alt"></i> Locale :</th>
                    <th><?php echo e(ucfirst($casedetails->village)); ?> ,<?php echo e($casedetails->traditional_authority); ?>, <?php echo e($casedetails->district); ?></th>
                </tr>
                <tr>
                    <th><i class="fa fa-user"></i> Officer :</th>
                    <th><?php echo e($casedetails->firstname); ?> <?php echo e($casedetails->lastname); ?></th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-3">
        <h3 class="bg-secondary text-white p-1">Actions</h3>
        <hr>
        <button type="button" data-toggle="modal" data-target="#InterTransferModal" onclick="setActiveCase('<?php echo e($casedetails->reference); ?>')" class="btn btn-block btn-primary flat">
            Transfer To Another Organisation
        </button>
         <button type="button" data-toggle ="modal" data-target="#exhibitModal" class="btn btn-block btn-warning flat">
            View Exhibit Gallery
        </button>
        <hr>
         <button type="button" onclick="DeleteCase('<?php echo e($casedetails->reference); ?>')" class="btn btn-block btn-danger flat">
            Delete Case File <i class="fa fa-trash"></i>
        </button>
    </div>
    <div class="col-12"> <br> </div>
    <div class="col-12">
        <table class="table table-sm table-bordered table-striped">
            <tr><th>Number Of Victims : </th> <th> <a href="#"><?php echo e($casedetails->victims); ?></a> </th> </tr>
            <tr><th>Number Of Suspects : </th> <th> <a href="#"><?php echo e($casedetails->suspects); ?></a> </th> </tr>
            <tr><th>Number Of Officer : </th> <th> <a href="#"><?php echo e($casedetails->officers); ?></a> </th> </tr>

        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exhibitModal" tabindex="-1" role="dialog" aria-labelledby="exhibitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">TIP Exhibit Gallery : Case Ref (<?php echo e($casedetails->reference); ?>)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <?php if(count($exhibits) > 0): ?>
                    <?php $__currentLoopData = $exhibits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exhibit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-4">
                            <img class="border border-secondary image_canvas img img-thumbnail"
                              style="width:100%;height:27vh;" src="<?php echo e(config('app.url')); ?>/uploads/exhibit/<?php echo e($exhibit->url); ?>">

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  

<div class="modal" id="InterTransferModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="cases/transfer" method="POST" class="modal-content">
    <?php echo csrf_field(); ?>
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">Inter-Organisation Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row" id="InterTransferForm">
            <input type="text" hidden name="transfer_from" value="<?php echo e($casedetails->organisation); ?>">

            <input type="text" hidden name="case_reference" value="<?php echo e($casedetails->reference); ?>">
            <div class="form-group col-12">
                <label for="">Transfer To :</label>
                <select name="transfer_to" id="transfer_to" class="form-control">
                    <option value="">Select Organisation</option>
                    <?php if(count($organisations) > 0): ?>
                        <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($org->id); ?>"><?php echo e($org->organisation_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="">Recepient Officer :</label>
                <select name="recepient_officer" id="recepient_officer"  class="form-control">


                </select>
            </div>
            

            <div class="form-group col-12">
                <label for="">Transfer Reason :</label>
                <textarea name="transfer_reason" id="transfer_reason" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Process Transfer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>

<style>
    #previewImage {
        width:100%;
        height:35vh;
        background-color:#000;
        background-repeat: no-repeat;
        background-size: cover;
        background-clip: content-box;
        background-image:url('../../../../public/img/logo2.jpg');
    }
</style>

<script>

    let baseURL = window.location.origin;
   // alert(baseURL)
    $(()=>{
        $("#transfer_to").change(async function(){
           // alert('Hi')
            try{
                let res = await fetch(baseURL+"/api/v1/organisations/officers?org_id="+this.value)
                res = await res.json()
                if(res.status == 'success'){
                    let DOM = res.data.map(officer=>{
                        return `<option value="${officer.email}">${officer.firstname} ${officer.lastname}</option>`
                    }).join(',')
                    DOM = "<option value=''>Select Officer</option>"+DOM
                    $("#recepient_officer").html(DOM)
                }
            }catch(err){
                console.log(err)
            }
        })
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/linnos/Projects/Private/Security/Source/htms-web/resources/views/pages/cases/view.blade.php ENDPATH**/ ?>