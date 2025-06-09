	@extends ('main')
	@section ('content')
	
	
	<br>
			<div class="alert mycolor1" role="alert">제품</div>
			
			<script>
				function find_text()
				{
					form1.action="#";
					form1.submit();
				}
			</script>
						
			<form name=	"form1" method="post" action="">
			
						
			<table class="table  table-bordered  table-sm  table-hover mymargin5">
				<tr>
					<td width="20%" class="mycolor2">번호</td>
					<td width="80%" align="left">{{ $row->id }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 구분명 </td>
					<td width="80%" align="left">{{ $row->gubun_name31 }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 제품명 </td>
					<td width="80%" align="left">{{ $row->name31 }} </td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 단가 </td>
					<td width="80%" align="left">{{ $row->price31 }} </td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">재고</td>
					<td width="80%" align="left">{{ $row->jaego31 }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">사진</td>
					<td width="80%" align="left">
					<b>파일이름</b> : {{ $row->pic31 }} <br>
					@if($row->pic31)    
						   <img src="{{ asset('storage/product_img/' . $row->pic31) }}"
								 width="200" class="img-fluid img-thumbnail margin5">
						@else            
							<img src=" " width="200" class="img-fluid img-thumbnail margin5">
						@endif
					</td>
				</tr>
				
			</table>
			
			

		<div  align="center">
			<a href="{{ route('product.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1"> 수정</a> 
			<form action="{{ route('product.destroy', $row->id) }}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('삭제할까요 ?');">삭제</button> 
			</form>

			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
	
	</form>
 	
	
	@endsection()
	
			