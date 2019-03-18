<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tour Guide System</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/base.css')}}" media="screen" title="no title" charset="utf-8">
</head>
<body style="background: #193048;">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="panel panel-default" style="margin-top:50px;">
                    <div class="panel-heading bg-whife">Tour Guide System</div>
                    <div class="panel-body" style="padding-top:25px; padding-buttom:25px;">
                        <form id="formLogin" class="form-horizontal" role="form" method="POST" action="{{ url('/dologin') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-4 control-label">Username</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" id="btnLogin" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Log in
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" charset="utf-8"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="http://localhost/tourproject.com/public/script/plugin/bootstrap/bootstrapValidator.js" charset="utf-8"></script>
<script src="./script/auths/login.js" charset="utf-8"></script>
