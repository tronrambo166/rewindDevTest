@extends('UserPages.layout')  
@section('content')

<div class="content_bg py-4">

<div class="container mx-auto py-3 content_bg" style="width: 80%;">

<div class="row">

         <div class="col-sm-3"> <h4 style="font-weight:900;color: white;" class="text-center">Rewind Hot 40</h4> 
         </div>
         <div class="col-sm-6 mt-2"> 
          <p class="bar2" style="width:100%; height:15px;"></p> 
        </div> 

        
         <div class="col-sm-3 mt-2"> <p style="font-weight:900;" class="small text-white" >WEEK OF <?php echo strtoupper(date('M d, Y')); ?></p> </div>
         </div>

<div class="row mx-auto shadow" style="background:white;">  

  <table class="table tabil mb-4 text-white border-none">
  <thead>
    <tr class="chart-header">
      <th scope="col" class="py-3 small text-left" style="width:65%;">THIS WEEK</th>
      <th scope="col" class="py-3 small">AWARD</th>
      <th scope="col" class="small px-4">LAST WEEK</th>
      <th scope="col" class="small">PEAK POS.</th>
      <th scope="col" class="small">WKS ON CHART</th>
    
    </tr>
  </thead>
  <tbody id="songs">

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
     

     <tr id="loading" class="chart-tr">
     
      <td scope="" class="py-0 text-center"> 
        <div class="row">
          <div class="col-md-2 py-4" style="background:black;">
            <h3 class="text-center @if($static->position == 1) pt-5 @endif" style="font-weight:900;">{{$static->position}}</h3></div>

          <div class="col-md-10 pt-3">

          @if($static->position == 1)
            <div class="row">
              <div class="col-md-5">
                <img src="images/user.jpg" class="border" height="180px;">      
              </div>
              <div class="col-md-1 px-0 my-auto"> 
                <p style="background: yellow;" class="pt-1 text-dark font-weight-bold small">NEW</p>
              </div>
              <div class="col-md-5 text-center">
                <h4 class="py-4"></h4>
                <h4 style="font-weight:900; color: black;" class="mb-1 text-left text-dark font-weight-bold">{{$static->song}}</h4>       
              <h6 class="text-dark text-left">{{$static->artist}}</h6>
              </div>
            </div>
            @else
            <div class="row">

               <div class="col-md-5">
                <img src="{{$static->image}}" class="border" height="90px;">      
               </div>

               <div class="col-md-1 mt-1">
                  @if($pos=='up') <i style="color: green;" class="fas fa-arrow-alt-circle-up fa-2x"></i>
                  @elseif($pos=='down') <i style="color: red;" class="fas fa-arrow-alt-circle-down fa-2x"></i>
                  @else <i class="fas fa-arrow-alt-circle-right text-secondary fa-2x"></i>
                  @endif 
              </div>
              <div class="col-md-6">
                <h5 class="mb-1 text-left text-dark font-weight-bold">{{$static->song}}</h5>       
              <p class="text-dark text-left">{{$static->artist}}</p>
              </div>
            </div>
            @endif


          </div>
        </div>
        
         </td>

      <td style="width: 8%;" scope="row" class="text-center bg-light"> </td>
        <td scope="row" class="text-center">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

      <td style="width: 9%;" scope="row" class="text-center bg-light">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

      <td style="width: 9%;" scope="row" class="text-center">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

    </tr> 

  
  @endif


   @endif
   @endforeach

@if($cnt==0)

      <tr id="loading" class="chart-tr">
      <td scope="" class="py-0 text-center"> 
        <div class="row">
          <div class="col-md-2 py-4" style="background:black;">
            <h3 class="text-center @if($static->position == 1) pt-5 @endif" style="font-weight:900;">{{$static->position}}
            </h3>
          </div>

          <div class="col-md-10 pt-3">

             @if($static->position == 1)
            <div class="row">
              <div class="col-md-5">
                <img src="images/user.jpg" class="border" height="180px;">      
              </div>
              <div class="col-md-1 px-0 my-auto"> 
                <p style="background: yellow;" class="pt-1 text-dark font-weight-bold small">NEW</p>
              </div>
              <div class="col-md-5 text-center">
                <h4 class="py-4"></h4>
                <h4 style="font-weight:900; color: black;" class="mb-1 text-left text-dark font-weight-bold">{{$static->song}}</h4>       
              <h6 class="text-dark text-left">{{$static->artist}}</h6>
              </div>
            </div>
            @else
            <div class="row">

              <div class="col-md-5">
                <img src="{{$static->image}}" class="border" height="90px;">      
               </div>

               <div class="col-md-1 mt-1">
              <i style="color: green;" class="fas fa-arrow-alt-circle-up fa-2x"></i> 
              </div>
              <div class="col-md-6">
                <h5 class="mb-1 text-left text-dark font-weight-bold">{{$static->song}}</h5>       
              <p class="text-dark text-left">{{$static->artist}}</p>
              </div>
            </div>
            @endif

            

          </div>
        </div>
        
         </td>

      <td style="width: 8%;" scope="row" class="text-center bg-light"> </td>
        <td scope="row" class="text-center">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

      <td style="width: 9%;" scope="row" class="text-center bg-light">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

      <td style="width: 9%;" scope="row" class="text-center">
         <h6 style="font-family:monospace;" class="py-3 text-dark font-weight-bold"> 
        {{$static->position}}</h6> 
      </td>

    </tr>

    
   @endif
    @endforeach

    
  </tbody>
</table>

<div class="clearfix py-4"></div>
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

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script type="text/javascript">
/*
$(window).on("load", getSongs);

function getSongs() {
  var key, value,i=1, j=1,tops=1,dur,p=1;
  var BreakException = {};
  //var stageName=document.getElementById('myStageName').value;

     $.ajax({
            url:"move", 
            method:"GET",
            dataType: 'json',
          success: function(data) {  
            const songs20=data.data;
            const songs_all=data.data2;
            const today=data.today;
            const artists=data.artists;
            const all_titles=data.all_titles;


// Top 20 chart
           Object.entries(songs20).forEach(entry => {
           const [title, pos] = entry;
           console.log(title,pos);
           if(pos=='up')
           $('#move'+p).html('<i class="fas fa-arrow-alt-circle-up text-success fa-2x"></i>'); 
           if(pos=='down')
           $('#move'+p).html('<i class="fas fa-arrow-alt-circle-down text-danger fa-2x"></i>'); 
          if(pos=='not')
           $('#move'+p).html('-'); 
           p++;
          
            
          }); 

            
          },
          error:function(error)
          {console.log(error);}

        });
}
*/

</script>


          @endsection
        
       
