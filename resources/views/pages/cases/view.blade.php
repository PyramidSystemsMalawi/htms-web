@extends('layouts.main')


@section('content')

<div class="row">
    <div class="col-3">
        <div id="previewImage"></div>
    </div>
    <div class="col-6">
        <table class="table table-sm">
            <tbody>
                <tr>
                    <th><i class="fa fa-edit"></i> Case Title :</th>
                    <th>{{$casedetails->case_name}}</th>
                </tr>
                <tr>
                    <th>Status :</th>
                    <th><span class="text-success">{{$casedetails->status}}</span></th>
                </tr>
                <tr>
                    <th><i class="fa fa-step"></i> Stage :</th>
                    <th>{{$casedetails->stage}}</th>
                </tr>
                <tr>
                    <th>Qualification Index :</th>
                    <th><span class="text-danger">0%</span></th>
                </tr>
                <tr>
                    <th><i class="fa fa-clock"></i> Registered On :</th>
                    <th>{{$casedetails->created_at}}</th>
                </tr>
                <tr>
                    <th><i class="fa fa-map-marker-alt"></i> Locale :</th>
                    <th>Chamama Village, T/A Wimbe, Kasungu</th>
                </tr>
                <tr>
                    <th><i class="fa fa-user"></i> Officer :</th>
                    <th>{{$casedetails->firstname}} {{$casedetails->lastname}}</th>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-3">
        <h3 class="bg-secondary text-white p-1">Actions</h3>
        <hr>
        <button type="button" data-toggle="modal" data-target="#InterTransferModal" onclick="setActiveCase('{{$casedetails->reference}}')" class="btn btn-block btn-primary flat">
            Transfer To Another Organisation
        </button>
         <button type="button" onclick="setActiveCase('{{$casedetails->reference}}')" class="btn btn-block btn-primary flat">
            Transfer Internally
        </button>
        <hr>
         <button type="button" onclick="DeleteCase('{{$casedetails->reference}}')" class="btn btn-block btn-danger flat">
            Delete Case File <i class="fa fa-trash"></i>
        </button>
    </div>
    <div class="col-12"> <br> </div>
    <div class="col-12">
        <table class="table table-sm table-bordered table-striped">
            <tr><th>Number Of Victims : </th> <th> <a href="#">9</a> </th> </tr>
            <tr><th>Number Of Suspects : </th> <th> <a href="#">6</a> </th> </tr>
            <tr><th>Number Of Officer : </th> <th> <a href="#">2</a> </th> </tr>

        </table>
    </div>
</div>

<div class="modal" id="InterTransferModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="cases/transfer" method="POST" class="modal-content">
    @csrf
      <div class="modal-header bg-secondary">
        <h5 class="modal-title text-white">Inter-Organisation Transfer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row" id="InterTransferForm">
            <input type="text" hidden name="transfer_from" value="{{$casedetails->organisation}}">

            <input type="text" hidden name="case_reference" value="{{$casedetails->reference}}">
            <div class="form-group col-12">
                <label for="">Transfer To :</label>
                <select name="transfer_to" id="transfer_to" class="form-control">
                    <option value="">Select Organisation</option>
                    @if(count($organisations) > 0)
                        @foreach($organisations as $org)
                            <option value="{{$org->id}}">{{$org->organisation_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group col-12">
                <label for="">Recepient Officer :</label>
                <select name="recepient_officer"  class="form-control">
                    <option value="">Select Officer</option>
                    @if(count($availOfficers) > 0)
                        @foreach($availOfficers as $officer)
                            <option value="{{$officer->email}}">{{$officer->firstname}} {{$officer->lastname}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            {{-- Render available officers list --}}

            <div class="form-group col-12">
                <label for="">Transfer Reason :</label>
                <textarea name="transfer_reason" id="transfer_reason" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Process Transfer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
</div>

<style>
    #previewImage {
        width:100%;
        height:35vh;
        background-color:#000;
        background-repeat: no-repeat;
        background-size: cover;
        background-clip: content-box;
        background-image:url('../../../../public/img/logo2.jpg');
    }
</style>

<script>
    let activeCase

    $(()=>{

    })

    let setActiveCase = (reference)=>{
        activeCase = reference;
    }

    let DeleteCase = async (reference)=>{
        let prompt = confirm(`Are you sure you want to delete case "${reference}" and all its contents?`);
        if(prompt){
            location.href = 'cases/delete?case_reference='+reference;
        }
    }
</script>

@endsection
