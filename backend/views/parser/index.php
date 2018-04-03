<?php

// use app\backend\models\Parser;

use PHPHtmlParser\Dom;
use PHPHtmlParser\Exceptions\EmptyCollectionException;
use app\backend\models\Product;
use app\backend\models\Tag;
use app\backend\models\Sticker;
use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\helpers\ArrayHelper;
use yii\base\ErrorException;


$dom = new Dom();

$dom->setOptions([
  'strict' => false,
  'preserveLineBreaks' => false,
  // 'whitespaceTextNode' => false,
  // 'removeScripts' => false,
]);

function getNum($str) {
  $cena = str_replace(",",'.',$str);
  $cena = preg_replace("/[^\d|*\.]/","",$cena);
  return $cena;
}

function getElementVal($elem, $key, $default=null) {
  try {
    if ($elem) return ArrayHelper::getValue($elem, $key, $default);
  } catch (EmptyCollectionException $e) {
    return $default;
  }
  return $default;
}

function copyFile($file, $folder, $defaultFile) {
  $pathinfo = pathinfo($file);
  $ext = $pathinfo['extension'];
  $random = Yii::$app->security->generateRandomString(10);
  $filePath = '/img/upload'.$folder.'/'.$random.'.'.$ext;
  $newFile = Yii::getAlias('@public').$filePath;
  try {
    copy($file, $newFile);
  } catch (ErrorException $e) {
    $filePath = $defaultFile;
  }
  return $filePath;
}


// https://t.me/okreview
// OK Ревью
// Обзоры курсов на разные тематики.
// Смотрю курсы и пишу на них свои рецензии.

// $defaultImage = '/img/product.jpg';

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// ONE

// $tname = 'okreview';
// $turl = 'https://t.me/'.$tname;
// $dom->loadFromUrl($turl);

// $title = $dom->find('.tgme_page_title', 0);
// $title = trim(getElementVal($title, 'text', ''));

// $image = $dom->find('.tgme_page_photo_image', 0);
// $image = getElementVal($image, 'src', $defaultImage);
// if ($image !== $defaultImage) $image = copyFile($image, 'channel', $defaultImage);

// $image = copyFile($image, 'channel', $defaultImage);

// $desc = $dom->find('.tgme_page_description', 0);
// $desc = trim(getElementVal($desc, 'innerHtml', ''));
/*$desc = preg_replace('#<br.*?>#s', ' ', $desc);*/

// $members = $dom->find('.tgme_page_extra', 0);
// $members = getNum($members);

// // echo $title;
// // echo "<br>";
// // echo $desc;
// // echo "<br>";
// // echo "<img width=\"100\" height=\"100\" src=\"$image\">";
// // echo "<br>";
// // echo $members;
// echo $image;

// $productModel = Product::findOne(['id'=>'963']);
// $productModel->img = '/img/upload/channel/'.Yii::$app->security->generateRandomString(10).'.jpg';
// $productModel->save(false);
// $productModel = new Product;

// $productModel->category_id = 1;
// $productModel->user_id = null;
// $productModel->status = 2;
// $productModel->order = 2;
// $productModel->best = 1;
// $productModel->alias = $tname;
// $productModel->type = 'channel';
// $productModel->img = $image;
// $productModel->name = Html::encode($title);
// $productModel->desc = Html::encode($desc);
// $productModel->url = $turl;
// $productModel->members = $members;

// if ($productModel->save(false)) {
//   $tagsArr = [31, 30, 32];
//   foreach ($tagsArr as $tagId) {
//     $tag = Tag::findOne(['id' => $tagId]);
//     $productModel->link('tags', $tag);
//   }
// }


// //- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// // ТЕМЫ

// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/themes/');
// $srcProducts = $dom->find('.product');
// $defaultImage = '/img/product.jpg';

// foreach ($srcProducts as $srcProduct) {
//   $link = $srcProduct->find('.woocommerce-LoopProduct-link', 0);
//   $image = $link->find('img', 0);

//   $link = getElementVal($link, 'href', false);
//   $image = getElementVal($image, 'src', $defaultImage);

//   if ($link) {

//     $dom->loadFromUrl($link);
//     $title = $dom->find('.product_title', 0);
//     $title = trim(getElementVal($title, 'text'));
//     $desc = $dom->find('.description p', 0);
//     $desc = getElementVal($desc, 'text');
//     $imageBig = $dom->find('.zoom', 0);
//     $imageBig = getElementVal($imageBig, 'href', $defaultImage);
//     $url = $dom->find('.wc-button-blue', 0);
//     $url = getElementVal($url, 'hreflink');

//     if ($image !== $defaultImage) $image = copyFile($image, '/theme', $defaultImage);
//     if ($imageBig !== $defaultImage) $imageBig = copyFile($imageBig, '/theme', $defaultImage);

//     $model = new Product;
//     $model->category_id = 6;
//     $model->user_id = null;
//     $model->status = 2;
//     $model->alias = Yii::$app->security->generateRandomString(10);
//     $model->type = 'theme';
//     $model->img = $image;
//     $model->name = $title;
//     $model->desc = $desc;
//     $model->url = $url;

//     if ($model->save(false)) {
//       $stickerModel = new Sticker;
//       $stickerModel->url = $imageBig;
//       $model->link('stickers', $stickerModel);
//       $stickerModel->save(false);
//     }
//   }
// }

// $products = Product::find()->where(['type'=>'group'])->all();
// $defaultImage = '/img/product.jpg';

// foreach ($products as $product) {

//   // echo '<img width="50" height="50" src="'.$product->img.'">';

//   $dom->loadFromUrl($product->url);

//   $image = $dom->find('.tgme_page_photo_image', 0);
//   $image = getElementVal($image, 'src', $defaultImage);
//   if ($image !== $defaultImage) $image = copyFile($image, '/group', $defaultImage);

//   $members = $dom->find('.tgme_page_extra', 0);
//   $members = getElementVal($members, 'text', null);
//   if ($members) $members = getNum($members);

//   $product->img = $image;
//   $product->members = $members;
//   $product->save(false);

//   // return;
// }

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// ЧАТЫ

// $products = Product::find()->where(['type'=>'group'])->all();
// $defaultImage = '/img/product.jpg';

// foreach ($products as $product) {

//   // echo '<img width="50" height="50" src="'.$product->img.'">';

//   $dom->loadFromUrl($product->url);

//   $image = $dom->find('.tgme_page_photo_image', 0);
//   $image = getElementVal($image, 'src', $defaultImage);
//   if ($image !== $defaultImage) $image = copyFile($image, '/group', $defaultImage);

//   $members = $dom->find('.tgme_page_extra', 0);
//   $members = getElementVal($members, 'text', null);
//   if ($members) $members = getNum($members);

//   $product->img = $image;
//   $product->members = $members;
//   $product->save(false);

//   // return;
// }

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// БОТЫ

// $products = Product::find()->where(['type'=>'bot'])->all();
// $defaultImage = '/img/product.jpg';

// foreach ($products as $product) {

//   // echo '<img width="50" height="50" src="'.$product->img.'">';

//   $dom->loadFromUrl($product->url);

//   $image = $dom->find('.tgme_page_photo_image', 0);
//   $image = getElementVal($image, 'src', $defaultImage);
//   if ($image !== $defaultImage) $image = copyFile($image, '/bot', $defaultImage);

//   $product->img = $image;
//   $product->save(false);

//   // return;
// }

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// КАНАЛЫ

// $products = Product::find()->where(['type'=>'channel'])->all();
// $defaultImage = '/img/product.jpg';

// foreach ($products as $product) {

//   $dom->loadFromUrl($product->url);
  
//   $image = $dom->find('.tgme_page_photo_image', 0);
//   $image = getElementVal($image, 'src', $defaultImage);
//   if ($image !== $defaultImage) $image = copyFile($image, '/channel', $defaultImage);

//   $members = $dom->find('.tgme_page_extra', 0);
//   $members = getElementVal($members, 'text', null);
//   if ($members) $members = getNum($members);

//   $product->img = $image;
//   $product->members = $members;
//   $product->save(false);

//   // return;
// }

//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// echo Yii::getAlias('@web'); // /admin
// echo Yii::getAlias('@webroot'); // /.../.../telegram-store/public_html/admin
// echo Yii::getAlias('@app'); // /.../.../telegram-store
// echo Yii::getAlias('@upload');

// $dom->loadFromUrl('https://games.tlgrm.ru/category/card-and-board');

//                 https://ru.telegram-store.com/catalog/product-category/stickers/st-famous-people-ru/page/2/
// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/stickers/st-memes-ru/');


// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/masks/page/2/');

// $container = $dom->find('.products', 0);

// $stickers = $container->find('.product');

// function getElementVal($elem, $key, $default=null) {
//   if ($elem) return ArrayHelper::getValue($elem, $key, $default);
//   return $default;
// }

// foreach ($stickers as $sticker) {


//   $link = $sticker->find('.woocommerce-LoopProduct-link', 0);
//   $link = getElementVal($link, 'href');
//   if ($link) {

//     $dom->loadFromUrl($link);

//     $imgSrc = $dom->find('.img-from-api', 0);
//     $imgSrc = getElementVal($imgSrc, 'src');
//     $img = '/img/product.jpg';
//     if ($imgSrc) {
//       $imgSrc = (substr($imgSrc, 0, 6) !== 'https:' && substr($imgSrc, 0, 2) === '//') ? 'https:'.$imgSrc : $imgSrc;
//       $imgSrc = (substr($imgSrc, 0, 6) !== 'https:') ? 'https://ru.telegram-store.com'.$imgSrc : $imgSrc;
//       $pathinfo = pathinfo($imgSrc);
//       $fileExt = $pathinfo['extension'];
//       $randomStr = Yii::$app->security->generateRandomString(10);
//       $img = '/img/upload/mask/'.$randomStr.'.'.$fileExt;
//       $newFile = Yii::getAlias('@public').$img;
//       try {
//         copy($imgSrc, $newFile);
//       } catch (ErrorException $e) {
//         $img = '/img/product.jpg';
//       }
//     }

//     $title = $dom->find('.product_title', 0);
//     $title = trim(getElementVal($title, 'text'));

//     $turl = $dom->find('.product-popup-btn', 0);
//     $turl = getElementVal($turl, 'hreflink');
//     $turl = strtolower($turl);

//     $alias = str_replace('https://t.me/addstickers/', '', $turl);
//     $alias = str_replace('https://telegram.me/addstickers/', '', $alias);

//     $members = $dom->find('.productTransitions', 0);
//     $members = trim(getElementVal($members, 'text'));

//     $imgSticks = $dom->find('.zoom');
//     $stickerArr = [];

//     foreach ($imgSticks as $imgStick) {

//       $imgToArr = '/img/product.jpg';
//       $imgStick = getElementVal($imgStick, 'href', false);
//       if ($imgStick) {
//         $imgStick = (substr($imgStick, 0, 6) === 'https:')?$imgStick:'https:'.$imgStick;
//         $pathinfo = pathinfo($imgStick);
//         $randomStr = Yii::$app->security->generateRandomString(10);
//         $fileExt = $pathinfo['extension'];
//         $imgToArr = '/img/upload/mask/'.$randomStr.'.'.$fileExt;
//         $newFile = Yii::getAlias('@public').$imgToArr;
//         try {
//           copy($imgStick, $newFile);
//         } catch (ErrorException $e) {
//           $imgToArr = '/img/product.jpg';
//         }
        
//       }
//       $stickerArr[] = $imgToArr;
//     }

//     // echo $members;
//     // echo "<br>";


//     $productModel = new Product;
//     $productModel->category_id = 5;
//     $productModel->user_id = null;
//     $productModel->status = 2;
//     $productModel->order = 0;
//     $productModel->best = 0;
//     $productModel->alias = $alias;
//     $productModel->type = 'mask';
//     $productModel->img = $img;
//     $productModel->name = Html::encode($title);
//     $productModel->desc = null;
//     $productModel->url = $turl;
//     $productModel->members = $members;

//     if ($productModel->save(false)) {
//       $tagsArr = [26];
//       foreach ($tagsArr as $tagId) {
//         $tag = Tag::findOne(['id' => $tagId]);
//         $productModel->link('tags', $tag);
//       }
//     foreach ($stickerArr as $stick) {
//       $stickerModel = new Sticker;
//       $stickerModel->url = $stick;
//       $productModel->link('stickers', $stickerModel);
//       $stickerModel->save(false);
//     }
//     }

//   }
// }













// $cards = $dom->find('.game-card--plain');


// foreach ($cards as $card) {
//   // https://games.tlgrm.ru/
//   // https://t.me/gamee?game=QuickGhost
//   $cargUrl = ArrayHelper::getValue($card, 'href', false);
//   if ($cargUrl) {
//     $alias = strtolower($cargUrl);
//     $alias = str_replace('https://games.tlgrm.ru/', '', $alias);
//     $alias = explode('/', $alias);
//     $alias = $alias[0].'-'.$alias[1];
//     // $turl = 'https://t.me/'.$turlArr[0].'?game='.$turlArr[1];
//     // echo "<a target=\"_blank\" href=\"$turl\">$turl</a>";
//     $img = '/img/product.jpg';
//     $cardImg = $card->find('.game-card__cover', 0);
//     if ($cardImg) {
//       $imgSrc = ArrayHelper::getValue($cardImg, 'src', false);
//       if ($imgSrc) {
//         $pathinfo = pathinfo($imgSrc);
//         $randomStr = Yii::$app->security->generateRandomString(10);
//         $fileExt = $pathinfo['extension'];
//         $img = '/img/upload/games/'.$randomStr.'.'.$fileExt;
//         $newFile = Yii::getAlias('@public').$img;
//         copy($imgSrc, $newFile);
//       }
//     }


//     $desc = $card->find('.game-card__footer p', 0);
//     $desc = trim(ArrayHelper::getValue($desc, 'text', null));
//     $title = $card->find('.game-card__header', 0);
//     $title = trim(ArrayHelper::getValue($title, 'text', null));
//     $dom->load($cargUrl);
//     $turl = $dom->find('.game__play',0);

//     if ($turl) {
//       $turl = ArrayHelper::getValue($turl, 'href', false);

//       if ($turl) {
//         $video = $dom->find('.game__video source', 0);
//         $videoSrc = ArrayHelper::getValue($video, 'src', null);
//         $videoPathinfo = pathinfo($videoSrc);
//         $randomStr = Yii::$app->security->generateRandomString(10);
//         $videoFile = '/img/upload/games/'.$randomStr.'.'.$videoPathinfo['extension'];
//         $newVideoFile = Yii::getAlias('@public').$videoFile;
//         copy($videoSrc, $newVideoFile);

//         echo $alias."<br>";
//         echo $img."<br>";
//         echo $videoFile."<br>";
//         echo $title."<br>";
//         echo $desc."<br>";
//         echo $turl."<br>";

//         $productModel = new Product;
//         $productModel->category_id = 7;
//         $productModel->user_id = null;
//         $productModel->status = 2;
//         $productModel->order = 0;
//         $productModel->best = 0;
//         $productModel->alias = $alias;
//         $productModel->type = 'game';
//         $productModel->img = $img;
//         $productModel->name = Html::encode($title);
//         $productModel->desc = Html::encode($desc);
//         $productModel->url = $turl;
//         $productModel->members = null;

//         if ($productModel->save(false)) {
//           $tagsArr = [21];
//           foreach ($tagsArr as $tagId) {
//             $tag = Tag::findOne(['id' => $tagId]);
//             $productModel->link('tags', $tag);
//           }
//           $sticker = new Sticker;
//           $sticker->url = $videoFile;
//           $productModel->link('stickers', $sticker);
//           $sticker->save(false);
//         }

//         // return true;
//       }
//     }
//   }
// }











// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/chats/cht-design-ru/');
// //                    https://ru.telegram-store.com/catalog/product-category/bots/bo-services-ru/page/2/
// //                    https://ru.telegram-store.com/catalog/product-category/bots/bo-games-ru/page/2/

// $products = $dom->find('.product');

// // $nicName = substr('https://telegram.me/pok_pok_bot', 0, 20);
// // $nicName = str_replace($nicName, '', 'https://telegram.me/pok_pok_bot');

// // echo $nicName;

// foreach ($products as $product) {
//   $link = $product->find('.woocommerce-LoopProduct-link', 0);

//   if ($link) {
//     $dom->loadFromUrl($link->href);
//     $btn = $dom->find('.wc-button-blue', 0);

//     if ($btn) {

//       $turl = $btn->hreflink;
//       // echo "<a target=\"_blank\" href=\"$turl\">$turl</a>";
//       $dom->loadFromUrl($turl);
      
//       $nicName = substr($turl, 0, 20);
//       $nicName = str_replace($nicName, '', $turl);

//       $title = $dom->find('.tgme_page_title', 0);
//       $btn = $dom->find('.tgme_action_button_new', 0);
//       $image = $dom->find('.tgme_page_photo_image', 0);
//       $imgSrc = ($image) ? $image->src : '/img/product.jpg';
//       $desc = $dom->find('.tgme_page_description', 0);
//       $desc = ($desc) ? $desc->text : '';
//       if ($title && $btn) {
//         $cat_id = null;
//         $type = null;
//         switch (trim(strtolower($btn->text))) {
//           case 'view channel':
//             $cat_id = 1;
//             $type = 'channel';
//           break;
//           case 'view group':
//             $cat_id = 2;
//             $type = 'group';
//           break;
//           case 'send message':
//             $cat_id = 4;
//             $type = 'bot';
//           break;
//           default:
//             $cat_id = null;
//             $type = null;
//           break;
//         }

//         $productModel = new Product;
//         $productModel->category_id = $cat_id;
//         $productModel->user_id = null;
//         $productModel->status = 2;
//         $productModel->order = 0;
//         $productModel->best = 0;
//         $productModel->alias = $nicName;
//         $productModel->type = $type;
//         $productModel->img = $imgSrc;
//         $productModel->name = Html::encode($title);
//         $productModel->desc = Html::encode($desc);
//         $productModel->url = $turl;
//         $productModel->members = null;

//         if ($productModel->save(false)) {
//           $tagsArr = [14];
//           foreach ($tagsArr as $tagId) {
//             $tag = Tag::findOne(['id' => $tagId]);
//             $productModel->link('tags', $tag);
//           }
//         }
//       }
//     }
//   }
// }











// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/channels/page/1/');

// $dom->loadFromUrl('https://ru.telegram-store.com/catalog/product-category/channels/');

// $dom->loadFromUrl('https://tlgrm.ru/channels/tech?page=15');

// $dom->loadFromUrl('https://tlgrm.ru/channels/news?page=22'); //22

// $dom->loadFromUrl('https://tlgrm.ru/channels/blogs?page=20'); //20

// $dom->loadFromUrl('https://tlgrm.ru/channels/entertainment?page=25'); //25

// $dom->loadFromUrl('https://tlgrm.ru/channels/marketing?page=9'); //8

// $productsWrap = $dom->find('.products');

// $products = $productsWrap->find('.product');

// .type-product .status-publish .product

// $products = $dom->find('.channel-card');

// echo count($products);

// echo $product->outerHtml

// echo $product->innerHtml

// foreach ($products as $product) {
//   // echo $product->innerHtml;
//   $user = $product->find('.channel-card__username');
//   $tname = $user->href;
//   $firstName = substr($tname, 0, 26);
//   // echo $firstName;
//   // echo "<br>";
//   // echo $tname;
//   // echo "<br>";
//   if ($firstName === 'https://tlgrm.ru/channels/') {
//     $tname = strtolower(substr($tname, 27));
//     // $tname = 'webgirls';
//     $turl = 'https://t.me/'.$tname;
//     $dom->loadFromUrl($turl);
//     $title = $dom->find('.tgme_page_title', 0);
//     $btn = $dom->find('.tgme_action_button_new', 0);
//     $image = $dom->find('.tgme_page_photo_image', 0);
//     $desc = $dom->find('.tgme_page_description', 0);
//     $desc = ($desc) ? $desc->text : '';
//     $members = $dom->find('.tgme_page_extra', 0);
//     if ($members) {
//       $members = substr($members->text, 0, -8);
//     } else {
//       $members = '';
//     }
//     if ($title && $btn) {
//       $cat_id = null;
//       $type = null;
//       switch (trim(strtolower($btn->text))) {
//         case 'view channel':
//           $cat_id = 1;
//           $type = 'channel';
//         break;
//         case 'view group':
//           $cat_id = 2;
//           $type = 'group';
//         break;
//         case 'send message':
//           $cat_id = 4;
//           $type = 'bot';
//         break;
//         default:
//           $cat_id = null;
//           $type = null;
//         break;
//       }
//       $alias = $tname;
//       $imgSrc = ($image) ? $image->src : '/img/product.jpg';
//       $name = trim($title->text);
//       // echo $cat_id;
//       // echo $alias;
//       // echo $type;
//       // echo $imgSrc;
//       echo $name;
//       // // echo $desc;
//       // // echo $turl;
//       // // echo $members;
//       echo "<br>";
//       // return true;



//       $productModel = new Product;

//       $productModel->category_id = $cat_id;
//       $productModel->user_id = null;
//       $productModel->status = 2;
//       $productModel->order = 0;
//       $productModel->best = 0;
//       $productModel->alias = $alias;
//       $productModel->type = $type;
//       $productModel->img = $imgSrc;
//       $productModel->name = Html::encode($name);
//       $productModel->desc = Html::encode($desc);
//       $productModel->url = $turl;
//       $productModel->members = $members;

//       if ($productModel->save(false)) {
//         $tagsArr = [6, 7];
//         foreach ($tagsArr as $tagId) {
//           $tag = Tag::findOne(['id' => $tagId]);
//           $productModel->link('tags', $tag);
//         }
//       }



      // *
      // $product->category
      // $product->user
      // $product->productTags
      // $product->tags
      // $product->stickers

      // return true;
//     }
//   }
// }

// https://t.me/ubunntariumbyredroot
// https://t.me/kubikv3_chat
// https://t.me/okreview
// OK Ревью
// Обзоры курсов на разные тематики.

// Смотрю курсы и пишу на них свои рецензии.

// $tname = 'kubikv3_chat';
// $turl = 'https://t.me/'.$tname;
// $dom->loadFromUrl($turl);
// $title = $dom->find('.tgme_page_title', 0);
// $btn = $dom->find('.tgme_action_button_new', 0);
// $image = $dom->find('.tgme_page_photo_image', 0);
// $desc = $dom->find('.tgme_page_description', 0);
// $desc = ($desc) ? $desc->text : '';
// $members = $dom->find('.tgme_page_extra', 0);
// if ($members) {
//   $members = substr($members->text, 0, -8);
// } else {
//   $members = '';
// }
// if ($title && $btn) {
// $cat_id = null;
// $type = null;
// switch (trim(strtolower($btn->text))) {
//   case 'view channel':
//     $cat_id = 1;
//     $type = 'channel';
//   break;
//   case 'view group':
//     $cat_id = 2;
//     $type = 'group';
//   break;
//   case 'send message':
//     $cat_id = 4;
//     $type = 'bot';
//   break;
//   default:
//     $cat_id = null;
//     $type = null;
//   break;
// }
// $alias = $tname;
// $imgSrc = ($image) ? $image->src : '/img/product.jpg';
// $name = trim($title->text);
// // echo $cat_id;
// // echo $alias;
// // echo $type;
// // echo $imgSrc;
// // echo $name;
// // // echo $desc;
// // // echo $turl;
// // // echo $members;
// // echo "<br>";
// // return true;



// $productModel = new Product;

// $productModel->category_id = 1;
// $productModel->user_id = null;
// $productModel->status = 2;
// $productModel->order = 0;
// $productModel->best = 1;
// $productModel->alias = $alias;
// $productModel->type = 'group';
// $productModel->img = $imgSrc;
// $productModel->name = Html::encode($name);
// $productModel->desc = Html::encode($desc);
// $productModel->url = $turl;
// $productModel->members = $members;

// if ($productModel->save(false)) {
//   $tagsArr = [29, 27];
//   foreach ($tagsArr as $tagId) {
//     $tag = Tag::findOne(['id' => $tagId]);
//     $productModel->link('tags', $tag);
//   }
// }











?>