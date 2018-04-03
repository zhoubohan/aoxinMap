@extends('layouts.default')
@section('title','登陆')

@section('content')
    <div class="login container-fluid">
        <div class="col-md-offset-1 col-md-11 login-panel">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>澳新选校宝</h2>
                    <ol class="breadcrumb">
                        <li class="active ">登陆</li>
                        <li>如果您还没账号，请<a href="{{ route('signup') }}">注册</a></li>
                    </ol>
                </div>
                <form action="{{route('login')}}" method="POST">
                    {{ csrf_field() }}
                    @include('shared._errors')
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
                        <button type="submit" class="btn btn-success login-button">
                            登陆
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop