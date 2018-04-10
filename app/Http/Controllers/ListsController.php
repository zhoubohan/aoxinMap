<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        'pm_code' => '邮编'
    );

    public function show()
    {
        return view('lists.show');
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function search(Request $request)
    {
        $request = $request->all();
        unset($request['_token']);
        $keys = array_keys($request);
        if (!in_array('page', $keys)) {
            $page = 0;
        }
        $searchData = array();
        $type = 'text/html';
        $throwData = array();
        foreach ($request as $key => $value) {
            if (!is_null($value)) {
                $searchData[$key] = rtrim($value, ',');
            }
        }
        //多条件搜索
        $handle = DB::table('schools');
        $handle->select('school_name','schoolId','ICSEA');
        foreach ($searchData as $k => $v) {
            if (strpos($v, ',')) {
                $v = explode(',',$v);
            }else {
                $v = array($v);
            }
            $searchData[$k] && $handle -> whereIn($k,  $v);
        }
        $count = count($handle->get()->toArray());
        if ($page == 0) {
            $handle->offset(0)->limit(10);
        } else {
            $offset = ($page - 1)*5 + 10;
            $handle->offset($offset)->limit(5);
        }
        $returnData = $handle->orderBy('ICSEA', 'desc')->get();
        $throwData = [
            'count' => $count,
            'schools' => $returnData
        ];
//        return redirect()->route('lists.results', ['data' => $returnData]);
        return response()->view('lists.results', $throwData, 200)->header('Content-type', $type);


    }

    public function results(Request $request)
    {
        print_r($request->data);
        return view('lists.list');
    }

    public function modalItem(Request $request)
    {

        $data[]['cate'] = '不限';
        $cateName = $request->cateName;
        if ($cateName == 'need_AEAS' || $cateName == 'need_face') {
            $data[]['cate'] = '需要';
            $data[]['cate'] = '不需要';
        }elseif ($cateName == 'pm_code') {
            $data[]['cate'] = '邮编';
        }else{
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
