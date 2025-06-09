<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Wbook;	      // Eloquent ORM



class WbookController extends Controller
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
		return view( 'wbook.index', $data );	// 자료 표시(view/wbook폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Wbook::where('name','like','%'.$text1.'%')->orderby('name','asc')->paginate(10)->appends(['text1' => $text1]);                            // Eloquent ORM
		return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['tmp'] = $this->qstring();
        return view('wbook.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//	Eloquent ORM을 이용하는 경우
    {
		$row = new Wbook;
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('wbook' .$tmp);		// 목록화면으로 이동

    }

	public function save_row(Request $request, $row)
	{
		$request->validate( [
								'name' => 'required|max:50',	
								'price' => 'required|numeric',
								'author' => 'required|max:50'	
							] ,
							[
								'name.required' => '이름은 필수입력입니다.',
								'price.required' => '가격은 필수입력입니다.',
								'author.required' => '저자는 필수입력입니다.',
								'name.max' => '50자 이내입니다.',
							] );
				
		$row->name = $request->input("name");	//	값 입력
		$row->author = $request->input("author");
		$row->price = $request->input("price");
		$row->exp = $request->input("exp");
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
        $data['row'] = Wbook::find( $id );                      // Eloquent ORM
		return view('wbook.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = Wbook::find( $id );                     // 자료 찾기
		return view('wbook.edit', $data );						// 수정화면 호출
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
        $row = Wbook::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('wbook' .$tmp);		// 목록화면으로 이동
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wbook::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('wbook' .$tmp);
    }
	
	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

	
}
