<?php
	
	
	namespace App\Helpers;
session_start();
require '../dbcon.php';

class ZoomApiHelper{

	public static function createZoomMeeting($meetingConfig = [],$fname =[]){
		$jwtToken = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlFVQzViNVljUUJhLUJRcWU3d0F3WGciLCJleHAiOjE2Nzg4OTM4MjksImlhdCI6MTY3ODg4ODQzMH0.2tTq6mFhPGfw0tVJ9azbldPIS7QMaf88C8E6YwqbKM0";
		
		$requestBody = [
			'topic'			=> $meetingConfig['topic'] 	,	
			// ?? 'PHP General Talk',
			'type'			=> $meetingConfig['type'] 		,
			// ?? 2,
			'start_time'	=> $meetingConfig['start_time']	,
			// ?? date('Y-m-dTh:i:00').'Z',
			'duration'		=> $meetingConfig['duration'] 	,
			// ?? 30,
			'password'		=> $meetingConfig['password'] 	,
			// ?? mt_rand(),
			'timezone'		=> 'Africa/Cairo',
			'agenda'		=> $meetingConfig['agenda'],
			'settings'		=> [
			  	'host_video'			=> false,
			  	'participant_video'		=> true,
			  	'cn_meeting'			=> false,
			  	'in_meeting'			=> false,
			  	'join_before_host'		=> true,
			  	'mute_upon_entry'		=> true,
			  	'watermark'				=> false,
			  	'use_pmi'				=> false,
			  	'approval_type'			=> 1,
			  	'registration_type'		=> 1,
			  	'audio'					=> 'voip',
				'auto_recording'		=> 'none',
				'waiting_room'			=> false
			]
		];

		$zoomUserId = 'U3tpEUkeQA6uSHNAeykwXw';

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.zoom.us/v2/users/".$zoomUserId."/meetings",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($requestBody),
		  CURLOPT_HTTPHEADER => array(
		    "Authorization: Bearer ".$jwtToken,
		    "Content-Type: application/json",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);

        
		// 	echo "Meeting ID: ". $response->id;
		// echo "<br>";
		// echo "Topic: "	. $response->topic;
		// echo "<br>";
		// echo "Join URL: ". $response->join_url ."<a href='". $response->join_url ."'>Open URL</a>";
		// echo "<br>";
		// echo "Meeting Password: ". $response->password;



		return $response;

		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return [
		  	'success' 	=> false, 
		  	'msg' 		=> 'cURL Error #:' . $err,
		  	'response' 	=> ''
		  ];
		} else {
		  return [
		  	'success' 	=> true,
		  	'msg' 		=> 'success',
		  	'response' 	=> json_decode($response)
		  ];
		}
	}
}

    // echo ZoomApiHelper::createZoomMeeting();  

?>



<?php
 include '/layouts/head.php';

session_start();
require '../dbcon.php';
ZoomApiHelper::createZoomMeeting();

;?>
<body>
<?php include '/layouts/header.php';?>
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_classes.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة حصة جديدة</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>المرحلة</th>
                                            <th>الصف</th>
                                            <th>القسم</th>
                                            <th>المعلم</th>
                                            <th>عنوان الحصة</th>
                                            <th>تاريخ البداية</th>
                                            <th>وقت الحصة</th>
                                            <th>رابط الحصة</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <!-- @foreach($online_classes as $online_classe) -->

                                        <?php 
                                    $query = "SELECT * FROM online_classes";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $online_classe)
                                        {
                                            ?>
                                            <tr>
                                            <td><?= $loop->iteration ; ?></td>
                                            <td><?=$online_classe->grade->Name; ?></td>
                                            <td><?= $online_classe->classroom->Name_Class ; ?></td>
                                            <td><?=$online_classe->section->Name_Section; ?></td>
                                                <td><?=$online_classe->user->name; ?></td>
                                                <td><?=$online_classe->topic; ?></td>
                                                <td><?=$online_classe->start_at; ?></td>
                                                <td><?=$online_classe->duration; ?></td>
                                                <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank">انضم الان</a></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "<h5> No Record Found </h5>";
                                            }
                                        ?>

                                        <?php include 'delete';?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <?php include '/layouts/footer.php';?>
    
	