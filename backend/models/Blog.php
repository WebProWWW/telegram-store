<?php

namespace app\backend\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int $category_id
 * @property int $status
 * @property string $img
 * @property string $title
 * @property string $alias
 * @property string $desc
 * @property string $content
 *
 * @property Category $category
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['img', 'alias', 'desc', 'content'], 'required'],
            [['desc', 'content'], 'string'],
            [['status'], 'string', 'max' => 1],
            [['img', 'title', 'alias'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'img' => 'Img',
            'title' => 'Title',
            'alias' => 'Alias',
            'desc' => 'Desc',
            'content' => 'Content',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
