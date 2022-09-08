@extends('layout')
@section('content')
<div class="container ">
            <form class="form-horizontal" role="form">
              <h2>Login</h2>
                
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
                    <div class="col-md-2 col-sm-offset-3">
                        <button type="submit" class="btn btn-info">Login</button>
                    </div>
                </div>
            </form> <!-- /form -->
			Don't have an account? <a href="/register">Register</a>
        </div> <!-- ./container -->
		
@endsection