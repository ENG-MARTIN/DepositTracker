<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        {{-- this is the navbar --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        {{-- and then the register div --}}
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <hr>
                <h4 style="text-align: center">Registration</h4>
                    <hr>
                <form action="{{route('submit-user')}}" method="POST">

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
                        <label for="">Membership No.</label>
                        <input type="text" name="customerNumber" class="form-control">
                    </div>
                        <div class="form-group">
                        <label for="">FullName</label>
                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" placeholder="Enter your fullname">
                   <span class="text-danger">@error('fullname') {{$message}} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Enter your email">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}" placeholder="Set a password">
                        <span class="text-danger">@error('password') {{$message}} @enderror</span>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                    <br>
                    <p>Back to <span> <a href="login">Login</a></span></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

