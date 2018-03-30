<?php

namespace app\fronted\components;

/**
* 
*/
class ErrorHandler extends \yii\web\ErrorHandler
{

  public $devAction;

  protected function renderException($exception)
  {
    if ($exception->getName() === 'development') $this->errorAction = $this->devAction;
    return parent::renderException($exception);
  }
}

/**/