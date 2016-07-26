<?php

namespace App\Http\Controllers;

use App\ClaimedJobsStates;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\ClaimedJobs;
use App\Jobs;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\JobsStates;
use App\Transactions;
use App\User;
use App\UserTypes;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function job(Request $request,$jobId)
    {
        $user = $request->user();
        if ($user->userType->is_admin == 0){
            $job = Jobs::find($jobId);
            return view('user.job',['job'=>$job]);
        }else{
            return redirect()->action('HomeController@index');
        }

    }

    public function completeJob(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 0){
            $job = Jobs::find($jobId);
            $job->ClaimedJob->claimed_jobs_state_id = 2;
            $job->ClaimedJob->save();
            return redirect()->action('UserController@jobs');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function transactions(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 0){
            $transactions = $user->Transactions()->orderBy('id','DESC');
            $balance = $transactions->sum('amount');
            return view('user.transactions',['transactions' => $transactions,'balance' => $balance]);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function jobs(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 0){
            $jobs = Jobs::whereHas('ClaimedJob',function($q) use ($user){
               $q->where('user_id','=',$user->id);
            })->orderBy('id','DESC')->get();

            $balance = $user->Transactions()->sum('amount');
            return view('user.jobs',['jobs'=>$jobs,'balance'=>$balance]);
        }else{
            return redirect()->action('HomeController@index');
        }

    }

    public function claimJob(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 0){
            $job = Jobs::find($jobId);
            $job->jobs_state_id = 2;
            $job->save();

            $claimed = new ClaimedJobs();
            $claimed->job_id = $job->id;
            $claimed->user_id = $user->id;
            $claimed->claimed_jobs_state_id = 1;
            $claimed->save();

            return redirect()->action('UserController@jobs');
        }else{
            return redirect()->action('HomeController@index');
        }
    }


}
