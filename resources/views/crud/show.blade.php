@extends('layouts.app')

@section('title', 'Show')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">TODOs
                    <a href="{{ route('crud.index') }}" class="pull-right">
                        <u>Back</u>
                    </a>
                </div>
                <div class="panel-body">
                    <table class="table">
                            <tr> 
                                <th>Foo</th>
                                <td>{{ $dt->foo }}</td>
                            </tr>
                            <tr>
                                <th>Bar</th>
                                <td>{{ $dt->bar }}</td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
