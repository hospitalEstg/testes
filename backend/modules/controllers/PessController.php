<?php


namespace backend\modules\controllers;
use common\models\User;
use common\models\LoginForm;
use common\models\Pessoa;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;

class PessController extends ActiveController
{
    public $modelClass = 'common\models\Pessoa';



     public function behaviors()
        {
            $behaviors = parent::behaviors();
                 $behaviors['authenticator'] = [
                 'class' => QueryParamAuth::className(),
                 ];
                 return $behaviors;
        }

        public function actions() {
                $actions =parent::actions();
                unset($actions['index']);
                return $actions;
            }


     public function actionIndex(){
            $actoken = Yii::$app->request->get("access-token");
                        $user = User::findIdentityByAccessToken($actoken);
                         $profile = Pessoa::find()->where(['idUser' => $user->id])->all();



                        return $profile;

     }

     public function actionpess(){
        $Nome = Yii::$app->request->post('Nome');
        $DataNascimento = Yii::$app->request->post('DataNascimento');
        $Morada = Yii::$app->request->post('Morada');
        $NumUtenteSaude = Yii::$app->request->post('NumUtenteSaude');
        $NumIDCivil = Yii::$app->request->post('NumIDCivil');
        $TipoUtilizador = Yii::$app->request->post('TipoUtilizador');
        $idUser=Yii::$app->request->post('idUser');

         $pessmodel = new $this->modelClass;
                    $pessmodel->Nome = $Nome;
                    $pessmodel->DataNascimento = $DataNascimento;
                    $pessmodel->Morada = $Morada;
                    $pessmodel->NumUtenteSaude = $NumUtenteSaude;
                    $pessmodel->NumIDCivil = $NumIDCivil;
                    $pessmodel->TipoUtilizador = $TipoUtilizador;
                    $pessmodel->idUser = $idUser;

                    $ret = $pessmodel->save(); return ['SaveError'=> $ret];


     }

     public function actionPessput($id){
         $Nome = Yii::$app->request->post('Nome');
                $DataNascimento = Yii::$app->request->post('DataNascimento');
                $Morada = Yii::$app->request->post('Morada');
                $NumUtenteSaude = Yii::$app->request->post('NumUtenteSaude');
                $NumIDCivil = Yii::$app->request->post('NumIDCivil');
                $TipoUtilizador = Yii::$app->request->post('TipoUtilizador');
                $idUser=Yii::$app->request->post('idUser');

                $pessmodel = new $this->modelClass;
                $rec = $pessmodel::find()->where("id=".$id)->one();

                 if(count($rec)>0){
                                 $rec = new $this->modelClass;
                                 $rec->Nome = $Nome;
                                 $rec->DataNascimento = $DataNascimento;
                                  $rec->Morada = $Morada;
                                  $rec->NumUtenteSaude = $NumUtenteSaude;
                                  $rec->NumIDCivil = $NumIDCivil;
                                  $rec->TipoUtilizador = $TipoUtilizador;
                                  $rec->idUser = $idUser;


                                   $rec->save();
                                   return['SaveError'=>"OK"];
                               }
                               throw new \yii\web\NotFoundHttpException("Client id not found!");


     }



             public function actionPessset($limit) {
                 $pessmodel = new $this->modelClass;
                 $recs = $pessmodel::find()->limit($limit)->all();
                 return['limite'=>$limit, 'Records'=>$recs];
             }



}
