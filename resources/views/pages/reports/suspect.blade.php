@extends('layouts.main')

@section('content')

<div class="row">
    {{-- <fieldset class="col-6 border border-secondary">
        <legend>Cases Statistics</legend>

    </fieldset> --}}
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
         $.getJSON("{{config('app.url')}}/api/v1/suspects", function(cases) {

            var derivers = $.pivotUtilities.derivers;
            var renderers = $.extend($.pivotUtilities.renderers,
            $.pivotUtilities.gchart_renderers);

            $("#output").pivotUI(cases.data, {
                renderers,
                rows: ["case_reference"],
                cols: ["name",'gender','nationality','last_known_address'],
                aggregatorName: "Integer Sum",
                vals: ["current_status"],
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

@endsection
