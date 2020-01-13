<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "medicamento".
 *
 * @property int $idMedicamento
 * @property string $Nome
 *
 * @property ReceitaHasMedicamento[] $receitaHasMedicamentos
 * @property Receita[] $receitaIdReceitas
 */
class Medicamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medicamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nome'], 'required'],
            [['Nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMedicamento' => 'Id Medicamento',
            'Nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitaHasMedicamentos()
    {
        return $this->hasMany(ReceitaHasMedicamento::className(), ['Medicamento_idMedicamento' => 'idMedicamento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitaIdReceitas()
    {
        return $this->hasMany(Receita::className(), ['idReceita' => 'Receita_idReceita'])->viaTable('receita_has_medicamento', ['Medicamento_idMedicamento' => 'idMedicamento']);
    }
}
