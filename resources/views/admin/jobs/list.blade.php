@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <a href="/admin/createjob" class="btn btn-primary">Create New Job</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Jobs</div>

                    <div class="panel-body">
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
