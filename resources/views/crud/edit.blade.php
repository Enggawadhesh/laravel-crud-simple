@extends('layouts.app')

@section('title', 'Update')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit TODOs</div>
                <div class="panel-body">
                    <form action="{{ route('crud.update', $edt->id) }}" method="POST">
                      {{ csrf_field() }} <!-- Varify csrf token -->
                      {{ method_field('PATCH') }} <!-- For patch data -->
                      <div class="form-group{{ $errors->has('ufoo') ? ' has-error' : '' }}">
                        <label for="exampleInputEmail1">Foo</label>
                        <input type="text" class="form-control" name="ufoo" value="{{ $edt->foo }}">
                        @if ($errors->has('ufoo'))
                          <span class="help-block">
                              <strong>{{ $errors->first('ufoo') }}</strong>
                          </span>
                        @endif
                      </div>
                      <div class="form-group{{ $errors->has('ubar') ? ' has-error' : '' }}">
                        <label for="exampleInputPassword1">Bar</label>
                        <input type="text" class="form-control" name="ubar" value="{{ $edt->bar }}">
                        @if ($errors->has('ubar'))
                          <span class="help-block">
                              <strong>{{ $errors->first('ubar') }}</strong>
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
