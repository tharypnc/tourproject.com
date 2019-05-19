@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{url('/css/plugin/icheck/iCheck.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<?php
    function sel($value, $comvalue)
    {
        if($value == $comvalue){
            echo 'selected="selected"';
        }
    }
    function isVerify($value, $comvalue)
    {
        if($value == $comvalue){
            echo 'selected="selected"';
        }
    }
?>
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Edit Customer
</div>
<form id="formCustomer" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="Id" value="{{$customer->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Name</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" class="form-control" name="Name" value="{{$customer->Name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Email</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Email" class="form-control" value="{{$customer->Email}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Phone</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Phone" class="form-control" value="{{$customer->Phone}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Verify</label>
                <div class="col-sm-1" style="width:300px;">
                <select class="form-control btn-default" style="padding:3px" name="Verify" style="font-size:10pt;">
                        <option value="1" {{isVerify($customer->Verify, 1)}}>Verified</option>
                        <option value="0" {{isVerify($customer->Verify, 0)}}>Trail</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Status</label>
                <div class="col-sm-2">
                    <select class="form-control btn-default" style="padding:3px" name="Status" style="font-size:10pt;">
                        <option value="1" {{sel($customer->Status, 1)}}>Active</option>
                        <option value="0" {{sel($customer->Status, 0)}}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;"></label>
                <div class="col-sm-1" style="width:300px;">
                    <button type="submit" id="save" class="btn btn-success">Save</button>
                    <a href="{{url('/view/customer')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/icheck/icheck.js')}}" charset="utf-8"></script>
<script src="{{url('/script/customers/customer.update.js')}}" charset="utf-8"></script>
@endsection
