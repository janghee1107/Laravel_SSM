<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Product;	      // Eloquent ORM
use App\Models\Gubun;			// Eloquent ORM
use Image;



class ProductController extends Controller
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
		return view( 'product.index', $data );	// 자료 표시(view/product폴더의 index.blade.php)
    }
	
	public function getlist($text1)
	{   
		$result = Product::leftjoin('gubuns', 'products.gubuns_id31', '=', 'gubuns.id')->
			select('products.*', 'gubuns.name31 as gubun_name31')->
				where('products.name31', 'like', '%' . $text1 . '%')->
				orderby('products.name31', 'asc')->
				paginate(5)->appends(['text1'=>$text1]);
				
		return $result;

	}

	function getlist_gubun()
	{
	  $result=Gubun::orderby('name31')->get();
	  return $result;
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['list'] = $this->getlist_gubun();

		$data['tmp'] = $this->qstring();
        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)	//	Eloquent ORM을 이용하는 경우
    {
		$row = new Product;
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('product' .$tmp);		// 목록화면으로 이동

    }

	public function save_row(Request $request, $row)
	{
		$request->validate( [
								'gubuns_id31' => 'required|numeric',
								'name31' => 'required|max:20',	
								'price31' => 'required|numeric'
							] ,
							[
								'gubuns_id31.required' => '구분명은 필수입력입니다.',
								'name31.required' => '이름은 필수입력입니다.',
								'price31.required' => '단가는 필수입력입니다.',
								'name31.max' => '50자 이내입니다.',
							] );
							
		$row->gubuns_id31 = $request->input("gubuns_id31");	//	값 입력		
		$row->name31 = $request->input("name31");	
		$row->price31 = $request->input("price31");
		$row->jaego31 = $request->input("jaego31");
		if ($request->hasFile('pic31'))	         // upload할 파일이 있는 경우
		{
			$pic = $request->file('pic31');
			$pic_name = $pic->getClientOriginalName();             // 파일이름
			$pic->storeAs('public/product_img', $pic_name);        // 파일저장
			
			$img = Image::make($pic)
			->resize(null, 200, function($constrain) { $constrain->aspectRatio(); })
			->save('storage/product_img/thumb/' .$pic_name);
			
			$row->pic31 = $pic_name;                     // pic 필드에 파일이름 저장
		}

		
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
		
       $data['row'] = Product::leftjoin('gubuns', 'products.gubuns_id31', '=', 'gubuns.id')->	 // Eloquent ORM
			select('products.*', 'gubuns.name31 as gubun_name31')->
				where('products.id', '=', $id)->first();
                   
		return view('product.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['list'] = $this->getlist_gubun();

		$data['tmp'] = $this->qstring();
        $data['row'] = Product::find( $id );                     // 자료 찾기
		return view('product.edit', $data );						// 수정화면 호출
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
        $row = Product::find($id);
		$this->save_row($request, $row);
		
		$tmp = $this->qstring();
		return redirect('product' .$tmp);		// 목록화면으로 이동
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find( $id )->delete();
		
		$tmp = $this->qstring();
		return redirect('product' .$tmp);
    }
	
	public function jaego31()
	{
		DB::statement('drop table if exists temps;');
		DB::statement('create table temps (
		id int not null auto_increment,
		products_id31 int,
		jaego31 int default 0,
		primary key(id) ); ');
		DB::statement('update products set jaego31=0;');
		DB::statement('insert into temps (products_id31, jaego31)
		select products_id31, sum(numi31)-sum(numo31)
		from jangbus
		group by products_id31;');
		DB::statement('update products join temps
		on products.id=temps.products_id31
		set products.jaego31=temps.jaego31;');
		
		return redirect('product');
	}
	
	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

	
}
