@extends('layouts/app')
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <form class="form-horizontal" method="POST" action="{{ url('/email') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label class="col-md-3 col-md-offset-1">Name</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="name">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 col-md-offset-1">UserName</label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name="username">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-3 col-md-offset-1">Email</label>
                <div class="col-md-7">
                    <input class="form-control" type="email" name="email">
                </div>
            </div>
            
            <div>
                <button type="submit" class="btn btn-success">Send</button>
            </div>
            
        </form>
    </div>
</div>

@endsection