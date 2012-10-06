<?php
function myerror($error_lv,$msg){
//echo $error."----".$msg;
	die ("网站发生错误请联系管理员");
	}
set_error_handler("myerror");
/**
 * @author phpadmin
 * @copyright 2012
 */
 //把要写入的记录先存到一个数组之后调用write_data($data_strarr)写入
class txtsql
{
    public $key="uuchuanmei";//加密密匙
    public $data_name="data.txt";//默认的数据文件名
    public $field_dem="#ziduan#";//字段分隔符
    public $page_size=20;//
    public $record_dem="#jilu#";//记录分隔符
   
    function  __construct($dataname="data.txt",$jia_key="")
    {
        /*foreach($zd_arr as $ad)
        {
            $this->field_dem[]=$this->_encrypt($ad,$this->key);//对传进来的字段进行加分隔符处理
        }*/
		$this->data_name=$dataname;
		$this->bak_data();
		if(!file_exists($this->data_name)){
		file_put_contents($this->data_name,"");
	}else{
		if(!is_writable($this->data_name)){die("网站发生错误请联系管理员");}
		}
        if($jia_key!="")$this->key=$jia_key;
        $this->field_dem=$this->_encrypt($this->field_dem,$this->key);
        $this->record_dem=$this->_encrypt($this->record_dem,$this->key);
       
    }
   //写入数据
   //param  $data_strarr   要写入的一条记录数组 成功时返回一个订单号
    function write_data($data_strarr)
    {
			$id=date('ymdHis').rand(1000,2000);
            $this->bak_data();
            $str=$this->_encrypt($id,$this->key).$this->field_dem;
            foreach($data_strarr as $data_str)
            {
              $str.=$this->_encrypt($data_str,$this->key).$this->field_dem;//给各个字段加上分隔符
            }
            $file_w=fopen($this->data_name,"a+");
            if($file_w){
            fwrite($file_w,$str.$this->record_dem)//给记录加上分隔符并写入
                                    or die("");
            fclose($file_w);
            return $id;
            }else{
            return false;
            }
        
    }
	//返回数据库中的数据
	//param $data_start  从这里开始返回记录，默认是从0即开始
	//param $data_count  取出记录的条数默认是所有记录
	/*当两个参数都为空时取数据库中的全部数据*/
    function getRows_data($data_start=0,$data_count=0)//返回指定数目的数据
    {
           	$file_tz=trim(file_get_contents($this->data_name));
        	$file_arr=explode($this->record_dem,$file_tz);//把文件分成一条条字符记录
            array_pop($file_arr);//删掉最后一个空字符串
        	/*$ddxx_count=count($file_arr)-1;//订单总数
        	$page_count=ceil($ddxx_count/$page_num);//分成的总页数*/
            $file_temarr=array();
			$file_arr=array_reverse($file_arr);//返转数组
            if($data_count==0){
                     $file_temarr=array_slice($file_arr,$data_start);//取出所有的数据     
            }else{
                $file_temarr=array_slice($file_arr,$data_start,$data_count);//取出指定段的数据  
            }
           $file_re=array();    
            foreach($file_temarr as $tem)
            {
                $forarr=array();
                $temarr=explode($this->field_dem,trim($tem));
                array_pop($temarr);//删掉最后一个空字符串
                for($i=0;$i<count($temarr);$i++){
                   $forarr[$i] =$this->_decrypt($temarr[$i],$this->key);//对数据进行解密处理
                }
                $file_re[]=$forarr;
            }
            return $file_re;
    }
    function delete_data($orderid)
    {
			$this->bak_data();
			$file_tz=file_get_contents($this->data_name);
			$file_re=explode($this->record_dem,$file_tz);
            array_pop($file_re);
	$file_re=array_reverse($file_re);//返转数组
			//查中记录所在的数组索引
            $all_arr=$this->getRows_data();
            if(count($all_arr)>0){
            for($i=0;$i<count($all_arr);$i++){//查找要删除的值
            if(trim($orderid)==@$all_arr[$i][0]){
                $file_re[$i]="";
	$file_re=array_reverse($file_re);//返转数组
                 for($i=0;$i<count($file_re);$i++){
                    if($file_re[$i]!=""){
						$file_re[$i].=$this->record_dem;
                    }
                }
                $str="";
				foreach($file_re as $a){
					$str.=$a;
					}
				//$str=array_reduce($file_re,$this->strsub($a,$b));
                file_put_contents($this->data_name,trim($str));
                break;
            }
            }
            }
             return true;	
    }
     /**
     * 解密
     *
     * @param string $encryptedText 已加密字符串
     * @param string $key  密钥
     * @return string
     */
private function _decrypt($encryptedText,$key = null)

    {
        $key = $key === null ? Config::get('secret_key') : $key;
        $cryptText = base64_decode($encryptedText);
        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
        $decryptText = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $cryptText, MCRYPT_MODE_ECB, $iv);
        return trim($decryptText);
    }
    /**
     * 加密
     * @param string $plainText 未加密字符串
     * @param string $key        密钥
     */
private function _encrypt($plainText,$key = null)
    {
        $key = $key === null ? Config::get('secret_key') : $key;
        $ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);
        $encryptText = @mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $plainText, MCRYPT_MODE_ECB, $iv);
        return trim(base64_encode($encryptText));
    }
public function bak_data(){
	if(!file_exists("databak")){mkdir("databak");}
	if(!file_exists($this->data_name)){
		file_put_contents($this->data_name,"");
	}else{
		if(!is_writable($this->data_name)){die("数据文件没有写入权限");}
		}
	if(!file_exists("databak/no del(read).txt")){
		$file_st=fopen("databak/no del(read).txt","w");
		if($file_st){
			$str="ddxxday.txt 这个文件每隔一天进行备份
ddxx5.txt  这个文件每隔5分钟进行备份
ddxx_bak.txt 每次操作都会备份";
			fwrite($file_st,$str);
			fclose($file_st);
			}
		}
	if(!file_exists("databak/".$this->data_name."5.txt")){copy($this->data_name,"databak/".$this->data_name."5.txt");}
	if(!file_exists("databak/".$this->data_name."day.txt")){copy($this->data_name,"databak/".$this->data_name."day.txt");}
	if(!file_exists("databak/".$this->data_name."_bak.txt")){copy($this->data_name,"databak/".$this->data_name."_bak.txt");}
	if(filemtime("databak/".$this->data_name."5.txt")+300<time()){copy($this->data_name,"databak/".$this->data_name."5.txt");}
	if(filemtime("databak/".$this->data_name."day.txt")+86400<time()){copy($this->data_name,"databak/".$this->data_name."day.txt");}
	copy($this->data_name,"databak/".$this->data_name."_bak.txt")
						or die("");;
	}	
}
?>