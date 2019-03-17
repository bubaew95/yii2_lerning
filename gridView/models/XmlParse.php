<?php
/**
 * Created by PhpStorm.
 * User: borz
 * Date: 17/03/2019
 * Time: 10:49
 */

namespace app\models;

use yii\base\Model;

class XmlParse extends Model {


    public static function parseProducts()
    {
        return self::parseXml('../products.xml');
    }

    public static function parseCategories()
    {
        return self::parseXml('../categories.xml');
    }

    public function parseXml($file) : array
    {
        $params = simplexml_load_file($file);
        $params = json_encode($params);
        $params = json_decode($params, true);
        return $params['item'];
    }

    public static function data() : array
    {
        $products = self::parseProducts();
        $categories = self::parseCategories();
        $arr = [];
        foreach ($products as $product) {
            foreach ($categories as $category)
            {
                if($product['categoryId'] == $category['id']) {
                    $product['category'] = $category;
                    $arr[] = $product;
                }
            }
        }
        return $arr;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoryId' => 'Категория',
            'price' => 'Цена',
            'hidden' => 'Видимость',
        ];
    }

}