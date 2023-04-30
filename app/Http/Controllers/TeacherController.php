<?php

namespace App\Http\Controllers;


use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

Class TeacherController extends Controller {
    use ApiResponser;
    protected $primarykey = 'teacherid';
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function showALLTEACHERS()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }

    public function addTeacher(Request $request){ //ADD USER
        
        $rules = [
            'lastname' => 'required|max:20|alpha',
            'firstname' => 'required|max:20|alpha',
            'middlename' => 'required|max:20|alpha',
            'bday' => 'required|date',
            'age' => 'required|integer|min:18',

        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        return response()->json($user, 200);
    }



    public function showTeacher($id)
    {
        //$user =  User::findOrFail($id);
        $user = User::where('teacherid', $id)->first();

        if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
        
    }


    

    public function deleteTeacher($id) {
        $user = User::where('teacherid', $id)->delete();

        if($user){
            return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }


    public function updateTeacher(Request $request, $id) {

        $rules = [
            'lastname' => 'required|max:20|alpha',
            'firstname' => 'required|max:20|alpha',
            'middlename' => 'required|max:20|alpha',
            'bday' => 'required|date',
            'age' => 'required|integer|min:18',
        ];
    
        $this->validate($request, $rules);
    
        // Retrieve the user from the database using the $id parameter
        $user = User::findOrFail($id);
    
        $user->fill($request->all());
    
        if ($user->isClean()) {
            return response()->json("At least one value must change", 403);
        } else {
            $user->save();
            return response()->json($user, 200);
        }
    }
    
}