
<?php
    /**
     * Created by PhpStorm.
     * User: borz
     * Date: 18/03/2019
     * Time: 22:12
     */
    use yii\grid\GridView;
    
    echo GridView::widget([
'dataProvider' => $model,
    'formatter' => [
        'class' => 'yii\i18n\Formatter',
        'nullDisplay' => ['Нет данных'] //set text "No data" if column null
    ],
    'columns' => [
        'id',
        'title',
        'text',
    ],
]);
