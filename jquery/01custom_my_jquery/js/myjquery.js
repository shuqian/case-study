// 自调函数引入
(function(window){
	window.$ = $;
	window.jQuery = $;	//取别名

	function $(selector)
	{
		var mark = selector.substr(0,1);
		var element = selector.substr(1);

		var obj = [];
		switch(mark){
			case '#':
				obj[0] = document.getElementById(element);
				break;

			case '.':
				obj = document.getElementsByClassName(element);
				break;

			default:
				obj = document.getElementsByTagName(element);
				break;
		}
		console.dir(obj);

		obj.html = function(val)
		{
			if (val === undefined) {
				return obj[0].innerHTML;
			} else{
				for(var i=0; i<obj.length; i++)
				{
					obj[i].innerHTML = val;
				}
			}
			//实现连贯操作
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

		// 修改属性
		obj.attr = function(key, val)
		{
			if (val === undefined) {
				return obj[0][key];
			} else{
				for (var i = 0; i < obj.length; i++) {
					obj[i][key] = val;
				}
			}
			return this;	//实现连贯操作
		}

		return obj;
	}
}(window));