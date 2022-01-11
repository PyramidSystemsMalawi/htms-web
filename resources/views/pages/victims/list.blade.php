@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-9">
        <div class="row card">
    <div class="col-12 text-right py-2 card-header bg-secondary">
       <h3 class="text-white">Victims List</h3>
    </div>
    <div class="col-12 card-body">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead class="">
                <th>#CaseRef</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Health Status</th>
                <th></th>
            </thead>
            <tbody>
                @if(count($victims) > 0)
                    @foreach($victims as $victim)
                        <tr>
                            <td>{{$victim->case_reference}}</td>
                            <td>{{$victim->name}}</td>
                            <td>{{$victim->gender}}</td>
                            <td>{{$victim->age}}</td>
                            <td>{{$victim->phone_number}}</td>
                            <td>{{$victim->health_status}}</td>
                            <th>
                                <a href="viewVictim?victim_id={{$victim->id}}" class="btn btn-xs btn-primary">View Profile</a>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

    </div>
    <div class="col-3">
        <h3 class="p-2 bg-secondary text-white">
            <i class="fa fa-search"></i>
            Search Panel
        </h3>
        <hr>
        <form action="/victims-list" class="form-row">
            <div class="form-group col-12">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="e.g George" class="form-control">
            </div>
            <div class="col-12 text-right form-group">
                <button type="submit" class="btn btn-lg btn-primary">Search</button>
            </div>
        </form>
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

@endsection
