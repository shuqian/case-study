<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        #box{width:200px; height:200px; border:1px solid red;}
    </style>
</head>
<body>
    <?php echo date('Y-m-d H:i:s'); ?>
    <div id="box">新闻内容</div>
    <button onclick="update()">刷新</button>
</body>
    <script>
        var box = document.getElementById('box');
        function update()
        {

            //进行异步请求数据
            var ajax = new XMLHttpRequest;
            ajax.open('get','./new.php',true);
            ajax.send();
            box.innerHTML = '<img src="./1.gif" width="200" height="200">';
            ajax.onreadystatechange = function()
            {

                if (ajax.readyState == 4 && ajax.status == 200) {
                    var res = ajax.responseText;
                    box.innerHTML = res;
                }
            }
        }

    </script>
</html>