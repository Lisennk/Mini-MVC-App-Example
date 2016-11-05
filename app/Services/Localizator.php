<?php

namespace App\Services;

/**
 * Class Localizator
 */
class Localizator
{
    /**
     * @var string current language
     */
    protected $language;

    /**
     * @var array dictionary of current language
     */
    protected $dictionary;

    /**
     * Localizator constructor.
     */
    public function __construct()
    {
        if (isset($_COOKIE['lang'])) {
            $this->language = 'ru'; // only russian language for this time
            $this->dictionary = include(dirname(__FILE__, 3) . '/resources/lang/' . $this->language . '.php');
        }
    }

    /**
     * Translate text to the current language
     *
     * @param $text
     */
    public function translate($text)
    {
        if (empty($this->language)) return $text;
        return @isset($this->dictionary[$text]) ? $this->dictionary[$text] : $text;
    }
}