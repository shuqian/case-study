(function(window){

        window.$ = $;
        window.jQuery = $;
        //定义一个函数，用于修改css属性样式

        // p  #red   .blue
        function $(selector)
        {
            var mask = selector.substr(0,1);
            var sel = selector.substr(1);

            //把obj声明为一个数组    为了便于统一方式返回对象
            var obj = [];
            switch(mask){
                case '#':
                    obj[0] = document.getElementById(sel);
                    break;

                case '.':
                    obj = document.getElementsByclassName(sel);
                    break;

                default:
                    obj = document.getElementsByTagName(selector);
                    break;
            }

            //在对象返回之前，我在这里追加一些方法
            //用于修改标签内的innerHTML内容
            obj.html = function(val)
            {
                if (val === undefined) {
                    return obj[0].innerHTML;
                } else {
                    for (var i=0; i<obj.length; i++) {
                        obj[i].innerHTML = val;
                    }
                }
                return this;
            }

            //用于修改style样式的方法
            obj.css = function(key,val)
            {
                if (val === undefined) {
                    return obj[0].style[key];
                } else {
                    for (var i=0; i<obj.length; i++) {
                        obj[i].style[key] = val;
                    }
                }
                //实现连贯操作
                return this;
            }

            //用于修改属性
            obj.attr = function(key,val)
            {
                if (val === undefined) {
                    return obj[0][key];
                } else {
                    for (var i=0; i<obj.length; i++) {
                        obj[i][key] = val;
                    }
                }
                return this;
            }

            //返回一个对象
            return obj;
        }
}(window));