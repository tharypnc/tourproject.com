@extends('layouts.admin')
@section('content')
<?php

    $data = Auth::user();
    $isAdmin = $data->isAdmin;
    $user_login    = $data->Id;
    function sel($value, $comvalue)
    {
        if($value == $comvalue){
            echo 'selected="selected"';
        }
    }
?>
<div class="box-title" style="margin-bottom:25px;">
    <i class="fa fa-plus-square" aria-hidden="true"></i> Edit User
</div>
<form id="formUser" method="POST" onsubmit="return false;">
    {{ csrf_field() }}
    <input type="hidden" name="Id" value="{{$user->Id}}">
    <input type="hidden" name="Id" value="{{$user->Id}}">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <th style="vertical-align:middle;">New Password</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="password" name="Password" class="form-control" placeholder="New Password">
                </div>
            </td>
        </tr>
        <tr>
            <th style="vertical-align:middle;">New Re-Password</th>
            <td>
                <div class="form-group" style="margin-bottom:0; width:250px;">
                    <input type="password" name="Verify" class="form-control" placeholder="New Re-Password">
                </div>
            </td>
        </tr>
        <?php
            /*Check is current login is super admin*/
            if( $isAdmin === 1 && $user->Id !== $user_login){
        ?>
        <tr>
            <th style="vertical-align:middle;">Super Admin</th>
            <td>
                <div class="form-group" >
                    <select class="form-control" required id="IsAdmin" style="margin-bottom:-5px;width:250px;" name="IsAdmin">
                        <option value="0" {{sel($user->IsAdmin, 0)}}>No</option>
                        <option value="1" {{sel($user->IsAdmin, 1)}}>Yes</option> 
                    </select>
                </div>
            </td>
        </tr>
        <?php }?>
        <tr>
            <th style="vertical-align:middle;">Status</th>
            <td>
                <div class="form-group" >
                    <select class="form-control" id="Status" style="margin-bottom:-5px;width:250px;" name="Status">
                    <option value="1" {{sel($user->Status, 1)}}>Active</option>
                    <option value="0" {{sel($user->Status, 0)}}>Inactive</option>  
                    </select>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <div>
        <button id="submit" type="submit" name="button" class="btn btn-success">Save</button>
        <?php if($isAdmin===1){?>
            <a href="{{url('/view/user')}}" class="btn btn-danger">Cancel</a>
        <?php }?>        
    </div>
</form>
@endsection
@section('script')
<script src="{{url('/script/users/user.update.js')}}" charset="utf-8"></script>
@endsection
