<?php

namespace App\Controllers;

use App\Controllers\ControllerInterface;
use Philo\Blade\Blade;

/**
 * Class BaseController
 *
 * @package App\Controllers
 */
abstract class BaseController implements ControllerInterface
{
    protected $engine;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->engine = new Blade(dirname(__FILE__, 3) . '/resources/views', dirname(__FILE__, 3) . '/cache');
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
        return $this->engine->view()->make($template, $data)->render();
    }

    /**
     * Displays page
     *
     * @return mixed
     */
    abstract function fire();
}