@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{$breadcrumb}}</h2>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <notifications></notifications>
            </div>
        </div>
    </div>
@endsection
