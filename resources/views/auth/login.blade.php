<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
            <h4 style="text-align: center">Login</h4>
            <hr>
            <form action="{{route('login-user')}}" method="POST">
                @csrf

                  {{--================== error messagez --==========================================--}}
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                                      
                                      @endif
                                      @if(Session::has('failed'))
                                          <div class="alert alert-success">{{Session::get('failed')}}</div>
                                                              
                                                              @endif
                  {{--=============================-- error messagez ============================================--}}
                                      @csrf

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}"  placeholder="Enter your email">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Enter your password">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                </div>
                <br>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Login</button>
                </div>
                <br>
               <p>Don't have an account?<span> <a href="register">Create Account</a></span></p>
            </form>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>