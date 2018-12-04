<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JPMANDIRI | @yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('assets/image/logo.gif') }} " />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/plugin/izitoast/dist/css/iziToast.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/plugin/select2/dist/css/select2.min.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap4-theme-master/dist/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugin/scrollbar/jquery.custom-scrollbar.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
  <!-- endinject -->

  <style type="text/css">
    
    .chat{
      max-height: 400px;
    }  

    .chat-box{
      border-top-right-radius: 3%;
      border-top-left-radius: 3%;
     
    }
    .chat-head{
      width: 100%;
      height: 30px;
      border-top-right-radius: 5%;
      border-top-left-radius: 5%;
    }

    .chat-body{
      width: 100%;
      height: 100%;
    }

    .chat-icon{
      position: relative;
      float: left;
      top: 15px;
      left: 15px
    }

    .odd{
      margin-bottom: 10px;
      font-size: 8px;
    }

    .even{
      margin-bottom: 10px;
      font-size: 8px;
    }

    @media only screen and (min-width: 768px) {

      .chat{
        position: fixed;z-index: 1000000;bottom: 0px;right: 50px
      }
      .chat-box{
        width: 300px;height: 400px;
      }

        /* CSS talk bubble */
      .talk-bubble-odd {
        margin: 10px 0px;
        display: inline-block;
        position: relative;
        width: 200px; 
        height: auto;
        background-color: lightyellow;
        left: 30px;
      }

      .talk-bubble-even {
        margin: 10px 60px;
        display: inline-block;
        position: relative;
        width: 200px;
        height: auto;
        background-color: lightyellow;
      }

      .tri-right.left-top-odd:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -20px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 22px solid;
        border-color: lightyellow transparent transparent transparent;
      }

      .tri-right.left-top-even:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: 175px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 22px solid;
        border-color: lightyellow transparent transparent transparent;
      }
    }

    @media only screen and (max-width: 500px) {
      .chat{
        position: fixed;z-index: 1000000;bottom: 0px;right: 50px
      }

      .chat-box{
        width: 275px;height: 400px;
      }

      /* CSS talk bubble */
      .talk-bubble-odd {
        margin: 10px 0px;
        display: inline-block;
        position: relative;
        width: 170px; 
        height: auto;
        background-color: lightyellow;
        left: 40px;
      }

      .talk-bubble-even {
        margin: 10px 60px;
        display: inline-block;
        position: relative;
        width: 170px;
        height: auto;
        background-color: lightyellow;
      }

      .tri-right.left-top-odd:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: -20px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 22px solid;
        border-color: lightyellow transparent transparent transparent;
      }

      .tri-right.left-top-even:after{
        content: ' ';
        position: absolute;
        width: 0;
        height: 0;
        left: 145px;
        right: auto;
        top: 0px;
        bottom: auto;
        border: 22px solid;
        border-color: lightyellow transparent transparent transparent;
      }
    }

    
    .border{
      border: 8px solid #666;
    }
    .round{
      border-radius: 30px;
      -webkit-border-radius: 30px;
      -moz-border-radius: 30px;

    }

    /* Right triangle placed top left flush. */
    .tri-right.border.left-top:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: -40px;
      right: auto;
      top: -8px;
      bottom: auto;
      border: 32px solid;
      border-color: #666 transparent transparent transparent;
    }

    /* Right triangle, left side slightly down */
    .tri-right.border.left-in:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: -40px;
      right: auto;
      top: 30px;
      bottom: auto;
      border: 20px solid;
      border-color: #666 #666 transparent transparent;
    }
    .tri-right.left-in:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: -20px;
      right: auto;
      top: 38px;
      bottom: auto;
      border: 12px solid;
      border-color: lightyellow lightyellow transparent transparent;
    }

    /*Right triangle, placed bottom left side slightly in*/
    .tri-right.border.btm-left:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: -8px;
      right: auto;
      top: auto;
      bottom: -40px;
      border: 32px solid;
      border-color: transparent transparent transparent #666;
    }
    .tri-right.btm-left:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: 0px;
      right: auto;
      top: auto;
      bottom: -20px;
      border: 22px solid;
      border-color: transparent transparent transparent lightyellow;
    }

    /*Right triangle, placed bottom left side slightly in*/
    .tri-right.border.btm-left-in:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: 30px;
      right: auto;
      top: auto;
      bottom: -40px;
      border: 20px solid;
      border-color: #666 transparent transparent #666;
    }
    .tri-right.btm-left-in:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: 38px;
      right: auto;
      top: auto;
      bottom: -20px;
      border: 12px solid;
      border-color: lightyellow transparent transparent lightyellow;
    }

    /*Right triangle, placed bottom right side slightly in*/
    .tri-right.border.btm-right-in:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: 30px;
      bottom: -40px;
      border: 20px solid;
      border-color: #666 #666 transparent transparent;
    }
    .tri-right.btm-right-in:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: 38px;
      bottom: -20px;
      border: 12px solid;
      border-color: lightyellow lightyellow transparent transparent;
    }
    /*
      left: -8px;
      right: auto;
      top: auto;
      bottom: -40px;
      border: 32px solid;
      border-color: transparent transparent transparent #666;
      left: 0px;
      right: auto;
      top: auto;
      bottom: -20px;
      border: 22px solid;
      border-color: transparent transparent transparent lightyellow;

    /*Right triangle, placed bottom right side slightly in*/
    .tri-right.border.btm-right:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: -8px;
      bottom: -40px;
      border: 20px solid;
      border-color: #666 #666 transparent transparent;
    }
    .tri-right.btm-right:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: 0px;
      bottom: -20px;
      border: 12px solid;
      border-color: lightyellow lightyellow transparent transparent;
    }

    /* Right triangle, right side slightly down*/
    .tri-right.border.right-in:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: -40px;
      top: 30px;
      bottom: auto;
      border: 20px solid;
      border-color: #666 transparent transparent #666;
    }
    .tri-right.right-in:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: -20px;
      top: 38px;
      bottom: auto;
      border: 12px solid;
      border-color: lightyellow transparent transparent lightyellow;
    }

    /* Right triangle placed top right flush. */
    .tri-right.border.right-top:before {
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: -40px;
      top: -8px;
      bottom: auto;
      border: 32px solid;
      border-color: #666 transparent transparent transparent;
    }
    .tri-right.right-top:after{
      content: ' ';
      position: absolute;
      width: 0;
      height: 0;
      left: auto;
      right: -20px;
      top: 0px;
      bottom: auto;
      border: 20px solid;
      border-color: lightyellow transparent transparent transparent;
    }

    /* talk bubble contents */
    .talktext{
      padding: 1em;
      text-align: left;
      line-height: 1.5em;
    }
    .talktext p{
      /* remove webkit p margins */
      -webkit-margin-before: 0em;
      -webkit-margin-after: 0em;
    }

    .chat-text{
      background: green;
      width: 100px;
      height: 100px;
    }
  </style>
</head>