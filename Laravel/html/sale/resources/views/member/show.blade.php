	@extends ('main')
	@section ('content')
	
<?
		$tel1 = trim(substr($row->tel31,0,3));
		$tel2 = trim(substr($row->tel31,3,4));
		$tel3 = trim(substr($row->tel31,7,4));
		$tel31 = $tel1 . "-" . $tel2. "-" . $tel3;
		$rank31 = $row->rank31==0 ? '직원' : '관리자';
?>
	
	<br>
			<div class="alert mycolor1" role="alert">사용자</div>
			
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
						<font color='red'>*</font> 이름 </td>
					<td width="80%" align="left">{{ $row->name31 }} </td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 아이디 </td>
					<td width="80%" align="left">{{ $row->uid31 }} </td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 암호 </td>
					<td width="80%" align="left">{{ $row->pwd31 }} </td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 전화 </td>
					<td width="80%" align="left"> {{ $tel31 }} </td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 등급 </td>
					<td width="80%" align="left"> {{ $rank31 }} </td>
				</tr>
						
			</table>
			
			

		<div  align="center">
			<a href="{{ route('member.edit', $row->id) }}{{ $tmp }}" class="btn btn-sm mycolor1"> 수정</a> 
			<form action="{{ route('member.destroy', $row->id) }}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm mycolor1" 
						  onClick="return confirm('삭제할까요 ?');">삭제</button> 
			</form>

			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
	
	</form>
 	
	
	@endsection()
	
			