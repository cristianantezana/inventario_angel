
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Argon Dashboard - Free Dashboard for Bootstrap 4 by Creative Tim
  </title>
  <!-- Favicon -->
  <link href="{{asset('img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('js/plugins/nucleo/css/nucleo.css')}}" rel="stylesheet" />
  <link href="{{asset('js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{asset('css/argon-dashboard.css?v=1.1.2')}}" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <div class="header bg-gradient-primary py-2 py-lg-4">
      <div class="container">
        <div class="header-body text-center mb-4">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-4">
              <img src="{{asset('img/icons/common/logo_angel (2).svg')}} ">
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                
               
              </div>
              <form method="POST" action="{{route('usuarios.login')}}">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger p-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" type="email" name="email"value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus>
                  
                    <div class="invalid-feedback">
                      {{ $errors->first('email') }}
                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password" >
                  </div>
                </div>
              
                <div class="text-center">
                  <button type="submit" class="btn-block btn btn-primary my-">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
         
           
          </div>
        </div>
      </div>
    </div>
   
  </div>
  <!--   Core   -->
  <script src="{{asset('js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="{{asset('js/argon-dashboard.min.js?v=1.1.2')}}"></script>
  <script src="{{asset('https://cdn.trackjs.com/agent/v3/latest/t.js')}}"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>