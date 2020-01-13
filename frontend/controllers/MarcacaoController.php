<?php

namespace frontend\controllers;
use common\models\Consulta;
use common\models\Pessoa;
use Yii;
use common\models\MarcacaoConsulta;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarcacaoController implements the CRUD actions for MarcacaoConsulta model.
 */
class MarcacaoController extends Controller
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
     * Lists all MarcacaoConsulta models.
     * @return mixed
     */
    public function actionIndex()
    {
        /* $dataProvider = new ActiveDataProvider([
             'query' => Consulta::find(),
         ]);*/
        $model =MarcacaoConsulta::find()->all();
        $model_1=Consulta::find()->all();
        $model_2=Pessoa::find()->all();

        return $this->render('index', [
            'model' => $model,
            'model_1' => $model_1,
            'model_2' => $model_2,
        ]);
    }


    /**
     * Displays a single MarcacaoConsulta model.
     * @param integer $idMarcacao_Consulta
     * @param integer $Pessoa_idPessoa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idMarcacao_Consulta, $Pessoa_idPessoa)
    {
        return $this->render('view', [
            'model' => $this->findModel($idMarcacao_Consulta, $Pessoa_idPessoa),
        ]);
    }

    /**
     * Creates a new MarcacaoConsulta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MarcacaoConsulta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MarcacaoConsulta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idMarcacao_Consulta
     * @param integer $Pessoa_idPessoa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idMarcacao_Consulta, $Pessoa_idPessoa)
    {
        $model = $this->findModel($idMarcacao_Consulta, $Pessoa_idPessoa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MarcacaoConsulta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idMarcacao_Consulta
     * @param integer $Pessoa_idPessoa
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idMarcacao_Consulta, $Pessoa_idPessoa)
    {
        $this->findModel($idMarcacao_Consulta, $Pessoa_idPessoa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MarcacaoConsulta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idMarcacao_Consulta
     * @param integer $Pessoa_idPessoa
     * @return MarcacaoConsulta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idMarcacao_Consulta, $Pessoa_idPessoa)
    {
        if (($model = MarcacaoConsulta::findOne(['idMarcacao_Consulta' => $idMarcacao_Consulta, 'Pessoa_idPessoa' => $Pessoa_idPessoa])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
