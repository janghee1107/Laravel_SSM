	@extends ('main')
	@section ('content')
	
	
	<br>
			<div class="alert mycolor1" role="alert">매출</div>
			
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
					<td width="20%" class="mycolor2">
						<font color='red'>*</font>날짜</td>
					<td width="80%" align="left">{{ $row->writeday31 }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 제품명 </td>
					<td width="80%" align="left">{{ $row->product_name31 }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 단가 </td>
					<td width="80%" align="left">{{ number_format($row->price31) }} </td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 수량 </td>
					<td width="80%" align="left">{{ number_format($row->numo31) }} </td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font>금액</td>
					<td width="80%" align="left">{{ number_format($row->prices31) }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">비고</td>
					<td width="80%" align="left">{{ $row->bigo31 }}</td>
				</tr>
				
			</table>
			
			

		<div  align="center">
			<a href="{{ route('jangbuo.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1"> 수정</a> 
			<form action="{{ route('jangbuo.destroy', $row->id) }}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('삭제할까요 ?');">삭제</button> 
			</form>

			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
	
	</form>
 	
	
	@endsection()
	
			