<?php

namespace app\fronted\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $category_id
 * @property string $img
 * @property string $title
 * @property string $desc
 * @property string $content
 */
class Blog extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'blog';
  }

  public static function findByAlias($alias)
  {
    return self::find()
      ->where(['alias'=>$alias, 'status'=>1])
      ->one();
  }

  public function getCategory()
  {
    return $this->hasOne(Category::className(), ['id'=>'category_id']);
  }

  public function search($params)
  {
    $this->load($params);
    if (!$this->validate()) return false;
    $query = self::find()
      ->where(['status'=>1])
      ->with('category');
    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 10,
        'pageSizeParam'=>false,
        // 'forcePageParam' => false,
        'route' => 'blog/index',
        'params' => ['page'=>$params['page']],
      ],
      'sort' => [
        'defaultOrder' => ['id' => SORT_DESC],
      ],
    ]);
    return $dataProvider;
  }

  // /**
  //  * @inheritdoc
  //  */
  // public function rules()
  // {
  //     return [
  //         [['category_id', 'img', 'desc', 'content'], 'required'],
  //         [['category_id'], 'integer'],
  //         [['desc', 'content'], 'string'],
  //         [['img', 'title'], 'string', 'max' => 255],
  //     ];
  // }

  // /**
  //  * @inheritdoc
  //  */
  // public function attributeLabels()
  // {
  //     return [
  //         'id' => 'ID',
  //         'category_id' => 'Category ID',
  //         'img' => 'Img',
  //         'title' => 'Title',
  //         'desc' => 'Desc',
  //         'content' => 'Content',
  //     ];
  // }
}
