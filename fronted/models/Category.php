<?php

namespace app\fronted\models;

use yii\db\ActiveRecord;

/**
* 
*/
class Category extends ActiveRecord
{

  public static function tableName()
  {
    return 'category';
  }

  public static function findByRoutAlias($route, $alias)
  {
    return self::find()
      ->where(['route'=>$route, 'alias'=>$alias, 'status'=>1])
      ->with(['parent', 'childs'])
      ->one();
  }

  public static function findByMenuId($id)
  {
    return self::find()
      ->where(['menu_id'=>$id, 'status'=>1])
      ->with(['parent', 'childs'])
      ->orderBy(['order'=>SORT_ASC])
      ->all();
  }

  public static function findOneByAlias($alias)
  {
    return self::findOne(['alias'=>$alias]);
  }

  public function getProducts()
  {
    return $this->hasMany(Product::className(), ['category_id' => 'id'])
      ->where(['status'=>2])
      ->orderBy(['order'=>SORT_ASC]);
  }

  public function getSiblings()
  {
    return $this->hasMany(self::className(), ['parent_id'=>'parent_id']);
  }

  public function getParent()
  {
    return $this->hasOne(self::className(), ['id'=>'parent_id']);
  }

  public function getChilds()
  {
    return $this->hasMany(self::className(), ['parent_id'=>'id'])
      ->where(['status'=>1])
      ->orderBy(['order'=>SORT_ASC]);
  }

}

/**/