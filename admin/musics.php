<?php include '../connection.php' ?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/css/dashboard.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<!-- Boxicons  -->
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<!-- Title -->
<title>One Sound Admin</title>

<!-- Favicon -->
<link rel="icon" href="../img/core-img/favicon.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
<div class="wrapper h-100 d-flex position-relative">
<label for="toggle" class="hamburger fs-1"> <i class='bx bx-menu-alt-left'></i> </label>
<input type="checkbox" name="toggle" id="toggle" class="d-none">
<div class="sidebar py-3 d-flex flex-column justify-content-between">
    <div>
        <div class="sidebar-header d-flex align-items-center ps-4">
            <img src="./../img/core-img/favicon.ico" class="me-2" style="width: 35px; height: 35px;" alt="">
            <h2 class="heading text-center"> OneSound </h2>
        </div>
        <div class="menu pt-5">
            <ul class="menu-list list-unstyled">
                <li class="menu-items py-2">
                    <a href="dashboard.php" class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class="bx bxs-dashboard fs-4 me-2"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="musics.php" class="menu-link active text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class="bx bxs-music fs-4 me-2"></i>
                        <span> Musics </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="albums.php" class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class="bx bxs-album fs-4 me-2"></i>
                        <span> Albums </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="artists.php" class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class="bx bxs-user-voice fs-4 me-2"></i>
                        <span> Artists </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="feedback.php"
                        class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class='bx bxs-message-dots fs-4 me-2'></i>
                        <span> Feedback </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="subscribe.php"
                        class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class='bx bxs-briefcase fs-4 me-2'></i>
                        <span> Subscriptions </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="users.php"
                        class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class='bx bxs-user-account fs-4 me-2'></i>
                        <span> Users </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="log-out ps-4 d-flex align-items-center mb-4">
        <i class="bx bx-exit fs-4 me-2"></i>
        <a href="admin-logout.php" class="text-decoration-none" id="loginBtn"> Log out </a>
    </div>
</div>

        <div class="content flex-grow-1 d-flex flex-column">

            <!-- include header -->
            <?php include('partials/header.php'); ?>

            <div class="flex-grow-1 p-4 overflow-auto">

                <!-- Add button  -->
                <div class="d-flex justify-content-end px-5">
                    <button class="btn btn-primary" id="addSong"> Add Music </button>
                </div>

                <!-- Overlay Form  -->
                <div class="overlay position-absolute visually-hidden d-flex justify-content-center align-items-center"
                    id="overlayForm">
                    <div class="overlay-form bg-white rounded-3 shadow p-4">
                        <div class="d-flex justify-content-center mb-3">
                            <h3 class="primary"> Add Music </h3>
                        </div>
                        <form class="row px-3 formSubmit" action="./backend/music/add.php" method="post" enctype="multipart/form-data">
                            <div class="col-12 mb-3">
                                <label for="music_name" class="form-label"> Music Name </label>
                                <input type="text" name="music_name" id="music_name" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="artist" class="form-label"> Artist Name </label>
                                <?php
                                    $query = "SELECT * FROM `artist`";
                                    $artistData = mysqli_query($conn, $query);
                                ?>
                                <select name="artist" id="artist" class="form-control">
                                    <option value="0">Choose Artist</option>
                                    <?php
                                        while ($row = mysqli_fetch_assoc($artistData)) {
                                    ?>
                                        <option value="<?php echo $row['artist_id'] ?? 0;  ?> "><?php echo $row['artist_name'] ?? null;  ?></option>
                                    <?php   
                                        }
                                    ?>                                    
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="date" class="form-label"> Upload date </label>
                                <input type="date" name="date" id="date" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="music_photo" class="form-label"> Music Photo </label>
                                <input type="file" name="music_photo" id="music_photo" class="form-control">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="music_mp3" class="form-label"> Music mp3 </label>
                                <input type="file" name="music_mp3" id="music_mp3" class="form-control">
                            </div>
                            <div class="d-flex justify-content-end gap-3 align-items-center">
                                <button class="button bg-danger" type="button"  id="closeOverlay"> Close </button>
                                <button class="button bg-success"  type="submit" id="submitButon"> Submit </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-4">
                    <div class="table-container bg-white shadow rounded-4 mt-5">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th> Music Id </th>
                                    <th> Music Name </th>
                                    <th> Music MP3 </th>
                                    <th> Artist </th>
                                    <th> Upload Date </th>
                                    <th> Operations </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT music.*,artist.`artist_name` FROM music 
                                            LEFT JOIN artist ON music.`artist_id` = artist.`artist_id`
                                            GROUP BY music.`music_id`";
                                    $musicData = mysqli_query($conn,$query);
                                    $totalMusic = mysqli_num_rows($musicData);
                                
                                    if($totalMusic > 0) {
                                        while ($row = mysqli_fetch_assoc($musicData)) {
                                ?>
                                <tr>
                                    <td> <?php echo $row['music_id'] ?? null;  ?> </td>
                                    <td> <img src="./uploads/music/photo/<?php echo $row['music_photo'] ?? 'default.jpg';  ?>" class="profile-img rounded-circle me-2"
                                            alt=""> <?php echo $row['music_name'] ?? null;  ?> </td>
                                    <td> <?php echo $row['music_mp3'] ?? null;  ?> </td>
                                    <td> <?php echo $row['artist_name'] ?? null;  ?> </td>
                                    <td> <?php echo $row['music_upload'] ?? null;  ?> </td>
                                    <td> 
                                        <span></span><i data-id="<?php echo $row['music_id']; ?>" class="bx bx-edit fs-4 me-2 editRecord"></i>
                                        <i data-id="<?php echo $row['music_id']; ?>" class="bx bx-trash fs-4 deleteRecord"></i>
                                    </td>
                                </tr>
                                <?php   
                                        }
                                    } else { 
                                ?>
                                    <tr>
                                        <td colspan="6" align="center"> No Data </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    $(".formSubmit").on('submit',(function(e) {
        e.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            data: new FormData(this),
            type: "post",
            url: url,
            contentType: false,
            cache: false,
            processData:false,
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                console.log(dataResult);
                if(dataResult.status == 1) {
                    alert(dataResult.message);
                    location.reload();                     
                }
                else {
                   alert(dataResult.message);
                }
            },
            error: function(error) 
            {
                alert(error);
            } 
        });
        return false;
    }));
    $(document).on('click', '.deleteRecord', function(){
        var id = $(this).data("id");
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type:"post",
                data:{id:id},
                url:"./backend/music/delete.php",
                success:function(data)
                {
                    alert(data);
                    location.reload();
                }
            });
        }
        else
        {
            return false;
        }
    });
</script>
<!-- include footer -->
<?php include('partials/footer.php'); ?>