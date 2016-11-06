<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Controllers\Base\BaseController;
use Imagick;

/**
 * Class SignUpController
 * @package App\Controllers
 */
class SignUpController extends BaseController
{
    protected $users;

    /**
     * SignUpController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->users = new UserRepository;
    }

    /**
     * Register new user
     *
     * @return mixed
     */
    public function fire()
    {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_FILES['picture']))
            return $this->view('index', ['message' => 'You must fill all fields!']);

        $picture = $_FILES['picture'];

        if (!$this->fileIsAllowed($picture))
            return $this->view('index', ['message' => 'Upload picture in .jpg, .png or .gif']);

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            return $this->view('index', ['message' => 'Incorrect email!']);

        try {
            $userId = $this->users->add($_POST['name'], $_POST['email'], $_POST['password']);
            $this->convertAndSaveFile($picture, $userId);
            return $this->view('index', ['message' => 'Success! Now you can log in']);
        } catch (\Exception $e) {
            return $this->view('index', ['message' => 'Can`t create new user. May be user with this email already exists']);
        }
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function fileIsAllowed($file)
    {
        $format = pathinfo($file['name'], PATHINFO_EXTENSION);
        $allowedFormats = ['jpg', 'png', 'gif'];

        return in_array($format, $allowedFormats);
    }

    /**
     * Convert jpg, png or gif file to jpg, resize to 200x200 and save uploaded image
     *
     * @param $file
     * @param $newName
     * @return bool|int
     */
    protected function convertAndSaveFile($file, $newName)
    {
        if (!$this->fileIsAllowed($file)) return false;

        try {
            $image = new Imagick($file['tmp_name']);
            $image->adaptiveResizeImage(200, 200, false);
            $image->setImageFormat('jpg');

            $savePath = dirname(__FILE__, 3) . '/public/usercontent/avatars/' . $newName . '.jpg';
            return $image->writeImage($savePath);
        } catch (\Exception $e) {
            return false;
        }
    }
}