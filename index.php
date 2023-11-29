<?php include 'partials/header.php' ?>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <?php 
                $query = "SELECT * FROM `albums` ORDER BY album_id DESC";
                $album = mysqli_query($conn,$query);
                $albumData = mysqli_fetch_assoc($album);

                $albumImageUrl = !empty($albumData['album_photo']) ? 'admin/uploads/album/'. $albumData['album_photo'] :'img/bg-img/bg-8.jpg';

                $query = "SELECT * FROM `music` ORDER BY music_id DESC";
                $music = mysqli_query($conn,$query);
                $musicData = mysqli_fetch_assoc($music);
                $musicImageUrl = !empty($musicData['music_photo']) ? 'admin/uploads/music/photo/'. $musicData['music_photo'] :'img/bg-img/bg-9.jpg';
            ?>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image:url(<?php echo $albumImageUrl;  ?>);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest Album</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms"><?php echo $albumData['album_name'] ?? 'Alan Walker' ?> <span><?php echo $albumData['album_name'] ?? 'Alan Walker' ?></span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="single-album.php?album=<?php echo $albumData['album_id'] ?? ''; ?>" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(<?php echo $musicImageUrl;  ?>);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Latest Music</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms"><?php echo $musicData['music_name'] ?? 'Kesariya' ?> <span>Kesariya</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="single-artist.php?artist=<?php echo $musicData['artist_id'] ?? ''; ?>" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Popular Albums</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <?php 
                            $query = "SELECT * FROM `albums` ORDER BY album_id DESC limit 7";
                            $album = mysqli_query($conn,$query);
                            $totalAlbum = mysqli_num_rows($album);
                                
                            if($totalAlbum > 0) {
                                while ($albumRow = mysqli_fetch_assoc($album)) {
                        ?>
                        <!-- Single Album -->
                        <div class="single-album">
                        <a href="single-album.php?album=<?php echo $row['album_id'] ?? null;  ?>">
                            <img style="height:200px; width: 200px;" src="./admin/uploads/album/<?php echo $albumRow['album_photo'] ?? 'default.jpg';  ?>" alt="">
                                </a>
                            <div class="album-info">
                                <a href="single-album.php?album=<?php echo $albumRow['album_id'] ?? null;  ?>">
                                    <h5><?php echo $albumRow['album_name'] ?? null;  ?></h5>
                                </a>
                            </div>
                        </div>
                        <?php   
                            }
                        } else {
                        ?>
                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="img/bg-img/al02.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Hindi Songs</h5>
                                </a>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="img/bg-img/al03.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Tamil Songs</h5>
                                </a>
                                <p>First</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="img/bg-img/al04.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>The Cure</h5>
                                </a>
                                <p>Popular Songs</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="img/bg-img/al05.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Instagram Hits</h5>
                                </a>
                                <p>The Album</p>
                            </div>
                        </div>

                        <!-- Single Album -->
                        <div class="single-album">
                            <img src="img/bg-img/al06.jpg" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>Top Bollywood Songs</h5>
                                </a>
                                <p>Unplugged</p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Latest Artists Area Start ##### -->
    <section class="latest-albums-area has-fluid bg-gray section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>See what’s new</p>
                        <h2>Popular Artists</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <?php 
                            $query = "SELECT * FROM `artist` ORDER BY artist_id DESC limit 7";
                            $artist = mysqli_query($conn,$query);
                            $totalartist = mysqli_num_rows($artist);
                                
                            if($totalartist > 0) {
                                while ($row = mysqli_fetch_assoc($artist)) {
                        ?>
                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img style="height:200px; width: 200px;" src="./admin/uploads/artist/<?php echo $row['artist_pic'] ?? 'default.jpg';  ?>" class="rounded-circle" alt="">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php?artist=<?php echo $row['artist_id'] ?? null;  ?>">
                                    <h5><?php echo $row['artist_name'] ?? null;  ?></h5>
                                </a>
                            </div>
                        </div>
                        <?php   
                            }
                        } else {
                        ?>
                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar2.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Charlie Puth</h5>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar3.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Ed Sheeran</h5>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar4.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Arijit Singh</h5>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar5.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Imagine Dragons</h5>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar6.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Neha Kakkar</h5>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artists -->
                        <div class="single-album">
                            <a href="single-artist.php">
                                <img src="img/bg-img/ar7.jpg" alt="" class="rounded-circle">
                            </a>
                            <div class="album-info">
                                <a href="single-artist.php">
                                    <h5>Lata Mangeshkar</h5>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Artists Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <?php 
        $query = "SELECT * FROM `music`";
        $music = mysqli_query($conn, $query);
        $musicRow = mysqli_fetch_assoc($music);
    ?>
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(img/bg-img/bg-4.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img style="height:350px; width:350px;" src="./admin/uploads/music/photo/<?php echo $musicRow['music_photo'] ?? 'default.jpg';  ?>" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>See what’s new</p>
                            <h2>Popular Song</h2>
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>01. <?php echo $musicRow['music_name']; ?></p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="./admin/uploads/music/audio/<?php echo $musicRow['music_mp3'] ?? 'default.jpg';  ?>">
                            </audio>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>This week’s top</h2>
                        </div>
                        <?php 
                            $query = "SELECT * FROM `albums` limit 6";
                            $album = mysqli_query($conn,$query);
                            $totalAlbum = mysqli_num_rows($album);
                                
                            if($totalAlbum > 0) {
                                while ($albumRow = mysqli_fetch_assoc($album)) {
                        ?>
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img style="height:75px; width: 75px;" src="./admin/uploads/album/<?php echo $albumRow['album_photo'] ?? 'default.jpg';  ?>" alt="">
                            </div>
                            <div class="content-">
                                <h6><?php echo $albumRow['album_name'] ?? null;  ?></h6>
                            </div>
                        </div>
                        <?php
                            }
                        } else { 
                        ?> 
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt1.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>Sam Smith</h6>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt2.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>Power Play</h6>
                                <p>In my mind</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt3.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>Cristinne Smith</h6>
                                <p>My Music</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt4.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>The Music Band</h6>
                                <p>Underground</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt5.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>Creative Lyrics</h6>
                                <p>Songs and stuff</p>
                            </div>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/wt6.jpg" alt="">
                            </div>
                            <div class="content-">
                                <h6>The Culture</h6>
                                <p>Pop Songs</p>
                            </div>
                        </div>
                    <?php } ?>

                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>New Hits</h2>
                        </div>
                        <?php
                            $query = "SELECT music.*, artist.artist_name FROM `music`join artist on artist.artist_id = music.artist_id limit 6";
                            $musicData = mysqli_query($conn,$query);
                            $total = mysqli_num_rows($musicData);
                            if (!empty($total)) {
                                $i = 1;
                                while ($musicRow = mysqli_fetch_assoc($musicData)) {
                        ?>
                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img style="height:75px; width:75px;" src="./admin/uploads/music/photo/<?php echo $musicRow['music_photo'] ?? 'default.jpg';  ?>" alt="">
                                </div>
                                <div class="content-">
                                    <h6><?php echo $musicRow['music_name']; ?></h6>
                                    <p><?php echo $musicRow['artist_name']; ?></p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="./admin/uploads/music/audio/<?php echo $musicRow['music_mp3'] ?? 'default.jpg';  ?>">
                            </audio>
                        </div>
                        <?php
                            }
                        } else { 
                        ?> 
                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="150ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="img/bg-img/so3.jpg" alt="">
                                </div>
                                <div class="content-">
                                    <h6>Woh Din</h6>
                                    <p>Arijit Singh</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Arijit Singh/Woh Din.mp3">
                            </audio>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="200ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="img/bg-img/mu06.jpg" alt="">
                                </div>
                                <div class="content-">
                                    <h6>On Way Way</h6>
                                    <p>Alan Walker</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Alan Walker/On My Way.mp3">
                            </audio>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="250ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="img/bg-img/so2.jpg" alt="">
                                </div>
                                <div class="content-">
                                    <h6>Perfect</h6>
                                    <p>Ed Sheeran</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Ed Sheeran/perfect.mp3">
                            </audio>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="img/bg-img/mu03.jpg" alt="">
                                </div>
                                <div class="content-">
                                    <h6>End Of Time</h6>
                                    <p>Alan Walker</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Alan Walker/End of Time.mp3">
                            </audio>
                        </div>

                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="350ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="img/bg-img/mu05.png" alt="">
                                </div>
                                <div class="content-">
                                    <h6>Ignite</h6>
                                    <p>Alan Walker</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/Alan Walker/Ignite.mp3">
                            </audio>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>See what’s new</p>
                            <h2>Popular Artist</h2>
                        </div>
                        <?php 
                            $query = "SELECT * FROM `artist` limit 6";
                            $artist = mysqli_query($conn,$query);
                            $totalartist = mysqli_num_rows($artist);
                                
                            if($totalartist > 0) {
                                while ($row = mysqli_fetch_assoc($artist)) {
                        ?>
                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <a href="single-artist.php?artist=<?php echo $row['artist_id'] ?? null;  ?>">
                                    <img style="height:75px; width: 75px;" src="./admin/uploads/artist/<?php echo $row['artist_pic'] ?? 'default.jpg';  ?>" class="rounded-circle" alt="">
                                </a>
                            </div>
                            <div class="content-">
                                <a href="single-artist.php?artist=<?php echo $row['artist_id'] ?? null;  ?>">
                                    <h6><?php echo $row['artist_name'] ?? null;  ?></h6>
                                </a>
                            </div>
                        </div>
                        <?php   
                            }
                        } else {
                        ?>
                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <a href="single-artist.php">
                                    <img src="img/bg-img/ar1.jpg" alt="" class="rounded-circle">
                                </a>
                            </div>
                            <div class="content-">
                                <a href="single-artist.php">
                                    <h6>Alan Walker</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/ar2.jpg" alt="" class="rounded-circle">
                            </div>
                            <div class="content-">
                                <h6>Charlie Puth</h6>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="200ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/ar3.jpg" alt="" class="rounded-circle">
                            </div>
                            <div class="content-">
                                <h6>Ed Sheeran</h6>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="250ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/ar4.jpg" alt="" class="rounded-circle">
                            </div>
                            <div class="content-">
                                <h6>Arijit Singh</h6>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="400ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/ar5.jpg" alt="" class="rounded-circle">
                            </div>
                            <div class="content-">
                                <h6>Imagine Dragons</h6>
                            </div>
                        </div>

                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="400ms">
                            <div class="thumbnail">
                                <img src="img/bg-img/ar6.jpg" alt="" class="rounded-circle">
                            </div>
                            <div class="content-">
                                <h6>Neha Kakkar</h6>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

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
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="unm">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail" name="uemail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" name="usub">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                    <input type="submit" class="btn oneMusic-btn mt-30" name="submit" value="Send">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->


<?php include 'partials/footer.php'?>

<!-- <?php

    if($_POST['submit'])
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
    }
    $query = "INSERT INTO 'message'('name', 'email', 'subject', 'message') VALUES ('$name','$email','$subject','$message')";
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('Message Sent');</script>";
    }
    else
    {
        //echo "<script>alert('Message Not Sent')</script>";
    }

?> -->
