<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbuo;	      // Eloquent ORM
use App\Models\Jangbu;




class CrosstabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$text1 = $request->input('text1');							//	text1 값 알아냄
		if (!$text1) $text1=date("Y");						
		
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		
		return view( 'crosstab.index', $data );						// 자료 표시(view/jangbuo폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   		
		$result = Jangbu::leftjoin('products','jangbus.products_id31','=','products.id')->
			select( 'products.name31 as product_name31', 
				DB::raw('sum( if(month(jangbus.writeday31)=1, jangbus.numo31,0) ) as s1,
					   sum( if(month(jangbus.writeday31)=2, jangbus.numo31,0) ) as s2,
					   sum( if(month(jangbus.writeday31)=3, jangbus.numo31,0) ) as s3,
					   sum( if(month(jangbus.writeday31)=4, jangbus.numo31,0) ) as s4,
					   sum( if(month(jangbus.writeday31)=5, jangbus.numo31,0) ) as s5,
					   sum( if(month(jangbus.writeday31)=6, jangbus.numo31,0) ) as s6,
					   sum( if(month(jangbus.writeday31)=7, jangbus.numo31,0) ) as s7,
                       sum( if(month(jangbus.writeday31)=8, jangbus.numo31,0) ) as s8,
					   sum( if(month(jangbus.writeday31)=9, jangbus.numo31,0) ) as s9,
					   sum( if(month(jangbus.writeday31)=10, jangbus.numo31,0) ) as s10,	
                       sum( if(month(jangbus.writeday31)=11, jangbus.numo31,0) ) as s11,					   
					   sum( if(month(jangbus.writeday31)=12, jangbus.numo31,0) ) as s12 ') )->
			where(DB::raw('year(jangbus.writeday31)'), '=', $text1)->
			where('jangbus.io31', '=', 1)->
			orderby('products.name31')->
			groupby('products.name31')->
			paginate(5)->appends( $text1 );

			
		return $result;

	}

	function getlist_product()
	{
	  $result=Product::orderby('name31')->get();
	  return $result;
	}


	
}
