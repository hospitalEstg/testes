<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fichatecnica".
 *
 * @property int $idFichaClinica
 * @property string $Ficheiro
 * @property string $Observacoes
 * @property int $Consulta_idConsulta
 *
 * @property Consulta $consultaIdConsulta
 */
class FichaTecnica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichatecnica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['Consulta_idConsulta'], 'integer'],
            [['Ficheiro', 'Observacoes'], 'string', 'max' => 45],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idFichaClinica' => 'Id Ficha Clinica',
            'Ficheiro' => 'Ficheiro',
            'Observacoes' => 'Observacoes',
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
}
