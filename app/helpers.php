<?php

/**
 * Helper functions
 */

$GLOBALS['localizator'] = new \App\Services\Localizator();

/**
 * @param $text string text to translate
 * @return mixed translated text
 */
function loc($text)
{
    return $GLOBALS['localizator']->translate($text);
}