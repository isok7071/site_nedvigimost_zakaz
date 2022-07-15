<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comforts".
 *
 * @property int $id
 * @property string $name
 * @property string $icon
 *
 * @property Nedvishimost[] $nedvishimosts
 */
class Comforts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comforts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            ['icon', 'file', 'extensions'=>'jpeg, jpg, png, bmp, tiff'],
            [['name', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'icon' => 'Иконка',
        ];
    }

    /**
     * Gets query for [[Nedvishimosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvishimosts()
    {
        return $this->hasMany(Nedvishimost::className(), ['id_comforts' => 'id']);
    }
}
