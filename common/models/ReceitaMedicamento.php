<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receita_has_medicamento".
 *
 * @property int $Receita_idReceita
 * @property int $Medicamento_idMedicamento
 * @property int $Quantidade
 * @property double $Dosagem_Diario
 *
 * @property Medicamento $medicamentoIdMedicamento
 * @property Receita $receitaIdReceita
 */
class ReceitaMedicamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receita_has_medicamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Quantidade', 'Dosagem_Diario'], 'required'],
            [['Receita_idReceita', 'Medicamento_idMedicamento', 'Quantidade'], 'integer'],
            [['Dosagem_Diario'], 'number'],
            [['Receita_idReceita', 'Medicamento_idMedicamento'], 'unique', 'targetAttribute' => ['Receita_idReceita', 'Medicamento_idMedicamento']],
            [['Medicamento_idMedicamento'], 'exist', 'skipOnError' => true, 'targetClass' => Medicamento::className(), 'targetAttribute' => ['Medicamento_idMedicamento' => 'idMedicamento']],
            [['Receita_idReceita'], 'exist', 'skipOnError' => true, 'targetClass' => Receita::className(), 'targetAttribute' => ['Receita_idReceita' => 'idReceita']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Receita_idReceita' => 'Receita Id Receita',
            'Medicamento_idMedicamento' => 'Medicamento Id Medicamento',
            'Quantidade' => 'Quantidade',
            'Dosagem_Diario' => 'Dosagem Diario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentoIdMedicamento()
    {
        return $this->hasOne(Medicamento::className(), ['idMedicamento' => 'Medicamento_idMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitaIdReceita()
    {
        return $this->hasOne(Receita::className(), ['idReceita' => 'Receita_idReceita']);
    }
}
