<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Member;	      // Eloquent ORM



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if (session()->get("rank31")!=1) return redirect("/");
		$data['tmp'] = $this->qstring();
		
		$text1 = request('text1');			//	text1 값 알아냄
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'member.index', $data );	// 자료 표시(view/member폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Member::where('name31','like','%'.$text1.'%')->orderby('name31','asc')->paginate(10)->appends(['text1' => $text1]);                            // Eloquent ORM
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
        return view('member.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//	Eloquent ORM을 이용하는 경우
    {
		$row = new Member;
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('member' .$tmp);		// 목록화면으로 이동

    }

	public function save_row(Request $request, $row)
	{
		$request->validate( [
								'name31' => 'required|max:20',	
								'uid31' => 'required|max:20',
								'pwd31' => 'required|max:20',
							] ,
							[
								'name31.required' => '이름은 필수입력입니다.',
								'uid31.required'  => '아이디는 필수입력입니다.',
								'pwd31.required' => '암호는 필수입력입니다.',
								'name31.max' => '20자 이내입니다.',
								'uid31.max'  => '20자 이내입니다.',
								'pwd31.max' => '20자 이내입니다.',
							] );

        $tel1= $request->input("tel1");
		$tel2= $request->input("tel2");
		$tel3= $request->input("tel3");
		$tel31 = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기
		
		
		$row->uid31 = $request->input("uid31");	// 값 입력 
		$row->pwd31 = $request->input("pwd31");
		$row->name31 = $request->input("name31");
		$row->tel31 = $tel31;
		$row->rank31 = $request->input("rank31");
		
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
        $data['row'] = Member::find( $id );                      // Eloquent ORM
		return view('member.show', $data );
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
        $data['row'] = Member::find( $id );                     // 자료 찾기
		return view('member.edit', $data );						// 수정화면 호출
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
        $row = Member::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('member' .$tmp);		// 목록화면으로 이동
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('member' .$tmp);
    }
	
	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

	
}
