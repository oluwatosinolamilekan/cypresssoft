<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Cypress</title>

  <!-- GOOGLE FONTS -->
  <link href="{{asset('fonts.googleapis.com/cssbf7a?family=Karla:400,700|Roboto')}}" rel="stylesheet">
  <link href="{{asset('assets/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />

  <!-- MONO CSS -->
  <link id="main-css-href" rel="stylesheet" href="{{asset('assets/css/mono.css')}}" />


  <!-- CSS for Demo -->
  <link rel="stylesheet" href="{{asset('assets/options/optionswitch.css')}}" />
  <link href="{{asset('assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />

  <!-- FAVICON -->
  <link href="https://www.cypressoft.com/favicon.ico" rel="shortcut icon" />


  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>

</head>
  <body class="bg-light-gray" id="body">
        <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
          <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
              <div class="col-lg-6 col-md-10">
                <div class="card card-default mb-0">
                  <div class="card-header pb-0">
                    <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                      <a class="w-auto pl-0" href="#">
                        <span class="brand-name text-dark">Cypress</span>
                      </a>
                    </div>
                  </div>
                  <div class="card-body px-5 pb-5 pt-0">

                    <h4 class="text-dark mb-6 text-center">Sign in</h4>

                    <form action="{{route('login')}}" method="POST">
                        @csrf
                      <div class="row">
                        <div class="form-group col-md-12 mb-4">
                          <input type="email" class="form-control input-lg" name="email" id="email" aria-describedby="emailHelp"
                            placeholder="email">
                        </div>
                        <div class="form-group col-md-12 ">
                          <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">

                          <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>


                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <script src="{{asset('assets/plugins/toaster/toastr.min.js')}}"></script>
        <script>
            toastr.options.preventDuplicates = true;
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif

            @if (session('info'))
                toastr.info("{{ session('info') }}");
            @endif
          </script>
</body>

</html>
