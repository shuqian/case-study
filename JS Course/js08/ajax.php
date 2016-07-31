<?php

    // echo '<b>hello</b>';
    //连接数据库
    // $userlist = array(
    //     'name'=>'jakc',
    //     'age'=>18
    // );

    // echo json_encode($userlist);

    //2.表单验证
    $name = $_GET['name'];

    if ($name == 'admin') {
        echo 1;
    } else {
        echo 0;
    }



