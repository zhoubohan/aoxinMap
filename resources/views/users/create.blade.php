@extends('layouts.default')
@section('title', '注册')
@section('content')
    <div class="col-md-offset-1 col-md-11">
        <div class="panel panel-default">
            <div class="panel-heading">
                注册
            </div>
            <form action="{{route('users.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="panel-body">
                    @include('shared._errors')
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">姓名</span>
                        <input type="text" class="form-control" placeholder="username" aria-describedby="basic-addon1" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon">邮箱</span>
                        <input type="text" class="form-control" placeholder="email" aria-describedby="basic-addon2" name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">密码</span>
                        <input type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1" name="password" value="{{ old('password') }}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">确认密码</span>
                        <input type="password" class="form-control" placeholder="confirm_password" aria-describedby="basic-addon1" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    </div>
                </div>
                <div class="panel-body">
                    <button type="submit" class="btn btn-primary">
                        注册
                    </button>
                </div>

            </form>
        </div>
    </div>
@stop