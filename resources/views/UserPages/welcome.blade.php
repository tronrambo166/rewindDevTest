<!DOCTYPE HTML> 
<head>
     <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <title>Rewind</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="calander/6-calendar.css">
   
{{-- Vue component files --}}
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/http-vue-loader"></script>
  {{-- Vue component files --}}

  <style type="text/css">
      .col-form-label{text-align: left; font-size: 12px; color:black;}
      #login,#register,#user,#artist,#user_log,#artist_log{}
        .nav-link{font-size: 13px;}

  </style>
  
</head>


<body style="background:rgba(253,209,0,255);">
 <div class="container-fluid h-100" style="background-image: url('images/bg.png');background-repeat:no-repeat; min-height: 1000px; background-size: contain; width:92%;"> 


@if(!isset($_COOKIE['edit_permit']) )

<!-- LANDING -->   
<div class="row  pt-2 pb-0" style="">
<nav class=" navbar navbar-expand-md navbar-light py-0 w-100">
  
  <div class="  navbar-collapse" id="navbarNav">
    <ul class="navbar-nav links w-75">
      <li class="nav-item text-responsive  text-light  mr-md-5 sm-f30">
      <a class="pt-0 pb-2" href="{{route('_home')}}">
          <h3 class="text-success font-weight-bold"> <img  src="images/logo.png"></h3>
      </a>
     <!--  style="width:142px; height:55px;" -->
      </li>
 <li class="font-weight-bold nav-item text-responsive black mr-md-5 sm-f30 mt-3">
      Welcome To The Home of Brand Data!
      
      </li>
    
    </ul>

  
   <ul class="navbar-nav links float-right w-25">
     <li class="nav-item w-100">
        <a href=""class=" w-50 mx-auto font-weight-bold text-center nav-link outline_btn_black" data-target="#loginModal-editor" data-toggle="modal"> Manage the site</a>
      </li>
    </ul>

  </div>
</nav>
</div>


<div class="row mx-auto shadow h-100" style="width:90%; border-radius: 5px;">  
 <div class="col-md-5 mt-5"> 
            <h1 class="text-center mt-5 pt-5" style="font-family:fantasy;">We are launcing soon.</h1> <hr> 



<div class="clearfix py-3"></div>



</div>  

         <div class="col-md-1"> </div>
           <div class="col-sm-6 text-center" style="background-image: url('images/rewind.png');background-repeat:no-repeat; height: 600px; background-size:contain; background-position:center;">
           

          <h2 class="px-4 w-100 d-block  text-left text-dark">


            
             

           </div>    
          
</div>

<!-- MODAL -->
<div  class="modal fade" id="loginModal-editor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

         <div class="card-header w-100">
            <button id="login"  class="w-50 d-block m-auto btn  px-4 ">Admin Login</button>


             @if(Session::has('email')) <p class="text-danger ml-5">{{Session::get('email')}} @php Session::forget('email'); @endphp </p> @endif
        </div>

              

        <button type="button" class="m-0 close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
    
      <div class="modal-body">

         

        
      <div class="hidden_currency ">

    <div class="row justify-content-center py-3 mb-5">
        <div class="px-0 w-100 py-2">

                <!-- HIDDEN login-->


 <div id="artist_log" class="card-body text-center py-0">

                          <form method="POST" class="" action="{{ route('loginEditor') }}">
                           @csrf

                                            <input class=" w-75 d-inline my-2 form-control my-1 px-2 py-1 mr-1" type="email" name="email" placeholder="Enter email" id="inputEmailAddress" 
                                            value=""    />
                                                                       
                                          
                                            <input class=" w-75 d-inline my-2 form-control my-1 px-2 py-1 mr-1" name="password" id="inputPassword" type="password" placeholder="Enter password"
                                            value=""  />
                                            

                                          

                                          @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                           @enderror

                                       
                                           
                                            @if (Route::has('forgetPass')) 
                                            <a href="{{ route('password.request') }}" class="small text">Forgot password ?</a> @endif
                                            
                                            <input  type="submit"class=" d-block w-25 mx-auto my-2 btn btn-outline-success  font-weight-bold " href="" name="Log In" value="Login" />
                    </form>

                    
                    @if(Session::has('reset'))<p class="text-light font-weight-bold">{{Session::get('reset')}}   @php Session::forget('reset'); @endphp </p>@endif
                    

                   @if(Session::has('login_err'))
                   <div class="alert alert-danger" role="alert">
                                  <p class="">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p> 

                                 </div>  @endif
                   
                        
                       <hr>  <div class="row">
                              <div class="col-sm-12 pr-1">
                    <a href="{{ route('forgot','email') }}" class=" text-responsive font-weight-bold text-info mx-auto my-2 d-inline-block py-0 small">Forgot Password?</a>
                    </div>
                  
                    
                    </div>
                    

                </div>


            </div>
        </div>
    </div>
  
  </div>
    
    
      </div>
    
    
     
    </div>
  </div>
  <!-- MODAL --> 
  
</div>

@else


 <div class="h-100 row  pt-2 pb-0" style="">
<nav class=" navbar navbar-expand-md navbar-light py-0 w-100 row">
  
  <div class="navbar-collapse col-sm-5" id="navbarNav">
    <ul class="navbar-nav links pl-2">
      <li class="nav-item text-responsive  text-light sm-f30">
      <a class="pt-2 pb-2" href="{{route('_home')}}">
          <h3 class="text-success font-weight-bold"> <img  src="images/logo.png"></h3>
      </a> <!-- style="width:142px; height:55px;" -->
      
      </li>
    </ul>
     </div>

     <div class="navbar-collapse welcome_links col-sm-4 text-center px-0">
       <ul class="navbar-nav links pl-2">
      <li class="nav-item mt-2">
        <a class="{{ Request::is('_home') ? 'text-success' : '' }} nav-link  font-weight-bold" href="_home"> Home </a>
       
      </li>

      <li class="nav-item mt-2">
         <a class="{{ Request::is('live') ? 'text-success' : '' }} nav-link  font-weight-bold" href="live">About us</a>
      </li>

      <li class="nav-item mt-2">
         <a class="{{ Request::is('live') ? 'text-success' : '' }} nav-link  font-weight-bold" href="live">Features</a>
      </li>
    </ul>
     </div>
</nav>
</div>


<div class="container mx-auto px-5" style=""> 
 <div class="row pt-5 pl-5" style=""> 

  <div class="col-sm-4"> </div>

  <div class="col-sm-4">
    <h1 class="text-center" style="color:#000000; font-family: Satoshi-bold;"> To Know Your Playback </h1>
    <a href="./get-started" class="primary_btn mx-auto mt-4" style="background: black; width: 50%; padding:10px 35px; border-radius:30px;">Get started!</a>
  </div>

  <div class="col-sm-4"> </div>
 </div>    
      

</div>

@endif
<div class="container-fluid px-0 ">
       
        
        <footer>
            <div class="row fix fixed-bottom" style="background:#ffdf00d6;">
       <div class="col-sm-7 text-right" >
                <p class="text-dark py-2 mt-2 text-responsive small">&copy; Copyright 2023. Rewind Cloud Radio Monitoring, All Rights Reserved</p>
            </div>  <div class="col-sm-1" > </div>
       <div class="col-sm-4 m-auto" >
       <a class="ml-5 text-success nav-link d-inline font-weight-bold" href="terms">Terms</a>
       <a class="text-success nav-link d-inline font-weight-bold" href="policy">Privacy Policy</a>

        <!-- <a href="https://www.acrcloud.com/" target="_blank" class="text-light nav-link d-inline font-weight-bold">Broadcast Monitoring by &nbsp;<img height="30px" width="75px" src="images/ACRCloud-white.png" /></a> -->
      </div>
        </footer>
        
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
       
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    