<?php

    //写一个数据库的操作类
    class Model
    {
        protected $link;      //存储数据库连接时的资源
        protected $tabName;   //存储要查询的表
        protected $fields = '*';     //用于存储要查询的字段
        protected $limit;              //用于存储要查询的条数
        protected $allFields;              //用于存储要查询表名的全部字段   过滤非法字段
        protected $where;              //用于存储查询条件

        //构造方法，初始化连接数据库
        public function __construct($tabName)
        {
            //连接数据库
            $this->getConnect();
            //给表名赋值
            $this->tabName = PRE.$tabName;
            //表字段缓存
            $this->getField();
        }
        //查询数据
        public function select()
        {
            $sql = "select {$this->fields} from {$this->tabName} {$this->where} {$this->limit}";
            return $this->query($sql);
        }

        //查询单条数据
        public function find($id)
        {
            $sql = "select * from {$this->tabName} where id='{$id}'";
            $info = $this->query($sql);
            return $info[0];
        }

        //查询表里面有多少条数据
        public function count()
        {
            $sql = "select count(*) total from {$this->tabName}";
            $total = $this->query($sql);
            return $total[0]['total'];
        }

        //添加数据
        public function add($data)
        {
            // var_dump($data);
            $keys = join(',',array_keys($data));
            //echo $keys;
            $vals = join("','",array_values($data));
            //echo $vals;
            $sql = "insert into {$this->tabName} ($keys) values('{$vals}')";
            //echo $sql;
            return $this->excute($sql);
        }

        //删除单条数据
        public function delete($id)
        {
            $sql = "delete from {$this->tabName} where id='{$id}'";
            return $this->excute($sql);
        }

        //用于要查询的字段
        public function field($fields)
        {
            if (!is_array($fields))  return $this;

            //把过滤后的字段返回
            $fields = $this->check($fields);
            //防止手贱用户
            if (empty($fields))    return $this;
            $this->fields = join(',',$fields);
            return $this;
        }

        //用于查询精确条数
        public function limit($limit)
        {
            $this->limit = 'limit '.$limit;
            return $this;
        }

        public function update()
        {

        }

        //用于条件查询
        /*
            $map['name'] = '张三'；
            $map['age'] = array('gt',18);
            $map['name'] = array('like',"%a%")
         */
        public function where($arr)
        {
            //遍历$arr
            $res = array();
            foreach ($arr as $key => $val) {
                if (is_array($val) && !empty($val)) {
                        $type = $val[0];
                        switch ($type) {
                            case 'gt':
                                $res[] = "$key > '{$val[1]}'";
                                break;

                            case 'lt':
                                $res[] = "$key < '{$val[1]}'";
                                break;

                            default:
                                echo '如果跑来这里的话，那么我们就下课';
                                break;
                        }
                } else {
                    $res[] = "$key='{$val}'";
                }
            }
            $where = 'where '.join(' and ',$res);
            //echo $where;
            $this->where = $where;
            return $this;
        }

        /**************************************辅助方法************************************/
        //用于查询    返回一个二维数组
        private function query($sql)
        {
            $res = mysqli_query($this->link,$sql);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $list[] = $row;
                }
                return $list;
            }
            exit('SQL语句错误！！');
        }

        //用于更新修改删除添加    返回是受影响行数或者最后插入id
        protected function excute($sql)
        {
            $res = mysqli_query($this->link,$sql);
            if ($res) {
                return mysqli_insert_id($this->link)?mysqli_insert_id($this->link):mysqli_affected_rows($this->link);
            }
            exit('SQL语句错误！！');
        }

        //用于连接数据库
        protected function getConnect()
        {
            $this->link = mysqli_connect(HOST,USER,PASS,DB) or die('数据库连接失败');
            mysqli_set_charset($this->link,'utf8');
        }

        //检查字段的方法
        protected function check($arr)
        {
            //先遍历$arr
            foreach ($arr as $key=>$val)
            if (!in_array($val,$this->allFields))    unset($arr[$key]);
            return $arr;
        }

        //用于查询表中的字段
        protected function getField()
        {
            $sql = "desc {$this->tabName}";
            $res = $this->query($sql);
            $fields = array();
            foreach ($res as $val) {
                $fields[] = $val['Field'];
            }
            $this->allFields = $fields;
        }
    }
