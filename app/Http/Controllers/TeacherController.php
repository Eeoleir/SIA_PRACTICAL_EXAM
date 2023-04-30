<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use App\Models\Teacher;
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

    // SHOW ALL RECORDS
    public function showALLTEACHERS()
    {
        $teachers = Teacher::all();
        return response()->json(['data' => $teachers], 200);
    }

<<<<<<< HEAD
    // ADD FILES
    public function addTeacher(Request $request){ //ADD USER
=======
    public function addTeacher(Request $request){ //ADD TEACHER
>>>>>>> 368f20d0ceb17726104276260ccae9089b7560c0
        
        $rules = [
            'lastname' => 'required|max:20|alpha',
            'firstname' => 'required|max:20|alpha',
            'middlename' => 'required|max:20|alpha',
            'bday' => 'required|date',
            'age' => 'required|integer|min:18',

        ];

        $this->validate($request,$rules);

        $teachers = Teacher::create($request->all());
        return response()->json($teachers, 200);
    }


    // SEARCH
    public function showTeacher($id)
    {
        //$teachers =  Teacher::findOrFail($id);
        $teachers = Teacher::where('teacherid', $id)->first();

        if($teachers){
            return $this->successResponse($teachers);
        }
        else{
            return $this->errorResponse('Teacher ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
        
    }

    public function deleteTeacher($id) {
        $teachers = Teacher::where('teacherid', $id)->delete();

        if($teachers){
            return $this->successResponse($teachers);
        }
        else{
            return $this->errorResponse('Teacher ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }


    // UPDATE
    public function updateTeacher(Request $request, $id)
    {

        $teachers = Teacher::where('teacherid', $id)->firstOrFail();
        $rules = [
            $this->validate($request, [
            'lastname' => 'required|max:20|alpha',
            'firstname' => 'required|max:20|alpha',
            'middlename' => 'required|max:20|alpha',
            'bday' => 'required|date',
            'age' => 'required|integer|min:18',
            ])  
        ];
        $this->validate($request, $rules);
        $teachers->fill($request->all());
        $teachers->save();
        
        return $teachers;
    } 
}