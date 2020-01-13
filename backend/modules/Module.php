<?php

namespace backend\modules;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'backend\modules\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        //porque as apis sao stateless
             \Yii::$app->user->enableSession = false;

    }
}
