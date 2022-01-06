@extends('layouts.main')

@section('content')
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
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                            <td>{{$user->organisation_name}}</td>
                            <td>{{$user->role_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->status}}</td>
                            <th>
                                <button class="btn btn-xs btn-primary">View</button> |
                                <button onclick="DeleteUser('{{$user->id}}')" class="btn btn-xs btn-danger">Delete</button>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="/users/create" method="POST" >
                            @csrf
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

                                          @if(count($organisations) > 0)
                                                @foreach($organisations as $organisation)
                                                    <option value="{{$organisation->id}}">{{$organisation->organisation_name}}</option>
                                                @endforeach
                                          @endif
                                      </select>
                                </div>
                              </div>
                                <div class="col-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Role</label>
                                      <select class="form-control" name="role">
                                        <option selected>Choose Role...</option>

                                          @if(count($roles) > 0)
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                                @endforeach
                                          @endif
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

@endsection
