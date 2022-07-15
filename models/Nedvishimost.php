<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nedvishimost".
 *
 * @property int $id
 * @property float $space
 * @property int $id_type
 * @property int|null $kolichestvo_komnat
 * @property int|null $nomer_etash

 * @property int $vsego_etash
 * @property int|null $id_metro
 * @property string $photo1
 * @property string|null $photo2
 * @property string|null $photo3
 * @property float $price
 * @property string $tel
 * @property string $status_proverki
 * @property string $created_at
 * @property string $address
 * @property int $id_user
 * @property string $type_sdachi
 *
 * @property Metro $metro
 * @property NedvishomostComforts[] $nedvishomostComforts
 * @property TypeNedvigimost $type
 * @property User $user
 */
class Nedvishimost extends \yii\db\ActiveRecord
{
    public $id_comforts =[];
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nedvishimost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['space', 'id_type', 'vsego_etash', 'price', 'tel', 'address'], 'required'],
            [['space', 'price'], 'number'],
            [['id_type', 'kolichestvo_komnat', 'nomer_etash', 'vsego_etash', 'id_metro', 'id_user'], 'integer'],
            [['status_proverki', 'address', 'type_sdachi'], 'string'],
            [['created_at'], 'safe'],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 3],
            [['photo1', 'photo2', 'photo3'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 20],
            [['id_metro'], 'exist', 'skipOnError' => true, 'targetClass' => Metro::className(), 'targetAttribute' => ['id_metro' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => TypeNedvigimost::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'space' => 'Площадь, м² ',
            'id_type' => 'Тип недвижимости',
            'kolichestvo_komnat' => 'Комнат',
            'nomer_etash' => 'Этаж',
            'vsego_etash' => 'Всего этажей',
            'id_metro' => 'Станция метро (Если есть)',
            'id_comforts' => 'Удобства',
            'photo1' => 'Фото',
            'photo2' => 'Фото',
            'photo3' => 'Фото',
            'price' => 'Цена в рублях',
            'tel' => 'Ваш телефон',
            'status_proverki' => 'Статус проверки',
            'created_at' => 'Created At',
            'address' => 'Адрес',
            'id_user' => 'Id User',
            'type_sdachi' => 'Тип сдачи',
            'imageFiles' => 'Изображения(3)'
        ];
    }


    /**
     * Gets query for [[Metro]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMetro()
    {
        return $this->hasOne(Metro::className(), ['id' => 'id_metro']);
    }

    /**
     * Gets query for [[NedvishomostComforts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvishomostComforts()
    {
        return $this->hasMany(NedvishomostComforts::className(), ['id_nedvigimost' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(TypeNedvigimost::className(), ['id' => 'id_type']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
