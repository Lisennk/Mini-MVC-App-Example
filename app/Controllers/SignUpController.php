<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Controllers\Base\BaseController;

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
            return $this->view('index', ['message' => 'Error: some of fields are empty']);

        if (!$this->fileIsAllowed($_FILES['picture']['name']))
            return $this->view('index', ['message' => 'Error: your picture should be in .jpg']);

        $userId = $this->users->add($_POST['name'], $_POST['email'], $_POST['password']);
        $this->saveUploadedFile('picture', $userId . '.jpg');

        return $this->view('index', ['message' => 'Success! Now you can log in']);
    }

    /**
     * @param string $filename
     * @return bool
     */
    protected function fileIsAllowed($filename)
    {
        return pathinfo($filename, PATHINFO_EXTENSION) == 'jpg';
    }

    /**
     * @param string $field
     * @param string $filename New name of file
     * @return bool
     */
    protected function saveUploadedFile($field, $filename)
    {
        if (!$this->fileIsAllowed($_FILES[$field]['name'])) return false;
        return move_uploaded_file($_FILES[$field]['tmp_name'], dirname(__FILE__,3) . '/public/usercontent/avatars/' . $filename);
    }
}