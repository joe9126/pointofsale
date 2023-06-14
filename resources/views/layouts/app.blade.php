<!DOCTYPE html>
<html>
<head>
	<title>PrimePOS - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="Prime Software Solutions">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- styles-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/b-1.6.2/datatables.min.css"/>
     <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datatables.bootstrap4.min.css' )}}">

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
     <link rel="stylesheet" href="{{url('assets/css',['datatables.jqueryui.min.css'])}}" type="text/css">
    <link rel="stylesheet" href="{{url('assets/css',['jquery-ui.css'])}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/styles.css' )}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/maindashboard.css' )}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/receiptstyles.css' )}}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/tabstyles.css' )}}">
  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"  rel = "stylesheet">
   
   
    
</head>
<body class="bg-light">
	@yield('content')

     <!--scripts-->
     <!--<script src="{{url('assets/js',['jquery.min.js'])}}" ></script>-->
     <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/b-1.6.2/datatables.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
    
    <script type="text/javascript" src="{{url('assets/js',['jquery.validate.min.js'])}}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
     
    <script type="text/javascript" src="{{url('assets/js',['dataTables.rowsGroup.js'])}}"></script>
     
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.js"></script>
    <script type="text/javascript" src="{{url('assets/js',['moment.js'])}}"></script>
    
    <script type="text/javascript" src="{{url('assets/js',['numeral.js'])}}"></script>
   <!-- <script type="text/javascript" src="{{url('assets/js',['inputautocomplete.js'])}}"></script>-->
     <script type="text/javascript" src="{{url('assets/js',['parsley.js'])}}"></script>
    <script type="text/javascript" src="{{url('assets/js',['bootstrap-datepicker.min.js'])}}"></script>
     <script type="text/javascript" src="{{url('assets/js',['jquery-ui.js'])}}"></script>
     
     <script type="text/javascript" src="{{url('assets/js',['maindashboard.js'])}}"></script>
    <script type="text/javascript" src="{{url('assets/js',['products.js'])}}"></script>
    <script type="text/javascript" src="{{url('assets/js',['sales.js'])}}"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
   <script type="text/javascript" src="{{url('assets/js',['bargraph.js'])}}"></script>
   <script type="text/javascript" src="{{url('assets/js',['login.js'])}}"></script>
   <script type="text/javascript" src="{{url('assets/js',['salesreports.js'])}}"></script>
   <script type="text/javascript" src="{{url('assets/js',['tabscript.js'])}}"></script>
   <script type="text/javascript" src="{{url('assets/js',['reportsales.js'])}}"></script>
<div class="modal" id="loader"></div>
</body>
</html>