<?php

$conn = mysqli_connect("localhost","root","","one-sound");

$id = $_POST['id'] ?? 0 ;
if(!empty($id)) {
    $sql = "DELETE FROM music WHERE music_id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Data deleted succesfully";
    }
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Something went wrong try again!";
}
