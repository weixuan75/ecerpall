<?php
/**
 * Created by PhpStorm.
 * User: femy
 * Date: 2017/7/28
 * Time: 9:36
 */
namespace app\erp\product\models;

class File extends \yii\base\Model
{
    public $imageFile;
    public $flag_id = -1;
    public function rules(){
        return [['imageFiles'], 'file', 'skipOneEmpty'=>false, 'extensions'=>'png,jpg', 'maxFiles'=>4];
    }
    public function loads($ifile){
        $this->imageFile = $ifile;
    }
    public function getDatePath(){
        $y = Date("Y");
        $m = Date("m");
        $d = Date("d");
        $path = "product_images/".$y;
        if(!file_exists($path))
            mkdir($path);
        $path = $path."/".$m;
        if(!file_exists($path))
            mkdir($path);
        $path = $path."/".$d;
        if(!file_exists($path))
            mkdir($path);
        return $path;
    }
    
    public function uploadImage(){
        if(($this->imageFile['type'] == 'image/jpeg')
            ||($this->imageFile['type'] == 'image/pjpeg')
            ||($this->imageFile['type'] == 'image/png'))
        {
            $this->imageFile['new_name'] = md5($this->imageFile['name']."".time()."".$this->flag_id);
            $to_path = $this->getDatePath()."/".$this->imageFile['new_name'];
            $this->imageFile['new_path'] = $to_path;
            if(file_exists($to_path))
            {
                return false;
            }
            if(!move_uploaded_file($this->imageFile['tmp_name'], $to_path))
                return false;

            return true;
        }
        //if($this->validate())
        //{
            //$this->imageFile->saveAs("/product_images".$this->imageFile->base.".".$this->imageFile->extension);
          //  return true;
        //}
        //else
        //{
          //  return false;
        //}
    }
}