<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\InitialService;

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
        return view($role.'.dashboard', compact('initial','information'));
    }
    
}
