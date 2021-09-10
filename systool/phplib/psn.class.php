<?php 
/**
 * ????
 * @author loach
 * @copyright www.zhangbailong.com
 */
class Captcha{
 
private $img; //?像?源句柄
public $width=140; //?像?度
public $height=40; //?像高度
private $code;  //???
private $codeLength=4; //???的?度,4位
private $font; //字体 字体文件放在?前?本文件的font目?下
private $fontSize=22; //字体大小
private $fontColor;  //字体?色
private $randChar='123456789'; //?机因子,去掉了一些相似的字符例如o0
private $interfereChar='*-+.'; //干扰因子
 
/**
 * 构造方法，初始化字体
 */
public function __construct()
{
//?便在c?windows/font目?中一款好看的英文字体
$this->font=$_SERVER['DOCUMENT_ROOT'].'/assets/fonts/VERDANA.TTF';
}
 
/**
 * ?建一?矩形的?像
 */
private function createImage()
{
//?建?像?源句柄
$this->img=imagecreatetruecolor($this->width,$this->height);
//?建?像?色,?色值（0-255）,越大?色越?，越小?色越深
$color=imagecolorallocate($this->img,mt_rand(180,255),mt_rand(180, 255), mt_rand(180, 255));
//在?像上?一?矩形并用?色填充
imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
}
 
/**
 * 通??机因子生成4位?机的???
 */
private function createCode()
{
//?算出?机因子的?度，?一是?了方便后面??形式取?机字符
$len=strlen($this->randChar)-1;
//循??取???
for($i=0;$i<$this->codeLength;$i++)
{
$this->code.=$this->randChar[mt_rand(0,$len)];
}
}
 
/**
 * 向?像中填充文字
 */
private function fillFont()
{
$x=$this->width/$this->codeLength;
$y=$this->height/1.4;
//循?生成文字
for ($i=0;$i<$this->codeLength;$i++)
{
//?建?机字体?色，因??是???文字，所以?色值要比?像背景要深.
$this->fontColor=imagecolorallocate($this->img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
//用字体想?像?入文本
imagettftext($this->img,$this->fontSize,mt_rand(-30,30),$x*$i+mt_rand(2, 5),$y,$this->fontColor,$this->font,$this->code[$i]);
}
}
 
/**
 * 向?像中填充一些干扰?
 */

private function fillLine()
{
//生成?机分布的干扰?
for($i=0;$i<2;$i++)
{
//???色
$lineColor=imagecolorallocate($this->img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
//填充到?像中
imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$lineColor);
}
}
 
/**
 * 干扰因子
 */
private function fillInterfereChar()
{
//生成100干扰因子填充到?像中
for($i=0;$i<20;$i++)
{
//?色
$color=imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
//?干扰因子填充
imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),$this->interfereChar[mt_rand(0,3)],$color);
}
}
 
/**
 * ??器?出?片
 */
private function outputImage()
{
//指定??器?出?型??像
header('Content-type:image/png');
//?像格式?png
    imagepng($this->img);
    //?像是一种?源?型，最后要?放
    imagedestroy($this->img);
}
 
/**
 * ?示???,用于前台?示
 */
public function showCaptcha()
{
//?制?像背景
$this->createImage();

//准?4位???
$this->createCode();

//填充干扰?
//$this->fillLine();
//填充干扰因子
$this->fillInterfereChar();
//????以某种字体填充
$this->fillFont();

//??器?出???
$this->outputImage();
}
 
/**
 * ?取???，用于后台??
 */
public function getCode()
{
return $this->code;
}
 
}
  
?>