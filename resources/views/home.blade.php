<!-- Page which is displayed after login as registered user -->

@extends('layouts.parent')

@section('content')

<!-- To get the role id of logined user -->
@php $role_id = \Auth::user()->role_id; @endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <!-- Success/Error Messages -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Conditioning for users with different users -->
                    @if($role_id == '1')
                        You are logged in as Admin
                    @elseif($role_id == '2')   
                        You are logged in as Parent 
                    @elseif($role_id == '3')   
                        You are logged in as Coach
                    @elseif($role_id == '4')
                        You are logged in as Child
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
