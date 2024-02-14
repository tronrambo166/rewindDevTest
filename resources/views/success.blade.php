<table class="shadow my-3 w-100 bg-white table tabil">
  <thead>
    <tr class=" bg-light w-100">


      <th> Title</th>
      <th> Album</th>
      <th> Duration</th>
      <th> Played on</th>
      <th style="padding-right:15px;"> Released date</th>
     
      
    </tr>
  </thead>
  <tbody> 

    
   @foreach($titles as $k => $arr)
   @if( isset($arr['artist']) && $arr['artist']==$stage_name)

    <tr class="border">
      
      
      <td>@if(isset($arr['title'])) {{$arr['title']}} @endif</td>
      <td>@if(isset($arr['album'])) {{$arr['album']}} @endif</td>
      <td>@if(isset($arr['duration'])) @if ($arr['duration']<10) {{$arr['duration']}} @else {{round($arr['duration']/60)}} @endif mins  @endif</td>
          
       <td>@if(isset($arr['timestamp'])) {{$arr['timestamp']}} @endif</td>
    <td>@if(isset($arr['release_date'])) {{$arr['release_date']}} @endif</td>
    </tr>

     @endif
     @endforeach
    
  </tbody>
</table>