@extends('UserPages.layout')  
@section('content')

<div class="container mx-auto px-5" style=""> 

  @if(Session::has('login_err'))
                   <div class="alert alert-danger" role="alert">
                                  <p class="">{{Session::get('login_err')}}   @php Session::forget('login_err'); @endphp </p> 

                                 </div>  @endif

   

 <div class="row my-0 py-0 w-75 mx-auto text-center" style="max-height: 135px;" > 
  <div class="w-50 mx-auto">
    <lottie-player src="lottiWave.json" background="##fff" speed="1" style="width: 350px; max-height: 250px" loop autoplay direction="1" mode="normal"></lottie-player>
  </div>
 </div>



<!--  <div id="waveform" class="w-50 mx-auto" style="height: 90px;"> 
 </div> -->

 

 <div class="row pt-3 mb-5" style="width:40%;"> 
  <h1 style="font-size:60px;" class="d-block w-100 black bolder py-3">Rewind Top twenty</h1>
  
            <a href="{{route('rewind-chart')}}" style="background:;" class="font-weight-bold float-left radius_img primary black py-1 text-center small d-block px-3 py-2">View Chart &nbsp; 
              <!-- <i class="fa fa-angle-right font-weight-bold"></i> -->
            </a>
    </div>

       <!-- Auto Play Silder -->
      <div class="float-right" style="overflow: hidden; width: 82%;"> 
        <div class="slick-slider my-3 ">
         <div class=""> 
          <img class="radius_img slide_img"  
          src="images/slider/1.png">
         </div>

          <div class=""> 
          <img class="radius_img slide_img"  
          src="images/slider/2.png">
          </div>

          <div class=""> 
          <img class="radius_img slide_img" 
          src="images/slider/3.png">
         </div>

          <div class=""> 
          <img class="radius_img slide_img" 
          src="images/slider/4.png">
          </div>

          <div class=""> 
          <img class="radius_img slide_img" 
           src="images/slider/5.png">
         </div>

          <div class=""> 
          <img class="radius_img slide_img"  src="images/slider/6.png">
         </div>

        </div>

         <h4 class="mx-5 mt-3 h6 float-left text-dark font-weight-bold" style="width:;">Top 20</h4>
      </div>
      <!-- Auto Play Silder -->

      
<div class="clearfix py-5 my-5"></div>
</div>
          
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="https://unpkg.com/wavesurfer.js@7"></script>

<script src="slick.js"></script>

<script type="text/javascript">
$('.slick-slider').slick({
  centerMode: false,
  slidesToShow: 5,
  dots: false,
  arrows: false,
  swipe: true,
//  infinite: true,
  swipeToSlide: false,
   autoplay: true,
   autoplaySpeed: 4000,
  //adaptiveHeight: true,
});

const wavesurfer = WaveSurfer.create({
  container: '#waveform',
  waveColor: 'green',
  progressColor: '#383351',
  url: './audio.wav',
})
wavesurfer.on('click', () => {
  wavesurfer.play()
})

</script>


          @endsection
        
       

