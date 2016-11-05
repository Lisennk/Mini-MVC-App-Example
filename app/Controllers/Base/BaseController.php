<?php

namespace App\Controllers\Base;

use App\Controllers\Base\ControllerInterface;
use Philo\Blade\Blade;
use App\Services\Localizator;

/**
 * Class BaseController
 *
 * @package App\Controllers
 */
abstract class BaseController implements ControllerInterface
{
    /**
     * @var Blade
     */
    protected $engine;

    /**
     * @var
     */
    protected $localizator;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->engine = new Blade(dirname(__FILE__, 4) . '/resources/views', dirname(__FILE__, 4) . '/cache');
        $this->localizator = new Localizator();
    }

    /**
     * Returns rendered blade view
     *
     * @param $template
     * @param $data
     * @return mixed
     */
    public function view($template, $data = [])
    {
        $data = $this->translate($data);
        return $this->engine->view()->make($template, $data)->render();
    }

    /**
     * Translate array or text to support localization
     *
     * @param $data
     * @return array
     */
    protected function translate($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $this->translate($value);
            }
            return $data;
        } else {
            return $this->localizator->translate($data);
        }
    }

    /**
     * Displays page
     *
     * @return mixed
     */
    abstract function fire();
}