<?php
/**
 * Created by PhpStorm.
 * User: borz
 * Date: 17/03/2019
 * Time: 12:42
 */

namespace app\commands;

use Yii;
use yii\base\Exception;
use yii\i18n\Formatter;

class PhoneFormatter extends Formatter
{

    public $numberFormat;
    public $numberMask = '#';

    public function asPhone($phone)
    {
        if(empty($this->numberFormat)) throw new Exception("Не задан формат номера телефона");
        return $this->formattingPhone($phone);
    }


    public function formattingPhone($phone)
    {
        if(empty($phone))
            throw  new Exception("Введите номер телефона");

        $phone = preg_replace('/[^0-9]/', '', $phone);
        $countMask = substr_count($this->numberFormat, $this->numberMask);

        if(strlen($phone) != $countMask)
            throw new \Exception("Количество цифр номера не совпадают с количеством символов маски!");

        $pattern = '/' . str_repeat('([0-9])?',  $countMask). '(.*)/';

        $format = preg_replace_callback(
            str_replace('#', $this->numberMask, '/([#])/'),
            function () use (&$counter) {
                return '${' . (++$counter) . '}';
            },
            $this->numberFormat
        );

        return preg_replace($pattern, $format, $phone, 1);
    }
}

/*

    'formatter' => [
        'class' => '\app\commands\PhoneFormatter',
        'numberFormat' => '#(###) ###-##-##'
    ],

 */