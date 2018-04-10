@extends('layouts.default')
@section('title', '列表页')

@section('content')
    <div class="header">
        <span>
            <span class="back-btn"><a class="glyphicon glyphicon-menu-left"></a>返回</span>
            <span class="school-results-note text-success">为您找到了{{ $count }}条结果</span>
            <span class="glyphicon glyphicon-sort btn btn-success" id="sort-btn">ICSEA</span>
        </span>
    </div>
    <div class="container whole_list" style="overflow: scroll" id="school-lists">
        <span class="key" id="key">{{ $key }}</span>
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
        <a id="toTop" title="back-to-top"></a>
    <script>
        $(function () {
            var _start = 0,
                _num = 5,
                _end = 0,
                _couter = 0,
                _key = $('#key').text(),
                _moreAPI = '{{ route('lists.search') }}';
            //下拉加载
            $('.school-lists').dropload({
                scrollArea: window,
                loadDownFn: function (me) {
                    $.ajax({
                        type: 'POST',
                        url: _moreAPI,
                        data: {key: _key, _token: '{{ csrf_token() }}'},
                        success: function (res) {
                            var data = res.data;
                            var _results = '';
                            _couter++;
                            _end = _num * _couter;
                            _start = _end - _num;
                            for (var i = _start; i < _end; i++) {
                                _results += "<tr><td><span class='glyphicon glyphicon-globe'></span></td><td>" + data[i].school_name + "</td><td><span class='label label-warning'>" + data[i].ICSEA + "</span></td></tr>";

                                if ((i + 1) >= data.length) {
                                    me.lock();
                                    me.noData();
                                    break;
                                }
                            }

                            $('.school-lists-table').append(_results);
                            me.resetload();
                        }

                    });
                }
            });
        });

        function toTop(objStr){
            // 向下滑动显示功能按钮组
            if(objStr == "window"){
                var obj = $(window);
            }else{
                var obj = $("#"+objStr);
            }
            obj.scroll(function() {
                if(objStr == "window"){
                    var T = $(document).scrollTop();//获取当前可视区域距离页面顶端的距离
                }else{
                    var T = Math.abs($("#twoLevel").offset().top);//获取元素区域距离页面顶端的距离
                }
                if(T > 100){
                    $('#toTop').fadeIn();
                };
                if(T <= 100){
                    $('#toTop').fadeOut();
                };
            });
            //当点击跳转链接后，回到页面顶部位置
            $("#toTop").click(function(){
                if(objStr == "window"){
                    $('body,html').scrollTop(0);
                }else{
                    $('#school-lists').animate({scrollTop:0},500);
                }
                $('#toTop').fadeOut();
                return false;
            });
        }
    </script>
@stop