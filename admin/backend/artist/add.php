<?php

$conn = mysqli_connect("localhost","root","","one-sound");

$status = 0;
$message = "server error! Try again.";

if(count($_POST)>0) {
	$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
	$path = '../../uploads/artist/'; // upload directory
	$name = $_POST['name'] ?? null;
	$photo = $_FILES['photo'] ?? [];

	if(!empty($name) && !empty($photo))
	{
		$img = $_FILES['photo']['name'];
		$tmp = $_FILES['photo']['tmp_name'];

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
				$sql = "INSERT INTO `artist`( `artist_name`, `artist_pic`,`upload_date`) VALUES ('$name','$final_image','$date')";
		        if (mysqli_query($conn, $sql)) {
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