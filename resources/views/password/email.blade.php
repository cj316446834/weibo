@extends('layouts.default')
@section('title', '找回密码')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>找回密码</h5>
            </div>
            <div class="card-body">

                @include('shared._errors')

                <form method="post" action="{{route('FindPasswordSend')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="text" class="form-control" name="email">
                        <small id="helpId" class="form-text text-muted">请输入注册时的邮箱</small>
                    </div>

                    <button type="submit" class="btn btn-primary">找回密码!</button>
                </form>
            </div>
        </div>
    </div>
@stop