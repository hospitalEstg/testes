<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "marcacao_consulta".
 *
 * @property int $idMarcacao_Consulta
 * @property int $Pessoa_idPessoa
 * @property int $Consulta_idConsulta
 * @property int $Estado
 * @property string $Descricao
 * @property int $Urgente
 *
 * @property Consulta $consultaIdConsulta
 * @property Pessoa $pessoaIdPessoa
 */
class MarcacaoConsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcacao_consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Pessoa_idPessoa', 'Descricao', 'Urgente'], 'required'],
            [['Pessoa_idPessoa', 'Consulta_idConsulta', 'Estado', 'Urgente'], 'integer'],
            [['Descricao'], 'string', 'max' => 150],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
            [['Pessoa_idPessoa'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['Pessoa_idPessoa' => 'idPessoa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMarcacao_Consulta' => 'Id Marcacao Consulta',
            'Pessoa_idPessoa' => 'Pessoa Id Pessoa',
            'Consulta_idConsulta' => 'Consulta Id Consulta',
            'Estado' => 'Estado',
            'Descricao' => 'Descricao',
            'Urgente' => 'Urgente',
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
    public function getPessoaIdPessoa()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'Pessoa_idPessoa']);
    }
}
