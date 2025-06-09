<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbuo;	      // Eloquent ORM
use App\Models\Jangbu;




class BestController extends Controller
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
        $data['list'] = $this->getlist($text1, $text2);		// 자료 읽기
		
		return view( 'best.index', $data );						// 자료 표시(view/jangbuo폴더의 index.blade.php)
    }
	
	public function getlist($text1,$text2)
	{   		
		$result = Jangbu::leftjoin('products','jangbus.products_id31','=','products.id')->
			select('products.name31 as product_name31', DB::raw('sum(jangbus.numo31) as cnumo31') )->
				wherebetween('jangbus.writeday31', array($text1,$text2))->
				where('jangbus.io31','=',1)->
				orderby('cnumo31','desc')->
				 groupby('products.name31')->
				paginate(5)->appends(['text1'=>$text1,'text2'=>$text2]);
			
		return $result;

	}

	function getlist_product()
	{
	  $result=Product::orderby('name31')->get();
	  return $result;
	}


	
}
