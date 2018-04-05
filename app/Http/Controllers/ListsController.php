<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\School;
use DB;

class ListsController extends Controller
{
    protected static $titleConf = array(
        'state' => '所属州名',
        'school_type' => '学校类型',
        'school_coop' => '合作情况',
        'Broading' => 'Broading',
        'IB_course' => 'IB课程',
    );

    public function show()
    {
        return view('lists.show');
    }

    public function modalItem(Request $request)
    {
        $data[]['cate'] = '不限';
        $cateName = $request->cateName;
        $items = DB::table('schools')
                ->select($cateName)
                ->where($cateName, '<>', null)
                ->groupBy($cateName)
                ->get();
        foreach ($items as $value) {
            $data[]['cate'] = $value->$cateName;
        }
        return response()->json([
            'title' => self::$titleConf[$cateName],
            'data' => $data
        ]);
    }
}
