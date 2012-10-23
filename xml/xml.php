<?php
error_reporting(E_ALL);
$xml = simplexml_load_file("xml.xml"); //创建 SimpleXML对象 
//var_dump($xml); //输出 XM
echo $xml->depart->name."<br/>";  //这里因为是一个对象所以不能用数组方式访问
foreach($xml->depart as $a) 
{ 
echo "$a->name <BR>"; 
	$a->name="000000000000";//改变节点的值
} 


$result=$xml->asxml();//格式化xml文件并把结果返回
file_put_contents("test.xml",$result);
?>