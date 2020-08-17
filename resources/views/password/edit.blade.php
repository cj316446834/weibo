@extends('layouts.default')
@section('title', '重置密码')

@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card ">
            <div class="card-header">
                <h5>重置密码</h5>
            </div>
            <div class="card-body">

                @include('shared._errors')

                <form method="POST" action="{{route('FindPasswordUpdate')}}">
                    {{ csrf_field() }}
                    <input type="text" hidden  name="token" value="{{$user['activation_token']}}"/>
                    <div class="form-group">
                        <label for="email">邮箱：</label>
                        <input type="text" disabled name="email" class="form-control" value="{{$user['email']}}">
                    </div>

                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">确认更新</button>
                </form>
            </div>
        </div>
    </div>
@stop