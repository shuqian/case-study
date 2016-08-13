<?php 
$conn = mysqli_connect('localhost', 'root', '', 'ishop') or die("数据库连接失败");
mysqli_set_charset($conn, 'utf8');

// 一级分类
$sql = "SELECT id,pid,name,path FROM `shop_catalog` WHERE `pid` = 0";
$res = mysqli_query($conn, $sql);
if ($res) {
	while($row = mysqli_fetch_assoc($res)){
		$cata1_list[] = $row;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<style>
	*{font-size: 12px; padding: 0; margin: 0;}
	h1{font-size: 16px;}
	h2{font-size: 14px;}
</style>
</head>
<body>
<!-- 导航开始 -->
<div id="nav">
	<div>
	<?php foreach($cata1_list as $val): ?>
		<div style="width:180px; margin: 5px; float:left">
			<div class="level01"><h1><?php echo $val['name'] ?></h1></div>
			<div>
				<?php 
					// 嵌套：遍历2级分类
					// 遍历父ID为上一级的ID的分类
					$sql2 = "SELECT id,pid,name,path FROM `shop_catalog` WHERE `pid` = {$val['id']}";
					// echo $sql;
					$res2 = mysqli_query($conn, $sql2);
					$cata2_list = [];
					if ($res2) {
						while ($row2 = mysqli_fetch_assoc($res2)){
							$cata2_list[] = $row2;
						}
					}
					foreach($cata2_list as $val2):
				?>
					<div style="border:1px solid #ddd; margin-bottom:10px; padding:10px;">
					<div class="level02"><h2><?php echo $val2['name']; ?></h2></div>

					<?php 
						// 嵌套：遍历3级分类
						$sql3 = "SELECT id,pid,name,path FROM `shop_catalog` WHERE `pid` = {$val2['id']}";
						$res3 = mysqli_query($conn, $sql3);
						$cata3_list = [];
						if ($res3) {
							while ($row3 = mysqli_fetch_assoc($res3)){
								$cata3_list[] = $row3;
							}
						}
						// print_r($cata2_list);
						foreach($cata3_list as $val3):
					?>
						<a href="./catalog.php?cid=<?php echo $val3['id'] ?>" class="level03"><?php echo $val3['name'] ?></a>
					<?php endforeach ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach;?>
	</div>
</div>
<!-- 导航结束 -->
</body>
</html>