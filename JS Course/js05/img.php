<?php
    sleep(3);
    $img = imagecreatetruecolor(200,200);
    header('content-type:image/jpeg');

    imagejpeg($img);