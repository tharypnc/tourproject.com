@extends('layouts.admin')
@section('content')
<div class="box-title">
    <i class="fa fa-list" aria-hidden="true"></i> Countries List
</div>
<div class="row memu-bar">
    <div class="col-sm-12">
        <div class="pull-right">
            <a href="{{url('/create/country')}}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table id="countryTable" class="table table-bordered table-hover">
            <thead>
                <tr class="bg-white">
                    <th class="center" style="width:20px;">No</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th class="center" style="width:80px;"></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        {{ $countries->appends(request()->except('page'))->links() }}

    </div>
</div>
@endsection
@section('script')
<script src="{{url('/script/countries/country.index.js')}}" charset="utf-8"></script>
@endsection
