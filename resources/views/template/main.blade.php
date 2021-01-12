<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href={{ asset('assets/css/bootstrap.min.css') }}>
    {{-- mystyle --}}
    <link rel="stylesheet" href={{ asset('assets/sass/app.css') }}>

    <title>
        @yield('title')
    </title>

     <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

  </head>
  <body>
    <div class="flex-center position-ref full-height">
        <div class="content">
           <div class="title m-b-md">
               @yield('bigtitle')
           </div>
           <div class="links">
               <a href={{ url('/') }}>Home</a>
               <a href={{ url('/about') }}>Tentang Kami</a>
               <a href={{ url('/domain-hosting') }}>Domain Hosting</a>
               <a href={{ url('/book') }}>Book</a>
           </div>
       </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src={{ asset('assets/js/jquery-3.5.1.js') }} ></script>
    <script src={{ asset('assets/js/popper.min.js') }} ></script>
    <script src={{ asset('assets/js/bootstrap.min.js') }}></script>
  </body>
</html>