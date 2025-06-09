<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbuo;	      // Eloquent ORM
use App\Models\Jangbu;




class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$text1 = $request->input('text1');							//	text1 값 알아냄
		if (!$text1) $text1=date("Y-m-d", strtotime("-1 month"));	//	오늘기준 1달전 날짜
		
		$text2 = $request->input('text2');							//	text2 값 알아냄
		if (!$text2) $text2=date("Y-m-d");							//	오늘 날짜
		
		$data['text1'] = $text1;
		$data['text2'] = $text2;
        $list = $this->getlist($text1, $text2);		// 자료 읽기
		
		$str_label = "";
		$str_data= "";
		foreach ($list as $row)
		{
			$str_label  .= "'$row->gubuns_name31', ";
			$str_data  .= $row->cnumo31 .',';
		}
		$data["str_label"]=$str_label;
		$data["str_data"]=$str_data;
		
		return view( 'chart.index', $data );						// 자료 표시(view/jangbuo폴더의 index.blade.php)
    }
	
	public function getlist($text1,$text2)
	{   		
		$result = Jangbu::leftjoin('products','jangbus.products_id31','=','products.id')->
			leftjoin('gubuns','products.gubuns_id31','=','gubuns.id')->
			select('gubuns.name31 as gubuns_name31', DB::raw('sum(jangbus.numo31) as cnumo31') )->
				wherebetween('jangbus.writeday31', array($text1,$text2))->
				where('jangbus.io31','=',1)->
				orderby('cnumo31','desc')->
				 groupby('gubuns.name31')->
				 limit(14)->
				paginate(5)->appends(['text1'=>$text1,'text2'=>$text2]);
			
		return $result;

	}

	function getlist_product()
	{
	  $result=Product::orderby('name31')->get();
	  return $result;
	}


	
}
