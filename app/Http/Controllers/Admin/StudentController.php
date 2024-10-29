<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Information;
use App\Models\User;
use App\Services\InitialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    protected $initialService;
    // Inject the InitialService into the controller
    public function __construct(InitialService $initialService)
    {
        $this->initialService = $initialService;
    }
    
    //display student form
    public function student(){
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view($role.'.student.add', compact('initial'));
    }

    //add student
    public function addStudent(Request $request){
        // dd($request);
        $validatedRequest = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'birthdate' => 'required',
            'address' => 'required',
            'guardian_firstname' => 'required',
            'guardian_lastname' => 'required',
            'guardian_contact_number' => 'required',
        ]);

        $fullname = $validatedRequest['firstname'].' '.$validatedRequest['lastname'];
        $emailExists = User::where('email', $validatedRequest['email'])->first();
        if(!$emailExists){
            $user = User::create([
                'name' => $validatedRequest['firstname'].' '.$validatedRequest['lastname'],
                'email' => $validatedRequest['email'],
                'password' => Hash::make($validatedRequest['birthdate']),
            ]);

            if($user){
                $information = Information::create([
                    'user_id' => $user->id,
                    'firstname' => $validatedRequest['firstname'],
                    'lastname' => $validatedRequest['lastname'],
                    'middlename' => $request->middlename,
                    'email' => $validatedRequest['email'],
                    'birthdate' => $validatedRequest['birthdate'],
                    'address' => $validatedRequest['address'],
                    'guardian_firstname' => $validatedRequest['guardian_firstname'],
                    'guardian_lastname' => $validatedRequest['guardian_lastname'],
                    'guardian_middlename' => $request->guardian_middlename,
                    'guardian_contact_number' => $validatedRequest['guardian_contact_number'],
                ]);
            }
        }else{
            return Redirect::route('admin.student')->with(['status'=>'error','message'=>'Email address is already been used!']);
        }

        return Redirect::route('admin.student')->with(['status'=>'success','message'=>'You added '.$fullname.' on our record!']);
    }

    public function studentList() {
        $students = User::where('role', 'student')->paginate(10);
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view($role.'.student.list', compact('initial', 'students'));
    }
}
