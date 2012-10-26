<?php
/* 画一条直线

   // Header("Content-type: image/png");               //要输出一个文件的时候这一句不能加上
	$img=imagecreate(300,200);                             //定义一个图的大小
	//$col_red = ImageColorAllocate($im, 255,192,192);    
	$col_black = ImageColorAllocate($img, 0,0,0);     		//先定义的是图片的背景色
	$col_red = ImageColorAllocate($img, 255,0,0);		//定义图片的线条色
	imageline($img,0,0,299,199,$col_red);						//画线条
	imagedashedline($img,0,199,299,0,$col_red);
	imagedashedline($img,0,199,299,0,$col_red);
	 //——保存的文件名。如果这里是要把它保存为文件，
	ImagePNG($img,"test.png");
	
	
	//imagepng($img);										//输出这个图片
	imagedestroy($img);										//释放资源
	
	
	*/
/***************************************************************************************************************************/	
	
	/* 交叉花线条的输出
	
	Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_black = ImageColorAllocate($im, 0,0,0);
   $col_orn = ImageColorAllocate($im, 255,192,0);
   $col_red = ImageColorAllocate($im, 255,0,0);

   $style=array($col_red,$col_red,$col_black,$col_orn,$col_orn,$col_orn,$col_black);
   ImageSetStyle($im, $style);
   ImageLine($im, 0, 50, 199, 50, IMG_COLOR_STYLED);

   ImagePNG($im);
   ImageDestroy($im);
	
	*/
/***************************************************************************************************************************/		
	
	/*作图当然免不了要把某一区域涂成某种颜色。GD有三种着色方式，一种是矩形区域着色，
一种是指定的点所处的封闭区域着色，另一种是指定的颜色所包围的区域着色。看以下的例子：*/
/*	Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_orn = ImageColorAllocate($im, 255,192,0);
   $col_yel = ImageColorAllocate($im, 255,255,0);
   $col_red = ImageColorAllocate($im, 255,0,0);
   $col_grn = ImageColorAllocate($im, 0,255,0);
   $col_blu = ImageColorAllocate($im, 0,0,255);
  
   ImageFilledRectangle($im,20,10,100,50,$col_blu);
   ImageFilledRectangle($im,5,40,50,90,$col_red);
   ImageFilledRectangle($im,40,80,100,95,$col_orn);
   ImageFilledRectangle($im,90,35,110,90,$col_yel);
   // 以上是第一种着色。直接绘制矩形。
   // 我故意用四个不同颜色的矩形围起一小块区域，
   // 用以说明第二种着色。
  
   ImagePNG($im);
   ImageDestroy($im);
  
   // 看一下效果。
   */
   
   
 /**********************************************带边框的矩形*****************************************************************************/	  
   
/*   Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_orn = ImageColorAllocate($im, 255,192,0);
   $col_yel = ImageColorAllocate($im, 255,255,0);
   $col_red = ImageColorAllocate($im, 255,0,0);
   $col_grn = ImageColorAllocate($im, 0,255,0);
   $col_blu = ImageColorAllocate($im, 0,0,255);
  
   ImageFilledRectangle($im,20,10,100,50,$col_blu);
   ImageFilledRectangle($im,5,40,50,90,$col_red);
   ImageFilledRectangle($im,40,80,100,95,$col_orn);
   ImageFilledRectangle($im,90,35,110,90,$col_yel);
   // 以上是第一种着色。直接绘制矩形。
   // 我故意用四个不同颜色的矩形围起一小块区域，
   // 用以说明第二种着色。
  
   ImageFill($im,70,70,$col_grn);
   // 这是第二种着色。
  
   ImageRectangle($im,120,40,190,90,$col_grn);
   // 暂且画一个矩形来做框吧。事实上任何样子的边界都可以做框。
   ImageFilltoBorder($im,130,50,$col_grn,$col_orn);
   // 把绿色矩形框内涂成橙色。
   // 只要指定的点位于这个“框”的范围内即可，与该点在区域内的位置无关。
   // 这个函数其实是这样的：
   // 从指定的点开始，向外，寻找指定颜色的边界，如果找到，则停止，
   // 找不到，就把途经的点涂成需要的颜色。
  
   ImagePNG($im);
   ImageDestroy($im);
  
   // 看一下效果。
   // 现在我们作出的图已经是花花绿绿了，可是在浏览器里，上，
   // 右键->属性：只有 214 个字节！
	
	*/

 /****************************************画多边形***********************************************************************************/	 
/*上次说到用GD作各种几何图形，以及填充颜色。其中故意把这样一个较复杂的情况
留到后面，这就是任意多边形和任意多边形的填充颜色。*/
/*
   Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_grn = ImageColorAllocate($im, 0,255,0);
  
   $parray = array(40,10,60,10,70,20,60,50,40,50,30,20);
   // 定义一个数组，12个成员是6个点的横纵坐标。
   ImagePolygon($im,$parray,6,$col_grn);
   // 这就是绘制任意多边形的函数，$parray是刚才定义的数组，
   // 6表示六个点。注意六个点连成的是六边形。
   // 不必人为地为了闭合图形而在最后增加一个与第一点相同的点。
  
   ImagePNG($im);
   ImageDestroy($im);  
   
   
   
   */
   
    /****************************************多边形填充***********************************************************************************/
   
   
 /*   Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_orn = ImageColorAllocate($im, 255,192,0);
   $col_yel = ImageColorAllocate($im, 255,255,0);
   $col_red = ImageColorAllocate($im, 255,0,0);
   $col_grn = ImageColorAllocate($im, 0,255,0);
   $col_blu = ImageColorAllocate($im, 0,0,255);

   $parray = array(40,10,60,10,70,20,60,50,40,50,30,20);
   ImageFilledPolygon($im,$parray,6,$col_grn);
  
   ImagePNG($im);
   ImageDestroy($im);  
*/



    /****************************************输出一些西方字符***********************************************************************************/
	 Header("Content-type: image/png");
   $im = ImageCreate (200, 250);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_orn = ImageColorAllocate($im, 255,192,0);
  
   $str="This is a test.";
   ImageString($im,1,10,10,$str,$col_orn);
   ImageString($im,2,10,30,$str,$col_orn);
   ImageString($im,3,10,60,$str,$col_orn);
   ImageString($im,4,10,100,$str,$col_orn);
   ImageString($im,5,10,150,$str,$col_orn);
   // 这里连续五次调用ImageString，在不同位置，
   // 分别用从小到大的字型输出了字符串 $str。
   // ImageString 函数只支持五种字型(1~5)
  
   ImagePNG($im);
   ImageDestroy($im);  
?>
<img name="" src="test.png" width="300" height="200" alt="" />