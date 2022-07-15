<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Nedvishimost;

/**
 * NedvishimostSearch represents the model behind the search form of `app\models\Nedvishimost`.
 */
class Nedvishimost_rentSearch extends Nedvishimost
{
    public $space2;
    public $price2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_type', 'kolichestvo_komnat', 'nomer_etash', 'vsego_etash', 'id_metro', 'id_user'], 'integer'],
            ['space2','number'],
            ['price2','number'],
            [['space','price'], 'number'],
            [['photo1', 'photo2', 'photo3', 'tel', 'status_proverki', 'created_at', 'address', 'type_sdachi'], 'safe'],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'space'=>'Площадь от',
            'space2'=>'до',
            'price'=>'Цена от',
            'price2'=>'до',
            'type_sdachi'=>'Посуточно/Длительно'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Nedvishimost::find();
        $query->joinWith(['metro']);
        $query->joinWith(['type']);
        $query->joinWith(['nedvishomostComforts']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_type' => $this->id_type,
            'kolichestvo_komnat' => $this->kolichestvo_komnat,
            'nomer_etash' => $this->nomer_etash,
            'vsego_etash' => $this->vsego_etash,
            'id_metro' => $this->id_metro,
            'created_at' => $this->created_at,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'photo1', $this->photo1])
            ->andFilterWhere(['like', 'photo2', $this->photo2])
            ->andFilterWhere(['like', 'photo3', $this->photo3])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'status_proverki', $this->status_proverki])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['between', 'space', $this->space, $this->space2])
            ->andFilterWhere(['between', 'price', $this->price, $this->price2])
            ->andFilterWhere(['like', 'type_sdachi', $this->type_sdachi]);
        $query->andWhere(['status_proverki'=>'Проверено модерацией']);
        return $dataProvider;
    }
}
