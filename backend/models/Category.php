<?php

namespace app\backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $menu_id
 * @property int $status
 * @property string $route
 * @property int $order
 * @property string $icon
 * @property string $name
 * @property string $alias
 * @property string $meta_key
 * @property string $meta_desc
 *
 * @property Blog[] $blogs
 * @property Category $parent
 * @property Category[] $categories
 * @property Page[] $pages
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'order'], 'integer'],
            [['status', 'route'], 'required'],
            [['meta_desc'], 'string'],
            [['menu_id', 'route', 'icon', 'name', 'alias', 'meta_key'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 1],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'menu_id' => 'Menu ID',
            'status' => 'Status',
            'route' => 'Route',
            'order' => 'Order',
            'icon' => 'Icon',
            'name' => 'Name',
            'alias' => 'Alias',
            'meta_key' => 'Meta Key',
            'meta_desc' => 'Meta Desc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlogs()
    {
        return $this->hasMany(Blog::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
