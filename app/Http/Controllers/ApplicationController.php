<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreARequest;
use App\Models\Application;
use App\Repository\IApplicationRepository;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $application;

    public function __construct(IApplicationRepository $application)
    {
        $this->application = $application;
    }

    public function index()
    {
        $user = $this->application->findById(auth()->id());
        return view('applications.index', ['applications' => $user->applications]);
    }

    public function store(StoreARequest $request)
    {
        $collection = $request->all();

        $this->application->storeOrUpdate($id = null, $collection);



        return redirect()->back();
    }


    public function show()
    {
        //
    }


    public function update(Request $request)
    {
        //
    }


    public function destroy(Request $request)
    {
        //
    }
}
