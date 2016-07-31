<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
    <script>
        var ajax = new XMLHttpRequest;
        ajax.open('get','./json.php',true);
        ajax.send();
        ajax.onreadystatechange = function()
        {
            if (ajax.readyState == 4 && ajax.status == 200) {
                //无论是什么数据，都是一个字符串
                var res = ajax.responseText;
                // alert(res);

                // var list = eval("(" + res + ")");
                // alert(list.name);

                var list = JSON.parse(res);
                alert(list.name);

            }
        }


    </script>
</html>