@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel">
                    <a href="/admin/createtransaction" class="btn btn-primary">Create New Transaction</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Transactions</div>

                    <div class="panel-body">
                        <table class="table-bordered table">
                            <thead>
                                <tr><th>Description</th><th>User</th><th>Amount</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>&pound;{{$transaction->amount}}</td>
                                        <td><a href="/admin/edittransaction/{{$transaction->id}}">Edit</a></td>
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
