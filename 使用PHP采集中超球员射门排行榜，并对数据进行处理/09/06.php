<?php 
/*
步骤6：在PHP程序中将$shoot_arr的数据保存到上一步骤建立的shoot_tbl，要求一个球员为一条记录，一个属性为一个字段。
 */
include './02.php';
include '../DB/Model/config.php';
include '../DB/Model/Model.class.php';
// var_dump($shoot_arr);


$model = Model::getModel('shoot_tbl');

$data = array();
foreach ($shoot_arr as $key => $value) {
	$data['ranking'] = $value[0];
	$data['player'] = $value[1];
	$data['team'] = $value[2];
	$data['shots'] = $value[3];
	$data['lleg'] = $value[4];
	$data['rleg'] = $value[5];
	$data['head'] = $value[6];
	$data['other'] = $value[7];
	
	$model->add($data);
}



/*
数据库字段：
+---------+------------------+------+-----+---------+----------------+
| Field   | Type             | Null | Key | Default | Extra          |
+---------+------------------+------+-----+---------+----------------+
| id      | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| ranking | int(10) unsigned | NO   |     | NULL    |                |
| player  | varchar(30)      | NO   |     | NULL    |                |
| team    | varchar(30)      | NO   |     | NULL    |                |
| shots   | int(10) unsigned | NO   |     | NULL    |                |
| lleg    | int(10) unsigned | NO   |     | NULL    |                |
| rleg    | int(10) unsigned | NO   |     | NULL    |                |
| head    | int(10) unsigned | NO   |     | NULL    |                |
| other   | int(10) unsigned | NO   |     | NULL    |                |
+---------+------------------+------+-----+---------+----------------+

0 => string '1' (length=1)
      1 => string '埃尔克森' (length=12)
      2 => string '广州恒大' (length=12)
      3 => string '117' (length=3)
      4 => string '24' (length=2)
      5 => string '69' (length=2)
      6 => string '21' (length=2)
      7 => string '0' (length=1)
 */


?>