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

    public static function wordsConverter($text, $specifier = '_')
    {
        $text = self::explode($text, $specifier);
        $text = implode(' ', $text);
        $text = self::mb_ucwords($text);
        return str_replace(' ', '', $text);
    }

}
