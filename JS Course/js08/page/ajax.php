<?php

    include './Model/config.php';
    include './Model/Model.class.php';
    include './Model/Page.class.php';

    $user = new Model('user');
    $total = $user->count();
    $page = new Page($total,3);


    $userlist = $user->limit($page->limit)->select();
    // echo '<pre>';
    //     print_r($userlist);
    // echo '</pre>';

    // echo json_encode($userlist);
?>
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