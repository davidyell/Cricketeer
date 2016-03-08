<?php
namespace App\Controller;

/**
 * Formats Controller
 *
 * @property \App\Model\Table\FormatsTable $Formats
 */
class FormatsController extends AppController
{

    /**
     * View method
     *
     * @param string|null $id Format id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $format = $this->Formats->get($id, [
            'contain' => [
                'Matches' => [
                    'Venues'
                ]
            ]
        ]);

        $this->set('format', $format);
    }
}
