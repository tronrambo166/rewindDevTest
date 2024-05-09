@extends('UserPages.layout')  
@section('content')

<div class="container mx-auto px-5" style=""> 

  @if(Session::has('login_err'))
                   <div class="alert alert-danger" role="alert">
                                  <p class="">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p> 

                                 </div>  @endif

   

 <div class="row pt-3 my-5" style="width:40%;"> 
  <h1 style="font-size:60px;" class="d-block w-100 black bolder py-3">Rewind Top twenty</h1>
  
            <a href="{{route('rewind-chart')}}" style="background:;" class="font-weight-bold float-left radius_img primary black py-1 text-center small d-block px-3 py-2">View Chart &nbsp; 
              <!-- <i class="fa fa-angle-right font-weight-bold"></i> -->
            </a>
    </div>


<!-- Region Artist -->

<!-- <div class="row mx-auto shadow" style=""> 
        <div class="px-5 py-3 mx-auto" style="width: 80%;">
        <div class="row">

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="90%" height="130px" src="images/artists/1731549835021026.jpg">
         </div>

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="90%" height="130px" src="images/artists/nya.png">
         </div>

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="90%" height="130px" src="images/artists/1731549835021026.jpg">
         </div>

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="90%" height="130px" src="images/artists/nya.png">
         </div>

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="92%" height="130px" src="images/artists/1731549835021026.jpg">
         </div>

         <div class="col-md-2 px-0"> 
          <img class="radius_img"  width="90%" height="130px" src="images/artists/nya.png">
         </div>
          
        </div> 
        </div> 
</div>  -->
      <!-- Region CHART -->


       <!-- Auto Play Silder -->
      <h4 class="mb-0 float-right text-dark font-weight-bold" style="width: 77%;">Top 20</h4>
      <div class="float-right" style="overflow: hidden; width: 77%;"> 
        <div class="slick-slider my-3">
         <div class=""> 
          <img class="radius_img slide_img"  
          src="images/artists/nya.png">
         </div>

          <div class="px-0"> 
          <img class="radius_img slide_img"  
          src="images/artists/nya2.png">
          </div>

          <div class=""> 
          <img class="radius_img slide_img" 
          src="images/artists/nya.png">
         </div>

          <div class="px-0"> 
          <img class="radius_img slide_img" 
          src="images/artists/nya2.png">
          </div>

          <div class=""> 
          <img class="radius_img slide_img" 
           src="images/artists/nya.png">
         </div>

          <div class=""> 
          <img class="radius_img slide_img"  src="images/artists/nya2.png">
         </div>

        </div>
      </div>
      <!-- Auto Play Silder -->

      
<div class="clearfix py-5 my-5"></div>
</div>
          
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="slick.js"></script>

<script type="text/javascript">
$('.slick-slider').slick({
  centerMode: true,
  slidesToShow: 5,
  dots: false,
  arrows: false,
  swipe: true,
//  infinite: true,
  swipeToSlide: false,
   autoplay: true,
   autoplaySpeed: 2000,
  //adaptiveHeight: true,
});

// $('.slick-current').append('<h5 style="color:black;"> Top 20 </h5>');
</script>


          @endsection
        
       

