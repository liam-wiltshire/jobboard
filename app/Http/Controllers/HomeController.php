<?php

namespace App\Http\Controllers;

use App\ClaimedJobsStates;
use App\Http\Requests;
use App\Transactions;
use Illuminate\Http\Request;
use App\ClaimedJobs;
use App\Jobs;
use App\User;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            //Show any pending reviews
            $jobs = Jobs::whereHas('ClaimedJob', function($q) {
                $q->where('claimed_jobs_state_id','=', '2');
            })->get();

            //Get balances
            $users = User::whereHas('UserType',function($q){
                $q->where('is_admin','=','0');
            })->get();

            return view('admin.dashboard',['jobs'=>$jobs,'users'=>$users]);
        }else{
            //Show any pending jobs
            $jobs = Jobs::whereHas('JobState', function($q){
                $q->where('claimable','=','1');
            })->get();
            //Show current balance
            $balance = $user->Transactions()->sum('amount');

            return view('user.dashboard',['jobs' => $jobs,'balance'=>$balance]);
        }
        return view('home');
    }
}
