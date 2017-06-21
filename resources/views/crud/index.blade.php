@extends('layouts.app')

@section('title', 'Crud')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">TODOs
                    <a href="{{ route('crud.create') }}" class="pull-right">
                        <u>Create</u>
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

                    <table class="table">
                        <thead> 
                            <tr> 
                                <th>Foo</th>
                                <th>Bar</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach($datas as $data)
                                <tr>
                                  <td>{{ $data->foo }}</td>
                                  <td>{{ $data->bar }}</td>
                                  <td>

                                    <a href="{{ route('crud.show', $data->id) }}" class="btn btn-primary">Show</a>
                                  
                                </td>
                                  <td>

                                    <a href="{{ route('crud.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                                  
                                </td><td>
                                    <form action="{{ route('crud.destroy', $data->id) }}" method="POST">
                                    {{ csrf_field() }} <!-- Varify csrf token -->
                                    {{ method_field('DELETE') }} <!-- For Patch data -->
                                        <button type="submit" class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                  </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table> 

                    {!! $datas->links() !!}  <!-- With is laravel automatic create pagination link '$datas' from crudcontroller -->
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
