<?php $__env->startSection('content'); ?>
<div class="row card">
    <div class="col-12 text-right py-2 card-header">
        <button data-toggle="modal" data-target="#add" class="btn btn-success btn-md">Create User</button>
    </div>
    <div class="col-12 card-body">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead class="">
                <th>#</th>
                <th>Officer Name</th>
                <th>Organisation</th>
                <th>Role</th>
                <th>Email Address</th>
                <th>Status</th>
                <th></th>
            </thead>
            <tbody>
                <?php if(count($users) > 0): ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td><?php echo e($user->firstname); ?> <?php echo e($user->lastname); ?></td>
                            <td><?php echo e($user->organisation_name); ?></td>
                            <td><?php echo e($user->role_name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->status); ?></td>
                            <th>
                                <button class="btn btn-xs btn-primary">View</button> |
                                <button onclick="DeleteUser('<?php echo e($user->id); ?>')" class="btn btn-xs btn-danger">Delete</button>
                            </th>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="/users/create" method="POST" >
                            <?php echo csrf_field(); ?>
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add User</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="row">
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">First Name</label>
                                  <input type="text" class="form-control" name="firstname" placeholder="Enter User First Name">
                                </div>
                              </div>
                                <div class="col-6">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Last Name</label>
                                  <input type="text" class="form-control" name="lastname" placeholder="Enter User Last Name">
                                </div>
                              </div>
                                <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Email</label>
                                  <input type="text" class="form-control" name="email" placeholder="Enter User Email">
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Organisation</label>
                                      <select class="form-control" name="organisation">
                                        <option selected>Choose Role...</option>

                                          <?php if(count($organisations) > 0): ?>
                                                <?php $__currentLoopData = $organisations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organisation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($organisation->id); ?>"><?php echo e($organisation->organisation_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                      </select>
                                </div>
                              </div>
                                <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Role</label>
                                      <select class="form-control" name="role">
                                        <option selected>Choose Role...</option>

                                          <?php if(count($roles) > 0): ?>
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->role_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endif; ?>
                                      </select>
                                </div>
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

    let DeleteUser = (user_id)=>{
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
                location.href = 'users/'+user_id+'/delete'
            }
          })
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/linnos/Projects/Private/Security/Source/htms-web/resources/views/pages/users/list.blade.php ENDPATH**/ ?>