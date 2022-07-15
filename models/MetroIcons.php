<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metro_icons".
 *
 * @property int $id
 * @property string $name_vetki
 * @property string $icon
 *
 * @property Metro[] $metros
 */
class MetroIcons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metro_icons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_vetki', 'icon'], 'required'],
            [['name_vetki', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_vetki' => 'Name Vetki',
            'icon' => 'Icon',
        ];
    }

    /**
     * Gets query for [[Metros]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetros()
    {
        return $this->hasMany(Metro::className(), ['id_icon' => 'id']);
    }
}
