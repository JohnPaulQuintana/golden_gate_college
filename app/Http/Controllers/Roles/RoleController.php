<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //dashboard riedirect
    public function index(){
        // dd('dwadwa');
        $role = Auth::user()->role;
        $initial = $this->initials(Auth::user()->name);
        $information = User::with('information')->where('id',Auth::user()->id)->first();
        // dd($information);
        return view($role.'.dashboard', compact('initial','information'));
    }

    private function initials($name) {
        $n = $name; // Get the user's full name
        $initials = collect(explode(' ', $n)) // Split name by spaces
                    ->map(function($word) { // Get the first letter of each word
                        return strtoupper(substr($word, 0, 1));
                    })
                    ->take(2) // Take only the first 2 initials
                    ->implode(''); // Join the initials
    
        return $initials; // Output: JD
    }
    
}
