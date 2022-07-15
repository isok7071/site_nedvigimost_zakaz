<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_nedvigimost".
 *
 * @property int $id
 * @property string $name
 *
 * @property Nedvishimost[] $nedvishimosts
 */
class TypeNedvigimost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_nedvigimost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Nedvishimosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvishimosts()
    {
        return $this->hasMany(Nedvishimost::className(), ['id_type' => 'id']);
    }
}
