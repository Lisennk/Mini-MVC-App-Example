<?php

/**
 * Helper functions
 */

/**
 * @param $text string text to translate
 * @return mixed translated text
 */
function loc($text)
{
    if (empty($GLOBALS['localizator'])) $GLOBALS['localizator'] = new \App\Services\Localizator();
    return $GLOBALS['localizator']->translate($text);
}