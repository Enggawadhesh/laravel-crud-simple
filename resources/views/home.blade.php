@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dashboard
                    <a href="{{ route('crud.index') }}" class="pull-right">
                        <u>Go To CRUD</u>
                    </a>
                </div>

                <div class="panel-body">
                    Hi <b>{{ Auth::user()->name }}</b> You are logged in!
                    <br>
                    Your Email is- <b>{{ Auth::user()->email }}</b>
                    <br>
                    Your Mobile is- <b>{{ Auth::user()->mobile }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
