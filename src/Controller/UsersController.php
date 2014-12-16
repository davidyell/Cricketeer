<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users controller
 *
 * @author David Yell <neon1024@gmail.com>
 */
class UsersController extends AppController
{
    /**
     * Login a user
     *
     * @return void
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error('Username or password is incorrect', 'default', [], 'auth');
            }
        }
    }

    /**
     * Log out a user
     *
     * @return redirect
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
