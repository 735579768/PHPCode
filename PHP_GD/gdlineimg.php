<?php
Header("Content-type: image/png");

$im = ImageCreate(640,260);
$bkground = ImageColorAllocate($im,255,255,255);
$data = ImageColorAllocate($im,0,0,0);
$gird = ImageColorAllocate($im,200,200,160);
$upline = ImageColorAllocate($im,255,0,0);
$dnline = ImageColorAllocate($im,0,175,175);
$d5line = ImageColorAllocate($im,255,127,0);
$d20line = ImageColorAllocate($im,0,0,127);
$d10line = ImageColorAllocate($im,255,0,255);
// 先定义好绘各种所用的颜色。

for($i=20;$i<=220;$i+=25)
   ImageLine($im, 60, $i, 560, $i, $gird);
for($j=60;$j<=560;$j+=25)
   ImageLine($im, $j, 20, $j, 220, $gird);
// 事先计算好位置、格子宽度，用for循环画线，省事多了。

$zzg=10.55;  
$zzd=7.63;
$lzg=10350;
// 假设的股市数据，
// $zzg是需要分析的这一段时间的最高价，假设是10.55元。
// $zzd是需要分析的这一段时间的最低价，假设是7.63元。
// $lzg是需要分析的这一段时间的最高成交量，假设是10350手。
// 这是计算坐标网格的“刻度”的重要数据。
$bl=$zzg-$zzd;
// 最高价跟最低价的差额。根据它跟网格总高度之间的比例，
// 就可以得出一个实际的价格在网格里所处的位置。

for($i=1;$i<=7;$i++)
   {
      $y=$i*25-10;
      // 根据网格线的位置计算标注刻度的合适高度（纵坐标）。
      $str=Number_Format($zzg-($i-1)/6*$bl,2,".",",");
      // 计算每根刻度线对应的价格、并格式化该字符串。
      $x=55-ImageFontWidth(2)*StrLen($str);
      // 根据这个字符串将要占用的宽度，计算出合适的横坐标。
      ImageString($im, 2,$x, $y,$str, $data);
      // 写出这个字符串。
}

$str=Number_Format($lzg,0,".",",");
ImageString($im,2,564,164,$str,$data);
$str=Number_Format($lzg/2,0,".",",");
ImageString($im,2,564,189,$str,$data);
// 由于写成交量的刻度只有两处，用循环写就不合算了。
// 如果数量比较多，也应该用循环。


// 由于一张K线图要画无数根小K线柱，所以，把画一根小K线柱写成函数
function kline($img,$kp,$zg,$zd,$sp,$cjl,$ii)
// 参数：$img 图象；$kp $zg $zd $sp 是开盘、最高、最低、收盘；
// $cjl 成交量；$ii 计数器，表示K线柱的序号。
{
   global $bl,$zzd,$lzg;
   // 声明该函数里用到的$bl,$zzd,$lzg三个变量是全局变量。
   $h=150;   // K线柱区域高度是 150。
   $hh=200; // K线柱区域、成交量柱区域总高度是 200。
  
   if($sp<$kp)
     $linecolor = ImageColorAllocate($img,0,175,175);
     // 如果收盘价低于开盘，是阴线，用青色
   else
     $linecolor = ImageColorAllocate($img,255,0,0);
     // 否则为阳线，用红色。
    
   $x=58+$ii*4;
   // 根据K线柱序号计算横坐标。
   $y1=20+$h-($kp-$zzd)/$bl*$h;
   // 根据开盘价计算对应纵坐标。
   $y2=20+$h-($sp-$zzd)/$bl*$h;
   // 根据收盘价计算对应纵坐标。
   $y3=20+$h-($zg-$zzd)/$bl*$h;
   // 根据最高价计算对应纵坐标。
   $y4=20+$h-($zd-$zzd)/$bl*$h;
   // 根据最低价计算对应纵坐标。
   $y5=20+$hh-$cjl/$lzg*($hh-$h);
   // 根据成交量计算对应纵坐标。

   if($y1<=$y2)   ImageFilledRectangle($img,$x-1,$y1,$x+1,$y2,$linecolor);
   else   ImageFilledRectangle($img,$x-1,$y2,$x+1,$y1,$linecolor);
   // 横坐标减1到加1，跨度为3。即绘宽度为3的小填充矩形。
   // 高度和纵坐标则是由开盘、收盘价决定的。
   // 经测试发现，这个函数必须是左上点坐标写在右下点坐标之前，
   // 而非自动判断两点孰为左上，孰为右下。
  
   ImageFilledRectangle($img,$x-1,$y5,$x+1,220,$linecolor);
   // 根据成交量绘成交量柱体。
   ImageLine($img,$x,$y3,$x,$y4,$linecolor);
   // 根据最高价、最低价绘上下影线。
}

// 试画一根。开盘 8.50 最高 8.88 最低 8.32 收盘 8.80 成交 6578手。
kline($im,8.50,8.88,8.32,8.80,6578,1);
// 再画一根。开盘 8.80 最高 9.50 最低 8.80 收盘 9.50 成交 8070手。
// 光头光脚的大阳线啊！
kline($im,8.80,9.50,8.80,9.50,8070,2);
// 再来一根阴线。开盘 9.80 最高 9.80 最低 8.90 收盘 9.06 成交 10070手。
// 赔了！昨天抛掉多好呀。
kline($im,9.80,9.80,8.90,9.06,10070,3);

// ……

ImagePNG($im);
ImageDestroy($im);
?>
<img name="" src="test.png" width="300" height="200" alt="" />