@extends('layouts.default')
@section('title', '列表页')

@section('content')
    <div class="header">
        <span>
            <span class="back-btn"><a class="glyphicon glyphicon-menu-left"></a>返回</span>
            <span class="school-results-note text-success">为您找到了{{ $count }}条结果</span>
            <span class="glyphicon glyphicon-search " id="search-school-btn">搜索院校</span>
        </span>
    </div>
@stop