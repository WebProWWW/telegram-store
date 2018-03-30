<?php

namespace app\backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property int $status
 * @property int $order
 * @property int $best
 * @property string $alias
 * @property string $view
 * @property string $img
 * @property string $name
 * @property string $desc
 * @property string $url
 *
 * @property Category $category
 * @property FrontedUser $user
 * @property ProductTag[] $productTags
 * @property Tag[] $tags
 * @property Sticker[] $stickers
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'user_id', 'order'], 'integer'],
            [['type', 'desc'], 'required'],
            [['desc'], 'string'],
            [['status', 'best'], 'string', 'max' => 1],
            [['alias', 'type', 'img', 'name', 'url'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => FrontedUser::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'status' => 'Status',
            'order' => 'Order',
            'best' => 'Best',
            'alias' => 'Alias',
            'type' => 'Type',
            'img' => 'Img',
            'name' => 'Name',
            'desc' => 'Desc',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(FrontedUser::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('product_tag', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStickers()
    {
        return $this->hasMany(Sticker::className(), ['product_id' => 'id']);
    }
}
