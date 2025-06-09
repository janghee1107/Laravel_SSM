<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;			// Eloquent ORM



class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$text1 = $request->input('text1');			//	text1 값 알아냄
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		
		return view( 'picture.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Product::where('name31', 'like', '%'.$text1.'%')->
				orderby('name31','asc')->
				paginate(5)->appends(['text1'=>$text1]);
				
		return $result;

	}

	


	
	

	
}
