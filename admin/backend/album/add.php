<?php

$conn = mysqli_connect("localhost","root","","one-sound");

$status = 0;
$message = "server error! Try again.";

if(count($_POST)>0) {
	$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
	$path = '../../uploads/album/'; // upload directory
	$name = $_POST['album_name'] ?? null;
	$photo = $_FILES['album_photo'] ?? [];
	$musics = $_POST['musics'] ?? [];

	if(!empty($name) && !empty($photo) && !empty($musics))
	{
		$img = $_FILES['album_photo']['name'];
		$tmp = $_FILES['album_photo']['tmp_name'];

		// get uploaded file's extension
		$ext = pathinfo($img, PATHINFO_EXTENSION);
		$filename = pathinfo($img, PATHINFO_FILENAME);

		$final_image =  $filename . '-' . time() . '.' . $ext;
		if(in_array($ext, $valid_extensions)) 
		{ 
			$path = $path.$final_image;
			if(move_uploaded_file($tmp,$path)) 
			{
				$date = date('Y-m-d');
				$sql = "INSERT INTO `albums`( `album_name`, `album_photo`,`created_at`) VALUES ('$name','$final_image','$date')";
		        if (mysqli_query($conn, $sql)) {
		        	$albumId = 	mysqli_insert_id($conn);
		        	foreach ($musics as $key => $musicId) {
		        		if(!empty($musicId)) {
			        		$albumMusicQry = "INSERT INTO `album_musics`( `album_id`, `music_id`) VALUES ('$albumId','$musicId')";
			        		mysqli_query($conn, $albumMusicQry);
		        		}
		        	}
		        	$status = 1;
		        	$message = "Data added successfully !";
		        }
			}
		} else {
			$status = 0;
			$message = "Only jpeg, jpg, png files are allowed to upload";
		}
	} else {
		$status = 0;
		$message = "Please inserta all data";
	}

}
echo json_encode(["status"=> $status, "message" => $message]);

?>