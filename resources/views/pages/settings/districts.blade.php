@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-4">
        <div class="h3 p-2 text-white bg-secondary">New Entry</div>
        <hr>
        <form action="/districts" method="POST" class="form-row">
            @csrf
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
                @foreach($districts AS $district)
                    <tr>
                        <td>{{$district->id}}</td>
                        <td>{{$district->district_name}}</td>
                        <td>{{$district->district_code}}</td>
                    </tr>
                @endforeach
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
