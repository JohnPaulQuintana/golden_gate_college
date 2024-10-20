<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $initialService;
    // Inject the InitialService into the controller
    public function __construct(\App\Services\InitialService $initialService)
    {
        $this->initialService = $initialService;
    }
    //index
    public function index()
    {
        $initial = $this->initialService->getInitials(Auth::user()->name);
        $information = \App\Models\User::with('information')->where('id', Auth::user()->id)->first();
        $notifications = Notification::where('user_id', Auth::user()->id)->get();
        return view('student.notification.notif', compact('notifications', 'initial','information'));
    }
}
