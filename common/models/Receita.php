<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "receita".
 *
 * @property int $idReceita
 * @property string $DataReceita
 * @property string $Prescricao
 * @property int $Consulta_idConsulta
 *
 * @property Consulta $consultaIdConsulta
 * @property ReceitaHasMedicamento[] $receitaHasMedicamentos
 * @property Medicamento[] $medicamentoIdMedicamentos
 */
class Receita extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'receita';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DataReceita', 'Prescricao'], 'required'],
            [['DataReceita'], 'safe'],
            [['Consulta_idConsulta'], 'integer'],
            [['Prescricao'], 'string', 'max' => 100],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idReceita' => 'Id Receita',
            'DataReceita' => 'Data Receita',
            'Prescricao' => 'Prescricao',
            'Consulta_idConsulta' => 'Consulta Id Consulta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultaIdConsulta()
    {
        return $this->hasOne(Consulta::className(), ['idConsulta' => 'Consulta_idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitaHasMedicamentos()
    {
        return $this->hasMany(ReceitaHasMedicamento::className(), ['Receita_idReceita' => 'idReceita']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedicamentoIdMedicamentos()
    {
        return $this->hasMany(Medicamento::className(), ['idMedicamento' => 'Medicamento_idMedicamento'])->viaTable('receita_has_medicamento', ['Receita_idReceita' => 'idReceita']);
    }
}
