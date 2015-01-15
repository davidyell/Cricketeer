<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Components this controller uses.
     *
     * Component names should not include the `Component` suffix. Components
     * declared in subclasses will be merged with components declared here.
     *
     * @var array
     */
    public $components = [
        'Flash',
        'Auth' => [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email']
                ]
            ],
            'authorize' => [
                'Controller'
            ],
            'authError' => 'You do not have permission to view that.',
            'loginRedirect' => ['controller' => 'leagues', 'action' => 'index', 'prefix' => 'admin'],
            'loginAction' => ['controller' => 'users', 'action' => 'login', 'prefix' => false]
        ],
        'Paginator',
        'RequestHandler'
    ];

    /**
     * beforeFilter method
     *
     * @param Event $event
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        if (isset($this->request->params['prefix']) && $this->request->params['prefix'] === 'admin') {
            $this->layout = 'admin';
        }

        $this->setupAuth();
    }

    /**
     * Configure the AuthComponent
     *
     * @return void
     */
    protected function setupAuth()
    {
        if (@$this->request->params['prefix'] !== 'admin') {
            $this->Auth->allow([
                'index',
                'view',
                'home',
                'logout'
            ]);
        }
    }

    /**
     * Check if a user is allowed to access resources
     *
     * @param null $user
     * @return bool
     */
    public function isAuthorized($user = null)
    {
        if (empty($this->request->params['prefix'])) {
            return true;
        }

        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($user['role'] === 'admin');
        }

        return false;
    }
}
