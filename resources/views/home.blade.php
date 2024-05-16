@extends('layout')  
@section('page')

<style>.shimmer{background:#ffffffe6;background-image:linear-gradient(to right, #e2e3e4 0%, #f6f7f8 20%, #e2e3e4 40%, #e2e3e4 100%);background-repeat:no-repeat}</style>

<div class="row mx-auto" style="width:90%; background:#161616;">  
         <div class="col-md-3"> 
            <h5 class="text-center text-light mt-2">The Top 20</h5>

            <!-- <a class="text-light" href="http://www.last.fm/api/auth/?api_key=e5ac6bd9fa970f8295755e999e4a286a"> APIAuth</a>

            <a class="text-light" href="https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=e5ac6bd9fa970f8295755e999e4a286a&artist=ruger&track=dior&format=json"> getTrack</a> -->

             <hr>

            <table class="table tabil mb-4 text-light">
  <thead>
    <tr>
      <th scope="col">Position</th>
      <th scope="col">Art</th>
      <th scope="col">Artist</th>
      <th scope="col">Song</th>
      <th scope="col">Move</th>
    
    </tr>
  </thead>
  <tbody id="songs"> 
    <tr id="loading">
     
     <!--  <td class="font-weight-bold"> Loading... </td> -->
     
    </tr>

    
  </tbody>
</table>


<div id="shimmerDiv">
       <div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div><div class="shimmer  shimmer_large_para"></div>
</div>

<div class="clearfix py-3"></div>

<input type="text" hidden="" id="myStageName" value="{{$thisUser->stage_name}}">

             </div>  

         <div class="col-md-3"> </div>
           <div class=" text-light col-md-6 text-center" style="background-image: url('images/imagex.jpg');background-repeat:no-repeat; min-height: 600px;">
             <h5 class="text-center  ">Recent Most Popular Content for {{$thisUser->stage_name}}</h5>

           

             <hr>
             <p class="mb-1 font-weight-bold">Your Rank Now! <span id="rank"class="d-block font-weight-bold text-danger">N/A</span></p>

             <p class="font-weight-bold">Your Plays this week! <span id="played"class="d-block font-weight-bold text-light"></span></p>


             <div id="mySongs"> <p id="load" class="mt-3 w-50 rounds mx-auto bg-light text-dark px-4 py-1">Loading...</p> </div>
             

           </div>    
          
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<script type="text/javascript">
$(window).on("load", getSongs);

function getSongs() {
  var key, value,i=1, j=1,k=1,tops=1,dur,move;
  var BreakException = {};
  var stageName=document.getElementById('myStageName').value;
  var art = '';

     $.ajax({
            url:"getSongs", 
            method:"GET",
            dataType: 'json',
          success: function(data) {  
            const songs20=data.data;
            const songs_all=data.data2;
            const today=data.today;
            const artists=data.artists;
            const all_titles=data.all_titles;

            Object.entries(today).forEach(entry => {
           const [key, value] = entry;
           if(key==stageName) {
           //console.log(j,key,value);
          document.getElementById('rank').innerHTML=j;
         
        }
           j++;
          
          });  

             Object.entries(artists).forEach(entry => {
            const [title, count] = entry;
              if(title==stageName)  document.getElementById('played').innerHTML=count;
              //console.log(title,count);
         })



// Top 20 chart
           Object.entries(songs20).forEach(entry => {
           const [title, count] = entry; console.log(title+'=>>'+count);
           try{
            Object.entries(songs_all).forEach(entry => {
           const [key, value] = entry; //console.log(key+'=>'+value);
           if(title != value.artist) { 
            
           if( value.title == title && i<30){ 
            if(value.duration<10) dur=value.duration; else dur=(value.duration/60).toFixed();
            
            //New Move
           if(count=='up')
           move='<i class="fas fa-arrow-alt-circle-up text-success fa-2x"></i>'; 
           if(count=='down')
            move='<i class="fas fa-arrow-alt-circle-down text-danger fa-2x"></i>'; 
          if(count=='not')
            move='-'; 
                   
            //New Move

            //LastFm
            const apiUrl = 'https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=e5ac6bd9fa970f8295755e999e4a286a&artist='+value.artist+'&track='+value.title+'&format=json';

            //const apiUrl = 'https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=e5ac6bd9fa970f8295755e999e4a286a&artist=ruger&track=dior&format=json';
            // Make a GET request
            
            fetch(apiUrl)
              .then(response => {
                if (!response.ok) {
                  throw new Error('Network response was not ok');
                }
                return response.json();
              })
              .then(data => {
                art = data.track.album.image[2]['#text'];

                if (typeof art != 'undefined'){
                if(value.title != 'Breaking News'){
                $('#songs').append('<tr><th scope="row" class="text-center">'+i+'</th>     <td> <img width="80px" src="'+art+'" /> </td> <td>'+value.artist+'</td>  <td>'+value.title+'</td> <td> '+move+'</td>  </tr>'); i++;
              } }

              else{ console.log('noo'); }

                
              })
              .catch(error => {
                console.error('Error:', error);
              });
            //LastFM

           
               $('#loading').remove();
               $('#shimmerDiv').remove();


               // if(value.artist=='Otile Brown')  document.getElementById('played').innerHTML=count;           
           //console.log(value.album); 
            throw BreakException; }; }

          });  

          }
          catch(e) { if (e !== BreakException) throw e;}
             
          }); 

           
           // Top 10 songs of artist
           Object.entries(all_titles).forEach(entry => {
           const [title, count] = entry; 
           try{
            Object.entries(songs_all).forEach(entry => {
           const [key, value] = entry;
           if( value.title == title && value.artist == stageName && tops<=10){ 

              $('#mySongs').append(' <p class="mt-3 w-50 rounds mx-auto bg-light text-dark px-4 py-1">'+tops+'. '+value.title+'</p>');
              $('#load').remove(); //console.log(value.title);

           //console.log(value.album); 
           tops++; throw BreakException; 
          };
          });  

          }
          catch(e) { if (e !== BreakException) throw e;}       
          }); 

            
          },
          error:function(error)
          {console.log(error);}

        });
}

</script>



          @endsection
        
       

