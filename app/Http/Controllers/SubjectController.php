<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSubjectRequest;

use App\Models\Subject;
use App\Services\SubjectService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubjectController extends Controller
{
    private $SubjectService;

    public function __construct(SubjectService $SubjectService)
    {
        $this->SubjectService = $SubjectService;
    }

    public function index()
    {
        $subject = $this->SubjectService->index();
        return response()->json($subject, 200);
    }

    public function store(StoreSubjectRequest $request)
    {
        $fields = $request->validated();
        $subject = $this->SubjectService->create($fields);

        $token = $subject->createToken($subject->name);

        return response([
            'subject'=>$subject,
            'token'=>$token->plainTextToken,
            'message'=>'your data is added!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = $this->SubjectService->search($id);
        if(!$subject){
            return response()->json($subject, 200);
        }
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(StoreSubjectRequest $request, Subject $subject)
    {
        $fields = $request->validated();
        $result = $this->SubjectService->update($subject, $fields);
        if(!$result){
        return "data not found for updating!";
        }else{
            return "1 row updated";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->SubjectService->delete($id);
        return $result;
    }
}
