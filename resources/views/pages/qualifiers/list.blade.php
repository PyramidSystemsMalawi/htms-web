@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <p class="text-danger text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tenetur deleniti eveniet ex dolor quod suscipit mollitia voluptatem distinctio at esse.
             Cum facere similique doloremque dicta deleniti. Vero quo sit dicta.</p>
             <hr>
    </div>
    <div class="col-12">
        <div class="row card">
    <div class="col-12 text-right py-2 card-header">
        <button data-toggle="modal" data-target="#add"
        class="btn btn-success btn-md">Add TIP Qualifier</button>
    </div>
    <div class="col-12 card-body">
        <table class="table table-sm table-striped table-hover table-bordered">
            <thead class="">
                <th>#</th>
                <th style="width:30% !important">Question</th>
                <th>ResponseType</th>
                <th>Predefined-Answers</th>
                <th>Nullable</th>
                <th></th>
            </thead>
            <tbody>
                @if(count($qualifiers) > 0)
                    @foreach($qualifiers as $qualifier)
                        <tr>
                            <td>{{$qualifier->id}}</td>
                            <td>{{$qualifier->question}}</td>
                            <td>{{$qualifier->responseType}}</td>
                            <td>{{$qualifier->possible_answers}}</td>
                            <td>@if($qualifier->nullable) TRUE @else FALSE @endif</td>
                            <th>
                                <a   class="btn btn-xs btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a> | <a onclick="ConfirmDelete({{$qualifier->id}})" href="#" class="btn btn-xs btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </th>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>

    </div>

</div>

                <div class="modal fade" id="add">
                        <div class="modal-dialog modal-md">
                            <form action="/qualifiers" method="POST" >
                            @csrf
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Qualifier</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="form-row">
                                      <div class="col-12 form-group">
                                          <label for="">Question :</label>
                                          <textarea type="text" name="question" placeholder="Type your question here..." name="name"
                                          class="form-control" rows="3" required></textarea>
                                      </div>
                                      <div class="form-group col-12 ">
                                          <label for="">Response Type :</label>
                                         <select name="responseType" id="responseType"  class="form-control" required>
                                             <option value="">SELECT</option>
                                             <option value="boolean">Simple Yes or No</option>
                                             <option value="bool-plus-input">Compound Yes Or No</option>
                                             <option value="multiple">Multiple Choice</option>
                                             <option value="text">Text Input</option>
                                             <option value="number">Number Input</option>
                                         </select>
                                      </div>
                                      <div id="answers_field" class="col-12 form-group d-none">
                                          <label for="">Acceptable Answers ( <small class="text-danger">Separate answers with comma </small> ):</label>
                                          <textarea placeholder="Answer One, Answer Two, ... , Last Answer"
                                           name="possible_answers" cols="30" rows="3" class="form-control"></textarea>
                                      </div>
                                      <div class="col-6 form-group">
                                          <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="nullable"
                                        id="flexCheckChecked" checked required>
                                        <label class="form-check-label" for="flexCheckChecked">
                                            Nullable ?
                                        </label>
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

        $("#responseType").change(function(){
            let qtype = this.value
            //alert(qtype)
            if(qtype == 'multiple'){
                $("#answers_field").removeClass('d-none');
            }else{
                $("#answers_field").addClass('d-none');
            }
        })
    })

    let ConfirmDelete = (id)=>{
        let prompt = confirm(`Are you sure you want to delete this question Item?`);
        if(prompt){
            location.href = `qualifiers/delete?id=${id}`
        }
    }
</script>


@endsection
