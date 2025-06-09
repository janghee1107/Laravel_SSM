	@extends ('main')
	@section ('content')
	
			<script>
							function find_text()
							{
								form1.action="";
								form1.submit();
							}
			</script>
	
			<form name=	"form1" method="get" action="">
			@csrf
				<div class="row">
					<div class="col-3" align="left">     
					
						<div class="input-group  input-group-sm">
							<span class="input-group-text">검색</span>
							<input type="text" name="text1" value="{{$text1}}" class="form-control" placeholder="찾을 책?" onKeydown="if (event.keyCode == 13) { find_text(); }" >
							<button class="btn mycolor1" type="button" onClick="find_text();">Search</button>
						</div>

					</div>
					<div class="col-9" align="right">   
					
						 <a href="{{ route('jbook.create') }}{{ $tmp }}" class="btn btn-sm mycolor1">추가</a>

					</div>
				</div>
			</form>
&nbsp;
<!--  제품 사진/정보(제품명,가격,옵션)  -->
				<table class="table  table-bordered  table-sm  table-hover mymargin5">
					<tr class="mycolor2">
						<td width="10%">일본도서 번호</td>
						<td width="40%">책 이름</td>
						<td width="30%">저자</td>
						<td width="20%">단가</td>
					</tr>

		
@foreach($list as $row)
						<tr>
							<td>{{ $row->id }}</td>
							<td><a href="{{ route('jbook.show', $row->id) }}{{ $tmp }}">{{ $row->name }}<a></td>
							<td>{{ $row->author }}</td>
							<td>{{ $row->price }}</td>
						</tr>
@endforeach
						
					</table>

			
<br><br><br><br>


		<div class="row">
			<div class="col">
			{{ $list->links('mypagination') }}
			</div>
		</div>
		
		@endsection()