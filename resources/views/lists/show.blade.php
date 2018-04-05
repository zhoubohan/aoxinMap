@extends('layouts.default')
@section('title', '筛选列表页')

@section('content')
    <div class="header">
        <span>
            <span class="search-school-note">以下可以设置筛选条件查看相关院校哦！</span>
            <span class="glyphicon glyphicon-search " id="search-school-btn">搜索院校</span>
        </span>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="area" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="state">
            所属州名
        </div>
        <div class="col-xs-6 col-sm-4 view-block">

        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="IB_course" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="IB_course">
            IB课程
        </div>
        <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="school_type" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="school_type">
            学校类型
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="Broading" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="Broading">
            Broading
        </div>
        <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="school_coop" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="school_coop">
            合作情况
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-4 view-block">

        </div>
        <div class="col-xs-6 col-sm-4 view-block">

        </div>
    </div>
    <div class="footer">
        <button type="button" class="btn btn-success btn-lg btn-block confirm-btn">确定</button>
    </div>
    <!-- Modal列表框，单选多选 -->
    <div class="modal fade bs-example-modal-sm modalList" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="modalList">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <ul class="list-group">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-sm modalList" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="singleModal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <ul class="list-group">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        //模态框接口地址
        var modalAPI = "{{ route('lists.modalItem') }}";
        $('#modalList').on('show.bs.modal',function (e) {
            var _modal = $(this);
            var _button = $(e.relatedTarget);
            var _cateName = _button.data('whatever');
            var _listItem = _modal.find('.list-group');
            _listItem.html('');
            $.getJSON(modalAPI, {cateName:_cateName}, function (json) {
                _modal.find('.modal-title').html(json.title);
                $.each(json.data, function (i, item) {
                    var _item = "<li class='list-group-item checkbox-item'><input type='checkbox' value='"+item.cate+"'>"+ item.cate + "</li>";
                    _listItem.append(_item);

                });
            });

        });
    </script>
@stop