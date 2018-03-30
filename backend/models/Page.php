<?php

namespace app\backend\models;

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
 *
 * @property Category $category
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['alias', 'content'], 'required'],
            [['content'], 'string'],
            [['status'], 'string', 'max' => 1],
            [['title', 'alias'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'alias' => 'Alias',
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
