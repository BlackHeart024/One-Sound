<?php

$conn = mysqli_connect("localhost","root","","one-sound");

$status = 0;
$message = "server error! Try again.";

if(count($_POST)>0) {
	$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
	$valid_mp3_type = array('audio/mpeg', 'audio/ogg', 'audio/wav', 'audio/x-matroska','audio/mp4'); // valid extensions

	$music_photo_path = '../../uploads/music/photo/'; // upload directory
	$music_mp3_path = '../../uploads/music/audio/'; // upload directory

	$music_name  = $_POST['music_name'] ?? null;
	$music_photo = $_FILES['music_photo'] ?? null;
	$music_mp3   = $_FILES['music_mp3'] ?? null;
	$artist 	 = $_POST['artist'] ?? 0;
	$upload_date = $_POST['date'] ?? null;

	if(!empty($music_name) && !empty($music_photo) && !empty($music_mp3) && !empty($artist) && !empty($upload_date))
	{
		$music_photo_name = $music_photo['name'];
		$music_photo_tmp = $music_photo['tmp_name'];

		// get uploaded file's extension
		$music_photo_ext = pathinfo($music_photo_name, PATHINFO_EXTENSION);
		$music_photo_filename = pathinfo($music_photo_name, PATHINFO_FILENAME);

		$final_music_photo =  $music_photo_filename . '-' . time() . '.' . $music_photo_ext;


		$music_mp3_name = $music_mp3['name'];
		$music_mp3_tmp = $music_mp3['tmp_name'];
		$music_mp3_type = $music_mp3["type"];

		// get uploaded file's extension
		$music_mp3_ext = pathinfo($music_mp3_name, PATHINFO_EXTENSION);
		$music_mp3_filename = pathinfo($music_mp3_name, PATHINFO_FILENAME);

		$final_music_mp3 =  $music_mp3_filename . '-' . time() . '.' . $music_mp3_ext;
		
		if(!in_array($music_photo_ext, $valid_extensions)) { 
			$status = 0;
			$message = "Only jpeg, jpg, png music photo allowed to upload";

		} elseif(!in_array($music_mp3_type, $valid_mp3_type)) { 
			$status = 0;
			$message = "Upload valid music mp3";

		} else {
			$music_photo_path = $music_photo_path.$final_music_photo;
			$is_photou_ploaded = move_uploaded_file($music_photo_tmp, $music_photo_path);
			
			$music_mp3_path = $music_mp3_path.$final_music_mp3;
			if(move_uploaded_file($music_mp3_tmp, $music_mp3_path)) 
			{
				$date = date('Y-m-d');
				$sql = "INSERT INTO `music`(`music_name`,`music_mp3`,`music_photo`,`artist_id`,`music_upload`,`created_at`) VALUES ('$music_name','$final_music_mp3','$final_music_photo','$artist','$upload_date', '$date')";
		        if (mysqli_query($conn, $sql)) {
		        	$status = 1;
		        	$message = "Data added successfully !";
		        }
			}
		}
	} else {
		$status = 0;
		$message = "Please inserta all data";
	}

}
echo json_encode(["status"=> $status, "message" => $message]);

?>