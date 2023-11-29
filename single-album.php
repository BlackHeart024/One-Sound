<?php include 'partials/homeheader.php';
$album_id = $_GET['album'] ?? 0;
$query = "SELECT * FROM `albums` where album_id = '$album_id'";
$albumData = mysqli_query($conn,$query);
$albumData = mysqli_fetch_assoc($albumData);
?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Album</p>
            <h2><?php echo $albumData['album_name'] ?? '-'; ?></h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
<?php if (!empty($albumData)) { ?>
    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">  
            <center>
                <!-- Single Album -->
                <div class="col-12 col-sm-4 single-album-item">
                    <div class="single-album">
                        <img style="height: 350px; width: 350px;" src="./admin/uploads/album/<?php echo $albumData['album_photo'] ?? 'default.jpg';  ?>"  alt="" class="rounded-circle">
                        <div class="album-info">
                                <h5><?php echo $albumData['album_name'] ?? '-'; ?></h5>
                            <p>Album</p>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
    <!-- ##### Album Catagory Area End ##### -->

    <!-- ##### Song Area Start ##### -->
    <div class="one-music-songs-area mb-70">
    <div class="container">
        <div class="row">

            <!-- Single Song Area -->
                <?php
                    $query = "SELECT * FROM `music`
                            left join album_musics on  music.music_id = album_musics.music_id
                            where album_musics.album_id = '$album_id'";
                    $musicData = mysqli_query($conn,$query);
                    $total = mysqli_num_rows($musicData);
                    if (!empty($total)) {
                        $i = 1;
                        while ($musicRow = mysqli_fetch_assoc($musicData)) {
                ?>
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img style="height:125px; width:125;" src="./admin/uploads/music/photo/<?php echo $musicRow['music_photo'] ?? 'default.jpg';  ?>" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p><?php echo $i.". " . $musicRow['music_name']; ?></p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="./admin/uploads/music/audio/<?php echo $musicRow['music_mp3'] ?? 'default.jpg';  ?>">
                            </audio>
                        </div>
                    </div>
                </div>

                <?php 
                    $i++;
                        }
                    } else { 
                ?>       
                    <h5> Not any Song for this Album </h5>
                <?php 
                }
                ?>

            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
<?php  } else {?>
    <h5 align="center" style="min-height: 300px;"> NO artist data found</h5>
<?php } ?>
<?php include 'partials/homefooter.php'; ?>