@extends('UserPages.layout')  
@section('content')


<div class="container mx-auto py-3" style="width: 85%; overflow: hidden;">
<div class="clearfix py-5"></div>

<div class="slider_wrap p-4 pb-5" style="background: #F4E6B5; border-radius: 25px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

   <div class="row"> 
    <div class="col-sm-10">
      <h4 style="font-weight:900;color: black;" class="ml-4">Rewind Hot 40</h4> 
      <p class="ml-4 small text-dark">This Week</p>
    </div>
    <div class="col-sm-2">
      <p style="font-weight:900;color:black;" class="h5 mr-5" ><?php echo strtoupper(date('d M, Y')); ?></p>
    </div>
    
   </div>

<!-- Auto Play Silder -->
      <div class="mx-auto" style="background: #F4E6B5; overflow:hidden ; width: 88%;"> 
        <div class="slick-slider" id="slider1" style="margin-top: 100px;">   

          @foreach($static20 as $static) <?php $cnt=0; $duplicate =0; ?>
@foreach($lastDay as $yester)
   
@if($static->song == $yester->song)  
@if($static->position < $yester->position) 
<?php $pos='up'; $cnt++;?>
@elseif($static->position == $yester->position) 
<?php  $pos='-'; $cnt++;?>
@else <?php $pos='down'; $cnt++; ?>
@endif

@foreach($static20 as $check)
@if($check->song == $static->artist)
<?php $duplicate =1; ?>
 @endif @endforeach

   @if($duplicate==0)
     

    
          <div class="bg-white px-2 pt-3 pb-0 cards_40" style=" height: 250px;"> 
          <div class="row pb-4">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">{{$static->position}}</h5>
              </div>
              
              <p class="small bolder_black text-right">{{$static->song}}</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">{{ucfirst($static->artist)}}</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>
  
  @endif


   @endif
   @endforeach

  @endforeach
          
<!-- 
          <div class="bg-white p-3 cards_40" style=" height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>


        <div class="bg-white p-3 cards_40" style=" height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>


        <div class="bg-white p-3 cards_40" style=" height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>


        <div class="bg-white p-3 cards_40" style="height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>


        <div class="bg-white p-3 cards_40" style="height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div>


        <div class="bg-white p-3 cards_40" style="height: 250px;"> 
          <div class="row pb-5">
            <div class="col-sm-3">
              <h6 class="mb-0 bolder_black d-block small">128K</h6>
              <p class="small" style="font-size: 10px;color:lightgrey;">Listenings</p>
            </div>

            <div class="col-sm-9">

              <div class="d-block text-right">
                <h5 style="border-bottom:3px solid #13d0e3;" class="bolder_black d-inline-block text-right">01</h5>
              </div>
              
              <p class="small bolder_black text-right">Corona Virus</p>

             <div class="clearfix d-inline-block">
                <span class="small d-inline" style="color:darkgrey;">Song by: &nbsp; </span>
               <p class="small bolder_black d-inline">Bobby Wine</p>
             </div>

             <div class="clearfix row">
                <span class="col-sm-9 pl-4 small text-left" style="padding-right:3px;color:darkgrey;">Peak pos &nbsp; </span>
               <p style="padding-left:3px;" class="col-sm-3 pr-4 small bolder_black text-right">1</p>
             </div>

            </div>
          </div>

          <img class="radius_img2 slide_img2"  
          src="images/slider/4.png">

          <div class="row pt-2">
            <div class="col-sm-7"></div>
            <div class="col-sm-5">
              <img style="width: 16px;" class="mr-1" src="images/slider/heart.png">
              <img style="width: 15px;" src="images/slider/image.png">
            </div>
          </div>
        </div> -->


      </div>
      <!-- Auto Play Silder -->


<div class="clearfix py-5"></div>

</div>

</div>


           <div class="text-center" style="background-image: url('images/rewind.png');background-repeat:no-repeat; max-height: 600px; background-size:contain; background-position:center;">
           

          <h2 class="px-4 w-100 d-block  text-left text-dark">

                 

                   @if(Session::has('reset'))
                   <div class="alert alert-success" role="alert">
                        <p style="font-size: 14px"; class="m-0">{{Session::get('reset')}}   @php Session::forget('reset'); @endphp </p> </div>  
                    @endif


                    
              @if(Session::has('login_err'))
                   <div class="alert alert-primary" role="alert">
                        <p style="color: red;font-size: 14px"; class="font-weight-bold m-0">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p>   </div>  
              @endif
                   


                @if(Session::has('email'))
                   <div class="alert alert-danger" role="alert">
                        <p style="font-size: 14px"; class="m-0">{{Session::get('email')}}   @php Session::forget('email'); @endphp </p>   </div>  
              @endif

                 

                   <!-- <span  style="color: green;" class="">Rewind</span> to Know Your Playback</h2> -->
           </div>    
          

</div>

<div class="clearfix py-5 my-5"></div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="slick.js"></script>

<script type="text/javascript">
$('.slick-slider').slick({
  centerMode: false,
  slidesToShow: 4,
  dots: false,
  arrows: true,
  swipe: false,
//  infinite: true,
  swipeToSlide: true,
   autoplay: false,
   sautoplaySpeed: 4000,
  //adaptiveHeight: true,
});

</script>


<script type="text/javascript">
 $('.slick-next').html('<i class="fa fa-angle-right"></i>');
</script>


          @endsection
        
       
