<?php

namespace backend\controllers;

use Yii;
use common\models\Consulta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MarcacaoConsulta;
use common\models\Pessoa;

/**
 * ConsultaController implements the CRUD actions for Consulta model.
 */
class ConsultaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Consulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$dataProvider = new ActiveDataProvider([
            'query' => Consulta::find(),
        ]); */
    $model = Consulta::find()->all();



                return $this->render('index', [
                    'model' => $model,


                ]);
    }

    /**
     * Displays a single Consulta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    //$model = Consulta::find()->all();
        return $this->render('view', [
            'model' => $this->findModel($id),
         //   'consultas' => $consultas,
        ]);
    }

   /*public function actionConsulta($id) {

            $consultas = Consulta::find()->all();

            return $this->render('consultaview', [
                'model' => $this->findModel($id),
                'consultas' => $consultas,


            ]);


    }*/
     /**
         * Creates a new Consulta model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
      public function actionConsulta($id)

        {
         /*  if(\yii::$app->user->can('createPost')) {****************************/

            $model = Consulta::findOne($id);
            $ftec = new \common\models\FichaTecnica();

            if ($ftec->load(Yii::$app->request->post())) {




                  $model = Consulta::findOne($id);
                  $ftec->Consulta_idConsulta = $model->idConsulta;

                    $ftec->save();
                    return $this->redirect(['view', 'id' => $model->idConsulta]);

            }

            $rec = new \common\models\Receita();
           $med = new \common\models\Medicamento();
           //$recmed = new \common\models\ReceitaMedicamento();

            if ($rec->load(Yii::$app->request->post()) && $med->load(Yii::$app->request->post()) &&  $recmed->load(Yii::$app->request->post())) {

                $model = Consulta::findOne($id);
                $rec->Consulta_idConsulta = $model->idConsulta;
              //  $recmed->Receita_idReceita = $rec->idReceita;
              /*  $recmed->Medicamento_idMedicamento = $med->idMedicamento;*/

                //ALTERAR NA DB RECEITAS HAS MEDICAMENTO POR FK NA Receita_idReceita




                   // $med->save();

                 if($rec->save() &&  $med->save() /* && $recmed->save()*/) {

                 return true;


                }
        }

           /* }
            else
                throw new NotFoundHttpException('Não tem permissoes!');
*/


            return $this->render('consultaview', [
                'model' => $model,
                'ftec' => $ftec,
                'rec' => $rec,
                'med' => $med,
               // 'recmed' => $recmed

            ]);
    }

    /**
     * Creates a new Consulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idMarcacao_Consulta)
    {
        $model = new Consulta();
        if ($model->load(Yii::$app->request->post())) {
           if ($model->save()) {

               $pedido= MarcacaoConsulta::findOne($idMarcacao_Consulta);
               $pedido->Consulta_idConsulta = $model->idConsulta;

               $pedido->save();

                return $this->redirect(['view', 'id' => $model->idConsulta]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
}
    /**
     * Updates an existing Consulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idConsulta]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Consulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consulta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
