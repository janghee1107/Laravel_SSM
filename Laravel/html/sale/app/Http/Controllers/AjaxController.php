<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Gubun;	      // Eloquent ORM
use Response;



class AjaxController extends Controller
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
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'ajax.index', $data );	// 자료 표시(view/gubun폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Gubun::where('name31','like','%'.$text1.'%')->orderby('name31','asc')->paginate(10)->appends(['text1' => $text1]);                            // Eloquent ORM
		return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//	Eloquent ORM을 이용하는 경우
    {
		$row = new Gubun;
		$this->save_row($request, $row);

		return response()->json($row);		// 목록화면으로 이동

    }

	public function save_row(Request $request, $row)
	{
		$request->validate( [
								'name31' => 'required|max:20',	
							] ,
							[
								'name31.required' => '이름은 필수입력입니다.',
								'name31.max' => '20자 이내입니다.',
							] );
				
		$row->name31 = $request->input("name31");	//	값 입력
		
		$row->save();			// 저장
		
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $row = Gubun::find($id);
		$this->save_row($request, $row);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gubun::find( $id )->delete();

    }
	
	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

	
}
