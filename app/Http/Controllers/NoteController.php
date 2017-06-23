<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Services\ApiResponseService;
use App\Services\NoteService;

class NoteController extends Controller
{
    protected $noteService;

    /**
     * NoteController constructor.
     * @param $noteService
     */
    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function my()
    {
        return \Response::json($this->noteService->my());
    }

    public function store(StoreNoteRequest $request)
    {
        try {
            $this->noteService->store($request);
            return ApiResponseService::success();
        } catch (\Exception $e) {
            return ApiResponseService::fail($e->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $note = $this->noteService->show($id);
            return ApiResponseService::success(compact('note'));
        } catch (\Exception $e) {
            return ApiResponseService::fail($e->getMessage());
        }
    }
    public function update(StoreNoteRequest $request, $id)
    {
        try {
            $this->noteService->update($request, $id);
            return ApiResponseService::success();
        } catch (\Exception $e) {
            return ApiResponseService::fail($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->noteService->destroy($id);
            return ApiResponseService::success();
        } catch (\Exception $e) {
            return ApiResponseServices::fail();
        }
    }
}
