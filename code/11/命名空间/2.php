<?php
	namespace MyProject1;  								//���������ռ�MyProject1
	
	const TEST='this is a const';						//��MyProject1������һ������TEST
	
	function demo() {									//��MyProject1������һ������
		echo "this is a function";
	}
	
	class User {      								   //��User����MyProject1�ռ����
		function fun() {
			echo "this is User's fun()";
		}
	}
 
	echo TEST;											//���Լ������ռ�ֱ��ʹ�ó���
	demo();												//���Լ������ռ���ֱ�ӵ��ñ��ռ亯��
	
	/*********************************�����ռ�MyProject2******************************************/
	namespace MyProject2;  								//���������ռ�MyProject2
		
	const TEST2 = "this is MyProject2 const";			//��MyProject2������һ������TEST2	
	echo TEST2;											//���Լ������ռ�ֱ��ʹ�ó���

	\MyProject1\demo();									//����MyProject1�ռ��е�demo()����
	
	$user = new \MyProject1\User();						//ʹ��MyProject1�ռ����ʵ��������
	$user -> fun();
	
	
	