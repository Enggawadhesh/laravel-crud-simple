@extends('layouts.app')

@section('title', 'Create')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create TODOs
                    <a href="{{ route('crud.index') }}" class="pull-right">
                        <u>Show</u>
                    </a>
                </div>
                <div class="panel-body">
                <!-- Show status after sucess -->
                  @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                  @endif
                <!-- End show status -->

                    <form action="{{ route('crud.store') }}" method="POST">
                      {{ csrf_field() }} <!-- Varify csrf token -->
                      <div class="form-group{{ $errors->has('foo') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Foo</label>
                        <input type="text" class="form-control" name="foo">
                        @if ($errors->has('foo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('foo') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('bar') ? ' has-error' : '' }}">
                        <label for="exampleInputPassword1">Bar</label>
                        <input type="text" class="form-control" name="bar">
                        @if ($errors->has('bar'))
                          <span class="help-block">
                              <strong>{{ $errors->first('bar') }}</strong>
                          </span>
                        @endif
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
