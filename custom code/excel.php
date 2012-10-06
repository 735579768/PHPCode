<?php
include("cls_txtsql.php");
$db=new txtsql("chadata.txt","uuchuanmei");
$arr=$db->getRows_data();
 //   error_reporting(0);  //屏蔽警告和NOTICE等所有提示.包括error
$filename="data.xls";
header("Content-Type: application/vnd.ms-excel; charset=gbk");
header("Content-Type:application/force-download");
header("Content-Type:application/download");
//这里面就是这个文件的名字,可以根据需要定义
header("Content-Disposition: attachment;filename=$filename");
//header("Content-Transfer-Encoding:binary");
$arr_title=array("订单号","产品","数量","姓名","省会","详细地址","支付方式","电话","订单附言","提交IP","提交时间");
/*echo "<table width=100% height=100% border='1' >";
echo "<tr>";
foreach($arr_title as $b){
	echo "<td>$b</td>";
	}
	echo "</tr>";
foreach($arr as $aa){
	echo"<tr>";
	foreach($aa as $a){
		echo "<td>'$a</td>";
		}
	echo "</tr>";
	}

echo "</tbale>";*/
$table_content="";
	foreach($arr_title as $b){
	 $table_content.=$b."\t";
	}
$table_content.="\n";
foreach($arr as $aa){
	foreach($aa as $a){
		$table_content.="'".$a."\t";
		}
	$table_content.="\n";
	}
	
	//var_dump($table_content);
echo $table_content;
/*echo iconv('GBK',"UTF-8",$table_content);
echo iconv('YTF-8',"GBK",$table_content);*/
?>