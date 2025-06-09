<!---------------------------------------------------------------------------------------------
	제목 : Laravel Framework 실무 (개별프로젝트 실습용 디자인 HTML)

	소속 : 인덕대학교 컴퓨터소프트웨어학과
	이름 : 교수 윤형태 (2023.10.30)
---------------------------------------------------------------------------------------------->
<!doctype html>
<html lang="kr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Induk Book.wiki</title>
	<link  href="{{ asset('my/css/bootstrap.min.css') }}" rel="stylesheet">
	<link  href="{{ asset('my/css/my.css" rel="stylesheet') }}">
	<script src="{{ asset('my/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('my/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

<div class="container">
<!-------------------------------------------------------------------------------------------->	
<!--  Title과  상단메뉴(홈/로그인) -->
<div class="row">
	<div class="col fs-3" align="left">
		&nbsp;<a href="http://gamejigix.induk.ac.kr/~sale31/one/public"><font color="#777777">Induk Book.wiki</font></a>
	</div>

</div>

<!-- Main Image -->
<div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content" align="left">
                        <div class="thumb">
                            <div class="inner-content">
                                <h5>인덕대생들이 자유롭게 이용가능하며, 작성과 수정이 가능합니다. </h5>
								<br><br>
                                <span style="font-size: 20px;">[경고문]</span>
								<br>
								<span style="font-size: 15px;">1. 본 사이트에서 제공하는 정보는 다른 사용자들이 추가하거나 수정할 수 있습니다.  </span>
								<br>
								<span style="font-size: 15px;">따라서, 정보의 정확성을 100% 보장할 수 없습니다. </span>
								<br>
								<span style="font-size: 15px;">2. 다른 사용자를 비방하거나, 모욕하는 내용의 게시글은 금지되어 있습니다.  </span>
								<br>
								<span style="font-size: 15px;">서로를 존중하는 문화를 만들어주세요.</span>
								<br>
								<span style="font-size: 15px;">3. 개인정보를 공유하는 것은 금지되어 있습니다.</span>
								<br>
								<span style="font-size: 15px;"> 자신이나 다른 사람의 개인정보를 보호해 주세요.</span>
                            </div>
                            <img src="{{ asset('public/storage/product_img/left-banner-image.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>베르나르 베르베르</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>지식의 사다리</h4>
                                                <p>지식이란, 아는 것을 안다는 것을 아는 것이다.</p>
                                            </div>
                                        </div>
                                        <img src="public/my/images/main1.jpg"  alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>히사시노 게이고</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>나미야 잡화점의 기적</h4>
                                                <p>어떤 결정이든 그 순간에 최선이라고 생각하고 결정한 것이다. 그래서 후회하지 않아.</p>
                                            </div>
                                        </div>
                                        <img src="html/one/public/storage/product_img/left-banner-image.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>윌 슈왈츠</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>독서의 힘</h4>
                                                <p>독서는 전체적인 인격을 건설하는데 필요한 재료를 제공한다.</p>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-03.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>요한 볼프강 폰 괴테</h4>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>파우스트</h4>
                                                <p>마음이 알고 싶어하는 대로 배울 수 있는 자유, 그것이야말로 진정한 행복이다.</p>
                                            </div>
                                        </div>
                                        <img src="assets/images/baner-right-image-04.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

			
<!--  Category 메뉴 -->
<div class="row bg-light m-0 p-1 fs-6 border">
	<div class="col">
		<div class="d-flex">
			<ul class="nav me-auto">
				<li class="nav-item zoom_a"><a class="nav-link" href="{{route('dbook.index')}}"> 국내도서 </a></li>
				<li class="nav-item zoom_a"><a class="nav-link" href="{{route('wbook.index')}}"> 서양도서</a></li>
				<li class="nav-item zoom_a"><a class="nav-link" href="{{route('jbook.index')}}"> 일본도서 </a></li>
			</ul>
			</div>
	</div>
</div>


	

<!-------------------------------------------------------------------------------------------->	
<!-- 시작 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->
			

@yield("content")

<!-------------------------------------------------------------------------------------------->	
<!-- 끝 : 다른 웹페이지 삽입할 부분 -->
<!-------------------------------------------------------------------------------------------->	
&nbsp;
<!-- 화면 하단 (main_bottom) : 회사소개 -->
<hr class="m-0">
<div class="row bg-light py-3  m-0 mb-5">
	<div class="col-2" align="center">
		<a href="index.html"><img src="my/images/footer_logo.png" width="120"></a>
	</div>
	<div class="col-10 pt-2" align="left" style="line-height:15px;">

		<h6>INDUK Book Information</h6>
		<font style="font-size:12px;">
			상호: 인덕주식회사 | 대표 : 홍길동 | 사업자 등록번호 : 123-12-123345<br>
			주소 : 21424 서울 노원구 초안산로 인덕대학교  | 전화 : 010-1111-2222 | Fax : 02-3333-4444<br>
			<br>
			Copyright © 2022 www.induk.ac.kr &nbsp; All Rights Reserved.
		</font>
	</div>
</div>
<br>

<!-------------------------------------------------------------------------------------------->	
</div>

</body>
</html>

<!-- Login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content">

			<div class="modal-header mycolor1">
				<h5 class="modal-title" id="exampleModalLabel">로그인</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<div class="modal-body bg-light">
			
				<form name="form_login" method="post" action="login_check.html">
				
					<table class="table table-borderless my-2">
						<tr>
							<td width="30%"><h6>아이디</h6></td>
							<td width="70%"><input type="text" name="uid" class="form-control form-control-sm"></td>
						</tr>
						<tr>
							<td><h6>암&nbsp;호</h6></td>
							<td><input type="password" name="pwd" class="form-control  form-control-sm"></td>
						</tr>
					</table>
				
				</form>
				
			</div>

			<div class="modal-footer alert-secondary">
				<button type="button" class="btn btn-sm btn-secondary" 
					onclick="javascript:form_login.submit();">확인</button>
				<button type="button" class="btn btn-sm btn-light" data-bs-dismiss="modal">닫기</button>
			</div>

		</div>
	</div>
</div>


