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

    public static function wordsLimit($txt, $limit)
    {
        $words = self::explode(strip_tags($txt), ' ');
        if($limit < 1 || $limit >= count($words)) {
            return $text;
        }
        $words = array_slice($words, 0, $limit);
        return implode(' ', $words);
    }

}
