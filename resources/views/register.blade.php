@extends('layout')
@section('content')
<div class="container mt-2">
            <form class="form-horizontal" role="form">
              <h2>Register</h2>
                <div class="form-group">
                    <label for="Username" class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text"  placeholder="Enter Username" class="form-control" autofocus>
                       
                    </div>
                </div>
				<div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" id="email" placeholder="Enter Email" class="form-control" autofocus>
                       
                    </div>
                </div>
				
               
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
				                <div class="form-group">
                    <label for="Confirm Password" class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
                    </div>
                </div>
               
                
             
				
                <div class="form-group">
                    <div class="col-md-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-info">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
			Have an account? <a href="/login">login</a>
        </div> <!-- ./container -->
		
@endsection