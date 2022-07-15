<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;


class RegForm extends User
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'password', 'email', 'login'], 'required'],
            ['email', 'email'],
            ['name', 'match','pattern'=>'/^[А-Яа-я\s\-]{1,255}$/u', 'message'=>'Разрешенные символы - кириллица, пробел и тире'],
            ['surname', 'match','pattern'=>'/^[А-Яа-я\s\-]{1,255}$/u', 'message'=>'Разрешенные символы - кириллица, пробел и тире'],
            ['login', 'match','pattern'=>'/^[A-Za-z]{1,255}$/u', 'message'=>'Разрешенные символы - латиница'],
            ['password', 'string','min'=>6],
            ['login', 'string','min'=>3],
            [['name','surname'], 'string','min'=>1],
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

}
