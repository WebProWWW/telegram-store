<?php

namespace app\fronted\models;

use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
* 
*/
class Product extends ActiveRecord
{

  public static function tableName()
  {
    return 'product';
  }

  public function getCategory()
  {
    return $this->hasOne(Category::className(), ['id'=>'category_id']);
  }

  public function getTags()
  {
    return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('product_tag', ['product_id' => 'id']);
  }

  public static function getBest()
  {
    return self::find()
      ->where(['best'=>1, 'status'=>2])
      ->with(['category', 'tags'])
      ->orderBy('order')
      ->all();
  }

  public function getLike()
  {
    return self::find()
      ->where(['status'=>2])
      ->andWhere(['not', ['id' => $this->id]])
      ->andFilterWhere(['like', 'type', $this->type])
      ->limit(3)
      ->all();
  }

  public function getImgAttrClass()
  {
    switch ($this->type) {
      case 'group': return 'img-fluid rounded-circle';
      case 'channel': return 'img-fluid rounded-circle';
      case 'bot': return 'img-fluid rounded-circle';
      default: return 'img-fluid';
    }
  }

  public function getStickers()
  {
    return $this->hasMany(Sticker::className(), ['product_id' => 'id']);
  }

  public function search($params)
  {
    $this->load($params);
    if (!$this->validate()) return false;
    $query = self::find()
      ->where(['status'=>2, 'category_id'=>$params['category_id']])
      ->with(['category']);
    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 9,
        'pageSizeParam'=>false,
        // 'forcePageParam' => false,
        'route' => 'catalog/category',
        'params' => [
          'alias' => $params['alias'],
          'page' => $params['page'],
        ],
      ],
      'sort' => [
        'defaultOrder' => ['order' => SORT_DESC],
      ],
    ]);
    return $dataProvider;
  }

  public static function findByAlias($alias)
  {
    return self::find()
      ->where(['alias'=>$alias, 'status'=>2])
      ->with(['category', 'tags', 'stickers'])
      ->one();
  }

  public function getBestStickers()
  {
    return self::find()
      ->where(['best'=>1, 'type'=>'sticker', 'status'=>2])
      ->limit(8)
      ->with(['category', 'tags'])
      ->orderBy('order')
      ->all();
  }

  public function getBestChannels()
  {
    return self::find()
      ->where(['best'=>1, 'type'=>'channel', 'status'=>2])
      ->limit(6)
      ->with(['category', 'tags'])
      ->orderBy('order')
      ->all();
  }

  public function getBestBots()
  {
    return self::find()
      ->where(['best'=>1, 'type'=>'bot', 'status'=>2])
      ->limit(6)
      ->with(['category', 'tags'])
      ->orderBy('order')
      ->all();
  }

}

/**/