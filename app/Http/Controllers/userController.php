<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\User;
use App\Models\visitors;
use App\Models\liveSongs;
use App\Models\Media;
use Hash;
use PDF;
use Mail;
use Exception;
use Response;
use Stripe\StripeClient;
use CURLFILE;

class userController extends Controller
{
   public function __construct(StripeClient $client)
    {
        $this->Client = $client;
    }
    // 

  public function UserHome() { 
  return view('UserPages.home');
 }

//MEDIA
public function add_media() {
  $user=User::where('email',Session::get('logged'))->first();
  $medias = Media::where('user_id',$user->id)->get(); 
  return view('add_media', compact('medias', 'user'));
 }

public function add_media_post(Request $request) { 

  $user=User::where('email',Session::get('logged'))->first();
  $radio = implode(',', $request->radio);
  $tv = implode(',', $request->tv);

try{

  //API
  $bearer='eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI3IiwianRpIjoiZDc0NjBiZGQ5MzM2ODNkMzhjOTkzOTYwNDBjMGZjNjMzMDEwOTM2YTE3ZmVjZmY0MmQ0OTE5YTBjYmIxZTAxNTNjYzE3MGM1YmY1ZWIwZGEiLCJpYXQiOjE3MDc3NTk2NTIuNDkyNjM4LCJuYmYiOjE3MDc3NTk2NTIuNDkyNjQxLCJleHAiOjIwMjMzNzg4NTEuMjM2MzY0LCJzdWIiOiIxMzM1OTkiLCJzY29wZXMiOlsiKiIsIndyaXRlLWFsbCIsInJlYWQtYWxsIiwiYnVja2V0cyIsIndyaXRlLWJ1Y2tldHMiLCJyZWFkLWJ1Y2tldHMiLCJhdWRpb3MiLCJ3cml0ZS1hdWRpb3MiLCJyZWFkLWF1ZGlvcyIsImNoYW5uZWxzIiwid3JpdGUtY2hhbm5lbHMiLCJyZWFkLWNoYW5uZWxzIiwibWV0YWRhdGEiLCJyZWFkLW1ldGFkYXRhIl19.d-f_KIetNgHPvHVaEIvGFBrdnmLgk9kPZc-MbcVn5PjKG6S5Mc6a_WfK3SoT58-iPo_9tx301AEkiEEFJdhLdeDqcmd7QXynYJ4LDh8U5_N-birhStibvfkjAvz7SX6Ie8u1XSGArj8R6wdVcgy74xGePThnzRpckAO7fgLLvJIyloCcc50lBq3i-hRbPdpL1jzqAxED4XLPRZiqvGOzZLA-5xdIv45TADsojwwCetdUzYwJvYp5ytw8E87Hoq09KZ7beqC3CwFfCt3pvPHyrAt3FIxyb3-wjJ42-iQllVGKzBz5yHVjmAuqsML6NCRX7brq2mz3888XtNOaUmOUOzGLWnlZx7Q0g99q8awRXN7eq6xofhBhTZqSSnvtfxitCXn4ReJNLM1SzSssEVORARnw8iBRoRK7Qrpue3DfFfaASGN7jG9keg-x4EyE0LkTBAnL5Ptjpjj3c2g8Fm3PMmIRx4O3yTKAGbFo7umK7dtTaclk0fYuQzuKT2Kt5RV-7INGaaMuH2cr3TjPJ718Nh6PSoORRBPwsXIsn9TfJaaQMap77ChD5H2ASk4JW2-DP52xqbf2Oht3O7tb8ImBkc26i1QKbfCs9_L8-HXqdKE7mCRx7I3ivp1un_7fro-Pufn69cYn3YnEV7QDP7w8hahjb02796TCMNP1K5hAw1M';
  
  $bucket = Media::where('user_id',$user->id)->first(); 
  if($bucket) 
  {
     $bucket_id = $bucket->add_id;
  }

  else
  {
  $curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-v2.acrcloud.com/api/buckets',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('name' => uniqid(),'region' => 'us-west-2', 'type' => 'File'),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.$bearer
  ), ));
  $response = curl_exec($curl);
  $response = json_decode($response,true);
  //curl_close($curl); //echo '<pre>'; print_r($response);  echo '<pre>'; exit;
  $bucket_id = $response['data']['id'];
  }


//____________________________________________________________________________________

  

//AD/Music Upload
  //SINGLE 
          $cover=$request->file('media_file');
          $uniqid=$request->media_name;
          $uniqid = str_replace(' ', '_', $uniqid);
          $ext=strtolower($cover->getClientOriginalExtension());
          $cover_name=$uniqid.'.'.$ext; 
          $loc='media/';
          $cover->move($loc, $cover_name);       
  //SINGLE 

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api-v2.acrcloud.com/api/buckets/'.$bucket_id.'/files',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('file'=> new CURLFILE('media/'.$cover_name),'title' => $cover_name,'data_type' => 'audio'),
  CURLOPT_HTTPHEADER => array(
    'Accept: application/json',
    'Authorization: Bearer '.$bearer
  ),
));

$response2 = curl_exec($curl);curl_close($curl);
$response2 = json_decode($response2,true);
//curl_close($curl); 
  //echo '<pre>'; print_r($response2);  echo '<pre>'; exit;

  //API

  if(isset($response2['data']['uid'])){

  $media= Media::create([
    'user_id' => $request->user_id,
    'add_id' => $bucket_id,
    'radio' => $radio,
    'tv' => $tv,
    'media_name' => $request->media_name,
    'media_file' => $cover_name,
    'start' => $request->start_date,
    'end' => $request->end_date,
  ]); 

  Session::put('Stripe_pay', 'Media Create Success!');
}


  return redirect()->back();
  }
      catch(\Exception $e){
      //Session::put('Stripe_pay',$response2['message']);
      Session::put('Stripe_pay',$e->getMessage());
      return redirect()->back();
    }

 }

 public function del_media($id)
    {           
       Media::where('id', $id)->delete();
       return back()->with('success', "Deleted!"); 
 }

 public function dld_media($id)
    {           
      $media = Media::where('id', $id)->first();
      $file = 'media/'.$media->media_file;
      if(file_exists($file))
      return Response::download($file);
      else {
        Session::put('failed','No file was found!');
        return redirect()->back();
      }
 }
//MEDIA

 public function subscribe($name, $email)
 {
   $amount = Session::get('amount');
   return view('UserPages.subscribe',compact('name','email','amount'));
 }

 public function subscribeStripe(Request $request)
 {
    $amount = Session::get('amount');
    $email = $request->email;

    //Stripe
    try{

        $curr='USD'; //$request->currency; 
        // $amount=$request->price;
        // $transferAmount=$amount-($amount*.05);
        
        $this->validate($request, [
            'stripeToken' => ['required', 'string']
        ]);
        $charge = $this->Client->charges->create ([ 
                //"billing_address_collection": null,
                "amount" => $amount*100, //100 * 100,
                "currency" => $curr,
                "source" => $request->stripeToken,
                "description" => "This payment is test purpose only!"
        ]);

        $user= User::where('email', $email)->update(['subscribe' => 1]); 
        Session::put('logged',$email);
        Session::put('Stripe_pay','Subscription success!');
        return redirect("add_media");

        }
      catch(\Exception $e){
      Session::put('Stripe_failed',$e->getMessage());
      return redirect()->back();
    }
 }



public function static20() { 
   if(Session::has('logged') && Session::get('logged') !='') return redirect('home');
   // $static20=liveSongs::take(3)->get();
   // $lastDay=DB::table('last_day_songs')->get();
  return view('UserPages.welcome');
 }

 public function get_started() { 
   if(Session::has('logged') && Session::get('logged') !='') return redirect('home');
   $static20=liveSongs::take(3)->get();
   $lastDay=DB::table('last_day_songs')->get();
  return view('UserPages.home_new',compact('static20','lastDay'));
 }

public function rewindChart() { 
   if(Session::has('logged')) return redirect('home');
   $static20=liveSongs::take(20)->get();
   $lastDay=DB::table('last_day_songs')->get();

   //Last FM
   foreach ($static20 as $stat) {
    $curl=curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL=> 'https://ws.audioscrobbler.com/2.0/?method=track.getInfo&api_key=e5ac6bd9fa970f8295755e999e4a286a&artist='.$stat->artist.'&track='.$stat->song.'&format=json',
    CURLOPT_RETURNTRANSFER=> TRUE,
    CURLOPT_ENCODING=> '',
    CURLOPT_MAXREDIRS=> 10,
    CURLOPT_TIMEOUT=> 30,
    CURLOPT_HTTP_VERSION=> CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST=> 'GET',
    CURLOPT_HTTPHEADER=> array(
    'content-type:application/json',
    'authorization:secret_key'
    ),
    ));

    $response=curl_exec($curl);
    $response=json_decode($response,true);
    if(isset($response['track']['album']['image']))
    $stat->image = $response['track']['album']['image'][1]['#text'];

    $error=curl_error($curl);
    if($error) echo $error;
  }
   //Last FM
  return view('UserPages.rewindChart',compact('static20','lastDay'));
 }


 public function artists() { 
  $artists=User::get();
  return view('UserPages.artists',compact('artists'));
 }

 public function artist_contact(){
  
  try{
    $userEmail=Session::get('Userlogged');  
    $id=Session::get('contact_id');

    $artist_contact=User::where('id', $id)->first();
    $userEmail= visitors::where('email', $userEmail)->first();
  return view ('UserPages.artist_contact',compact('artist_contact','userEmail'));
}
catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
 }


 public function artist_profile($id) { 

try{
  $thisArtist=User::where('id', $id)->first();
  $artistSchedule=DB::table('events')->where('artist_id', $id)->get();
  return view('UserPages.artist_profile',compact('thisArtist','artistSchedule'));
}
catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
 }



 public function user_reg(Request $hos)
    {    
      try{
           $name=$hos->name;
           $email=$hos->email;
           $password=$hos->password;
           $c_password=$hos->c_password;
          
          if($password!=$c_password){
          Session::put('email',"Password don't match!"); return redirect()->back();  }
          
           $password=Hash::make($hos->password); 
           $user= visitors::where('email', $email)->get();            
          if($user->count() >0 ) {   
          Session::put('email','Email already exists'); return redirect()->back();
          }    
      
      else{

          $admins = visitors::create([
          'name' =>  $name,  
          'email' =>  $email,         
          'password' =>  $password
          ]);
          Session::put('Userlogged',$email);
      
          
       /*   // Send Email
        $info=['Name'=>'Dele', 'email' => $email];
        $user['to']= $email;
        Mail::send('welcome_mail', $info, function($msg) use ($user){
            $msg->to($user['to']);
            $msg->subject('Welcome Mail');

        });
        // Send Email */

         return redirect('UserHome')->with('success', "You are registered!"); 
     }
 }
 catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }

    }


    public function UserLogin(Request $formData)
{  

try{
$email = $formData->email;
$password = $formData->password;
$user= visitors::where('email', $email)->first(); 
//$check_user=json_decode($user,true);

if($user==null)
{ Session::put('login_err',"User don't exist!"); return redirect()->back(); }

if($user->count() >0 ) { //return $user->art_id;
$db_password=$user->password; //opd_admin
if(password_verify($password, $db_password)) {
    Session::put('Userlogged',$email);
    if(Session::has('contact_id'))
       return redirect('artist_contact');
     else
    return redirect('UserHome');
  }


else
     Session::put('login_err','Password wrong!'); return redirect()->back(); 
}

  else { Session::put('login_err','user dont exist!'); return redirect()->back(); }
}
catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
 
 }



 public function sendEmail(Request $hos)
    {    
     
     try{
           $to=$hos->toEmail;
           $from=$hos->fromEmail; 
           $userName=$hos->userName;
           $message=$hos->message;
    
        // Send Email
        $info=['Name'=>'Dele', 'email' => $to];
        $user['to']= $to;
        $user['from']=$from;
        $user['name']=$userName;
        Mail::raw($message, function($msg) use ($user){
            $msg->from($user['from'], $user['from'].'('.$user['name'].'), Cloud Rewind User');
            $msg->to($user['to']);
            $msg->subject('User Message');

        });
        // Send Email

         return redirect('UserHome')->with('success', "Message sent successfully!"); 
     }
     catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
     

    }



     public function searchArtist(Request $hos)
    {    
      try{
        
      $searchName=$hos->searchArtist; 
      $result=DB::table('users')->where('stage_name', 'like', '%'.$searchName.'%') //->get();
      ->orWhere('country', 'like', '%'.$searchName.'%')->orWhere('city', 'like', '%'.$searchName.'%')->get();
     

      $artists=User::get(); 
      return view('UserPages.artists', compact('result','artists','searchName'));
  }
  catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
     

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
for($day=0;$day<=4;$day++) {

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
if($cn>20) break;
$songs20[$key] = $value;
$cn++;
}


//DATABASE INSERT/UPDATE


//

//foreach($title_count as $k=>$val) {
//echo '<pre>';echo $cn++; echo $k.'=>'.$val; echo '<pre>';  }exit;

  $datas=array();
  $position=1;

  foreach($title_count as $k=>$val) {
  foreach($titles as $index => $arr){
  if($k == $arr['title']) {
    if(isset($arr['title']))  $datas['song'] = $arr['title'];

    //if(isset($arr['album'])) echo ' // Album = '.$arr['album'];  
      //if(isset($arr['release_date'])) echo ' // Release = '.$arr['release_date'];

      if(isset($arr['artist'])) $datas['artist'] = $arr['artist'];
      if(isset($arr['duration'])){
        if($arr['duration'] <= 10)
        $datas['duration'] =$arr['duration'].' mins';
        else  $datas['duration'] =round(($arr['duration']/60)).' mins';

      }
      $datas['position']=$position; 

      DB::table('live_songs')->where('position',$position)->update($datas);
      $position++; break;
  } 
}
if($position>20) break;
}

//DATABASE INSERT/UPDATE


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


public function live() { 
       // Recent
$i=0;$j=0;
$titles=array();
$currentdate = date('Ymd');
try{
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2945/channels/246131/results?type=last";

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
    return view('UserPages.live',compact('titles'));
}
catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }
 }






}
