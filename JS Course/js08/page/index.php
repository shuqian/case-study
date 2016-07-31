<?php

    include './Model/config.php';
    include './Model/Model.class.php';
    include './Model/Page.class.php';

    $user = new Model('user');
    $total = $user->count();
    $page = new Page($total,3);
    $aomut = $page->aomut;


    $userlist = $user->limit($page->limit)->select();
    // echo '<pre>';
    //     print_r($userlist);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php echo date('Y-m-d H:i:s'); ?>
    <div id="userlist">
        <table width="600" border="1">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Key</th>
                <th>Pwd</th>
            </tr>
            <?php foreach($userlist as $v): ?>
            <tr>
                <td><?php echo $v['id']; ?></td>
                <td><?php echo $v['name']; ?></td>
                <td><?php echo $v['key']; ?></td>
                <td><?php echo $v['pwd']; ?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
    <button onclick="getData(true)">上一页</button>
    <button onclick="getData(false)">下一页</button>
</body>
    <script>
        var num = <?php echo $_GET['p']?$_GET['p']:1;?>;
        var aomut = <?php echo $aomut; ?>;

        function getData(mark)
        {
            // alert(1);

            if (mark) {
                num--;
                if (num<1) num=1;
            } else {
                num++;
                if (num >aomut) num = aomut;
            }

            var ajax = new XMLHttpRequest;
            ajax.open('get','./ajax.php?p='+num,true);
            ajax.send();
            ajax.onreadystatechange = function()
            {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    var res = ajax.responseText;
                    // alert(res);

                    var userlist = document.getElementById('userlist');
                    userlist.innerHTML = res;
                }
            }
        }
    </script>
</html>




