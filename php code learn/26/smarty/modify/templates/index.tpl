{$articleTitle}<br>                            		{* 没有被任何修饰函数调用，直接输出变量的值 *}
{$articleTitle|upper|spacify}<br>                 	{* 调节为全部大写并在每个字母之间插入一个空格 *}
{$articleTitle|lower|spacify|truncate}<br>          	{* 全部小写，字母间插入空格，截取80个字符长度 *}
{$articleTitle|lower|truncate:30|spacify}<br>       	{* 全部小写，截取30个字符，字母间插入空格*}
{$articleTitle|truncate:30:"..."}<br>   	{* 改变修饰顺序，从左到右按指的顺序进行调解 *}

