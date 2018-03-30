<?php

namespace app\fronted\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;

/**
* 
*/
class SearchForm extends Model
{
  public $word;

  public function attributeLabels()
  {
    return [
      'word' => 'Поиск...',
    ];
  }

  public function rules()
  {
    return [
      ['word', 'required'],
      ['word', 'string', 'min'=>2],
    ];
  }

  public function search($params)
  {
    // $this->load($params);
    // if (!$this->validate()) return false;
    $word = Html::encode($this->word);
    $query = Product::find()
      ->where(['status'=>2])
      ->with('category')
      // ->with(['category', 'tags', 'stickers'])
      ->andFilterWhere(['or',
        ['like', 'alias', $word],
        ['like', 'name', $word],
        // ['like', 'desc', $word],
      ]);
    $dataProvider = new ActiveDataProvider([
      'query' => $query,
      'pagination' => [
        'pageSize' => 10,
        'pageSizeParam'=>false,
        'route' => 'site/search',
        'params' => ['page'=>$params['page'], 'slovo'=>$word],
      ],
      'sort' => [
        'defaultOrder' => [
          'name' => SORT_ASC, 
        ],
      ],
    ]);
    return $dataProvider;
  }

}

/**/