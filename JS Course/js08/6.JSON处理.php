<?php

    // $list = array(1,2,3,4,5);
    $list = array(
        'name'=>'lunge',
        'age'=>18
    );

    $str = json_encode($list);
    // echo $str;

    $newlist = json_decode($str,true);
    // echo '<pre>';
    //     print_r($newlist);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
    <script>
        var str = '[1,2,3,4,5]';
        var str = '{"name":"lunge","age":18}';
        // console.dir(list);

        // var tmp = 'alert(1)';

        //这个函数就是将一个js字符串当成一个指令来使用
        // eval(tmp);

        //处理ajax传回来的数据，使用eval转换成对象  1：
        // var list = eval("(" + str + ")");
        // alert(list[2]);

        //处理ajax数据方法2      IE5 IE6有兼容性问题
        var list = JSON.parse(str);
        alert(list.name);
    </script>
</html>






