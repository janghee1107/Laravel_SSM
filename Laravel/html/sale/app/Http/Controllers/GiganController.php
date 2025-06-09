<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbuo;	      // Eloquent ORM
use App\Models\Jangbu;




class GiganController extends Controller
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
		
		$text3 = $request->input('text3');							//	text3 값 알아냄
		if (!$text3) $text3=0;										//	전체 제품
		
		$data['text1'] = $text1;
		$data['text2'] = $text2;
		$data['text3'] = $text3;
        $data['list'] = $this->getlist($text1, $text2, $text3);		// 자료 읽기
		
		$data['list_product'] = $this->getlist_product();			// 콤보상자용 제품정보
		return view( 'gigan.index', $data );						// 자료 표시(view/jangbuo폴더의 index.blade.php)
    }
	
	public function getlist($text1,$text2,$text3)
	{   
		if ($text3==0)       // 제품이 전체인 경우
			$result = Jangbu::leftjoin('products','jangbus.products_id31','=','products.id')->
				select('jangbus.*','products.name31 as product_name31')->
					 wherebetween( 'jangbus.writeday31', array($text1,$text2) )->
				   orderby('jangbus.id','desc')->
				   paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3] );
		else
			$result = Jangbu::leftjoin('products','jangbus.products_id31','=','products.id')->
				select('jangbus.*','products.name31 as product_name31')->
					 wherebetween( 'jangbus.writeday31', array($text1,$text2) )->
					 where('jangbus.products_id31', "=", $text3)->
				   orderby('jangbus.id','desc')->
					paginate(5)->appends( ['text1'=>$text1,'text2'=>$text2,'text3'=>$text3] );



				
		return $result;

	}

	function getlist_product()
	{
	  $result=Product::orderby('name31')->get();
	  return $result;
	}


	
}
