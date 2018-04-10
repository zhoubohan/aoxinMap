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
    <div class="container whole_list" style="overflow: scroll">
        <span class="query" id="query">{{ $query }}</span>
        <div class="school-lists">
            <table class="table school-lists-table">
                @foreach($schools as $school)
                    <tr>
                        <td><span class="glyphicon glyphicon-globe"></span></td>
                        <td>{{ $school->school_name }}</td>
                        <td><span class="label label-warning">{{ $school->ICSEA }}</span></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        var _start = 0,
            _end = 0,
            _couter = 0,
            _query = $('#query').text(),
            _moreAPI = '{{ route('lists.search') }}';
        //下拉加载
        $('.school-lists').dropload({
            scrollArea: window,
            loadDownFn: function (me) {
                $.ajax({
                    type: 'POST',
                    url: _moreAPI,
                    data: {query: _query, _token: '{{ csrf_token() }}' },
                    success: function (data) {

                    }

                });
            }
        });
    </script>
@stop