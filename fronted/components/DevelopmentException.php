<?php

namespace app\fronted\components;

use yii\web\HttpException;

/**
* 
*/
class DevelopmentException extends HttpException
{
  public function __construct($message = null, $code = 0, \Exception $previous = null)
  {
      parent::__construct(200, $message, $code, $previous);
  }

  public function getName()
  {
    return 'development';
  }

}

/**/