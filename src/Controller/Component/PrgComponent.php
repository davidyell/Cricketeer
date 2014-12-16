<?php
/**
 * PrgComponent
 * Post Redirect Get component to prevent double submission of forms.
 *
 * @author David Yell <neon1024@gmail.com>
 * @date 11/11/2014
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class PrgComponent extends Component
{

    public $presetVar = true;

    /**
     * Initialize properties.
     *
     * @param array $config The config data.
     * @return redirect
     */
    public function initialize(array $config)
    {
        $controller = $this->_registry->getController();
        $request = $controller->request;

        if ($request->is(['post', 'put'])) {
            if ($request->session()->read('prg')) {
                $request->session()->delete('prg');
                return $controller->redirect(['action' => $request->action, $request->params['pass'][0]]);
            } else {
                $request->session()->write('prg', true);
            }
        }
    }

}