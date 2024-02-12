@extends('layout')  
@section('page')

<div class="content_bg py-4">
<div class="container mx-auto" style="background: #141414;width: 80%;"> 
  
   @if(Session::has('Stripe_pay'))
  <p class="bg-light text-success font-weight-bold text-center py-2">
    {{Session::get('Stripe_pay')}} @php Session::forget('Stripe_pay'); @endphp
  </p>
  @endif
<!-- Station Region CHART -->
<div class="row mx-auto shadow" style=""> 

        <div class="card w-100 px-3 pt-3 bg-white">


          <div class="row my-3 w-75 mx-auto">

          <div class="wrapper" style="">
          <div class="row my-0 mx-auto">
          <div class="col-sm-12 my-1 text-dark">
            <p style="color: #444444;" class="small font-weight-bold my-2" style="">Click below to add media to be monitored per station(s). Please wait 24 hours for the monitoring to be active</p>
          </div>

         @foreach($medias as $media)
         <div class="w-100 media">
          <div class="col-md-4 px-3">
          <div class="upload-btn-wrapper text-dark w-100 mt-1">
                        <p class="my-0 border small px-2 py-1 border-dark bg-light rounded">{{$media->media_name}}</p>                     
                    </div>
          </div>

          <div class="col-md-6">

            <a href="{{route('dld_media', $media->id)}}" class="d-inline">
              <img class="small" src="images/down.svg" width="30px">
            </a>

            <a onclick="return confirm('Are you sure?');" href="{{route('del_media', $media->id)}}" class="d-inline ml-2 small">
              <img class="small mt-1" src="images/x.png" width="17px">
            </a>

          </div>
        </div>
        @endforeach
         
          </div>
          </div>


          <div class="wrapper mb-5" style="width: 65%;">
          <div class="row my-3 mx-auto">

         <div class="col-md-8">
          <div class="upload-btn-wrapper text-dark w-100 mt-1">
                        <a data-toggle="collapse" data-target="#media_div" class="btn border border-dark px-4 py-1 mr-2 "><p class="p-0 m-0 small">Add Media</p>
                        </a>  <i class="fa fa-plus text-secondary"></i>                
                    </div>
             </div>
          </div>
          </div>

        <form method="post" class="" action="{{route('add_media')}}" enctype="multipart/form-data"> @csrf
          
        <div id="media_div" class="collapse wrapper card" style="width: 65%;">
        <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h5 style="text-decoration: underline;">Station and media entry form</h5>
          </div>

          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Choose radio station</h6>
          </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="radio[]" value="Citizen Radio" id="">Citizen Radio</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;"  type="checkbox" name="radio[]" value="Kiss Fm" id="">Kiss Fm</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;"  type="checkbox" name="radio[]" value="Radio Maisha" id="">Radio Maisha</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;"  type="checkbox" name="radio[]" value="Classic 105" id="">Classic 105</h6>
         </div>

        </div>



        <div class="row my-3 w-75 mx-auto">

          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Choose Tv station</h6>
          </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="tv[]" value="Citizen Tv" id="">Citizen Tv</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left  mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="tv[]" value="KTN" id="">KTN</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="tv[]" value="NTV" id="">NTV</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="tv[]" value="K24" id="">K24</h6>
         </div>

        </div>



          <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Uplaod Media</h6>
          </div>

         <div class="col-md-12">


          <div class="upload-btn-wrapper text-dark w-100">
                      <label for="file-upload2" class="btnUp_listing">
                        <input required class="border small mr-2 pl-2" type="text" name="media_name" value="" placeholder="Media Name">
                      <img src="images/up.svg" width="30px"> </label>
                      <input required style="" id="file-upload2" required type="file" name="media_file" />
                       
                    </div>
             </div>
            </div>

          <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Monitoring Duration</h6>
          </div>

         <div class="col-md-6">
          <h6 style="font-size: 11px;" class="text-left my-2 mb-0 text-dark font-weight-bold">Start</h6>
          <input required type="date" name="start_date" class="border small">
         </div>

         <div class="col-md-6">
          <h6 style="font-size: 11px;" class="text-left my-2 mb-0 text-dark font-weight-bold">End</h6>
          <input required type="date" name="end_date" class="border small">
         </div>

        </div>

        <div class="row my-3 w-75 mx-auto">

         <div class="col-md-6">
          <button type="submit" class="btn border border-dark px-4 py-1">Save</button>
         </div>

         <div class="col-md-6">
          <a data-toggle="collapse" data-target="#media_div" class="btn border border-dark px-4 ml-3 py-1">Cancel</a>
         </div>
        </div>

        </div>
      </form>

        </div>
        <div class="clearfix py-5"></div>
        </div>



</div>
  </div>
  </div>        
<div class="clearfix py-5" style="background: #111111"></div>

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
        
       

