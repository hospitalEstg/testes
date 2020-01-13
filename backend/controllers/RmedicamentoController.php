<?php

namespace backend\controllers;

use Yii;
use common\models\ReceitaMedicamento;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RMedicamentoController implements the CRUD actions for ReceitaMedicamento model.
 */
class RMedicamentoController extends Controller
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
     * Lists all ReceitaMedicamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ReceitaMedicamento::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReceitaMedicamento model.
     * @param integer $Receita_idReceita
     * @param integer $Medicamento_idMedicamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Receita_idReceita, $Medicamento_idMedicamento)
    {
        return $this->render('view', [
            'model' => $this->findModel($Receita_idReceita, $Medicamento_idMedicamento),
        ]);
    }

    /**
     * Creates a new ReceitaMedicamento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReceitaMedicamento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Receita_idReceita' => $model->Receita_idReceita, 'Medicamento_idMedicamento' => $model->Medicamento_idMedicamento]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ReceitaMedicamento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Receita_idReceita
     * @param integer $Medicamento_idMedicamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Receita_idReceita, $Medicamento_idMedicamento)
    {
        $model = $this->findModel($Receita_idReceita, $Medicamento_idMedicamento);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Receita_idReceita' => $model->Receita_idReceita, 'Medicamento_idMedicamento' => $model->Medicamento_idMedicamento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ReceitaMedicamento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Receita_idReceita
     * @param integer $Medicamento_idMedicamento
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Receita_idReceita, $Medicamento_idMedicamento)
    {
        $this->findModel($Receita_idReceita, $Medicamento_idMedicamento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReceitaMedicamento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Receita_idReceita
     * @param integer $Medicamento_idMedicamento
     * @return ReceitaMedicamento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Receita_idReceita, $Medicamento_idMedicamento)
    {
        if (($model = ReceitaMedicamento::findOne(['Receita_idReceita' => $Receita_idReceita, 'Medicamento_idMedicamento' => $Medicamento_idMedicamento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
