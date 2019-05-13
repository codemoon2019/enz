<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Error 404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/frontend.css">
    <meta name="description" content="@yield('meta_description', setting('site-description'))">
    <meta name="author" content="@yield('meta_author', setting('site-author'))">
    <meta name="keywords" content="@yield('meta_keywords', app_name())">
    <link rel="apple-touch-icon" href="{{ asset(setting('site-fav-icon')) }}">
    <link rel="icon" type="image/png" href="{{ asset(setting('site-fav-icon')) }}" />
    
    <style>
        @font-face {
            font-family: 'Jelle';
            src: url(/fonts/Jellee-Roman.otf);
            }
      * {
          line-height: 1.2;
          margin: 0;
      }

      html {
          color: #888;
          display: table;
          height: 100%;
          text-align: center;
          width: 100%;
      }

      body {
          display: table-cell;
          vertical-align: middle;
          margin: 2em auto;
      }

      .container {
        padding: 0 15px;
      }

      .title {
          margin-top: 2vh;
          color: #afafaf;
          font-size: 150px;
          font-weight: bold;
          letter-spacing: 1px;
          text-transform: uppercase;
      }

      .btnyellow {
        margin-bottom: 5px;
        background-color: #ffb330;
        border: 1px solid #ffb330;
        color: #fff;
        font-size: 14px;
        font-weight: 700;
        border-radius: 18px;
        width: 147px;
        height: 44px;
        line-height: 30px;
        padding: 8px 24px;
        text-decoration: none;
        text-transform: uppercase;
        transition: all ease 300ms;
      }

      .btnyellow:hover,
      .btnyellow:focus,
      .btnyellow:active {
        border: 1px solid #ffb330;
        color: #ffb330;
        background: transparent;
        box-shadow: none;
        outline: transparent !important;
        transition: all ease 300ms;
      }

      .not-found {
          font-family: "Jelle";
          margin-bottom: 2vh;
          font-size: 48px;
          font-weight: bold;
          color: #3fb1e5;
          text-transform: uppercase;
          letter-spacing: 1px;
      }

      .basic {
          font-size: 24px;
          font-weight: normal;
          letter-spacing: 1px;
          margin-bottom: 20px;
      }

      .img-404 {
          max-height: 600px;
          width: 100%;
      }

      @media screen and (min-width: 320px) and (max-width: 767px) {
          .title {
              font-size: 80px;
          }
          .not-found {
              font-size: 24px;
          }
          .basic {
              font-size: 12px;
          }
          .orangebtn {
              font-size: 18px;
          }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="error-404 col-sm-12">
        <img src="{{asset('svg/404.svg')}}" class="img-fluid img-404" alt="">
                <p class="not-found">Page not found</p>
                <a href="{{ route('frontend.index')}}" class="btn btnyellow">Go back to homepage</a>
              </div>
            </div>
          </div>

        </body>
      </html>
      <!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->