@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{url('/css/plugin/icheck/iCheck.css')}}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{url('/css/countries/country.css')}}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')
<?php
    function sel($value, $comvalue)
    {
        if($value == $comvalue){
            echo 'selected="selected"';
        }
    }
    $src_path ='';
    if( $country->Photo !='' ){

        if($result == 1){

            $src_path = '../uploads/countries/'.$country->Photo.'';

        }else{

            $src_path = '../../uploads/countries/'.$country->Photo.'';
        }

    }else{
         $src_path = '../../img/placeholder.png';
    }
?>
<div class="box-title">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Edit Country
</div>
<form id="formCountry" class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ url('/update/country') }}">
    {{ csrf_field() }}
    <input type="hidden" name="Id" value="{{$country->Id}}">
    <div class="panel panel-default">
        <div class="panel-body">
            @if( $result == 1 )
                <div class="alert success bg-success">
                    <span class="closebtn">×</span>  
                    <strong> Data updated Success!!.</strong>
                </div>
            @endif
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Name</label>
                <div class="col-sm-1" style="width:300px;">
                    <input type="text" name="Country_Name" class="form-control" value="{{$country->Country_Name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Image</label>
                <div class="col-sm-1" style="width:45%;">
                <span class="newPos" title="Browse Image">
                        <span class="small"><img id="pos-image" class="pos-image" style="width: 150px; height: 91px; float:left;padding: 2px;border: solid 1px #e4dfdf;" src="{{$src_path}}"></span>
                        <div class="clearfix"></div>
                </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;">Status</label>
                <div class="col-sm-2" style="width:300px;">
                    <select class="form-control " id="Status" name="Status" style="font-size:10pt;">
                        <option value="1" {{sel($country->Status, 1)}}>Active</option>
                        <option value="2" {{sel($country->Status, 2)}}>Inactive</option>  
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label" style="width:150px;"></label>
                <div class="col-sm-1" style="width:300px;">
                    <button type="submit" id="save" class="btn btn-success">Save</button>
                    <a href="{{url('/view/country')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/plugin/icheck/icheck.js')}}" charset="utf-8"></script>
<script src="{{url('/script/countries/country.update.js')}}" charset="utf-8"></script>
<script src="{{url('/script/uploads/upload.js')}}" charset="utf-8"></script>
@endsection
