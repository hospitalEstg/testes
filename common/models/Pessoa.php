<?php

namespace common\models;

use Yii;
use yii\helpers\Json;


/**
 * This is the model class for table "pessoa".
 *
 * @property int $idPessoa
 * @property string $Nome
 * @property string $DataNascimento
 * @property string $Morada
 * @property int $NumUtenteSaude
 * @property int $NumIDCivil
 * @property string $TipoUtilizador
 * @property int $idUser
 *
 * @property Consulta[] $consultas
 * @property Consulta[] $consultas0
 * @property Consulta[] $consultas1
 * @property MarcacaoConsulta[] $marcacaoConsultas
 * @property User $user
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome', 'DataNascimento', 'Morada', 'NumUtenteSaude', 'NumIDCivil', 'TipoUtilizador', 'idUser'], 'required'],
            [['DataNascimento'], 'safe'],
            [['NumUtenteSaude', 'NumIDCivil', 'idUser'], 'integer'],
            [['TipoUtilizador'], 'string'],
            [['Nome'], 'string', 'max' => 100],
            [['Morada'], 'string', 'max' => 45],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPessoa' => 'Id Pessoa',
            'Nome' => 'Nome',
            'DataNascimento' => 'Data Nascimento',
            'Morada' => 'Morada',
            'NumUtenteSaude' => 'Num Utente Saude',
            'NumIDCivil' => 'Num Id Civil',
            'TipoUtilizador' => 'Tipo Utilizador',
            'idUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['idFuncionario' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas0()
    {
        return $this->hasMany(Consulta::className(), ['idMedico' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas1()
    {
        return $this->hasMany(Consulta::className(), ['idUtente' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacaoConsultas()
    {
        return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idPessoa' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
         * @return \yii\db\ActiveQuery
         */
        public function getMarcacao()
        {
            return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idPessoa' => 'idPessoa']);
        }

         public function afterSave($insert, $changedAttributes)
                {
                    parent::afterSave($insert, $changedAttributes);

                    $idPessoa = $this->idPessoa;
                    $Nome = $this->Nome;
                    $DataNascimento = $this->DataNascimento;
                    $Morada = $this->Morada;
                    $NumUtenteSaude = $this->NumUtenteSaude;
                    $NumIDCivil = $this->NumIDCivil;
                    $TipoUtilizador = $this->TipoUtilizador;
                    $idUser = $this->idUser;



                    $myObj = new Pessoa();
                    $myObj->idPessoa= $idPessoa;
                    $myObj->Nome = $Nome;
                    $myObj->DataNascimento = $DataNascimento;
                    $myObj->Morada = $Morada;
                    $myObj->NumUtenteSaude = $NumUtenteSaude;
                    $myObj->NumIDCivil = $NumIDCivil;
                    $myObj->TipoUtilizador = $TipoUtilizador;
                    $myObj->idUser = $idUser;

                     $myObj = Json::encode($myObj);
                          if ($insert) {
                                $this->FazPublish("INSERT PESSOA", $myObj);
                            } else
                                $this->FazPublish("UPDATE PESSOA", $myObj);

                }

                public function afterDelete()
                {
                    parent::afterDelete();
                    $id = $this->idPessoa;
                    $myObj = new Pessoa();
                    $myObj->idPessoa = $id;
                    $myObj = Json::encode($myObj);
                    $this->FazPublish("DELETE PESSOA", $myObj);
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
