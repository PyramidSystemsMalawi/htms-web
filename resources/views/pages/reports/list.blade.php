@extends('layouts.main')


@section('content')

<div class="row">
    <div class="col-4">
        <button class="btn btn-md btn-success">Create New Reports</button>
    </div>
    <div class="col-8"></div>
    <div class="col-12"><hr></div>
    <div class="col-12">
        <ul>
            <li><a href="/viewReport?report_type=Cases&rid=">>> Case Reports</a></li>
            <li><a href="/viewReport?report_type=Users&rid=">>> Users Reports</a></li>
            <li><a href="/viewReport?report_type=Victims&rid=">>> Victims Reports</a></li>
            <li><a href="/viewReport?report_type=Suspects&rid=">>> Suspects Reports</a></li>
            <li><a href="/viewReport?report_type=Officers&rid=">>> Officers Reports</a></li>
            <li><a href="/viewReport?report_type=Transfers&rid=">>> Transfers Reports</a></li>
            <li><a href="/viewReport?report_type=Organisations&rid=">>> Organisations Reports</a></li>


        </ul>
    </div>
</div>

<style>
    ul li{
        list-style: none;
    }
</style>

@endsection
