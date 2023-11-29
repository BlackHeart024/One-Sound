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
                    <a href="dashboard.php" class="menu-link active text-decoration-none d-flex align-items-center ps-4 py-3">
                        <i class="bx bxs-dashboard fs-4 me-2"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-items py-2">
                    <a href="musics.php" class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
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
        
        <div class="dashboard flex-grow-1 p-4">
            <div class="row g-3 h-100">
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-1 h-100 w-100 position-absolute"></div>
                        <a href="musics.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Musics </span>
                            <?php
                                $query ="SELECT `music_id` FROM `music`";
                                $data = mysqli_query($conn,$query);
                                $musics = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $musics; ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-2 h-100 w-100 position-absolute"></div>
                        <a href="albums.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Album </span>
                            <?php
                                $query ="SELECT `album_id` FROM `albums`";
                                $data = mysqli_query($conn,$query);
                                $albums = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $albums; ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-3 h-100 w-100 position-absolute"></div>
                        <a href="artists.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Artists </span>
                            <?php
                                $query ="SELECT `artist_id` FROM `artist`";
                                $data = mysqli_query($conn,$query);
                                $artist = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $artist; ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-4 h-100 w-100 position-absolute"></div>
                        <a href="feedback.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Feedback </span>
                            <?php
                                    $query ="SELECT `user_id` FROM `feedback`";
                                    $data = mysqli_query($conn,$query);
                                    $total = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $total; ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-6 h-100 w-100 position-absolute"></div>
                        <a href="subscribe.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Subscriptions </span>
                            <?php
                                    $query ="SELECT `sub_id` FROM `subscriptions`";
                                    $data = mysqli_query($conn,$query);
                                    $total = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $total; ?> </span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="box position-relative bg-white p-3 rounded-2 shadow overflow-hidden">
                        <div class="box-cover box-5 h-100 w-100 position-absolute"></div>
                        <a href="users.php" class="text-decoration-none box-body d-flex justify-content-between flex-column">
                            <span class="fs-3"> Users </span>
                            <?php
                                    $query ="SELECT `user_id` FROM `user`";
                                    $data = mysqli_query($conn,$query);
                                    $total = mysqli_num_rows($data);
                            ?>
                            <span class="box-digit text-end"> <?php echo $total; ?> </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- include footer -->
<?php include('partials/footer.php'); ?>