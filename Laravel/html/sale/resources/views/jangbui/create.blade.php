@extends('main')
@section('content')

<br>

			<div class="alert mycolor1" role="alert">매입</div>
			
			<script>
				function find_text()
				{
					form1.action="#";
					form1.submit();
				}
				
				$(function() {
					$("#writeday31").datetimepicker({
						locale: "ko",
						format: "YYYY-MM-DD",
						defaultDate: moment()
					});
				});
				
				function select_product()
				{
					var str;
					str = form1.sel_products_id31.value;
					if (str == "")
					{
						form1.products_id31.value = "";
						form1.price31.value = "";
						form1.prices31.value = "";
					}
					else
					{
						str = str.split("^^");
						form1.products_id31.value = str[0];
						form1.price31.value = str[1];
						form1.prices31.value = Number(form1.price31.value) * Number(form1.numi31.value);
					}
				}
				
				function cal_prices31()
				{
					form1.prices31.value = Number(form1.price31.value) * Number(form1.numi31.value);
					form1.bigo31.focus();
				}
						
			</script>
						
			<form name=	"form1" method="post" action="{{ route('jangbui.store') }}{{ $tmp }}"
				enctype="multipart/form-data">
			@csrf
						
			<table class="table  table-bordered  table-sm  table-hover mymargin5">
				<tr>
					<td width="20%" class="mycolor2"><font color="red">*</font>날짜</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<div class="input-group  input-group-sm date" id="writeday31">
								<input type="text" name="writeday31" size="10" value="{{ old('writeday31') }}" 
								class="form-control form-control-sm">
								<div class="input-group-text">
									<div class="input-group-addon">
										<i class="far fa-calendar-alt fa-lg"></i>
									</div>
								</div>	
							</div>
						</div>
						@error('writeday31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 제품명
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="hidden" name="products_id31" value="{{ old('products_id31') }}">
							<select name="sel_products_id31" class="form-select form-control-sm" onchange="select_product();">
								<option value="" selected>선택하세요.</option>
							
							@foreach ($list as $row)
<?								
								$t1="$row->id^^$row->price31";		//	제품번호^^단가
								$t2="$row->name31($row->price31)";	//	제품이름(단가)
?>
								@if ( $row->id == old('products_id31') )
									<option value="{{ $t1 }}" selected>{{ $t2 }}</option>
								@else
									<option value="{{ $t1 }}">{{ $t2 }}</option>
								@endif
							@endforeach
									</select>							
						</div> @error('products_id31') {{ $message }} @enderror
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 단가 
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="price31" size="20" value="{{ old('price31') }}" 
								class="form-control form-control-sm" onChange="cal_prices31();">
						</div>
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 수량 
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="numi31" size="20" value="{{ old('numi31') }}" 
								class="form-control form-control-sm" onChange="cal_prices31();">
						</div> 
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'>*</font> 금액
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="prices31" size="20" value="{{ old('prices31') }}" 
								class="form-control form-control-sm" readonly>
						</div> 
					</td>
				</tr>
				<tr>
					<td width="20%" class="mycolor2">
						<font color='red'></font> 비고
					</td>
					<td width="80%" align="left">
						<div class="d-inline-flex">
							<input type="text" name="bigo31" size="20" value="{{ old('bigo31') }}" class="form-control form-control-sm">
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