<?php 
	// 写一个操作数据库的类
	class Model
	{
		protected $link;				//成员属性：建立数据库的连接资源
		protected static $tableName;			//成员属性：存储数据表名
		protected $fields = "*";		//成员属性：存储用于查询的字段
		protected $limits;				//成员属性：存储用于精确查询的条数
		protected $update_item;			//成员属性：存储更新的数据行的数据
		protected $fieldAllNameList;	//用于存储所有字段的变量
		protected $whereArr;			//存储查询的where条件语句	
		protected static $stalink;		//静态数据库对象

		// 构造函数，初始化连接数据库
		private function __construct()
		{
			// 连接数据库
			$this->getConnect();
			// 给表名赋值
			self::$tableName = PREFIX.self::$tableName;
			// 表字段缓存
			$this->getFields();

		}

		/*实现单态模式*/
		public static function getModel($tableName)
		{
			self::$tableName = $tableName;
			if (is_null(self::$stalink)) {
				self::$stalink = new self;
			}
			return self::$stalink;
		}

		// 查询
		public function select()
		{
			$sql = "SELECT {$this->fields} FROM ".self::$tableName." {$this->whereArr} {$this->limits}";
			// echo $sql;
			// 访问成员方法，返回查询的全部结果
			return $this->query($sql);
		}

		// 查询单个数据
		public function find($id)
		{
			$sql = "SELECT {$this->fields} FROM {self::$tableName} WHERE id={$id}";
			$findresult = $this->query($sql);
			return $findresult[0];
		}

		// 增
		public function add($data)
		{
			$addFields = $this->addField($data);
			$sql = "INSERT INTO ".self::$tableName." ({$addFields})";
			return $this->execute($sql);
		}

		// 删
		public function delete($id)
		{
			$sql = "DELETE FROM {self::$tableName} WHERE id={$id}";
			return $this->execute($sql);
		}

		// 改
		public function update($id, $data)
		{
			$this->update_item = $data;
			$fields_list = array();
			foreach ($this->update_item as $key => $value) {
				$fields_list[] = "`{$key}` = '{$value}'";
			}
			$fields_list = implode(", ", $fields_list);
			$sql = "UPDATE {self::$tableName} SET {$fields_list} WHERE id={$id}";
			return $this->execute($sql);
		}

		/*******************精确查找*********************/
		// 用于要查询的字段
		public function field($fields)
		{
			// 如果传递的是空，或者数组里面为空，则直接返回
			if(empty($fields) || !is_array($fields)) return $this;

			// 检查字段里，是否有非法值
			$fields = $this->checkfield($fields);
			if (empty($fields)) {
				return $this;
			} else{
				$this->fields = implode(',', $fields);
				return $this;
			}
		}

		// where条件查询
		public function where($map)
		{
			$whereArr = array();
			foreach ($map as $key => $val) {
				if (is_array($val) && !empty($val)) {
					$type = $val[0];

					switch ($type) {
						case 'lt':
							$whereArr[] = "$key < '{$val[1]}'";
							break;
						case 'gt':
							$whereArr[] = "$key > '{$val[1]}'";
							break;
						case 'elt':
							$whereArr[] = "$key <= '{$val[1]}'";
							break;
						case 'egt':
							$whereArr[] = "$key >= '{$val[1]}'";
							break;
						
						default:
							die("输入了非法字符");
							break;
					}
				}
				else
				{
					$whereArr[] = "$key = $val";
				}
			}
			$whereArr = "WHERE ".implode(' AND ', $whereArr);
			$this->whereArr = $whereArr;
			return $this;
		}

		// 用于要查询的精确条数
		public function limit($limits)
		{
			$this->limits = "LIMIT ".$limits;
			return $this;
		}
		

		/*******************辅助方法*********************/
		protected function query($sql)
		{
			$res = mysqli_query($this->link, $sql);
			$rowList = array();
			if ($res) {
				while ($row = mysqli_fetch_assoc($res)) {
					$rowList[] = $row;
				}
			}
			return $rowList;
		}

		protected function execute($sql)
		{
			$res = mysqli_query($this->link, $sql);
			if ($res) {
				return mysqli_insert_id($this->link) ? mysqli_insert_id($this->link) : mysqli_affected_rows($this->link);
			}
		}

		// 连接数据库
		protected function getConnect()
		{
			$this->link = mysqli_connect(HOST, USER, PASS, DB);
			mysqli_set_charset($this->link, 'utf8');
		}

		// 检查查询的字段
		protected function checkfield($fields)
		{
			foreach ($fields as $key => $value) {
				if (!in_array($value, $this->fieldAllNameList))
				{
					unset($fields[$key]);
				}
			}
			return $fields;
			
		}

		// 查询全部的表字段
		protected function getFields()
		{
			$sql = "DESC ".self::$tableName;
			$fieldArr = $this->query($sql);
			$fieldAllNameList = array();
			foreach ($fieldArr as $key => $value) {
				$fieldAllNameList[] = $value['Field'];
			}
			$this->fieldAllNameList=$fieldAllNameList;
		}

		// 添加数据的字段判断
		private function addField($data)
		{
			// 判断字段是否合法
			foreach (array_keys($data) as $val) {
				// 判断如果所添加的字段不在范围内，则提示字段非法
				if (!in_array($val, $this->fieldAllNameList)) {
					die("添加的字段非法");
				}
			}

			$keys = implode("`,`", array_keys($data));
			$values = implode("','", array_values($data));
			return "`{$keys}`) VALUES ('{$values}'";
		}
	}
?>