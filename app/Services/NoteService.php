<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 6/23/17
 * Time: 2:08 PM
 */

namespace App\Services;

use App\Exceptions\NoteNotExistException;
use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use App\Repositories\NoteRepository;
use Illuminate\Database\Eloquent\Model;

class NoteService {
	protected $noteRepository;

	/**
	 * NoteService constructor.
	 *
	 * @param $noteRepository
	 */
	public function __construct( NoteRepository $noteRepository ) {
		$this->noteRepository = $noteRepository;
	}

	public function my() {
		return $this->noteRepository->queryNotesBuildByUserId( user()->id )
		                            ->paginate( 10 );
	}

	public function store( StoreNoteRequest $request ) {
		if ( $this->noteRepository->fill( $request->all() )->save() ) {
			return true;
		}

		return false;
	}

	public function show( $id ) {
		if ( !$note = $this->noteRepository->find( $id ) ) {
			throw new NoteNotExistException();
		}

		return $note;
	}

	public function edit($id)
	{
		if (!$note=$this->noteRepository->find($id)) {
			throw new NoteNotExistException();
			
		}
		return $note;
	}

	public function update( StoreNoteRequest $request, $id ) {
		$note = $this->show( $id );

		return $note->fill( $request->all() )->save();
	}

	public function delete( $id ) {
		$note = $this->noteRepository->find( $id );
		if ( ! $note ) {
			throw new NoteNotExistException();
		}

		return $note->delete();
	}

}
