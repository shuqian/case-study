<?php 
	// 写一个操作数据库的类
	class Model
	{
		protected $link;				//成员属性：建立数据库的连接资源
		protected $tableName;			//成员属性：存储数据表名
		protected $fields = "*";		//成员属性：存储用于查询的字段
		protected $limits;				//成员属性：存储用于精确查询的条数
		protected $update_item;			//成员属性：存储更新的数据行的数据
		protected $fieldAllNameList;		//用于存储所有字段的变量

		// 构造函数，初始化连接数据库
		public function __construct($tableName)
		{
			// 连接数据库
			$this->getConnect();
			// 给表名赋值
			$this->tableName = PREFIX.$tableName;
			// 表字段缓存
			$this->getFields();

		}

		// 查询
		public function select()
		{
			$sql = "SELECT {$this->fields} FROM {$this->tableName} {$this->limits}";

			// 访问成员方法，返回查询的全部结果
			return $this->query($sql);
		}

		// 查询单个数据
		public function find($id)
		{
			$sql = "SELECT {$this->fields} FROM {$this->tableName} WHERE id={$id}";
			$findresult = $this->query($sql);
			return $findresult[0];
		}

		// 增
		public function add($data)
		{
			var_dump($data);
			$keys = implode("`,`", array_keys($data));
			$values = implode("','", array_values($data));
			$sql = "INSERT INTO {$this->tableName} (`{$keys}`) VALUES ('{$values}')";
			return $this->execute($sql);
		}

		// 删
		public function delete($id)
		{
			$sql = "DELETE FROM {$this->tableName} WHERE id={$id}";
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
			$sql = "UPDATE {$this->tableName} SET {$fields_list} WHERE id={$id}";
			return $this->execute($sql);
		}

		/*******************精确查找*********************/
		// 用于要查询的字段
		public function field($fields)
		{
			$fields = $this->checkfield($fields);
			if (empty($fields)) {
				return $this;
			} else{
				$this->fields = implode(',', $fields);
				return $this;
			}
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
			$sql = "DESC {$this->tableName}";
			$fieldArr = $this->query($sql);
			$fieldAllNameList = array();
			foreach ($fieldArr as $key => $value) {
				$fieldAllNameList[] = $value['Field'];
			}
			$this->fieldAllNameList=$fieldAllNameList;
		}

	}
?>