<?php
include'common.php';
class picture_upload{
	private $path="../img";
	private $path_two="../img_big/";
	private $allowtype=array("image/jpeg","image/gif","image/png");
	private $newname;
    private $newwidth=490;
    private $newheight=198;
    private $file;
    private $location;
    function __construct($file){
     $this->file=$file;
     if(!in_array($this->file['type'],$this->allowtype)){
         echo"<script>alert('没有上传图片');</script>";
         return false;
     }
     else{
     	 if($this->createnewpicture())
     	 $this->rename();
     }
    }
    private function rename(){
    	$sql="select * from t_wz order by id DESC limit 1";
        $info2=$GLOBALS['dbk']->prepare($sql);
        $info2->execute();
        foreach($info2 as $value){
        	$this->newname=$value['id']+1;
        }
        switch ($this->file['type']) {
        	case 'image/jpeg':
            $this->newname=$this->newname.".jpg";
        	break;
        	case 'image/png':
            $this->newname=$this->newname.".png";
            break;
        	case 'image/gif':
            $this->newname=$this->newname.".gif";
            break;
        }
        $oldname=$this->path."/".$this->file['name'];
        $newname=$this->path."/".$this->newname;
        if(rename($oldname,$newname));
        return true;
    }
    private function createnewpicture(){
    $local=$this->path_two.$this->file['name'];
    move_uploaded_file($this->file['tmp_name'],$local);
    $filename=$this->file['tmp_name']."/".$this->file['name'];
    $this->location=$this->path."/".$this->file['name'];
     switch ($this->file['type']) {
     	case 'image/jpeg':
     		$src=imagecreatefromjpeg($local);
     		break;
     	case 'image/png':
     	    $src=imagecreatefrompng($local);
     	    break;
     	case 'image/gif':
            $src=imagecreatefromgif($local);
            break;
        default:
            break;
     }
     $sx=imagesx($src);
     $sy=imagesy($src);

     $new_image=imagecreatetruecolor($this->newwidth, $this->newheight);
     if(imagecopyresized($new_image,$src,0, 0, 0, 0, $this->newwidth, $this->newheight, $sx, $sy))
      {
      	if(ImageJpeg($new_image,$this->location)||Imagegif($new_image,$this->location)||Imagepng($new_image,$this->location))
        //imagejpeg($this->location);
        return true;
      }
      else
      	return false;
    }
}