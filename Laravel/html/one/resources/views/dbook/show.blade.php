	@extends ('main')
	@section ('content')
	
			<script>
							function find_text()
							{
								form1.action="";
								form1.submit();
							}
			</script>
	
			<form name=	"form1" method="post" action="">

				
&nbsp;
<!--  제품 사진/정보(제품명,가격,옵션)  -->
				<table class="table  table-bordered  table-sm  table-hover mymargin5">
					<tr class="mycolor2">
						<tr>
							<td width="20%" class="mycolor2">국내도서 번호</td>
							<td width="80%" align="left">{{ $row->id }}</td>
						</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 책 이름	</td>
							<td width="80%" align="left">{{ $row->name}}</td>
						</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 저자	</td>
							<td width="80%" align="left">{{ $row->author}}</td>
						</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 단가	</td>
							<td width="80%" align="left">{{ $row->price}}</td>
						</tr>
						<tr style="height: 300px;">
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 설명</td>
							<td width="80%" align="left">{{ $row->exp}}</td>
						</tr>
						
					</table>
					
					<div  align="center">
						<a href="{{ route('dbook.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1"> 수정</a> 
						<form action="{{ route('dbook.destroy', $row->id) }}">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-sm mycolor1" 
									  onClick="return confirm('삭제할까요 ?');">삭제</button> 
						</form>

						<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
					</div>
					
					</form>

<br><br><br><br>


		
		@endsection()