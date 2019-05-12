@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> Customer list
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="customerTable" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-white">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Verify</th>
                    <th>Status</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/customers/customer.index.js')}}" charset="utf-8"></script>
@endsection
