<?php

namespace App\Http\Controllers;

use App\ClaimedJobsStates;
use App\Http\Requests;
use App\JobReviews;
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

class AdminController extends Controller
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

    public function jobs(Request $request)
    {
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $jobs = Jobs::orderBy('id','DESC')->get();
            return view('admin.jobs.list',['jobs'=>$jobs]);
        }else{
            return redirect()->action('HomeController@index');
        }

    }

    public function reviewJob(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $job = Jobs::find($jobId);

            return view('admin.jobs.review',['job'=>$job]);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function reviewJobPost(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $job = Jobs::find($jobId);

            $rules = array(
                'action'    => 'required',
                'review'    =>     Input::get('action') == 4 ? 'required' : '',
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::to('/admin/reviewjob/' . $jobId)->withErrors($validator)->withInput();
            }else {
                $job->ClaimedJob->claimed_jobs_state_id = Input::get('action');
                if (Input::get('action') == 3){
                    $transaction = new Transactions();
                    $transaction->user_id = $job->ClaimedJob->user_id;
                    $transaction->job_id = $job->id;
                    $transaction->amount = $job->price;
                    $transaction->description = "Wage for {$job->job}";
                    $transaction->save();
                }
                $job->ClaimedJob->save();
                if (Input::get('review')){
                    $review = new JobReviews();
                    $review->job_id = $jobId;
                    $review->user_id = $user->id;
                    $review->comments = Input::get('review');

                    $review->save();

                }

            }

            return redirect()->action('AdminController@jobs');
        }else{
            return redirect()->action('HomeController@index');
        }
    }


    public function createJob(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            return view('admin.jobs.create');
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function createJobPost(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 1){

            $rules = array(
                'job'           => 'required',
                'description'   => 'required',
                'price'         => 'required|numeric'
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::to('/admin/createjob')->withErrors($validator)->withInput();
            }else{
                $job = new Jobs();
                $job->job = Input::get('job');
                $job->description = Input::get('description');
                $job->price = Input::get('price');
                $job->jobs_state_id = 1;
                $job->user_id = $request->user()->id;
                $job->save();
                return Redirect::to('/admin/jobs');
            }
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function editJob(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $job = Jobs::find($jobId);
            $state = JobsStates::all()->lists('jobs_state','id');
            return view('admin.jobs.edit',['job'=>$job,'state'=>$state]);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function editJobPost(Request $request,$jobId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){

            $rules = array(
                'job'           => 'required',
                'description'   => 'required',
                'job_state_id'   => 'required',
                'price'         => 'required|numeric'
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::to('/admin/editjob/' . $jobId)->withErrors($validator)->withInput();
            }else{
                $job = Jobs::find($jobId);
                $job->job = Input::get('job');
                $job->description = Input::get('description');
                $job->price = Input::get('price');
                $job->jobs_state_id = Input::get('job_state_id');
                $job->save();
                return Redirect::to('/admin/jobs');
            }
        }else{
            return redirect()->action('HomeController@index');
        }
    }


    public function transactions(Request $request)
    {
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $transactions = Transactions::orderBy('id','DESC')->get();
            return view('admin.transactions.list',['transactions'=>$transactions]);
        }else{
            return redirect()->action('HomeController@index');
        }

    }

    public function createTransaction(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $users = User::whereHas('UserType', function($q) {
                $q->where('is_admin','=', '0');
            })->get()->lists('name','id');
            return view('admin.transactions.create',['users'=>$users]);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function createTransactionPost(Request $request){
        $user = $request->user();
        if ($user->userType->is_admin == 1){

            $rules = array(
                'user_id'           => 'required|digits:1',
                'description'   => 'required',
                'amount'         => 'required|numeric'
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::to('/admin/createtransaction')->withErrors($validator)->withInput();
            }else{
                $transaction = new Transactions();

                $transaction->description = Input::get('description');
                $transaction->amount = Input::get('amount');
                $transaction->user_id = Input::get('user_id');
                $transaction->save();
                return Redirect::to('/admin/transactions');
            }
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function editTransaction(Request $request,$transactionId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){
            $transaction = Transactions::find($transactionId);
            $users = User::whereHas('UserTypes', function($q) {
                $q->where('is_admin','=', '0');
            })->get()->lists('name','id');
            return view('admin.transactions.edit',['transaction'=>$transaction,'users'=>$users]);
        }else{
            return redirect()->action('HomeController@index');
        }
    }

    public function editTransactionPost(Request $request,$transactionId){
        $user = $request->user();
        if ($user->userType->is_admin == 1){

            $rules = array(
                'user_id'           => 'required|digits:1',
                'description'   => 'required',
                'amount'         => 'required|numeric'
            );
            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails())
            {
                return Redirect::to('/admin/edittransaction/' . $transactionId)->withErrors($validator)->withInput();
            }else{
                $transaction = new Transactions();

                $transaction->description = Input::get('description');
                $transaction->amount = Input::get('amount');
                $transaction->user_id = Input::get('user_id');
                $transaction->save();
                return Redirect::to('/admin/transactions');
            }
        }else{
            return redirect()->action('HomeController@index');
        }
    }
}
