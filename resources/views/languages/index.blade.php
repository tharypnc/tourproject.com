@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> Language List
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/create/language')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="languageTable" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-white">
                    <th class="center" style="width:20px;">No</th>
                    <th>Prefix</th>
                    <th>Full Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/languages/language.index.js')}}" charset="utf-8"></script>
@endsection
