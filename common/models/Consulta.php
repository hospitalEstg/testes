<?php

namespace common\models;

use Yii;
use yii\helpers\Json;


/**
 * This is the model class for table "consulta".
 *
 * @property int $idConsulta
 * @property string $DataConsulta
 * @property string $hora
 * @property string $TipoConsulta
 * @property string|null $Descricao
 * @property int $Estado
 * @property int $idMedico
 * @property int $idFuncionario
 *
 * @property Pessoa $idFuncionario0
 * @property Pessoa $idMedico0
 * @property Fichatecnica[] $fichatecnicas
 * @property MarcacaoConsulta $marcacaoConsulta
 * @property Receita[] $receitas
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DataConsulta', 'hora', 'TipoConsulta', 'idMedico', 'idFuncionario'], 'required'],
            [['DataConsulta', 'hora'], 'safe'],
            [['Estado', 'idMedico', 'idFuncionario'], 'integer'],
            [['TipoConsulta', 'Descricao'], 'string', 'max' => 45],
            [['idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idFuncionario' => 'idPessoa']],
            [['idMedico'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idMedico' => 'idPessoa']],



        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idConsulta' => 'Id Consulta',
            'DataConsulta' => 'Data Consulta',
            'hora' => 'Hora',
            'TipoConsulta' => 'Tipo Consulta',
            'Descricao' => 'Descricao',
            'Estado' => 'Estado',
            'idMedico' => 'Id Medico',
            'idFuncionario' => 'Id Funcionario',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncionario0()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedico0()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichatecnicas()
    {
        return $this->hasMany(Fichatecnica::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacao()
    {
        return $this->hasOne(MarcacaoConsulta::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

      public function afterSave($insert, $changedAttributes)
        {
            parent::afterSave($insert, $changedAttributes);

            $idConsulta = $this->idConsulta;
            $DataConsulta = $this->DataConsulta;
            $hora = $this->hora;
            $TipoConsulta = $this->TipoConsulta;
            $Descricao = $this->Descricao;
            $Estado = $this->Estado;
            $idMedico = $this->idMedico;
            $idFuncionario = $this->idFuncionario;


            $myObj = new Consulta();
            $myObj->idConsulta= $idConsulta;
            $myObj->DataConsulta = $DataConsulta;
            $myObj->hora = $hora;
            $myObj->TipoConsulta = $TipoConsulta;
            $myObj->Estado = $Estado;
            $myObj->idMedico = $idMedico;
            $myObj->idFuncionario = $idFuncionario;

             $myObj = Json::encode($myObj);
                  if ($insert) {
                        $this->FazPublish("INSERT CONSULTA", $myObj);
                    } else
                        $this->FazPublish("UPDATE CONSULTA", $myObj);

        }

        public function afterDelete()
        {
            parent::afterDelete();
            $id = $this->idConsulta;
            $myObj = new Consulta();
            $myObj->idConsulta = $id;
            $myObj = Json::encode($myObj);
            $this->FazPublish("DELETE CONSULTA", $myObj);
        }

        public function FazPublish($canal, $msg)
        {
             $server = '127.0.0.1';
                    $port = 1883;
                    $username = "";
                    $password = "";
                    $client_id = uniqid();
                    $mqtt= new phpMQTT($server, $port, $client_id);
                    try {
                        if ($mqtt->connect(true)) {
                            $mqtt->publish($canal, $msg, 1);
                            $mqtt->disconnect();
                            $mqtt->close();

                        } else {
                            file_put_contents("debug.output", "Time out!");
                        }
                    }catch (\Exception $X)
                    {
                    }
        }
}
