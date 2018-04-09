@extends('layouts.default')
@section('title', '筛选列表页')

@section('content')
    <div class="header">
        <span>
            <span class="search-school-note text-warning">以下可以设置筛选条件查看相关院校哦！</span>
            <span class="glyphicon glyphicon-search " id="search-school-btn">搜索院校</span>
        </span>
    </div>
    <div class="container whole_list">
        <div class="row">
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="area" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="state">
                <label class="title_label">所属州名</label>
                <div class="state_img img_box">
                    <img src="/images/u94.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box state_selected">

                </div>
            </div>
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="pm_code" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="pm_code">
                <label class="title_label">邮编</label>
                <div class="pm_code_img img_box">
                    <img src="/images/u101.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box pm_code_selected">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="school_gov" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="school_gov">
                <label class="title_label">公立/私立</label>
                <div class="school_gov_img img_box">
                    <img src="/images/u108.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box school_gov_selected">

                </div>
            </div>
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="open_grade" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="open_grade">
                <label class="title_label">开设年级</label>
                <div class="open_grade_img img_box">
                    <img src="/images/u117.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box open_grade_selected">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="IB_course" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="IB_course">
                <label class="title_label">IB课程</label>
                <div class="IB_course_img img_box">
                    <img src="/images/u126.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box IB_course_selected">

                </div>
            </div>
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="school_type" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="school_type">
                <label class="title_label">学校类型</label>
                <div class="school_type_img img_box">
                    <img src="/images/u133.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box school_type_selected">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="Broading" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="Broading">
                <label class="title_label">Broading</label>
                <div class="Broading_img img_box">
                    <img src="/images/u140.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box Broading_selected">

                </div>
            </div>
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="school_coop" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="school_coop">
                <label class="title_label">合作情况</label>
                <div class="school_coop_img img_box">
                    <img src="/images/u149.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box school_coop_selected">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="need_AEAS" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="need_AEAS">
                <label class="title_label">是否需要AEAS</label>
                <div class="need_AEAS_img img_box">
                    <img src="/images/u157.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box need_AEAS_selected">

                </div>
            </div>
            <div class="col-xs-6 col-sm-4 view-block checkboxs-modal" id="need_face" data-toggle="modal" data-target=".bs-example-modal-sm" data-whatever="need_face">
                <label class="title_label">是否需要面试</label>
                <div class="need_face_img img_box">
                    <img src="/images/u172.png" class="img-responsive" alt="Responsive image">
                </div>
                <div class="selected_box need_face_selected">

                </div>
            </div>
        </div>
        <div class="footer">
            <button type="button" class="btn btn-success btn-block confirm-btn">确定</button>
        </div>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary save-btn">确定</button>
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
            $.getJSON(modalAPI, {cateName: _cateName}, function (json) {
                _modal.find('.modal-title').html(json.title);
                var _boxtype, _item;
                if (_cateName !== 'pm_code') {
                    if (_cateName === 'school_gov' || _cateName === 'open_grade' || _cateName === 'need_AEAS' || _cateName === 'need_face') {
                        _boxtype = 'radio';
                    } else {
                        _boxtype = 'checkbox';
                    }

                    $.each(json.data, function (i, item) {
                        _item = "<li class='list-group-item checkbox-item'><input type='" + _boxtype + "' value='" + item.cate + "' name='"+_cateName+"'>" + item.cate + "</li>";
                        _listItem.append(_item);
                    });
                } else {
                    _item = "<li class='list-group-item checkbox-item'><input type='text' name='pm_code' value='' id='pm_code_input'></li>";
                    _listItem.append(_item);
                }

            });
        });
        $('#modalList').on('shown.bs.modal', function (e) {
            var _modal = $(this);
            var _div = $(e.relatedTarget);
            var _cateType = _div.data('whatever');
            var _selectedArea = $('.'+_cateType+'_selected');
            var _selectedStr = '';
            var _strHtml = '';
            var _imgDiv = $("."+_cateType+"_img");
            $('.save-btn').on('click', function (e) {
                $("input[name='"+_cateType+"']:checked").each(function () {
                    _selectedStr+= $(this).val() + ',';
                });
                _selectedStr = _selectedStr.substring(0, _selectedStr.length-1);
                _modal.modal('hide');
                _selectedArea.show();
                _imgDiv.hide();
                _div.find('.title_label').css('background-color','#ecb03c');
                _strHtml = "<p class='selected_str'>"+_selectedStr+"</p>";
                _selectedArea.html(_strHtml);
            });
        })
    </script>
@stop
