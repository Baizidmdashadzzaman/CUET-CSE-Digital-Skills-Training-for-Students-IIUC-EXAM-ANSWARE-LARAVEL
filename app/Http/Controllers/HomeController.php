<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Jobs\ProcessTask;

class HomeController extends Controller
{

    public function index_q1()
    {
        return view('welcome_q1');
    }

    public function dispatchTask(Request $request)
    {
        $request->validate(['task' => 'required|string']);
        ProcessTask::dispatch($request->task);
        return back()->with('success', 'Task dispatched successfully!');
    }

    public function index()
    {
        $educations = Education::all();
        return view('welcome', compact('educations'));
    }



}
