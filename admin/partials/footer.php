    </div>
    <script src="./assets/js/app.js"></script>
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