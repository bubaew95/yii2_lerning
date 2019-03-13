<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\helpers;

/**
 * StringHelper.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alex Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class StringHelper extends BaseStringHelper
{

    public static function wordsTranslit($text)
    {
        $russian = [
            "К", "У", "П", "И", "С", "Л", "О", "Н", "А",
            "к", "у", "п", "и", "с", "л", "о", "н", "а"
        ];
        $english = [
            "K", 'U', 'P', 'I', 'S', 'L', 'O', 'N', 'A',
            'k', 'u', 'p', 'i', 's', 'l', 'o', 'n', 'a'
        ];
        return str_replace($russian, $english, $text);
    }

}
