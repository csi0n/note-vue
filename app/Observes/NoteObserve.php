<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 2:12 PM
 */

namespace App\Observes;

class NoteObserve
{
    public function creating($note)
    {
        $note->user_id = user()->id;
    }
}
