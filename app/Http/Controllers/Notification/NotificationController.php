<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Liabilities;
use App\Models\Notification;
use App\Models\Tag;
use Carbon\Carbon;
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
        $notifications = Notification::where('user_id', Auth::user()->id)->latest()->get();

        $today = Carbon::today()->toDateString(); // Get today's date
        $liabilities = Liabilities::with('user')->whereDate('created_at', $today)->get();

        $tags = Tag::join('liabilities', 'tags.liability_id', '=', 'liabilities.id')
        ->join('users','liabilities.user_id', '=','users.id')
        ->join('academic_years','liabilities.academic_year_id', '=','academic_years.id')
        ->join('semesters', 'liabilities.semester_id', '=','semesters.id')
        ->select('tags.*','liabilities.liabilities_description','users.role','users.name','academic_years.academic_year', 'semesters.name as semester')
        ->where('tags.user_id', Auth::user()->id)->where('tags.status', 'unpaid')
        ->orderBy('liabilities.created_at', 'desc') // Order by the created_at column in descending order
        ->get();
        return view('student.notification.notif', compact('notifications', 'initial','information', 'liabilities','tags'));
    }
}
