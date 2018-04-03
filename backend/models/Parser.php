<?php

namespace app\backend\models;

use Yii;
use yii\base\ErrorException;
use yii\base\Model;

/**
* 
*/
class Parser extends Model
{

  public $image;

  public function saveImages($imgArr)
  {
    // $this->image = 'blob:https://web.telegram.org/329cbf1c-661e-4b4c-a4ad-9f19d931b948';
    // return $this->image->extension;
    // foreach ($imgArr as $img) {
    //   self::copyFile($img, 'test', '123');
    // }
    // return ['status'=>'OK'];
  }

  public static function getNum($str)
  {
    $cena = str_replace(",",'.',$str);
    $cena = preg_replace("/[^\d|*\.]/","",$cena);
    return $cena;
  }

  public static function copyFile($file, $folder, $defaultFile) {
    $pathinfo = pathinfo($file);
    $ext = $pathinfo['extension'];
    $random = Yii::$app->security->generateRandomString(10);
    $filePath = '/img/upload'.$folder.'/'.$random.'.'.$ext;
    $newFile = Yii::getAlias('@public').$filePath;
    try {
      copy($file, $newFile);
    } catch (ErrorException $e) {
      $filePath = $defaultFile;
    }
    return $filePath;
  }

}

/**/