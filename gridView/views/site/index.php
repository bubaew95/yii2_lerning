<?php

/* @var $this yii\web\View */
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\XmlParse;

$this->title = 'My Yii Application';
$categories = ArrayHelper::map(XmlParse::parseCategories(), 'id', 'name');
?>
<div class="site-index">

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'id',
                    'filterInputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Код',
                    ],
                    'content' => function ($model) {
                        return $model['id'];
                    }
                ],
                [
                    'attribute' => 'categoryId',
                    'filter' => $categories,
                    'filterInputOptions' => [
                        'class' => 'form-control',
                        'prompt' => 'Не выбрано'
                    ],
                    'content' => function ($model) {
                        return $model['category']['name'];
                    }
                ],
                [
                    'attribute' => 'price',
                    'filter' => true,
                    'filterInputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Цена'
                    ],
                    'content' => function($model) {
                        return $model['price'] . " ₽";
                    }
                ],
                [
                    'attribute' => 'hidden',
                    'filterInputOptions' => [
                        'class' => 'form-control',
                        'placeholder' => 'Видимость'
                    ],
                    'content' => function($model) {
                        return $model['hidden'] ?
                            '<span class="text-success">Виден</span>' :
                            '<span class="text-danger">Не виден</span>';
                    }
                ]
            ],
        ]);
    ?>


</div>
