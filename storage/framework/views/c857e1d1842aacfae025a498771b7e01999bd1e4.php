<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-4">
        <div class="h3 p-2 text-white bg-secondary">New Entry</div>
        <hr>
        <form action="/districts" method="POST" class="form-row">
            <?php echo csrf_field(); ?>
            <div class="col-8 form-group">
                <label for="">District Code :</label>
                <input type="text" onkeyup="this.value = this.value.toUpperCase()" name="district_name" placeholder="e.g LILONGWE" class="form-control" required/>
            </div>
            <div class="col-4 form-group">
                <label for="">Code :</label>
                <input type="text" name="district_code" onkeyup="this.value = this.value.toUpperCase()" placeholder="e.g LL"
                class="form-control" required/>
            </div>
            <div class="col-12">
                 <button class="btn btn-block btn-md btn-success">Add New District</button>
            </div>
        </form>
    </div>
    <div class="col-8">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>District Name</th>
                <th>Code</th>
            </thead>
            <tbody>
                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k3y => $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($district->district_name); ?></td>
                        <td><?php echo e($district->district_code); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/linnos/Projects/Private/Security/Source/htms-web/resources/views/pages/settings/districts.blade.php ENDPATH**/ ?>