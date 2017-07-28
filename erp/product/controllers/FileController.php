<?php
/**
 * Created by PhpStorm.
 * User: femy
 * Date: 2017/7/28
 * Time: 8:35
 */

namespace app\erp\product\controllers;


use Yii;
use app\erp\admin\controllers\ConfController;
use app\erp\product\models\File;
use yii\helpers\Json;
use yii\web\UploadedFile;

class FileController extends ConfController
{
    public function actionIndex(){

    }
    //根据保存在session中的path值来删除path，并清除sessoin
    public function actionClear(){
        $files = null;
        if(isset(Yii::$app->session['files_images']))
        {
            $files = unserialize(Yii::$app->session['files_images']);
        }
        if($files != null)
        foreach($files as $key=>$val){
            if(file_exists($val))
            {
                unlink($val);           //删除文件
            }
        }
        unset(Yii::$app->session['files_images']);
        return Json::encode(['code'=>1, 'msg'=>'清除成功！']);
    }

    public function actionClearCache(){
        unset(Yii::$app->session['files_images']);
        return Json::encode(['code'=>1, 'msg'=>'清除成功！']);
    }
    public static function clear(){
        $files = null;
        if(isset(Yii::$app->session['files_images']))
        {
            $files = unserialize(Yii::$app->session['files_images']);
        }
        if($files != null)
            foreach($files as $key=>$val){
                if(file_exists($val))
                {
                    unlink($val);           //删除文件
                }
            }
        unset(Yii::$app->session['files_images']);
        return true;
    }
    public static function clearCache(){
        unset(Yii::$app->session['files_images']);
        return true;
    }
    public function actionUpload(){
        $model = new File();
        if(Yii::$app->request->isPost) {;
            $files = null;
            if (isset(Yii::$app->session['files_images'])) {
                $files = unserialize(Yii::$app->session['files_images']);
            } else {
                $files = array();
            }
            if (isset($_FILES['upfile'])) {
                $model->loads($_FILES['upfile']);
                //设置标记id（根据已上传图片数量）
                $model->flag_id = count($files);
                if ($model->uploadImage()) {
                    $files[count($files)] = $model->imageFile['new_path'];          //新文件的path
                    Yii::$app->session['files_images'] = serialize($files);                    //设置文件属性
                    return Json::encode(['code' => 1, 'msg' => '上传成功！']);
                }
                return Json::encode(['code' => 0, 'msg' => '上传失败！']);
            }
            else
            {
                $files[count($files)] = "not";
                Yii::$app->session['files_images'] = serialize($files);
                return Json::encode((['code'=> 0, 'msg'=>'']));
            }
        }

        return $this->render("/product/product/create");
    }

}