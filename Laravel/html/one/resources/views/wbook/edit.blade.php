	@extends ('main')
	@section ('content')
	
			<script>
							function find_text()
							{
								form1.action="";
								form1.submit();
							}
			</script>
	
			<form name=	"form1" method="post" action="{{ route('wbook.update', $row->id) }}{{ $tmp }}">
			@csrf
			@method('PATCH')
			
				
&nbsp;
<!--  제품 사진/정보(제품명,가격,옵션)  -->
				<table class="table  table-bordered  table-sm  table-hover mymargin5">
										<tr>
						<td width="20%" class="mycolor2">서양도서 번호</td>
						<td width="80%" align="left">{{ $row->id }}</td>
					</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 책 이름
							</td>
							<td width="80%" align="left">
								<div class="d-inline-flex">
									<input type="text" name="name" size="20" value="{{ $row->name }}" class="form-control form-control-sm">
								</div> @error('name') {{ $message }} @enderror
							</td>
						</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 저자 
							</td>
							<td width="80%" align="left">
								<div class="d-inline-flex">
									<input type="text" name="author" size="20" value="{{ $row->author }}" class="form-control form-control-sm">
								</div> @error('author') {{ $message }} @enderror
							</td>
						</tr>
						<tr>
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 단가 
							</td>
							<td width="80%" align="left">
								<div class="d-inline-flex">
									<input type="text" name="price" size="20" value="{{ $row->price }}" class="form-control form-control-sm">
								</div> @error('price') {{ $message }} @enderror
							</td>
						</tr>
						<tr style="height: 300px;">
							<td width="20%" class="mycolor2">
								<font color='red'>*</font> 설명
							</td>
							<td width="80%" align="left">
								<div class="d-inline-flex">
									<textarea name="exp" rows="3" class="form-control form-control-sm" style="height: 300px; width: 500px;">{{ $row->exp }}</textarea>
								</div> 
							</td>
						</tr>
						
					</table>

			
<br><br><br><br>


<div  align="center">
			<input type="submit" value="저장" class="btn btn-sm mycolor1"> &nbsp;
			<input type="button" value="이전화면으로" class="btn btn-sm mycolor1" onClick="history.back();">
		</div>
		
		</form>


@endsection