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

</head>

<body>
    <div class="wrapper h-100 d-flex position-relative">
        <label for="toggle" class="hamburger fs-1"> <i class='bx bx-menu-alt-left'></i> </label>
        <input type="checkbox" name="toggle" id="toggle" class="d-none">
        <div class="sidebar py-3 d-flex flex-column justify-content-between">
            <div>
                <div class="sidebar-header d-flex align-items-center ps-4">
                    <img src="../img/core-img/favicon.ico" class="me-2" style="width: 35px; height: 35px;" alt="">
                    <h2 class="heading text-center"> OneSound </h2>
                </div>
                <div class="menu pt-5">
                    <ul class="menu-list list-unstyled">
                        <li class="menu-items py-2">
                            <a href="dashboard.php"
                                class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                                <i class="bx bxs-dashboard fs-4 me-2"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        <li class="menu-items py-2">
                            <a href="musics.php"
                                class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                                <i class="bx bxs-music fs-4 me-2"></i>
                                <span> Musics </span>
                            </a>
                        </li>
                        <li class="menu-items py-2">
                            <a href="albums.php"
                                class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                                <i class="bx bxs-album fs-4 me-2"></i>
                                <span> Albums </span>
                            </a>
                        </li>
                        <li class="menu-items py-2">
                            <a href="artists.php"
                                class="menu-link text-decoration-none d-flex align-items-center ps-4 py-3">
                                <i class="bx bxs-user-voice fs-4 me-2"></i>
                                <span> Artists </span>
                            </a>
                        </li>
                        <li class="menu-items py-2">
                            <a href="feedback.php"
                                class="menu-link active text-decoration-none d-flex align-items-center ps-4 py-3">
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

            <div class="p-4 overflow-auto">
                <div class="table-container bg-white shadow rounded-4 mt-5">
                <?php
                    error_reporting(0);
                        $query ="SELECT * FROM `feedback`";
  
                        $data = mysqli_query($conn,$query);
  
                        $total = mysqli_num_rows($data);
  
                        if($total > 0)
                        {
       
          
                ?>  
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th> Sr. No. </th>
                                <th> Message </th>
                                <th> Subject </th>
                                <th> Name </th>
                                <th> E-Mail </th>
                                <th> Operations </th>
                            </tr>
                        </thead>

                        <?php
                            while($res = mysqli_fetch_assoc($data))
                            {
                                echo"<tbody>
                                        <tr>
                                            <td> ".$res['user_id']." </td>
                                            <td> ".$res['user_message']." </td>
                                            <td> ".$res['user_subject']." </td>
                                            <td> ".$res['user_name']." </td>
                                            <td> ".$res['user_email']." </td>";
                        ?>
                                            <td> <i class="bx bx-trash fs-4"></i> </td>
                                        </tr>
                        <?php
                            }
                        }
  
                        else{
                            echo"Something wrong with connection maybe";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/app.js"></script>
    <script type="text/javascript">
    $(document).on('click', '.deleteRecord', function(){
        var id = $(this).data("id");
        if(confirm("Are you sure you want to delete this?"))
        {
            $.ajax({
                type:"post",
                data:{id:id},
                url:"./backend/music/delfeed.php",
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

    function checkdel()
    {
        return confirm('Are you sure you want to delete this?');
    }
</script>
</body>
</html>

<?php

    $adminprofile = $_SESSION['admin_login'];
    if($adminprofile == true)
    {

    }
    else
    {
        ?>
        <meta http-equiv="refresh" content="0; url = http://localhost/One-Sound/admin.php" />
        <?php
    }

?>