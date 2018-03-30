<?php

namespace app\fronted\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property int $category_id
 * @property int $status
 * @property string $title
 * @property string $alias
 * @property string $content
 */
class Page extends \yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
    return 'page';
  }

  public static function findByAlias($alias)
  {
    return self::find()
      ->where(['alias'=>$alias, 'status'=>1])
      ->with('category')
      ->one();
  }

  public function getCategory()
  {
    return $this->hasOne(Category::className(), ['id'=>'category_id']);
  }

  // /**
  //  * @inheritdoc
  //  */
  // public function rules()
  // {
  //     return [
  //         [['category_id', 'alias', 'content'], 'required'],
  //         [['category_id'], 'integer'],
  //         [['content'], 'string'],
  //         [['status'], 'string', 'max' => 1],
  //         [['title', 'alias'], 'string', 'max' => 255],
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
  //         'status' => 'Status',
  //         'title' => 'Title',
  //         'alias' => 'Alias',
  //         'content' => 'Content',
  //     ];
  // }
}
