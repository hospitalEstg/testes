<?php

namespace backend\modules\controllers;
use common\models\User;
use common\models\Pessoa;
use common\models\MarcacaoConsulta;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;
use yii\helpers\Json;





class MarcController extends ActiveController
{
   public $modelClass = 'common\models\MarcacaoConsulta';

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
                     $profile = Pessoa::find()->where(['idUser' => $user->id])->one();

         return $profile->marcacao;
        }

        public function actionIndexmarc($id){
           $actoken = Yii::$app->request->get("access-token");
            $user = User::findIdentityByAccessToken($actoken);
             $profile = Pessoa::find()->where(['idUser' => $user->id])->one();
            $rec= MarcacaoConsulta::find()->where("idMarcacao_Consulta=".$id)->all();


        return $rec;

        }

        public function actionMarccreate(){
            $idPessoa=Yii::$app->request->post('Pessoa_idPessoa');
            $idConsulta=Yii::$app->request->post('Consulta_idConsulta');
            $Estado=Yii::$app->request->post('Estado');
            $Descricao=Yii::$app->request->post('Descricao');
            $Urgente=Yii::$app->request->post('Urgente');

             $marcmodel = new $this->modelClass;
                        $marcmodel->Pessoa_idPessoa = $idPessoa;
                        $marcmodel->Consulta_idConsulta= $idConsulta;
                        $marcmodel->Estado = $Estado;
                        $marcmodel->Descricao = $Descricao;
                        $marcmodel->Urgente = $Urgente;

        $ret = $marcmodel->save(); return ['SaveError'=> $ret];
        }

        public function actionMarcput($id){
                        $idPessoa=Yii::$app->request->post('Pessoa_idPessoa');
                        $idConsulta=Yii::$app->request->post('Consulta_idConsulta');
                        $Estado=Yii::$app->request->post('Estado');
                        $Descricao=Yii::$app->request->post('Descricao');
                        $Urgente=Yii::$app->request->post('Urgente');

              $marcmodel = new $this->modelClass;
               $rec = $marcmodel::find()->where("id=".$id)->one();

               if(count($rec)>0){
                $rec = new $this->modelClass;
                                   $rec->Pessoa_idPessoa = $idPessoa;
                                   $rec->Consulta_idConsulta = $idConsulta;
                                   $rec->Estado = $Estado;
                                   $rec->Descricao = $Descricao;
                                   $rec->Urgente = $Urgente;

                                  $rec->save();
                                  return['SaveError'=>"OK"];
                              }
                             throw new \yii\web\NotFoundHttpException("Client id not found!");

        }

           public function actionMarcdel($id){
                        $marcmodel = new $this->modelClass;
                        $ret= $marcmodel->deleteAll("id=".$id);
                        if($ret){
                                Yii::$app->response->statusCode =200; return ['code'=>'ok'];
                        }
                            Yii::$app->response->statusCode =404; return ['code'=>'error'];

                }



}
