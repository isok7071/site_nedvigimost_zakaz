<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "metro".
 *
 * @property int $id
 * @property string $name
 * @property int $id_icon
 *
 * @property MetroIcons $icon
 * @property Nedvishimost[] $nedvishimosts
 */
class Metro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_icon'], 'required'],
            [['id_icon'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_icon'], 'exist', 'skipOnError' => true, 'targetClass' => MetroIcons::className(), 'targetAttribute' => ['id_icon' => 'id']],
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
            'id_icon' => 'Id Icon',
        ];
    }

    /**
     * Gets query for [[Icon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIcon()
    {
        return $this->hasOne(MetroIcons::className(), ['id' => 'id_icon']);
    }

    /**
     * Gets query for [[Nedvishimosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvishimosts()
    {
        return $this->hasMany(Nedvishimost::className(), ['id_metro' => 'id']);
    }
}
