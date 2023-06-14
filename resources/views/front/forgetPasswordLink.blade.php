<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    .form-gap {
      padding-top: 70px;
    }
    h3 a {
        display: block;
        color: #ea624c;
        text-decoration: none;
        font-size: 42px;
        font-family: 'Fredoka One', cursive;
    }
    h3 a span{color:#000;}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
              @if ($message = Session::get('success'))
                <p class="alert alert-success hide1 ">
                    {{ $message }}
                </p>
              @elseif ($message = Session::get('error'))
                <p class="alert alert-danger hide1 ">
                    {{ $message }}
                </p>
              @endif
                <div class="text-center">
                  <h3><a href="{{url('/')}}">Chess<span>Official</span></a></h3>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form action="{{url('postResetPassword')}}" id="register-form" role="form" autocomplete="off" class="form" method="post">
                      @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email" class="form-control"  type="email">
                          @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="password" name="password" placeholder="password" class="form-control"  type="password">
                          @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <input id="password" name="confirm_password" placeholder="Confirm password" class="form-control" type="password">
                          @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="form-group">
                        <input class="btn btn-lg btn-primary btn-block" value="Change password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>