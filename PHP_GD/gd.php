<?php
/* ��һ��ֱ��

   // Header("Content-type: image/png");               //Ҫ���һ���ļ���ʱ����һ�䲻�ܼ���
	$img=imagecreate(300,200);                             //����һ��ͼ�Ĵ�С
	//$col_red = ImageColorAllocate($im, 255,192,192);    
	$col_black = ImageColorAllocate($img, 0,0,0);     		//�ȶ������ͼƬ�ı���ɫ
	$col_red = ImageColorAllocate($img, 255,0,0);		//����ͼƬ������ɫ
	imageline($img,0,0,299,199,$col_red);						//������
	imagedashedline($img,0,199,299,0,$col_red);
	imagedashedline($img,0,199,299,0,$col_red);
	 //����������ļ��������������Ҫ��������Ϊ�ļ���
	ImagePNG($img,"test.png");
	
	
	//imagepng($img);										//������ͼƬ
	imagedestroy($img);										//�ͷ���Դ
	
	
	*/
/***************************************************************************************************************************/	
	
	/* ���滨���������
	
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
	
	/*��ͼ��Ȼ�ⲻ��Ҫ��ĳһ����Ϳ��ĳ����ɫ��GD��������ɫ��ʽ��һ���Ǿ���������ɫ��
һ����ָ���ĵ������ķ��������ɫ����һ����ָ������ɫ����Χ��������ɫ�������µ����ӣ�*/
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
   // �����ǵ�һ����ɫ��ֱ�ӻ��ƾ��Ρ�
   // �ҹ������ĸ���ͬ��ɫ�ľ���Χ��һС������
   // ����˵���ڶ�����ɫ��
  
   ImagePNG($im);
   ImageDestroy($im);
  
   // ��һ��Ч����
   */
   
   
 /**********************************************���߿�ľ���*****************************************************************************/	  
   
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
   // �����ǵ�һ����ɫ��ֱ�ӻ��ƾ��Ρ�
   // �ҹ������ĸ���ͬ��ɫ�ľ���Χ��һС������
   // ����˵���ڶ�����ɫ��
  
   ImageFill($im,70,70,$col_grn);
   // ���ǵڶ�����ɫ��
  
   ImageRectangle($im,120,40,190,90,$col_grn);
   // ���һ�һ������������ɡ���ʵ���κ����ӵı߽綼��������
   ImageFilltoBorder($im,130,50,$col_grn,$col_orn);
   // ����ɫ���ο���Ϳ�ɳ�ɫ��
   // ֻҪָ���ĵ�λ��������򡱵ķ�Χ�ڼ��ɣ���õ��������ڵ�λ���޹ء�
   // ���������ʵ�������ģ�
   // ��ָ���ĵ㿪ʼ�����⣬Ѱ��ָ����ɫ�ı߽磬����ҵ�����ֹͣ��
   // �Ҳ������Ͱ�;���ĵ�Ϳ����Ҫ����ɫ��
  
   ImagePNG($im);
   ImageDestroy($im);
  
   // ��һ��Ч����
   // ��������������ͼ�Ѿ��ǻ��������ˣ��������������ϣ�
   // �Ҽ�->���ԣ�ֻ�� 214 ���ֽڣ�
	
	*/

 /****************************************�������***********************************************************************************/	 
/*�ϴ�˵����GD�����ּ���ͼ�Σ��Լ������ɫ�����й��������һ���ϸ��ӵ����
�������棬������������κ��������ε������ɫ��*/
/*
   Header("Content-type: image/png");
   $im = ImageCreate (200, 100);
   $col_blk = ImageColorAllocate($im, 0,0,0);
   $col_grn = ImageColorAllocate($im, 0,255,0);
  
   $parray = array(40,10,60,10,70,20,60,50,40,50,30,20);
   // ����һ�����飬12����Ա��6����ĺ������ꡣ
   ImagePolygon($im,$parray,6,$col_grn);
   // ����ǻ����������εĺ�����$parray�ǸղŶ�������飬
   // 6��ʾ�����㡣ע�����������ɵ��������Ρ�
   // ������Ϊ��Ϊ�˱պ�ͼ�ζ����������һ�����һ����ͬ�ĵ㡣
  
   ImagePNG($im);
   ImageDestroy($im);  
   
   
   
   */
   
    /****************************************��������***********************************************************************************/
   
   
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



    /****************************************���һЩ�����ַ�***********************************************************************************/
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
   // ����������ε���ImageString���ڲ�ͬλ�ã�
   // �ֱ��ô�С���������������ַ��� $str��
   // ImageString ����ֻ֧����������(1~5)
  
   ImagePNG($im);
   ImageDestroy($im);  
?>
<img name="" src="test.png" width="300" height="200" alt="" />