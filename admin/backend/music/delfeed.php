<?php

$conn = mysqli_connect("localhost","root","","one-sound");
$id=$_GET['user_id'];
$sql = "DELETE FROM feedback WHERE user_id = '$id'";
$data=mysqli_query($conn, $sql);
if ($data) {
        echo "Data deleted succesfully";
    }

else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }






//     ?php
//     while($res = mysqli_fetch_assoc($data))
//     {
//         echo"<tbody>
//                 <tr>
//                     <td> ".$res['user_id']." </td>
//                     <td> ".$res['user_message']." </td>
//                     <td> ".$res['user_subject']." </td>
//                     <td> ".$res['user_name']." </td>
//                     <td> ".$res['user_email']." </td>";
// ?
//                     <td> <a href="./backend/music/delfeed.php"><i data-id="<?php echo $res['user_id']; ?" onclick="return checkdel()" class="bx bx-trash fs-4 deleteRecord"></i></a> </td>
//                 </tr>
// php
?>