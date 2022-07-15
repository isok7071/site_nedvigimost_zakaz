<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $password
 * @property string $email
 * @property string $login
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int $admin
 *
 * @property Nedvishimost[] $nedvishimosts
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'password', 'email', 'login'], 'required'],
            [['admin'], 'integer'],
            [['name', 'surname', 'password', 'email', 'login', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'password' => 'Пароль',
            'email' => 'Email',
            'login' => 'Логин',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'admin' => 'Admin',
        ];
    }

    /**
     * Gets query for [[Nedvishimosts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNedvishimosts()
    {
        return $this->hasMany(Nedvishimost::className(), ['id_user' => 'id']);
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * {@inheritdoc}
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       throw new NotSupportedException("Method isn`t support");
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return User|array|\yii\db\ActiveRecord|null
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['login'=>$username])->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function setAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString(200);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

}
