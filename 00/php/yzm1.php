<?php
class Vcode{
	private $width;
	private $height;
    private $codeNum;
    private $disturbnumber;
    private $checkcode;
    private $image;
    function __construct($width=80,$height=20,$number=5){
      $this->width=$width;
      $this->height=$height;
      $this->codeNum=$number;
      $num=floor(($width*$height)/24);
      if($num>(240-$number))
      	$this->disturbnumber=240-$number;
      else{
      	$this->disturbnumber=$num;}
        $this->checkcode=$this->createcheckcode();
    }
    function __tostring(){
    	header("Content-type:image/png"); 
    	$_SESSION['code']=strtoupper($this->checkcode);
    	$this->outimg();
    	imagepng($this->image);
    	return'';
    }
    private function outimg(){
    	$this->getcreateimg();
    	$this->setdisturbcolor();
    	$this->outputtext();
    }
    private function getcreateimg(){
    	$this->image=imagecreatetruecolor($this->width, $this->height);
    	$backcolor=imagecolorallocate($this->image,rand(225,255),
    	rand(225,255),rand(225,255));
    	imagefill($this->image,0,0,$backcolor);
    	$border=imagecolorallocate($this->image,0,0,0);
    	imagerectangle($this->image, 0, 0, $this->width-1,
    	$this->height-1, $border);
    }
    private function createcheckcode(){
    	$code="1234567890qwertyuiopasdfghjklzxcvbnm";
        $ycode=$code{rand(0,strlen($code)-1)};
    	for($i=0;$i<$this->codeNum-1;$i++)
    	{
    		$char=$code{rand(0,strlen($code)-1)};
    		$ycode.=$char;
    	}
        return $ycode;
    }
    private function setdisturbcolor()
    {
    	for($i=0;$i<$this->disturbnumber;$i++){
    		$color=imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));
            imagesetpixel($this->image, rand(1,$this->width-2), rand(1,$this->height-2), $color);
    	    }
        for($i=0;$i<10;$i++){
    		$color=imagecolorallocate($this->image,rand(0,255),rand(0,255),rand(0,255));
    	    imagearc($this->image, rand(-10,$this->width), rand(-10,$this->height), rand(30,300), rand(20,200), 
    	      55, 44, $color);
    	}
    }
    private function outputtext(){
    	for($i=0;$i<$this->codeNum;$i++){
    		$fontcolor=imagecolorallocate($this->image,rand(0,128),rand(0,128),rand(0,128));
    		$fontsize=rand(3,5);
    		$x=floor($this->width/$this->codeNum)*$i+3;
    		$y=rand(0,$this->height-imagefontheight($fontsize));
            imagechar($this->image,$fontsize,$x,$y,$this->checkcode{$i},$fontcolor);
    	}
    }
    private function outputimg(){
	//if(imagetypes()& IMG_GIF){
	    header("Content-type:image/gif");
		imagegif($this->image);
	} 
}
