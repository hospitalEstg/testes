<?php

namespace frontend\models;
namespace common\models;


use Yii;

/**
 * This is the model class for table "alarme".
 *
 * @property int $idAlarme
 * @property string $Hora
 * @property double $Quantidade
 * @property int $Medicamento_idMedicamento
 * @property int $Pessoa_idPessoa
 *
 * @property Pessoa $pessoaIdPessoa
 */
class Alarme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alarme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Hora', 'Quantidade', 'Medicamento_idMedicamento', 'Pessoa_idPessoa'], 'required'],
            [['Hora'], 'safe'],
            [['Quantidade'], 'number'],
            [['Medicamento_idMedicamento', 'Pessoa_idPessoa'], 'integer'],
            [['Pessoa_idPessoa'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['Pessoa_idPessoa' => 'idPessoa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idAlarme' => 'Id Alarme',
            'Hora' => 'Hora',
            'Quantidade' => 'Quantidade',
            'Medicamento_idMedicamento' => 'Medicamento Id Medicamento',
            'Pessoa_idPessoa' => 'Pessoa Id Pessoa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoaIdPessoa()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'Pessoa_idPessoa']);
    }
}
