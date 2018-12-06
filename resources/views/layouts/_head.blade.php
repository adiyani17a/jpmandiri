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
  <link rel="stylesheet" href="{{ asset('assets/plugin/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugin/scrollbar/jquery.custom-scrollbar.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/plugin/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
  <!-- endinject -->

  <style type="text/css">
    
    .chat{
      max-height: 400px;
      height: 400px;
      margin-bottom: 10px;
      -webkit-transition: height 1s; /* For Safari 3.1 to 6.0 */
      transition: height 1s;
    }  

    .huruf_besar{
      text-transform: uppercase;
    }

    .select2{
      width: 100%;
    }

    .trans{
      height: 0px;
      bottom: -10px !important;
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
      height: 80%;
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

    #table_data td,th{
      font-size: 12px !important;    
    }

    #table_data_info{
      font-size: 12px;
    }

    .pagination{
      font-size: 12px;  
    }

    #table_data_length{
      font-size: 12px;
    }

    #table_data_filter{
      font-size: 12px;
    }

    @media only screen and (min-width: 768px) {

      .chat{
        position: fixed;z-index: 1000000;bottom: 0px;right: 50px
      }

      .chat-box{
        width: 300px;height: 400px;
      }

      #table_data{
        width: 100% !important;
      }

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

      #table_data{
        width: 100% !important;
      }

      .card-title b{
        font-size: 11px !important;
      }

      .btn_modal{
        font-size: 10px !important;
      }

      .title .col-md-4{
        width: 60%;
      }

      .title .col-md-8{
        width: 40%;
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

      .content-wrapper{
        background: #f2edf3;
        padding: 1rem 1rem;
        width: 100%;
        -webkit-flex-grow: 1;
        flex-grow: 1;
      }
      
      .card .card-body{
        padding: 1rem 1rem;
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
      background: ;
      width: 100%;
      height: 100%;
    }

    ::-webkit-scrollbar {
      display: none;
    }

    .tengah{
      text-align: center;
    }

    .error{
      border:1px solid red;
    }
    .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
    .file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    .file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
    .file-upload .file-select.file-select-disabled{opacity:0.65;}
    .file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}

    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
  </style>
</head>