<?php

namespace app\erp\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\erp\models\SysAttachment;

/**
 * SysAttachmentSearch represents the model behind the search form about `app\erp\models\SysAttachment`.
 */
class SysAttachmentSearch extends SysAttachment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'size', 'user_id', 'upload_time', 'state'], 'integer'],
            [['name', 'url', 'path', 'ext', 'upload_ip', 'auth_code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = SysAttachment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'size' => $this->size,
            'user_id' => $this->user_id,
            'upload_time' => $this->upload_time,
            'state' => $this->state,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'ext', $this->ext])
            ->andFilterWhere(['like', 'upload_ip', $this->upload_ip])
            ->andFilterWhere(['like', 'auth_code', $this->auth_code]);

        return $dataProvider;
    }
}
