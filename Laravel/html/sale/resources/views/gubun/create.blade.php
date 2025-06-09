@extends('main')
@section('content')

<br>

			<div class="alert mycolor1" role="alert">구분</div>
			
			<script>
				function find_text()
				{
					form1.action="#";
					form1.submit();
				}
			</script>
						
			<form name=	"form1" method="post" action="{{ route('gubun.store') }}{{ $tmp }}">
			@csrf
						
			<table class="table  table-bordered  table-sm  table-hover mymargin5">
				<tr>
					<td width="20%" class="mycolor2">번호</td>
					<td width="80%" align="left"></td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 구분명
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="name31" size="20" value="{{ old('name31') }}" class="form-control form-control-sm">
						</div> @error('name31') {{ $message }} @enderror
					</td>
				</tr>
						
			</table>
			

		<div  align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
		
		</form>


@endsection