<?php

    //分页类
    class Page
    {
        protected $num;         //存储每页显示的条数
        protected $limit;       //存储分页条件
        protected $cur;         //存储当前页码
        protected $start;       //存储偏移量
        protected $aomut;        //总页码数
        protected $total;        //存储总条数

        public function __construct($total,$num)
        {
            $this->num = $num;
            $this->total = $total;

            //获取总页码数
            $this->aomut = ceil($total/$num);

            //当前页码
            $this->init();

            //偏移量
            $this->start = ($this->cur-1)*$this->num;

            //把处理好的分页条件存储起来
            //"{$start},{$num}"
            $this->limit = "{$this->start},{$this->num}";
        }
        //只让用户取limit的值
        public function __get($key)
        {
            if ($key =='limit') return $this->limit;
            if ($key =='aomut') return $this->aomut;
        }

        public function getButton()
        {
            $pre = $next = $_GET;
            $pre['p'] -= 1;
            $pre['p'] = max(1,$pre['p']);
            $next['p'] += 1;
            $next['p'] = min($next['p'],$this->aomut);
            // echo '<pre>';
            //     print_r($pre);
            // echo '</pre>';

            // echo '<pre>';
            //     print_r($_SERVER);
            // echo '</pre>';
            $url = 'http://'."{$_SERVER['SERVER_NAME']}"."{$_SERVER['SCRIPT_NAME']}";
            //echo $url;
            //$str = http_build_query($pre);
            // echo $str;
            $pre = $url.'?'.http_build_query($pre);
            $next = $url.'?'.http_build_query($next);
            //echo $pre;

            $str = "<a href='{$pre}'>上一页</a>";
            $str .= "<a href='{$next}'>下一页</a>";
            return $str;
        }


        /**************************辅助方法*******************************/
        //获取当前页面
        protected function init()
        {
            $this->cur = $_GET['p'];
            $this->cur = max(1,$this->cur);
            $this->cur = min($this->aomut,$this->cur);
        }
    }
