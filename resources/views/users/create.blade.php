@extends('layouts.admin')
@section('content')
<div class="box-title" style="margin-bottom:25px;">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Add New User
</div>
<?php 
   $data = Auth::user();
   $isAdmin = $data->isAdmin;
?>
<form id="formUser" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th style="width:180px; vertical-align:middle;">Username</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="text" name="Name" class="form-control" placeholder="Username">
                </div>
            </td>
        </tr>
        <tr>
            <th style="vertical-align:middle;">Email</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="email" name="Email" class="form-control" placeholder="Email">
                </div>
            </td>
        </tr>
        <tr>
            <th style="vertical-align:middle;">Status</th>
            <td>
                <div class="form-group" >
                    <select class="form-control" required id="Status" style="margin-bottom:-5px;width:250px;" name="Status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <th style="vertical-align:middle;">Password</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="password" name="Password" class="form-control" placeholder="Password">
                </div>
            </td>
        </tr>
        <tr>
            <th style="vertical-align:middle;">Re-Password</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="password" name="Verify" class="form-control" placeholder="Re-Password">
                </div>
            </td>
        </tr>
        <?php
            /*Check is current login is super admin*/
            if($isAdmin === 1){
        ?>
        <tr>
            <th style="vertical-align:middle;">Super Admin</th>
            <td>
                <div class="form-group" >
                    <select class="form-control" required id="IsAdmin" style="margin-bottom:-5px;width:250px;" name="IsAdmin">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </td>
        </tr>
            <?php }?>
        </tbody>
    </table>
    <div>
        <button id="submit" type="submit" name="button" class="btn btn-success">Save</button>
        <a href="{{url('/view/user')}}" class="btn btn-danger">Cancel</a>
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/users/user.add.js')}}" charset="utf-8"></script>
@endsection
