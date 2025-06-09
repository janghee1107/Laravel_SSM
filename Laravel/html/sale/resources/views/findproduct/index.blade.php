	@extends ("main_nomenu")
	@section ("content")
	
		<br>	
			<div class="alert mycolor1" role="alert">제품 선택</div>
			
			<script>
				function find_text()
				{
					form1.action="{{ route('findproduct.index') }}";
					form1.submit();
				}
				
				function SendProduct(id, name31, price31)
				{
					opener.form1.products_id31.value = id;                // ①
					opener.form1.product_name31.value = name31;       // ②
					opener.form1.price31.value = price31;                       // ③
					opener.form1.prices31.value = Number(price31) * Number(opener.form1.numo31.value);
					self.close();
				}

			</script>
			
			<form name=	"form1" method="get" action="">
			@csrf
				<div class="row">
					<div class="col-6" align="left">     
					
						<div class="input-group  input-group-sm">
							<div class="input-group-prepend">
								<span class="input-group-text">이름</span>
							</div>
							<input type="text" name="text1" value="{{$text1}}" class="form-control" 
							onKeydown="if (event.keyCode == 13) { find_text(); }" >
							<span class="input-group-append">
								<button class="btn mycolor1" type="button" 
								onClick="find_text();">검색</button>
							</span>
						</div>

					</div>
					<div class="col-6" align="right">   
					

					</div>
				</div>
			</form>
			
			<table class="table  table-bordered  table-sm  table-hover mymargin5">
				<tr class="mycolor2">
					<td width="10%">번호</td>
					<td width="20%">구분명</td>
					<td width="30%">제품명</td>
					<td width="20%">단가</td>
					<td width="20%">재고</td>
					</tr>
					
					@foreach ( $list  as  $row )       

					<tr>
						<td>{{ $row->id }}</td>
						<td>{{ $row->gubun_name31 }}</td>
						<td align="left">
							<a href="javascript:SendProduct( {{ $row->id }}, '{{$row->name31}}', {{$row->price31}} );">
								{{ $row->name31 }}
							</a>
						</td>
						<td>{{ $row->price31 }}</td>
						<td>{{ $row->jaego31 }}</td>
					</tr>
					@endforeach
				
			</table>

		<div class="row">
			<div class="col">
			{{ $list->links('mypagination') }}
			</div>
		</div>
		
		@endsection()