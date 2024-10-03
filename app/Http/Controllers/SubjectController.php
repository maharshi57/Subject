<?php

namespace App\Http\Controllers;

use App\Models\Subject;

use App\Http\Requests\StoreSubjectRequest;
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

    public function jsonResponse($status, $message= null, $data = [], $responseCode = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ], $responseCode);
    }

    public function index()
    {
        $subject = $this->SubjectService->index();
        // $result = array('status'=>true, 'message'=>count($subject).'record found!', 'data'=>$subject);
        $status = true;
        $message = count($subject).' '.'record found!';
        $data = $subject;
        $responseCode = 200;

        return $this->jsonResponse($status, $message, $data, $responseCode);
    }

    public function store(StoreSubjectRequest $request)
    {
        $fields = $request->validated();
        $subject = $this->SubjectService->create($fields);

        if($subject){
            $status = true;
            $message ="one recored added!";
            $data = $subject;
            $responseCode = 201;
            // $result = array(
            //     'status'=>true,
            //     'message'=>"one recored added!",
            //     'data'=>$subject
            // );
            // $responseCode = 200;
        }else{
            $status = false;
            $message ="store proper data!";
            $data = [];
            $responseCode = 400;
            // $result = array(
            //     'status'=>false,
            //     'message'=>"store proper data!",
            // );
            // $responseCode=400;
        }
        return $this->jsonResponse($status, $message, $data, $responseCode);
        // $token = $subject->createToken($subject->name);
        // return response([
        //     $subject,
        //     $responseCode,
        //     // 'token'=>$token->plainTextToken
        // ]);
    }

    public function show(string $id)
    {
        $subject = $this->SubjectService->search($id);
        if($subject){
            $status = true;
            $message ="record found!";
            $data = $subject;
            // $result = array('status'=>true, 'message'=>'record found!', 'data'=>$subject);
            $responseCode = 200;
        }else{
            $status = false;
            $message ="record not found!";
            $data = [];
            // $result = array('status'=>false, 'message'=>'record not found!');
            $responseCode = 204;
        }
        return $this->jsonResponse($status, $message, $data, $responseCode);
        //   return response()->json($result,$responseCode);
    }

    public function update(StoreSubjectRequest $request, Subject $subject)
    {
        $fields = $request->validated();
        $subject = $this->SubjectService->update($subject, $fields);
        if(!$subject){
            $status = false;
            $message ="record not found!";
            $data = [];
            // $result = array('status'=>false, 'message'=>'record not found!');
            $responseCode = 204;
        }else{
            $status = true;
            $message ="one record updated!";
            $data = $fields;
            // $result = array('status'=>true, 'message'=>'one record updated!', 'data'=>$fields);
            $responseCode = 200;
        }
        return $this->jsonResponse($status, $message, $data, $responseCode);
        // return response()->json($result, $responseCode);
    }

    public function destroy(string $id)
    {

        $subject = $this->SubjectService->delete($id);

        if(!$subject){
            $status = false;
            $message ="record not found in database!";
            $data = [];
            // $result = array('status'=>false, 'message'=>'record not available!');
            $responseCode = 400;
        }else{
            $status = true;
            $message ="one record deleted!";
            $data = [];
            // $result = array('status'=>true, 'message'=>'one record deleted!');
            $responseCode = 204;
            }
        return $this->jsonResponse($status, $message, $data, $responseCode);
        // return response($subject,$responseCode);
    }
}
