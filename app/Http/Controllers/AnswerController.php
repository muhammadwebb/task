<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Application;

class AnswerController extends Controller
{
    public function create(Application $application)
    {
        return view('answer.create', ['application' => $application]);
    }

    public function store(Application $application, AnswerRequest $request)
    {
        $application->answer()->create([
            'application' => $application->id,
            'body' => $request->message
        ]);


//        dispatch(new SendAnswerJob($answer));

        return redirect()->back()->with('message', 'Answer sent to client');
    }
}
