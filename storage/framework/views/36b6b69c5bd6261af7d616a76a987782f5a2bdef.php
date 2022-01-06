<?php $__env->startSection('content'); ?>

<div class="row">
    
        <div class="col-1">
        <a href="reports" class="btn btn-primary" style="border-radius:50%;"><i class="fa fa-chevron-left"></i> </a>
    </div>
    <div class="col-11">
        <div id="output" style="overflow:scroll !important;"></div>
    </div>
</div>

<script>

    $(()=>{
        google.load("visualization", "1", {packages:["corechart", "charteditor"]});
         $.getJSON("<?php echo e(config('app.url')); ?>/api/v1/victims", function(cases) {

            var derivers = $.pivotUtilities.derivers;
            var renderers = $.extend($.pivotUtilities.renderers,
            $.pivotUtilities.gchart_renderers);

            $("#output").pivotUI(cases.data, {
                renderers,
                rows: ["case_reference"],
                cols: ["name",'gender','age','residency_address'],
                aggregatorName: "Integer Sum",
                vals: ["case_reference"],
                rendererName: "Heatmap",
                rendererOptions: {
                    gchart: {width: 400, height: 300},
                    table: {
                        clickCallback: function(e, value, filters, pivotData){
                            var names = [];
                            pivotData.forEachMatchingRecord(filters,
                                function(record){ names.push(record.Name); });
                            alert(names.join("\n"));
                        }
                    }
                }
            });
        });

    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\htms-beta\resources\views/pages/reports/victim.blade.php ENDPATH**/ ?>