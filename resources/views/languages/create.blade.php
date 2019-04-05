@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{url('/css/plugin/icheck/iCheck.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{url('/css/languages/language.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Add New Language
</div>
<form id="formLanguage" class="form-horizontal" enctype="multipart/form-data" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Prefix</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Lang_prefix" id="Lang_prefix" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Full Name</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Lang_fullname" id="Lang_fullname" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Description</label>
                <div class="col-sm-1" style="width:450px;">
                    <input type="text" name="Lang_description" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Status</label>
                <div class="col-sm-2">
                    <select class="form-control btn-default" required id="Lang_status" style="font-size:10pt;padding:3px" name="Lang_status">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;"></label>
                <div class="col-sm-1" style="width:300px;">
                    <button type="submit" id="save" class="btn btn-success">Save</button>
                    <a href="{{url('/view/language')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/icheck/icheck.js')}}" charset="utf-8"></script>
<script src="{{url('/script/languages/language.add.js')}}" charset="utf-8"></script>
<script src="{{url('/script/uploads/upload.js')}}" charset="utf-8"></script>
@endsection
