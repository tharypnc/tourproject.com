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
?>
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Edit Language
</div>
<form id="formLanguage" class="form-horizontal" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="Id" value="{{$language->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Prefix</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Lang_prefix" class="form-control" value="{{$language->Lang_prefix}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">FullName</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Lang_fullname" class="form-control" value="{{$language->Lang_fullname}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Description</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Lang_description" class="form-control" value="{{$language->Lang_description}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Status</label>
                <div class="col-sm-2" style="width:300px;">
                    <select class="form-control " id="Lang_status" name="Lang_status" style="font-size:10pt;">
                        <option value="1" {{sel($language->Lang_status, 1)}}>Active</option>
                        <option value="2" {{sel($language->Lang_status, 2)}}>Inactive</option>  
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
<script src="{{url('/script/languages/language.update.js')}}" charset="utf-8"></script>
@endsection
