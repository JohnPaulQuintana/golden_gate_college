<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Liabilities;
use App\Services\AbbreviationService;
use App\Services\InitialService;
use App\Services\TeacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CashierController extends Controller
{
    protected $initialService;
    protected $teacherService;
    protected $abbreviationService;
    public function __construct(InitialService $initialService, TeacherService $teacherService, AbbreviationService $abbreviationService)
    {
        $this->initialService = $initialService;
        $this->teacherService = $teacherService;
        $this->abbreviationService = $abbreviationService;
    }
    //liabilities
    public function liabilities()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $liabilities = Liabilities::with('user')->latest()->get();
        return view('cashier.pages.liabilities', compact('initial', 'liabilities'));
    }

    //create
    public function create(Request $request)
    {
        // Define validation rules
        $rules = [
            '_token' => 'required|string',
            'user_id' => 'required|integer',
            'liabilities_description' => 'required|string|max:255',
        ];

        // Perform validation
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Return validation errors as JSON
            return Redirect::route('cashier.liabilities')->with([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        Liabilities::create([
            'user_id' => $request->user_id,
            'liabilities_description' => $request->liabilities_description,
        ]);

        return Redirect::route('cashier.liabilities')->with(['status' => 'success', 'message' => 'You successfully created a new liabilities.']);
    }
}
