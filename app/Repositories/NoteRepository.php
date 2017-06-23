<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 2:07 PM
 */

namespace App\Repositories;


use App\Models\Note;

class NoteRepository extends Repository
{

    public function setModel()
    {
        return Note::class;
    }

    public function queryNotesBuildByUserId($user_id = -1)
    {
        return $this->getModel()->whereUserId($user_id);
    }
}