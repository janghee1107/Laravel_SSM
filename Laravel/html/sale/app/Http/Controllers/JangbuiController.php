<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;	
use App\Models\Jangbui;	      // Eloquent ORM
use App\Models\Jangbu;




class JangbuiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['tmp'] = $this->qstring();
		
		$text1 = request('text1');			//	text1 값 알아냄
		if (!$text1) $text1=date("Y-m-d");
		
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'jangbui.index', $data );	// 자료 표시(view/jangbui폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Jangbu::leftjoin('products', 'jangbus.products_id31', '=', 'products.id')->
			select('jangbus.*', 'products.name31 as product_name31')->
				where('jangbus.io31','=',0)->
				where('jangbus.writeday31', '=', $text1)->
				orderby('jangbus.id', 'desc')->
				paginate(5)->appends(['text1'=>$text1]);
				
		return $result;

	}

	function getlist_product()
	{
	  $result=Product::orderby('name31')->get();
	  return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['list'] = $this->getlist_product();

		$data['tmp'] = $this->qstring();
        return view('jangbui.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//	Eloquent ORM을 이용하는 경우
    {
		$row = new Jangbu;
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('jangbui' .$tmp);		// 목록화면으로 이동

    }

	public function save_row(Request $request, $row)
	{
		$request->validate( [
								'writeday31' => 'required|date',
								'products_id31' => 'required'
							] ,
							[
								'writeday31.required' => '날짜는 필수입력입니다.',
								'products_id31.required' => '제품명은 필수입력입니다.',
								'writeday31.date' => '날짜형식이 잘못되었습니다.',
							] );
							
		$row->io31		    = 0;
		$row->writeday31 	= $request->input("writeday31");	
		$row->products_id31 = $request->input("products_id31");
		$row->price31 		= $request->input("price31");
		$row->numi31 		= $request->input("numi31");
		$row->numo31 		= 0;
		$row->prices31 		= $request->input("prices31");
		$row->bigo31 		= $request->input("bigo31");
		
		$row->save();			// 저장
		
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$data['tmp'] = $this->qstring();
		
       $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id31', '=', 'products.id')->	 // Eloquent ORM
			select('jangbus.*', 'products.name31 as product_name31')->
				where('jangbus.id', '=', $id)->first();
                   
		return view('jangbui.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['list'] = $this->getlist_product();

		$data['tmp'] = $this->qstring();
        $data['row'] = Jangbu::find( $id );                     // 자료 찾기
		return view('jangbui.edit', $data );						// 수정화면 호출
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Jangbu::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('jangbui' .$tmp);		// 목록화면으로 이동
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jangbu::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('jangbui' .$tmp);
    }
	
	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

	
}
