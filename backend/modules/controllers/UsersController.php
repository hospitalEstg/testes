<?php
namespace backend\modules\controllers;

use common\models\User;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;


class UsersController extends ActiveController
{

public $modelClass = 'common\models\User';

    public $modelLogin = 'common\models\LoginForm';

    public function checkLoginFromAndroid()
        {

            $username = Yii::$app->request->post('username');
            $password = Yii::$app->request->post('password');
            $userParaDarReturn = new $this->modelClass;
            $loginChecker = new $this->modelLogin;
            $loginChecker->username = $username;
            $loginChecker->password = $password;

            if($loginChecker->login() === true)
                return $userParaDarReturn::find()->where(['username' => $username]->one());

            return false;
        }

}
