<?php

namespace app\fronted\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\fronted\models\Category;

/**
* 
*/
class MainMenu extends Widget
{

  public $currentCategory;
  // public $action;
  // public $category;
  // public $contextRoute;
  // private $currentAlias;

  public function init()
  {
    parent::init();
  }

  public function run()
  {
    $categories = Category::findByMenuId('main');
    $out = '<ul class="navbar-nav mr-auto">';
    foreach ($categories as $category) {
      $active = '';
      if ($current = $this->currentCategory) $active = ($current->id === $category->id) ? ' active' : '';
      if ($category->childs) {
        $out = $out
        .'<li class="nav-item dropdown'.$active.'">'
          .'<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'
            .$category->name
          .'</a>'
          .$this->generateDropdown($category->childs)
        .'</li>';
      }
      else {
        $url = $this->createUrl($category);
        $out = $out
        .'<li class="nav-item'.$active.'">'
          .'<a class="nav-link" href="'.$url.'">'
            .'<i class="'.$category->icon.'"></i>'
            .$category->name
          .'</a>'
        .'</li>';
      }
    }
    return $out.'</ul>';
    // $currentAlias = Yii::$app->request->get('alias');
    // $currentRoute = Url::current();
    // var_dump($currentRoute);
    // return 
  }

  private function generateDropdown($categories)
  {
    $out = '<div class="dropdown-menu">';
    foreach ($categories as $category) {
      $url = $this->createUrl($category);
      $active = '';
      if ($current = $this->currentCategory) $active = ($current->id === $category->id) ? ' active' : '';
      $out = $out
      .'<a class="dropdown-item'.$active.'" href="'.$url.'">'
        .$category->name
      .'</a>';
    }
    return $out.'</div>';
  }

  public function createUrl($category)
  {
    $toUrl = [$category->route];
    if ($category->alias) ArrayHelper::setValue($toUrl, 'alias', $category->alias);
    return Url::to($toUrl);
  }

  // public function run()
  // {
  //   $out = '';
  //   if ($this->category->childs) {
  //     $parentActive = ($this->contextRoute === $this->action) ? ' active' : '';
  //     $out = ''
  //       ."<li class=\"nav-item dropdown{$parentActive}\">"
  //         ."<a class=\"nav-link dropdown-toggle\" href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">{$this->category->name}</a>"
  //         ."<div class=\"dropdown-menu\">";
  //           foreach ($this->category->childs as $child) {
  //             $childActive = ($this->currentAlias === $child->alias) ? ' active' : '';
  //             $childUrl = Url::to([$this->action, 'category'=>$child->alias]);
  //             $out = $out."<a class=\"dropdown-item{$childActive}\" href=\"{$childUrl}\">{$child->name}</a>";
  //           }
  //     $out = $out."</div></li>";
  //   } else {
  //     $active = ($this->currentAlias === $this->category->alias) ? ' active' : '';
  //     $urlTo = Url::to([$this->action, 'category'=>$this->category->alias]);
  //     $out = ''
  //       ."<li class=\"nav-item{$active}\">"
  //         ."<a class=\"nav-link\" href=\"{$urlTo}\">{$this->category->name}</a>"
  //       ."</li>";
  //   }
  //   return $out;
  // }

}

/**/