@extends('header')
@section('content')
    @csrf
    

<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}}); width:100%;height:200px">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">لوحة التحكم </h1>
		</div>
    </div>
</div>

	

    <div class="content-block">
        <div class="section-full content-inner-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<div class="sticky-top">
							<div class="row">
								<div class="col-lg-8 col-md-6">
									<div class="m-b30">
										<img src="{{asset('images/blog/grid/6.jpg')}}" alt="">
									</div>
								</div>
										
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" >
									<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
										<h4 class="text-black font-weight-700 p-t10 m-b15"><a href="{{route('CompanyDash')}}" > لوحة التحكم<a></h4>
										<ul>
											@if(isset(auth()->user()->GetCompany))
												<li>
													<strong class="font-weight-700 text-black"> 
														<a href="{{route('CompanyAdditionalInfo')}}" > عرض/ تعديل/اضافة معلومات أخرى   </a>
													</strong><span class="text-black-light"> </span>
												</li>
												<li>
													<strong class="font-weight-700 text-black">
														<a href="{{route('addJob')}}" > نشر فرصة عمل جديدة </a>
													</strong> 
												</li>
												<li>
													<strong class="font-weight-700 text-black">
														<a href="{{route('CompanyJob')}}" > عرض فرص العمل المنشورة  </a>
													</strong>
												</li>
												<li>
													<strong class="font-weight-700 text-black">
														<a href="{{route('resuems')}}" >   عرض السير الذاتية المتاحة</a> 
													 </strong>
												</li>	
												<li>
													<strong class="font-weight-700 text-black">
														<a href="{{route('CompanyEndJobs')}}" >   الوظائف المنتهية  </a>  
													</strong>
												</li>
											@else
												<li><strong class="font-weight-700 text-black"><li><a href="{{route('CompanyProfile')}}" > ادخال معلومات الشركة </a></li></strong> </li>

											@endif
											<div class="dropdown " >
												<li>
													<strong class="font-weight-700 text-black"><h5 ><i class="fa fa-chevron-down"></i>      ادارة الحساب</h5></strong>
												</li>
											 	<div class="dropdown-content">
											 		<ul>
														<li><a href="{{route('edit.form')}}" >   تعديل   اسم المستخدم</a></li>
													</ul>
													<ul>
														<li><a href="{{route('edit.formEmail')}}" >   تعديل   البريد الالكتروني </a></li>
													</ul>
													<ul>
														<li><a href="{{route('password.change')}}" >    تغيير كلمة المرور</a></li>
													</ul>
													
									 			</div>
											</div>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-8">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
							@if(Session::get('success'))
								<div class="alert alert-success" style="font-size:20px">
									{{Session::get('success')}}
								</div>
							@endif
							@if(Session::get('fail'))
								<div class="alert alert-danger" style="font-size:20px">
									{{Session::get('fail')}}
								</div>
							@endif   
							<div>
								<h4 ><p>أهلاً و سهلاً : {{auth()->user()->name}} </p></h4><hr>
							</div> 
<div class="row">
<h5 ><p><a href="{{route('addJob')}}" style="color:red">ملاحظة:من أجل ادراج شواغر العمل انقر هنا </a>  </p></h5><hr>

</div>
                            <div class="">
								<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
									<div class="icon-md text-primary m-b20"> <i class="ti-desktop"></i></div>
										<div class="icon-content">
											<h5 class="dlab-tilte text-uppercase">إضافة معلومات الشركة   </h5>
											<p>معلومات الشركة هي أول و أهم ما تحتاجه لتفعيل حسابك  ، حيث إن باحثين عن العمل يحتاجون للاطلاع عليها قبل اتخاذ قرار التقدم للعمل. علماً أن معلومات الشركة  التي تبنيها على موقعنا هي الأكثر إقناعاً لهم   </p>
										</div>
									</div>
								</div><hr>

								<div class="">
									<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
										<div class="icon-md text-primary m-b20"> <i class="ti-image" ></i> </div>
											<div class="icon-content">
												<h5 class="dlab-tilte text-uppercase">نشر فرصة عمل الكترونية</h5>
												<p>يمكن للمؤسسات المسجلة على الموقع و بطريقة سهلة  نشر فرصة عمل الكترونياً, حيث  تمكّن الباحثين عن عمل من الوصول إاليها بسهولة و الاطلاع على تفاصيل هذا العمل بكل بساطة والتقدم لهذا العمل في حال توافرت الشروط المناسبة لهم</p>
											</div>
										</div>
									</div><hr>

										<div class="">
											<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
												<div class="icon-md text-primary m-b20"> <i class="ti-search" ></i></div>
													<div class="icon-content">
														<h5 class="dlab-tilte text-uppercase">   بحث عن موظفين</h5>
														<p> هذه المنصة تمكّن المؤسسات من البحث عن موظفين مؤهلين في حال عدم نشر فرص عمل على الموقع والتواصل معهم مع الحصول على معلومات السير الذاتية الخاصة بهم  </p>
														
													</div>
												</div>
											</div>
										</div><hr>

										<div class="">
											<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
												<div class="icon-md text-primary m-b20"> <i class="ti-list" ></i> </div>
													<div class="icon-content">
														<h5 class="dlab-tilte text-uppercase">    عرض فرص العمل المنشورة </h5>
														<p> هذه المنصة تمكّن المؤسسات من البحث عن موظفين مؤهلين في حال عدم نشر فرص عمل على الموقع والتواصل معهم مع الحصول على معلومات السير الذاتية الخاصة بهم  </p>
														
													</div>
												</div>
											</div>
										</div>
									</div>   
  								</div>
							</div>
						</div>
					</div>
				</div><br><br>
    		</div>
		</div>
	</div>
</div	>
    
 @endsection