<?php


namespace backend\modules\controllers;
use common\models\User;
use common\models\Pessoa;
use common\models\Consulta;
use common\models\MarcacaoConsulta;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;





class ConsController extends ActiveController
{
    public $modelClass = 'common\models\Consulta';


       public $modelLogin = 'common\models\LoginForm';

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
           $rec= MarcacaoConsulta::find()->where(['Pessoa_idPessoa' => $profile->idPessoa])->all();
           $ret =  array();
           foreach($rec as $item){
                if($item->Consulta_idConsulta != null){
                    array_push($ret, $item->consulta);


                }
           }

          return $ret;

        //  $ret= Consulta::find()->where(['idConsulta' => $rec->Consulta_idConsulta])->all();
               // var_dump($ret);
          //return Consulta::find()->where(['idConsulta' => $rec->$ret])->all();

       }


       public function actionConsulta(){




            $Data=Yii::$app->request->post('DataConsulta');
            $Hora=Yii::$app->request->post('hora');
            $TipoConsulta=Yii::$app->request->post('TipoConsulta');
            $Descricao=Yii::$app->request->post('Descricao');
            $Estado=Yii::$app->request->post('Estado');
            $idMedico=Yii::$app->request->post('idMedico');
            $idFuncionario=Yii::$app->request->post('idFuncionario');

            $conmodel = new $this->modelClass;
            $conmodel->DataConsulta = $Data;
            $conmodel->hora = $Hora;
            $conmodel->TipoConsulta = $TipoConsulta;
            $conmodel->Descricao = $Descricao;
            $conmodel->Estado = $Estado;
            $conmodel->idMedico = $idMedico;
            $conmodel->idFuncionario = $idFuncionario;

            $ret = $conmodel->save();


                return ['SaveError'=> $ret];




            }

        public function actionConsultaput($id){
             $Data=Yii::$app->request->post('DataConsulta');
              $Hora=Yii::$app->request->post('hora');
              $TipoConsulta=Yii::$app->request->post('TipoConsulta');
              $Descricao=Yii::$app->request->post('Descricao');
               $Estado=Yii::$app->request->post('Estado');
               $idMedico=Yii::$app->request->post('idMedico');
               $idFuncionario=Yii::$app->request->post('idFuncionario');

                $conmodel = new $this->modelClass;
               $rec = $conmodel::find()->where("id=".$id)->one();

               if(count($rec)>0){
                 $rec = new $this->modelClass;
                 $rec->DataConsulta = $Data;
                  $rec->hora = $Hora;
                  $rec->TipoConsulta = $TipoConsulta;
                  $rec->Descricao = $Descricao;
                  $rec->Estado = $Estado;
                  $rec->idMedico = $idMedico;
                   $rec->idFuncionario = $idFuncionario;

                   $rec->save();
                   return['SaveError'=>"OK"];
               }
               throw new \yii\web\NotFoundHttpException("Client id not found!");

        }

        public function actionConsultadel($id){
                $conmode = new $this->modelClass;
                $ret= $conmodel->deleteAll("id=".$id);
                if($ret){
                        Yii::$app->response->statusCode =200; return ['code'=>'ok'];
                }
                    Yii::$app->response->statusCode =404; return ['code'=>'error'];

        }

        public function actionSet($limit) {
            $conmodel = new $this->modelClass;
            $recs = $conmodel::find()->limit($limit)->all();
            return['limite'=>$limit, 'Records'=>$recs];
        }

        public function actionEstado($id){

            $conmodel= new $this->modelClass;
            $rec = $conmodel::find()->where("idConsulta=".$id)->one();

            if($rec){

                if($rec->Estado==0){

                return['idConsulta'=>$id,'Estado'=>"A consulta ainda nao foi realizada"];

                }
                if($rec->Estado==1){
                 return['idConsulta'=>$id,'Estado'=>"A consulta já foi realizada"];
                }


        }

                return['idConsulta'=>$id,'Estado'=>"null"];


}
}
