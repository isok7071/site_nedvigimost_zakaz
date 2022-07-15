<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nedvishomost_comforts".
 *
 * @property int $id
 * @property int $id_nedvigimost
 * @property int $id_comforts
 *
 * @property Comforts $comforts
 * @property Nedvishimost $nedvigimost
 */
class NedvishomostComforts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nedvishomost_comforts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nedvigimost', 'id_comforts'], 'required'],
            [['id_nedvigimost', 'id_comforts'], 'integer'],
            [['id_nedvigimost'], 'exist', 'skipOnError' => true, 'targetClass' => Nedvishimost::className(), 'targetAttribute' => ['id_nedvigimost' => 'id']],
            [['id_comforts'], 'exist', 'skipOnError' => true, 'targetClass' => Comforts::className(), 'targetAttribute' => ['id_comforts' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_nedvigimost' => 'Id Nedvigimost',
            'id_comforts' => 'Id Comforts',
        ];
    }

    /**
     * Gets query for [[Comforts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComforts()
    {
        return $this->hasOne(Comforts::className(), ['id' => 'id_comforts']);
    }

    /**
     * Gets query for [[Nedvigimost]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvigimost()
    {
        return $this->hasOne(Nedvishimost::className(), ['id' => 'id_nedvigimost']);
    }
}
