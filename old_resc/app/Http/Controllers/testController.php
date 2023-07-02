<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use Hash;
use PDF;

class testController extends Controller
{
   

public function home() { 
  $thisUser=User::where('email', Session::get('logged'))->first();
  return view('home',compact('thisUser'));
 }

  function breakdown () {
   //API
    $titles=array();
    $titles2=array();
    $songs20=array();
    $i=0; $day;$cn=0;
    $resp2=array();
    $resp3=array();
    $todays=array();
    $today=array();
    $todaySongs=array();


    // // 5 D A Y S
for($day=0;$day<=5;$day++) {

$m = date("m"); // Month value
$de = date("d"); // Today's date
$y = date("Y"); // Year value
$back5days = date('Ymd', mktime(0,0,0,$m,($de-$day),$y)) ;
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2010/channels/246131/results?type=day&date=$back5days";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI3IiwianRpIjoiMjFiY2RmOTJiZTdjMTU3ZjhhYjRiMWUyZGM1MjBiMTQ4NWMzOTRkNjgyZDJhZTA3MWQyZDgwMTJkNjg0M2M5MjU5MmFmOGQ2MDNmNGI3ZTkiLCJpYXQiOjE2NDY1MDI2NDYuMjM3NjMzLCJuYmYiOjE2NDY1MDI2NDYuMjM3NjM2LCJleHAiOjE5NjIxMjE4NDYuMjAwMTg5LCJzdWIiOiIxMzM1OTkiLCJzY29wZXMiOlsiYm0tcHJvamVjdHMiLCJibS1jcy1wcm9qZWN0cyIsIndyaXRlLWJtLWNzLXByb2plY3RzIiwicmVhZC1ibS1jcy1wcm9qZWN0cyIsImJtLWJkLXByb2plY3RzIiwid3JpdGUtYm0tYmQtcHJvamVjdHMiLCJyZWFkLWJtLWJkLXByb2plY3RzIl19.oNEDD_T_ntzILMZdD_vxinFMGDtMne436wKEDbU887yhJaJaUJmvQH6E5KceV6w7ulCf2oZNvTZw84twUjDyr7UNwqxTvPSx2lJ8b9LF_CnDN24LshKJzmNhK5pzPLdtIdVT9494VSZXX8unIzunlHwAtiprcNzaqBW77r-BSmElFuIwRJRViYlqsuQORQiyAR9W5Wt88XPZfg9uAzcA2q0d1zAaVG6UMyY3UrSlZ62GgpPdweQkqlKvSvItORoaQ-0wTa63PBjd81J4q8UaHVAwP3_Ad_6hDkKSqj36ic79cqSW4qA1_DGOoVfKImLjH9pALqvgtquo-yw85rGa28Qlw0BQZBkDXAlvvVSOKb-MhU-Cd-MU4ACRLNWKNZYFuHH76sMn48ROkzp2Bi6NVbJQGXdayuojIc_gp-niBXvjDjcfvz-ESsC3-UO-kAHtVTx13O0fL7fKgAQqN4cWHY5jTv-MR_FC4qrOOv4d7yjfEikVmGhny7NKAnCV_PfXeP7sVMkDhiKY5hEKCkwAAkocKl0cnkyPOkBSwG3Y8ziW_tCezymwOf8RieIGtV2DhXJI2-3W56P7pbwrGBzbHIydzwVvz366N-BR26k-4pMOpiU5f7oka_dBXtnLzYSKDsEp2NifXgrW2f-Ef5tpgDyN96iG6lzvzjXPEtGDKuY",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$resp=json_decode($resp,true);

$resp2=$resp['data'];
curl_close($curl);
//echo '<pre>'; print_r($resp2); echo '<pre>'; 

foreach($resp2 as $songs){ 
if(isset($songs['metadata']['timestamp_utc']))  //echo '<br>'. 
  $titles[$i]['timestamp']=date('m/d/Y, h:i a',strtotime($songs['metadata']['record_timestamp']));

if(isset($songs['metadata']['music'][0]['title'])) $titles[$i]['title']=$songs['metadata']['music'][0]['title'];
if(isset($songs['metadata']['music'][0]['album']['name'])) $titles[$i]['album']=$songs['metadata']['music'][0]['album']['name'];
if(isset($songs['metadata']['music'][0]['artists'][0]['name'])) $titles[$i]['artist']=$songs['metadata']['music'][0]['artists'][0]['name'];
if(isset($songs['metadata']['music'][0]['release_date'])) $titles[$i]['release_date']=$songs['metadata']['music'][0]['release_date'];
  if(isset($songs['metadata']['played_duration'])) $titles[$i]['duration']=$songs['metadata']['played_duration']; 
  $i++;
}

}

//exit;

//5 DAYS

    $pdf = PDF::loadView('success',compact('titles'));
    return $pdf->download('breakdown.pdf');
     }




	public function getSongs() {
    //API
    $titles=array();
    $titles2=array();
    $songs20=array();
    $i=0; $day;$cn=0;
    $resp2=array();
    $resp3=array();
    $todays=array();
    $today=array();
    $todaySongs=array();
    $artists=array();


    // // 5 D A Y S
for($day=1;$day<=5;$day++) {

$m = date("m"); // Month value
$de = date("d"); // Today's date
$y = date("Y"); // Year value
$back5days = date('Ymd', mktime(0,0,0,$m,($de-$day),$y)) ;
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2010/channels/246131/results?type=day&date=$back5days";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI3IiwianRpIjoiMjFiY2RmOTJiZTdjMTU3ZjhhYjRiMWUyZGM1MjBiMTQ4NWMzOTRkNjgyZDJhZTA3MWQyZDgwMTJkNjg0M2M5MjU5MmFmOGQ2MDNmNGI3ZTkiLCJpYXQiOjE2NDY1MDI2NDYuMjM3NjMzLCJuYmYiOjE2NDY1MDI2NDYuMjM3NjM2LCJleHAiOjE5NjIxMjE4NDYuMjAwMTg5LCJzdWIiOiIxMzM1OTkiLCJzY29wZXMiOlsiYm0tcHJvamVjdHMiLCJibS1jcy1wcm9qZWN0cyIsIndyaXRlLWJtLWNzLXByb2plY3RzIiwicmVhZC1ibS1jcy1wcm9qZWN0cyIsImJtLWJkLXByb2plY3RzIiwid3JpdGUtYm0tYmQtcHJvamVjdHMiLCJyZWFkLWJtLWJkLXByb2plY3RzIl19.oNEDD_T_ntzILMZdD_vxinFMGDtMne436wKEDbU887yhJaJaUJmvQH6E5KceV6w7ulCf2oZNvTZw84twUjDyr7UNwqxTvPSx2lJ8b9LF_CnDN24LshKJzmNhK5pzPLdtIdVT9494VSZXX8unIzunlHwAtiprcNzaqBW77r-BSmElFuIwRJRViYlqsuQORQiyAR9W5Wt88XPZfg9uAzcA2q0d1zAaVG6UMyY3UrSlZ62GgpPdweQkqlKvSvItORoaQ-0wTa63PBjd81J4q8UaHVAwP3_Ad_6hDkKSqj36ic79cqSW4qA1_DGOoVfKImLjH9pALqvgtquo-yw85rGa28Qlw0BQZBkDXAlvvVSOKb-MhU-Cd-MU4ACRLNWKNZYFuHH76sMn48ROkzp2Bi6NVbJQGXdayuojIc_gp-niBXvjDjcfvz-ESsC3-UO-kAHtVTx13O0fL7fKgAQqN4cWHY5jTv-MR_FC4qrOOv4d7yjfEikVmGhny7NKAnCV_PfXeP7sVMkDhiKY5hEKCkwAAkocKl0cnkyPOkBSwG3Y8ziW_tCezymwOf8RieIGtV2DhXJI2-3W56P7pbwrGBzbHIydzwVvz366N-BR26k-4pMOpiU5f7oka_dBXtnLzYSKDsEp2NifXgrW2f-Ef5tpgDyN96iG6lzvzjXPEtGDKuY",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$resp=json_decode($resp,true);

$resp2=$resp['data'];
curl_close($curl);
//echo '<pre>'; print_r($resp2); echo '<pre>'; 

foreach($resp2 as $songs){  
$titles2[$i]=$songs['metadata']['music'][0]['title']; $artists[$i]=$songs['metadata']['music'][0]['artists'][0]['name'];

if(isset($songs['metadata']['music'][0]['title'])) $titles[$i]['title']=$songs['metadata']['music'][0]['title'];
if(isset($songs['metadata']['music'][0]['album']['name'])) $titles[$i]['album']=$songs['metadata']['music'][0]['album']['name'];
if(isset($songs['metadata']['music'][0]['artists'][0]['name'])) $titles[$i]['artist']=$songs['metadata']['music'][0]['artists'][0]['name'];
if(isset($songs['metadata']['music'][0]['release_date'])) $titles[$i]['release_date']=$songs['metadata']['music'][0]['release_date'];
  if(isset($songs['metadata']['played_duration'])) $titles[$i]['duration']=$songs['metadata']['played_duration']; 
  $i++;
}

}

$title_count_all=array_count_values($titles2); arsort($title_count_all);

$title_count=array_count_values($titles2); arsort($title_count);
$artist_count=array_count_values($artists); arsort($artist_count);

foreach($title_count as $key => $value){
if($cn>19) break;
$songs20[$key] = $value;
$cn++;
}

/*
//$songs20=(array)$songs20;
//foreach($title_count as $k=>$val) {
//echo '<pre>';echo $cn++; echo $k.'=>'.$val; echo '<pre>';  }exit;


  foreach($title_count as $k=>$val) 
  foreach($titles as $index => $arr){
  if($k == $arr['title']) {
    if(isset($arr['title']))  echo ' // Title = '.$arr['title'];
    if(isset($arr['album'])) echo ' // Album = '.$arr['album'];
      if(isset($arr['duration'])) echo ' // Duration = '.$arr['duration'];
      if(isset($arr['release_date'])) echo ' // Release = '.$arr['release_date'];
      if(isset($arr['artist'])) echo ' // Artist = '.$arr['artist'];
    echo '<br>'.'______________________________________________________________________________________'.'<br>'.$cn++; break;
  } */




$a=0;
// Today

$currentdate = date('Ymd');
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2010/channels/246131/results?type=day&date=$currentdate";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI3IiwianRpIjoiMjFiY2RmOTJiZTdjMTU3ZjhhYjRiMWUyZGM1MjBiMTQ4NWMzOTRkNjgyZDJhZTA3MWQyZDgwMTJkNjg0M2M5MjU5MmFmOGQ2MDNmNGI3ZTkiLCJpYXQiOjE2NDY1MDI2NDYuMjM3NjMzLCJuYmYiOjE2NDY1MDI2NDYuMjM3NjM2LCJleHAiOjE5NjIxMjE4NDYuMjAwMTg5LCJzdWIiOiIxMzM1OTkiLCJzY29wZXMiOlsiYm0tcHJvamVjdHMiLCJibS1jcy1wcm9qZWN0cyIsIndyaXRlLWJtLWNzLXByb2plY3RzIiwicmVhZC1ibS1jcy1wcm9qZWN0cyIsImJtLWJkLXByb2plY3RzIiwid3JpdGUtYm0tYmQtcHJvamVjdHMiLCJyZWFkLWJtLWJkLXByb2plY3RzIl19.oNEDD_T_ntzILMZdD_vxinFMGDtMne436wKEDbU887yhJaJaUJmvQH6E5KceV6w7ulCf2oZNvTZw84twUjDyr7UNwqxTvPSx2lJ8b9LF_CnDN24LshKJzmNhK5pzPLdtIdVT9494VSZXX8unIzunlHwAtiprcNzaqBW77r-BSmElFuIwRJRViYlqsuQORQiyAR9W5Wt88XPZfg9uAzcA2q0d1zAaVG6UMyY3UrSlZ62GgpPdweQkqlKvSvItORoaQ-0wTa63PBjd81J4q8UaHVAwP3_Ad_6hDkKSqj36ic79cqSW4qA1_DGOoVfKImLjH9pALqvgtquo-yw85rGa28Qlw0BQZBkDXAlvvVSOKb-MhU-Cd-MU4ACRLNWKNZYFuHH76sMn48ROkzp2Bi6NVbJQGXdayuojIc_gp-niBXvjDjcfvz-ESsC3-UO-kAHtVTx13O0fL7fKgAQqN4cWHY5jTv-MR_FC4qrOOv4d7yjfEikVmGhny7NKAnCV_PfXeP7sVMkDhiKY5hEKCkwAAkocKl0cnkyPOkBSwG3Y8ziW_tCezymwOf8RieIGtV2DhXJI2-3W56P7pbwrGBzbHIydzwVvz366N-BR26k-4pMOpiU5f7oka_dBXtnLzYSKDsEp2NifXgrW2f-Ef5tpgDyN96iG6lzvzjXPEtGDKuY",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$resp=json_decode($resp,true);
$resp=$resp['data'];
curl_close($curl);
//echo '<pre>'; print_r($resp); echo '<pre>'; 

foreach($resp as $songs){ 
  $todays[$a]=$songs['metadata']['music'][0]['artists'][0]['name']; $a++;
}

$today=array_count_values($todays); arsort($today);
//foreach($today as $k=>$val) 
//$todaySongs[$k]=$val;


// Today



//return view('home', compact('songs20', 'titles'));
  return response()->json(['data'=>$songs20, 'data2'=>$titles, 'today'=> $today, 
    'artists'=>$artist_count,'all_titles'=>$title_count_all]);
// // 5 D A Y S



    
        //API

    //return view('home');
}


  public function radio() {


    // Recent
$i=0;$j=0;
$titles=array();
$currentdate = date('Ymd');
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2010/channels/246131/results?type=last";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI3IiwianRpIjoiMjFiY2RmOTJiZTdjMTU3ZjhhYjRiMWUyZGM1MjBiMTQ4NWMzOTRkNjgyZDJhZTA3MWQyZDgwMTJkNjg0M2M5MjU5MmFmOGQ2MDNmNGI3ZTkiLCJpYXQiOjE2NDY1MDI2NDYuMjM3NjMzLCJuYmYiOjE2NDY1MDI2NDYuMjM3NjM2LCJleHAiOjE5NjIxMjE4NDYuMjAwMTg5LCJzdWIiOiIxMzM1OTkiLCJzY29wZXMiOlsiYm0tcHJvamVjdHMiLCJibS1jcy1wcm9qZWN0cyIsIndyaXRlLWJtLWNzLXByb2plY3RzIiwicmVhZC1ibS1jcy1wcm9qZWN0cyIsImJtLWJkLXByb2plY3RzIiwid3JpdGUtYm0tYmQtcHJvamVjdHMiLCJyZWFkLWJtLWJkLXByb2plY3RzIl19.oNEDD_T_ntzILMZdD_vxinFMGDtMne436wKEDbU887yhJaJaUJmvQH6E5KceV6w7ulCf2oZNvTZw84twUjDyr7UNwqxTvPSx2lJ8b9LF_CnDN24LshKJzmNhK5pzPLdtIdVT9494VSZXX8unIzunlHwAtiprcNzaqBW77r-BSmElFuIwRJRViYlqsuQORQiyAR9W5Wt88XPZfg9uAzcA2q0d1zAaVG6UMyY3UrSlZ62GgpPdweQkqlKvSvItORoaQ-0wTa63PBjd81J4q8UaHVAwP3_Ad_6hDkKSqj36ic79cqSW4qA1_DGOoVfKImLjH9pALqvgtquo-yw85rGa28Qlw0BQZBkDXAlvvVSOKb-MhU-Cd-MU4ACRLNWKNZYFuHH76sMn48ROkzp2Bi6NVbJQGXdayuojIc_gp-niBXvjDjcfvz-ESsC3-UO-kAHtVTx13O0fL7fKgAQqN4cWHY5jTv-MR_FC4qrOOv4d7yjfEikVmGhny7NKAnCV_PfXeP7sVMkDhiKY5hEKCkwAAkocKl0cnkyPOkBSwG3Y8ziW_tCezymwOf8RieIGtV2DhXJI2-3W56P7pbwrGBzbHIydzwVvz366N-BR26k-4pMOpiU5f7oka_dBXtnLzYSKDsEp2NifXgrW2f-Ef5tpgDyN96iG6lzvzjXPEtGDKuY",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$resp=json_decode($resp,true);
$resp=$resp['data'];
curl_close($curl);
//echo '<pre>'; print_r($resp); echo '<pre>'; exit; 

  foreach($resp as $songs){  
if(isset($songs['metadata']['music'][0]['title'])) $titles['title']=$songs['metadata']['music'][0]['title'];

if(isset($songs['metadata']['music'][0]['artists'][0]['name'])) $titles['artist']=$songs['metadata']['music'][0]['artists'][0]['name'];

  if(isset($songs['metadata']['played_duration'])) $titles['duration']=$songs['metadata']['played_duration']; 
  //$i++;
} 
// Recent

    return view('radio',compact('titles'));
}


  public function social() {
    $thisUser=User::where('email', Session::get('logged'))->first();
    return view('social',compact('thisUser'));
}



  public function about() {
    return view('about');
}

 public function login() {
    return view('login');
}


public function logout() {
   Session::forget('logged');
   Session::save();
   return redirect('login');
}


 public function register() {
    return view('register');
}

public function updateBio(Request $hos)
    {    $thisUser=User::where('email', Session::get('logged'))->first();
         $id=$thisUser->id;
          User::where('id',$id)->update($hos->except(['_token']));
          return redirect('social'); 
      }



 public function register_post(Request $hos)
    {    
           $fname=$hos->fname;
           $lname=$hos->fname;
           $stage_name=$hos->stage_name;
           $art_id=$hos->art_id;
           $email=$hos->email;
           $password=$hos->password;
           $bio=$hos->bio;
          //$phone=$hos->phone;
           $password=Hash::make($hos->password); 

          $user= User::where('email', $email)->get(); 
          if($user->count() >0 ) {
         
          Session::put('email','Email already exists'); return redirect()->back();
      }
      else{

          $admins = User::create([
          'fname' =>  $fname,
           'lname' =>  $lname,
            'stage_name' =>  $stage_name,
             'art_id' =>  $art_id,
          'email' =>  $email,
          'bio' =>  $bio,
          'password' =>  $password
          ]);
          Session::put('logged',$email);

         return redirect('home')->with('success', "You are registered!"); 
     }

    }



public function login_post(Request $formData)
{  

$email = $formData->email;
$password = $formData->password;
$user= User::where('email', $email)->first(); 
//$check_user=json_decode($user,true);

if($user->count() >0 ) { //return $user->art_id;
$db_password=$user->password; //opd_admin
if(password_verify($password, $db_password)) {
    Session::put('logged',$email);
    return redirect('home');
  }


else
     Session::put('login_err','Password wrong!'); return redirect()->back(); 
}

  else { Session::put('login_err','user dont exist!'); return redirect()->back(); }
 
 }





public function likeDislike() {
    $status=Likecomm::first();
    $comment=DB::table('comments')->get();

    return view('likeDislike', compact('status','comment'));
}


// likeUnlike Route
    public function likeCount($likes, $status)
    {
//$data = $request->posterIsReady;
//$message=$decoded['message'];
//$place=$decoded['place'];

    	$likes=$likes;
      $status=DB::table('likecomms')->first();
      $stts=$status->likeStatus;
      $liks=$status->likes;
 $data=array();
            if($stts==0){
          $data['likes']=$liks+1;
          $data['likeStatus']=1;
      }
      else{
        $data['likes']=$liks-1;
          $data['likeStatus']=0;

      }
        DB::table('likecomms')->update($data);

        return response()->json(['message' => 'Info Inserted!']);




        
    }






 public function comment(Request $request)
    {

      $comment=$request->comment;
      $status=DB::table('likecomms')->first();
      $comm_count=$status->comments;
      $comm_count=$comm_count+1;
      DB::table('likecomms')
      ->update(['comments'=> $comm_count]);

 $data=array();   
        $data['Comms']=$comment;
        DB::table('comments')->insert($data);

        return response()->json(['message' => 'Comment Inserted!']);        
    }




public function delcom($id) {
        DB::table('comments')->delete($id);
         

         $status=DB::table('likecomms')->first();
      $comm_count=$status->comments;
      $comm_count=$comm_count-1;
      DB::table('likecomms')
      ->update(['comments'=> $comm_count]);

        return response()->json(['message' => 'Comment Deleted!']);        
    }






}
