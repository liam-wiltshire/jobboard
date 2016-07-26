@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2>Admin Dashboard</h2>
                        <h3>Balances</h3>
                        @foreach ($users as $user)
                            <p>{{$user->name}}: &pound;{{$user->Transactions()->sum('amount')}}</p>

                        @endforeach
                        <h3>Pending Review</h3>
                        <table class="table-bordered table">
                            <thead>
                            <tr><th>Job</th><th>Price</th><th>Status</th><th>Claimed By</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)                                    <tr>
                                <td>{{$job->job}}</td>
                                <td>&pound;{{$job->price}}</td>
                                <td>{{$job->JobState->jobs_state}}@if ($job->ClaimedJob) - {{$job->ClaimedJob->ClaimedJobState->claimed_jobs_state}}@endif</td>
                                <td>@if ($job->ClaimedJob){{$job->ClaimedJob->User->name}}@endif</td>
                                <td><a href="/admin/editjob/{{$job->id}}">Edit</a>
                                    @if ($job->ClaimedJob && $job->ClaimedJob->ClaimedJobState->id == 2)
                                        <br /><a href="/admin/reviewjob/{{$job->id}}">Review</a>
                                    @endif</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
