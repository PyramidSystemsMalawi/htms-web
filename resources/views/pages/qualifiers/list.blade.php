@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <p class="text-danger text-center">The Laws of Malawi Consists Of Pre-defined questions that are use to determin the validity of any case to the extent of how much it qualifies as a TIP case. This section allows you to set these questions and their expected responses so that they can appear in the data collection Tool (Android App TIP v1.2) and used to interview TIP Case Victims. </p>
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
                                <a data-bs-toggle="modal" data-bs-target="#updateQuestionModal{{$qualifier->id}}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-edit"></i>
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

    let updateQuestion = async (id)=>{
        try{
            let response = await fetch(BASE_URL + '/api/v1/questions/' + id)
            response = await response.json()
            if(response.status == 'success'){

            }
        }catch(err){

        }
    }
</script>



@endsection
