<?php

/**
 * VenuesController.php
 *
 * @author David Yell <dyell@ukwebmedia.com>
 * @copyright 2016 UK Web Media Ltd
 */

namespace App\Controller;

class VenuesController extends AppController
{
    public function view($id)
    {
        $venue = $this->Venues->get($id, [
            'contain' => [
                'Matches' => [
                    'Formats'
                ]
            ]
        ]);
        $this->set('venue', $venue);
    }
}