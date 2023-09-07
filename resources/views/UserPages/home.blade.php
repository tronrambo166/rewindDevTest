@extends('UserPages.layout')  
@section('content')

<div class="bg-light py-4">
<div class="container mx-auto bg-white" style="width: 80%;"> 
   <h4 style="font-weight: 800;" class="text-center font-weight-bold text-dark py-3">Rewind Charts</h4>
  <div class="row mx-auto shadow" style=""> 

         <div class="card px-3 pt-3 bg-white">
         <div class="row">
         <div class="col-sm-4"> 
          <p class="bar" style="width:100%; height:15px;"></p> 
        </div> 

         <div class="col-sm-4"> <h5 class="text-center font-weight-bold text-dark">Rewind Top 40</h5> </div>
         <div class="col-sm-4"> <p class="bar" style="width:100%; height:15px;"></p> </div>
         </div>

         <div class="row my-3">

        <!-- COL -->

        @foreach($static20 as $static)
@foreach($lastDay as $yester)
@if($static->song == $yester->song) 

@if($static->position < $yester->position) 
<?php $pos='up'; $cnt++;?>
@elseif($static->position == $yester->position) 
<?php  $pos='-'; $cnt++;?>
@else <?php $pos='down'; $cnt++; ?>
@endif @endif
@endforeach


         <div class="col-sm-4"> 
         <div class="card shadow">
          <div class="row">
          <div class="col-sm-5 py-2">
            <div class="border border-dark mx-1">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
          <div class="col-sm-7 py-2">
            <div class="row text-dark "> <h3 class="font-weight-bold">{{$static->position}}</h3> &nbsp;&nbsp;
             <span style="height: 24px; padding-left: 6px;padding-right: 6px;" class="bg-secondary rounded-circle mt-1"><i style="font-size: 12px;"class="fa fa-arrow-right text-light"></i></span></div>
            <div class="row"> 
              <div>
                <h6 class="mb-0 text-left text-dark font-weight-bold">{{$static->song}}</h6>
              
              <p class="text-secondary font-weight-bold small">{{$static->artist}}</p>
            </div>
              </div>
          </div>
          </div>

          <div class="row">
          <div class="col-sm-4 pr-0 border-white border-right">
            <div class="small_div text-center">
            <div class="d-inline-block m-auto py-2">
            <p style="font-size:9px;font-family: fantasy;" class="mb-1 text-center font-weight-light small text-info">LAST WEEK</p>
            <h5 class="text-dark text-center font-weight-bold">{{$static->position}}</h5>
            </div>
            </div>
          </div>

            <div class="col-sm-4 px-0 border-white border-right">
            <div class="small_div text-center">
            <div class="d-inline-block m-auto py-2">
            <p style="font-size:9px;font-family: fantasy;" class="mb-1 text-center font-weight-light small text-info">WEEKS AT NO 1</p>
            <h5 class="text-dark text-center font-weight-bold">2</h5>
            </div>
            </div>
          </div>

            <div class="col-sm-4 pl-0">
            <div class="small_div text-center">
            <div class="d-inline-block m-auto py-2">
            <p style="font-size:9px;font-family: fantasy;" class="mb-1 text-center font-weight-light small text-info">WEEKS ON CHART</p>
            <h5 class="text-dark text-center font-weight-bold">3</h5>
            </div>
            </div>
          </div>

          </div>    

         </div>
          </div> 
          <!-- COL -->

          @endforeach

        <!-- COL --> 
         
         </div>


         <div class="row py-3"> 
            <a href="{{route('rewind-chart')}}" style="background:black;" class="font-weight-bold w-100 text-light py-1 m-auto text-center">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></a>
          </div>

      </div>


      <div class="card px-3 w-100 mt-3 bg-white border border-bottom">

        <div class="row"> 
          <p class="bar" style="width:100%; height:15px;"></p> 
        </div>

         <div class="row">
         <div class="col-sm-3"> 
          <h6 class="text-center font-weight-bold text-dark">Rewind Artist Top 40</h6> 
           <button style="background:black;" class="font-weight-bold w-75 text-light mx-auto my-2 text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
        </div> 
         <div class="col-sm-9"> 
          <div class="row">
            <div class="col-sm-3 text-center border-mute border-right">
              <h4 style="width:30%;" class="mx-auto bg-light text-dark rounded-circle">1</h4>
              <h6 class="text-info small font-weight-bold">Taylor Swift</h6>
            </div>

            <div class="col-sm-3 text-center border-mute border-right">
              <h4 style="width:30%;" class="mx-auto bg-light text-dark rounded-circle">2</h4>
              <h6 class="text-info small font-weight-bold">Taylor Swift</h6>
            </div>

            <div class="col-sm-3 text-center border-mute border-right">
              <h4 style="width:30%;" class="mx-auto bg-light text-dark rounded-circle">3</h4>
              <h6 class="text-info small font-weight-bold">Taylor Swift</h6>
            </div>

            <div class="col-sm-3 text-center">
              <h4 style="width:30%;" class="mx-auto bg-light text-dark rounded-circle">4</h4>
              <h6 class="text-info small font-weight-bold">Taylor Swift</h6>
            </div>
          </div>
          
        </div>
        
         </div>

         </div>


      </div>

<!-- Region CHART -->
<h5 style="font-weight: 800;" class="text-center text-dark py-3 mt-4">Rewind Per Region Charts</h5>
<div class="row mx-auto shadow" style=""> 

         <div class="card w-100 px-3 pt-3 bg-white">

        <div class="row">
        <!-- SINGLE -->
         <div class="col-md-3 "> 

          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Nairobi</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div> 


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>

          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Central</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>


           </div>
          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Coast</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>



          </div>
          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Nyanza</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>



          </div>
          </div>
        <!-- SINGLE -->
          
        </div> 



        </div> 
        </div> 
      <!-- Region CHART -->


<!-- Artist Region CHART -->
<h5  style="font-weight: 800;"class="text-center text-dark py-3 mt-4">Rewind Artist Per Region Charts</h5>
<div class="row mx-auto shadow" style=""> 

         <div class="card w-100 px-3 pt-3 bg-white">

        <div class="row">
        <!-- SINGLE -->
         <div class="col-md-3 "> 

          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Nairobi</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div> 


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>

          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Central</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>


           </div>
          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Coast</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>



          </div>
          </div>
        <!-- SINGLE -->


                <!-- SINGLE -->
         <div class="col-md-3"> 
          <div class="ml-1">
          <div class="row">
            <div class="col-md-4">
              <p class="bar" style="width:100%; height:15px;"></p> 
            </div>
            <div class="col-md-4 px-0">
              <h6 class="text-center text-dark font-weight-bold">Nyanza</h6> 
            </div>
            <div class="col-md-4">
              <p class="bar ml-3" style="width:100%; height:15px;"></p> 
            </div>
          </div>

          <div class="row border-mute border-bottom">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" class="" style="width:100%;"></div>
            
          </div>
           </div>


           <div class="row border-mute border-bottom my-2">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 9px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <div class="col-sm-3 pr-0">
             <h6 class="font-weight-bold text-dark d-inline-block">1</h6>

             <div class="mt-1 d-inline-block">
               <span style="background: #ababab; height: 17px; padding-left: 4px;padding-right: 4px;" class=" rounded-circle"><i style="font-size: 8px;top: -3px;position: relative;"class="fa fa-arrow-right text-light"></i></span>
             </div>
           </div>
            <div class="col-sm-6 px-2">
              <h6 style="font-size: 9px;font-weight: 900;" class="mb-0 mt-1 text-dark small">One Day At A Time</h6>
              <p style="font-size: 9px;font-weight: 600;" class="text-secondary font-weight-bold small mb-2">Enrique Iglesias</p>
              </div>
         
          <div class="col-sm-3 px-0">
            <div class="border border-dark ml-3">
              <img src="images/user.jpg" style="width:100%;"></div>
            
          </div>
           </div>

           <div class="row">
            <button style="background:black;font-size: 10px;" class="font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
           </div>



          </div>
          </div>
        <!-- SINGLE -->
          
        </div> 



        </div> 
        </div> 
      <!-- Artist Region CHART -->



<!-- Station Region CHART -->
<h5  style="font-weight: 800;"class="text-center text-dark py-3 mt-4">Rewind Artist Per Station Charts</h5>
<div class="row mx-auto shadow" style=""> 

        <div class="card w-100 px-3 pt-3 bg-white">

        <div class="row w-50">
         <div class="col-md-6 "> 
          <div class=" d-block ml-2">
            <button style="font-size:12px;" class="font-weight-bold text-left border btn mt-2 py-1 w-75 dropdown-toggle small" href="" role="button" id="dropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
                Region
            </button>
            <div class=" py-0" aria-labelledby="dropdownMenuLink">
                <li style="list-style-type: none;" class="mt-3 nav-item p-0 text-secondary">

                    <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Central</a>
                    <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="10000-100000">Coast</a>
                    <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="100000-250000">Eastern</a>
                    <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="250000-500000">Nairobi</a>
                    <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">North Eastern</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Nyanza</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Rift Valley</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Western</a>

                </li>
            </div>
        </div>
        </div> 

          <div class="col-md-6 "> 
          <div class="dropdown show d-block ml-2">
            <a style="font-size:12px;" class=" text-left border btn mt-2 py-1 w-75 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Media (TV/Radio)
            </a>
            <div class="dropdown-menu py-0 px-1" aria-labelledby="dropdownMenuLink">
                <li style="list-style-type: none;" class="mt-3 nav-item p-0 text-secondary">

                      <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                          <input  class="mr-2" style="width:11px;height:11px;" type="checkbox" name="inv_range[]" value="0-10000" id="inv_range">Central</a>
                      <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                          <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="10000-100000">Coast</a>
                      <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                          <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="100000-250000">Eastern</a>
                      <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                          <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="250000-500000">Nairobi</a>
                      <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                          <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">North Eastern</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Nyanza</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Rift Valley</a>
                        <a class="pr-0 py-1" style="font-size:11px;" class="dropdown-item">
                        <input style="width:11px;height:11px;" class="mr-2" type="checkbox" name="inv_range[]" value="500000-">Western</a>

                </li>
            </div>
        </div>
        </div>

        </div>


        <div class="row my-3">
         <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>


          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

        </div>


        <!-- ROW -->
        <div class="row my-3">
         <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>


          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Citizen Radio</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
         </div>

          <div class="col-md-2 ">
          <h6 style="font-size: 11px;" class="text-left ml-2 mb-0 text-dark font-weight-bold">Radio Jambo</h6>
          <button style="background:black;font-size: 9px;" class="pt-1 font-weight-bold w-100 text-light mx-auto text-center small">VIEW CHART &nbsp;  <i class="fa fa-angle-right text-danger"></i></button>
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
        
       

