@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="bs-component">
            <div class="panel panel-danger">
            <div class="panel-heading">
                <h2 class="panel-title">USERS</h2>
            </div>
            <div class="panel-body">
                <h4 class="display-4">
                    Active: <span class="badge_uActive">0</span>  &nbsp; &nbsp;<span style="color:red"> Inactive: <span class="badge_uInactive">0</span> </span>
                </h4>
            </div>
            </div>
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">LANGUAGES</h3>
            </div>
            <div class="panel-body">
                <h4 class="display-4">Total: <span class="badge_language">0</span></h4>
            </div>
            </div>
    </div>
    </div>
    <div class="col-lg-6">
        <div class="bs-component">
        
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">CUSTOMERS</h3>
                </div>
                <div class="panel-body">
                    <h4 class="display-4">
                        Verified: <span class="badge_verifiedcustomer">0</span>  &nbsp; &nbsp; Trail: <span class="badge_Trailcustomer">0</span> &nbsp; &nbsp;<span style="color:red"> Block: <span class="badge_Incustomer">0</span> </span>
                    </h4>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">COUNTRIES</h3>
                </div>
                
                <div class="panel-body">
                    <h4 class="display-4">Total : <span class="badge_country">0</span></h4>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
