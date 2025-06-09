@extends('main')
@section('content')

<br>

			<div class="alert mycolor1" role="alert">제품</div>
			
			<script>
				function find_text()
				{
					form1.action="#";
					form1.submit();
				}
			</script>
						
			<form name=	"form1" method="post" action="{{ route('product.store') }}{{ $tmp }}"
				enctype="multipart/form-data">
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
						<select name="gubuns_id31" class="form-select form-control-sm">
							<option value="" selected>선택하세요.</option>
							@foreach ($list as $row)
								@if ( $row->id == old('gubuns_id31') )
									<option value="{{ $row->id }}" selected>{{ $row->name31 }}</option>
								@else
									<option value="{{ $row->id }}">{{ $row->name31 }}</option>
								@endif
							@endforeach
									</select>							
						</div> @error('gubuns_id31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 제품명 
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="name31" size="20" value="{{ old('name31') }}" class="form-control form-control-sm">
						</div> @error('name31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 단가 
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="price31" size="20" value="{{ old('price31') }}" class="form-control form-control-sm">
						</div> @error('price31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 재고
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="jaego31" size="20" value="" class="form-control form-control-sm">
						</div> 
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 사진
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="file" name="pic31" size="20" value="" class="form-control form-control-sm">
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