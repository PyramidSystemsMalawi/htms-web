<?php $__env->startSection('content'); ?>

<div class="row card">
    <div class="col-12 text-right py-2 card-header">
        <button data-toggle="modal" data-target="#add"
        class="btn btn-success btn-md">Create New Organisation</button>
    </div>
    <div class="col-12 card-body">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead class="">
                <th>#</th>
                <th>Organisation Name</th>
                <th>Physical Address</th>
                <th>Email Address</th>
                <th>Phone</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                <?php if(count($organisations) > 0): ?>
                    <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($organisation->id); ?></td>
                            <td><?php echo e($organisation->organisation_name); ?></td>
                            <td><?php echo e($organisation->physical_address); ?></td>
                            <td><?php echo e($organisation->email); ?></td>
                            <td><?php echo e($organisation->phone); ?></td>
                            <td><?php echo e($organisation->status); ?></td>
                            <th>
                                <button class="btn btn-sm btn-primary">View</button>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add">
                        <div class="modal-dialog modal-lg">
                            <form action="/createOrganisation" method="POST" >
                            <?php echo csrf_field(); ?>
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Organisation</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="form-row">
                                      <div class="col-12 form-group">
                                          <label for="">Organisation Name</label>
                                          <input type="text" name="organisation_name" placeholder="Enter legal name" name="name"
                                          class="form-control" required>
                                      </div>
                                      <div class="form-group col-12">
                                          <label for="">Physical Address (HeadQuarters)</label>
                                          <input type="text" name="physical_address" placeholder="e.g Address Line 1, Street Number, Town, City"
                                          class="form-control" required>
                                      </div>
                                      <div class="col-12 form-group">
                                        <label for="">Name Of Contact Person</label>
                                        <input type="text" name='contact_person' placeholder="é.g John Smith" class="form-control" required/>
                                      </div>
                                      <div class="col-6 form-group">
                                          <label for="">Email Of Contact Person</label>
                                          <input type="email" name="email" placeholder="e.g manager@mps.mw" class="form-control" required>
                                      </div>
                                      <div class="col-6 form-group">
                                          <label for="">Contact Phone</label>
                                          <input type="tel" name="phone" placeholder="01xxx-xxx-xx" class="form-control" required>
                                      </div>
                                      <div class="col-12 form-group">
                                          <label for="">Brief Bio</label>
                                          <textarea name="description" placeholder="Write description here..." cols="30" rows="4" class="form-control"></textarea>
                                      </div>
                                  </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit"  class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                      </div>

<script>
    let table
    $(()=>{
        table = $('table.table-sm').DataTable({
            "pageLength":5,
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        })
    })
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/linnos/Projects/Private/Security/Source/htms-web/resources/views/pages/organisations/list.blade.php ENDPATH**/ ?>