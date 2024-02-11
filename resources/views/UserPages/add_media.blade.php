@extends('UserPages.layout')  
@section('content')

<div class="content_bg py-4">
<div class="container mx-auto" style="background: #141414;width: 80%;"> 
  
<!-- Station Region CHART -->
<h5  style="font-weight: 800;"class="text-center py-3 mt-4">Rewind Artist Per Station Charts</h5>
<div class="row mx-auto shadow" style=""> 

        <div class="card w-100 px-3 pt-3 bg-white">

        <div class="wrapper card" style="width: 65%;">
        <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h5 style="text-decoration: underline;">Station and media entry form</h5>
          </div>

          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Choose radio station</h6>
          </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Citizen Radio</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Kiss Fm</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Radio Maisha</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Classic 105</h6>
         </div>

        </div>



        <div class="row my-3 w-75 mx-auto">

          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Choose Tv station</h6>
          </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Citizen Tv</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">KTN</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">NTV</h6>
         </div>

         <div class="col-md-3">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold"><input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">K24</h6>
         </div>

        </div>



          <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Uplaod Media</h6>
          </div>

         <div class="col-md-6">


          <div class="upload-btn-wrapper text-dark ml-3 w-100">
                      <label for="file-upload2" class="btnUp_listing">
                        <input class="border small mr-2 pl-2" type="text" name="media_name" value="" placeholder="Media Name">
                      <img src="images/up.svg" width="30px"> </label>
                      <input style="" id="file-upload2" required type="file" name="pin" />
                       
                    </div>
         </div>
        </div>

          <div class="row my-3 w-75 mx-auto">
          <div class="col-sm-12 my-3 text-dark">
            <h6 class="font-weight-bold" style="">Monitoring Duration</h6>
          </div>

         <div class="col-md-6">
          <h6 style="font-size: 11px;" class="text-left my-2 mb-0 text-dark font-weight-bold">Start</h6>
          <input type="date" name="start_date" class="border small">
         </div>

         <div class="col-md-6">
          <h6 style="font-size: 11px;" class="text-left my-2 mb-0 text-dark font-weight-bold">End</h6>
          <input type="date" name="end_date" class="border small">
         </div>

        </div>

        <div class="row my-3 w-75 mx-auto">

         <div class="col-md-6">
          <button class="btn border border-dark px-4 py-1">Save</button>
         </div>

         <div class="col-md-6">
          <button class="btn border border-dark px-4 ml-3 py-1">Cancel</button>
         </div>
        </div>

        </div>

        </div>
        </div>


<div class="clearfix py-5"></div>
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
        
       

