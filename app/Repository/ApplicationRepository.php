<?php

namespace App\Repository;

use App\Jobs\SendEmailJob;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicationRepository implements IApplicationRepository
{
    protected $application = null;

    public function list(): LengthAwarePaginator
    {
        return true;
    }

    public function findById($id): Application
    {
        return true;
    }

    public function storeOrUpdate($id = null, $collection = [])
    {
        if ($this->checkDay()){
            return redirect()->back()->with('error', 'You can only submit one application per day');
        }

        if (!$id){
            if (isset($collection['file'])){
                $file = $collection['file'];
                $today = Carbon::today();
                $name = $today->toDateString().'-'.auth()->id().$file->getClientOriginalName();
                $path = $file->storeAs(
                            'file',
                             $name,
                            'public'
                );
            }

            $application = Application::create([
                            'user_id' => auth()->id(),
                            'subject' => $collection['subject'],
                            'message' => $collection['message'],
                            'file_url' => $path ?? null,
                        ]);
        }

        dispatch(new SendEmailJob($application));


        return $application;


    }

    public function destroyById($object)
    {
        // TODO: Implement destroyById() method.
    }

    private function checkDay()
    {
        if (auth()->user()->applications()->latest()->first() == null){
            return false;
        }
        $lastApplication = auth()->user()->applications()->latest()->first();
        $lastDate = Carbon::parse($lastApplication->created_at)->toDateString();
        $today = Carbon::today();

        if ($today->toDateString() == $lastDate){
            return true;
        }
    }
}
