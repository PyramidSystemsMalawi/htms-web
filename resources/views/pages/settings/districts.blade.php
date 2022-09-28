@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-12 text-right">
        <button class="ui button icon positive">Add New District</button>

    </div>
    <div class="col-12">
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>District Name</th>
                <th>Code</th>
                <th></th>
            </thead>
            <tbody>

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
@endsection
