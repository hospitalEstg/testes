<?php
namespace frontend\models;

use common\models\Pessoa;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $Nome;
    public $DataNascimento;
    public $Morada;
    public $NumUtenteSaude;
    public $NumIDCivil;
    public $TipoUtilizador;
    public $idUser;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['DataNascimento', 'Morada', 'NumUtenteSaude', 'NumIDCivil', 'TipoUtilizador'], 'required'],
            [['DataNascimento'], 'safe'],
            [['NumUtenteSaude', 'NumIDCivil', 'idUser'], 'integer'],
            [['TipoUtilizador'], 'string'],
            [['Nome'], 'string', 'max' => 100],
            [['Morada'], 'string', 'max' => 45],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {

        if ($this->validate()) {

            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();

            if ($user->save()) {

                $pessoa = new Pessoa();
                $pessoa->Nome = $user->username;
                $pessoa->DataNascimento = $this->DataNascimento;
                $pessoa->Morada = $this->Morada;
                $pessoa->NumUtenteSaude = $this->NumUtenteSaude;
                $pessoa->NumIDCivil = $this->NumIDCivil;
                $pessoa->TipoUtilizador = $this->TipoUtilizador;
                $pessoa->idUser = $user->id;

                if ( $pessoa->save()  && $this->sendEmail($user) ) {

                    $auth = \Yii::$app->authManager;
                    $utenteRole = $auth->getRole(Yii::$app->request->get("TipoUtilizador"));
                    $auth->assign($utenteRole, $user->getId());

                    return true;
                }

            }

        }

        return false;

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
