<?php
/**
 * Created by PhpStorm.
 * User: borz
 * Date: 17/03/2019
 * Time: 10:56
 */

namespace app\models;


use yii\base\Model;
use yii\data\ArrayDataProvider;

class XmlSearch extends XmlParse
{

    public $id;
    public $price;
    public $categoryId;
    public $hidden;

    public function rules()
    {
        return [
            [['id', 'price', 'categoryId'], 'integer'],
            [['id', 'price', 'categoryId', 'hidden'], 'safe'],
        ];
    }

    private $filter = false;


    public function search($params)
    {
        if ($this->load($params) && $this->validate()) {
            $this->filter = true;
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $this->getData(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'price',
                'categoryId',
                'hidden'
            ]
        ]);

        return $dataProvider;
    }

    private function getData()
    {
        $query = self::data();

        if ($this->filter) {
            $query = array_filter($query, function ($value) {
                $conditions = [true];
                if (!empty($this->id)) {
                    $conditions[] = strpos($value['id'], $this->id) !== false;
                }
                if (!empty($this->categoryId)) {
                    $conditions[] = strpos($value['categoryId'], $this->categoryId) !== false;
                }
                if (!empty($this->price)) {
                    $conditions[] = strpos($value['price'], $this->price) !== false;
                }
                if (strlen($this->hidden) > 0) {
                    $conditions[] = strpos($value['hidden'], $this->hidden) !== false;
                }
                return array_product($conditions);
            });
        }
        return $query;
    }

}