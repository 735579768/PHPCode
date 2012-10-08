<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP批量上传图片的具体实现方式</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data"> 
  <p>Pictures:<br /> 
  <input type="file" name="pictures[]" /><br /> 
  <input type="file" name="pictures[]" /><br /> 
  <input type="file" name="pictures[]" /><br /> 
  <input type="submit" name="upload" value="Send" /> 
  </p> 
 </form> 
</body> 
</html> 
 
<?php 
if(@$_POST['upload']=='Send'){  
    $dest_folder   =  "picture/";  
 if(!file_exists($dest_folder)){  
        mkdir($dest_folder);  
 }  
 foreach ($_FILES["pictures"]["error"] as $key => $error) {  
     if ($error == UPLOAD_ERR_OK) {  
         $tmp_name = $_FILES["pictures"]["tmp_name"][$key];  
         $name    = $_FILES["pictures"]["name"][$key];  
     // $uploadfile = $dest_folder.$name; 
       //  move_uploaded_file($tmp_name, $uploadfile);  

    $ext=substr($name,strrpos($name,'.')); 
	  $filename=$dest_folder.date("ymdhms").rand(10000,99999).$ext;
	    move_uploaded_file($tmp_name,$filename);  
     }  
 }  
}  
?>   
</body>
</html>