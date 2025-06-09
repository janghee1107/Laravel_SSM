@extends('main')
@section('content')

<br>

			<div class="alert mycolor1" role="alert">사용자</div>
			
			<script>
				function find_text()
				{
					form1.action="#";
					form1.submit();
				}
			</script>
						
			<form name=	"form1" method="post" action="{{ route('member.update', $row->id) }}{{ $tmp }}">
			@csrf
			@method('PATCH');
			
			<table class="table  table-bordered  table-sm  table-hover mymargin5">
				<tr>
					<td width="20%" class="mycolor2">번호</td>
					<td width="80%" align="left">{{ $row->id }}</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 이름
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="name31" size="20" value="{{ $row->name31 }}" class="form-control form-control-sm">
						</div> @error('name31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 아이디
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="uid31" size="20" value="{{ $row->uid31 }}" class="form-control form-control-sm">
						</div> @error('uid31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 암호
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="pwd31" size="20" value="{{ $row->pwd31 }}" class="form-control form-control-sm">
						</div> @error('pwd31') {{ $message }} @enderror
					</td>
				</tr>
<?
		$tel1=trim(substr($row->tel31,0,3));
		$tel2=trim(substr($row->tel31,3,4));
		$tel3=trim(substr($row->tel31,7,4));
?>				
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 전화
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="tel1" size="3" maxlength="3" value="{{ $tel1 }}" class="form-control form-control-sm">-
							<input type="text" name="tel2" size="4" maxlength="4" value="{{ $tel2 }}" class="form-control form-control-sm">-
							<input type="text" name="tel3" size="4" maxlength="4" value="{{ $tel3 }}" class="form-control form-control-sm">
						</div>
					</td>
				</tr>
				<tr>
				<td width="20%" class="mycolor2">
						<font color='red'>*</font> 등급
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
					@if($row->rank31==0)	
							<input type="radio" name="rank31" value="0" checked>&nbsp;직원&nbsp; &nbsp; 
							<input type="radio" name="rank31" value="1" >&nbsp;관리자
					@else
							<input type="radio" name="rank31" value="0" >&nbsp;직원&nbsp; &nbsp; 
							<input type="radio" name="rank31" value="1" checked>&nbsp;관리자
					@endif		
						</div>
					</td>
				</tr>
						
			</table>
			

		<div  align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
		
		</form>


@endsection