<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    protected static $titleConf = array(
        'state' => '所属州名',
        'school_type' => '学校类型',
        'school_coop' => '合作情况',
        'Broading' => 'Broading',
        'IB_course' => 'IB课程',
        'school_gov' => '公私立',
        'open_grade' => '开设年级',
        'need_AEAS' => '是否需要AEAS',
        'need_face' => '是否需要面试',
    );

    public function show()
    {
        return view('lists.show');
    }

    public function modalItem(Request $request)
    {

        $data[]['cate'] = '不限';
        $cateName = $request->cateName;
        if ($cateName == 'need_AEAS' || $cateName == 'need_face') {
            $data[]['cate'] = '需要';
            $data[]['cate'] = '不需要';
        }else {

        $items = DB::table('schools')
            ->select($cateName)
            ->where($cateName, '<>', null)
            ->groupBy($cateName)
            ->get();
        foreach ($items as $value) {
            $data[]['cate'] = $value->$cateName;
        }

        }

        return response()->json([
            'title' => self::$titleConf[$cateName],
            'data' => $data,
        ]);
    }
}
