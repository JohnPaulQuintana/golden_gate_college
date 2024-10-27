<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\Liabilities;
use App\Models\User;
use App\Services\InitialService;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $initialService;

    public function __construct(
        InitialService $initialService)
    {
        $this->initialService = $initialService;
    }
    //dashboard riedirect
    public function index(){
        // dd('dwadwa');
        $role = Auth::user()->role;
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $information = User::with('information')->where('id',Auth::user()->id)->first();
        // dd($information);
        $today = Carbon::today()->toDateString(); // Get today's date

        $liabilities = Liabilities::with('user')->whereDate('created_at', $today)->get();
        // dd($liabilities);
        return view($role.'.dashboard', compact('initial','information','liabilities'));
    }
    
}
