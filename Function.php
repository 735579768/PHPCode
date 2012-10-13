<?php 
/*
*可自动创建目录（多层）PHP写入文件的函数（目录不存在自动建立）
*格式如下 writefile("需要写入的内容","cache/1/1/1.txt")
*所有目录不存在自动循环建立。
*writefile('test','keli/keli/keli.txt')
*/
function writefile($body,$path){ 
if (!file_exists(dirname($path))){     
createDir(dirname($path));     
mkdir($path, 0777);     
}   
$handle=fopen($path,'w');     
 fwrite($handle,$body);     
 fclose($handle);    
 return 1;    
    }    
function createDir($path){     
if (!file_exists($path)){     
createDir(dirname($path));     
mkdir($path, 0777);     
}     
}    
/*
*@param $pathname 要包含的目录,里面可以有多级目录
*/
function incdirfile($pathname,$patten='*'){
    $pathname=str_replace("\\","/",$pathname);
       echo $pathname."<br>";
    $filename=glob($pathname."/".$patten);
    foreach($filename as $fn){
    
        if(is_dir($fn)){
            incdirfile($fn);
        }else{
            if(preg_match('/(.*?).php/',$fn)){
                echo $fn.'<br>';
            include($fn);
        }
        }
        
    }
}
//incdirfile(dirname(__FILE__));
//Image::buildImageVerify(4);
image::buildString("赵克立");
?>