<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use DB;
use Session;

class BusinessBreakdown implements FromView, ShouldAutoSize
{

use Exportable;
public $titles=array();

public function __construct()
{
    $titles2=array();
    $songs20=array();
    $i=0; $day;$cn=0;
    $resp2=array();
    $resp3=array();
    $todays=array();
    $today=array();
    $todaySongs=array();
    
  try{

    // 5 D A Y S
for($day=0;$day<=4;$day++) {

$m = date("m"); // Month value
$de = date("d"); // Today's date
$y = date("Y"); // Year value
$back5days = date('Ymd', mktime(0,0,0,$m,($de-$day),$y)) ;
$url = "https://api-v2.acrcloud.com/api/bm-bd-projects/2945/channels/246131/results?type=day&date=$back5days";

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
//echo '<pre>'; print_r($resp); echo '<pre>'; exit;

foreach($resp2 as $songs){ 
  if(isset($songs['metadata']['custom_files'])){
  if($songs['metadata']['custom_files'][0]['bucket_id'] == '21095'){

    if(isset($songs['metadata']['custom_files'][0]['title'])) $this->titles[$i]['title']=$songs['metadata']['custom_files'][0]['title'];

    if(isset($songs['metadata']['played_duration'])) $this->titles[$i]['duration']=$songs['metadata']['played_duration']; 

    if(isset($songs['metadata']['timestamp_utc']))
      $this->titles[$i]['timestamp']=date('m/d/Y, h:i a',strtotime($songs['metadata']['timestamp_utc']));
     $i++;
  }  

 
}

}

}

//echo '<pre>'; print_r($titles); echo '<pre>'; exit;

//5 DAYS


  }

  catch(\Exception $e){
      Session::put('exception',$e->getMessage());
      return redirect()->back();
     }

	}


	public function view(): View
	{
		//$user=DB::table('users')->where('email',Session::get('logged'))->first();
		//$stage_name=$user->stage_name;

		$titles = $this->titles;
	 return view('successB', compact('titles'));
	}
}
