<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .button {
          background-color: #4CAF50;
          color: white;
          padding: 12px 28px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 18px;
          font-weight: bold;
          cursor: pointer;
      }
  </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>
            <div class="links">
                <a class="button" href="{{ route ('vueLoadingMore') }}">Load By Vue</a>
                <a class="button" href="https://laracasts.com">Laracasts</a>
            </div>
        </div>
    </div>
</body>
</html>
