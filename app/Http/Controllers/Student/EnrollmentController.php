<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\InitialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    protected $initialService;
    // Inject the InitialService into the controller
    public function __construct(InitialService $initialService)
    {
        $this->initialService = $initialService;
    }

    //enrollemnt form
    public function enrollment()
    {
        $information = User::with('information')->where('id',Auth::user()->id)->first();
        $initial = $this->initialService->getInitials(Auth::user()->name);
        return view('student.enrollment.enrollment', compact('information','initial'));
    }
    
}
