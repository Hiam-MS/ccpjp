@extends('header')
@section('content')
@csrf
<style>
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 250px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
	<div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">الملف الشخصي  </h1>
		</div>
    </div>
</div>
     
<div class="section-full content-inner-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="sticky-top">
					<div class="row">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-12 col-md-6">
							<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
								<h4 class="text-black font-weight-700 p-t10 m-b15">لوحة التحكم</h4>
								<ul>
									@if(isset(auth()->user()->GetPerson))
										<li><strong class="font-weight-700 text-black"><a href="{{route('PersonProfile')}}" >  معاينةالسيرة الذاتية</a>  </strong></li>
										<li><strong class="font-weight-700 text-black"><li><a href="{{route('PersonalInfo.edit')}}"  >تعديل السيرة الذاتية</a></li></strong> </li>
										<li><strong class="font-weight-700 text-black"><li><a href="{{route('edu')}}" >اضافة/تعديل التعليم و المهارات  </a></li></strong> </li>
										<li><strong class="font-weight-700 text-black"><li><a href="{{route('ApplyedJob')}}" >سجل التقدمات  </a></li></strong> </li>			
									@else
										<li><strong class="font-weight-700 text-black"> <a href="{{route('resuem.create')}}" >انشاء السيرة الذاتية</a></strong><span class="text-black-light"> </span></li>
									@endif	
									<div class="dropdown " >
										<li><strong class="font-weight-700 text-black"><h5 ><i class="fa fa-chevron-down"></i>      ادارة الحساب</h5>  </strong>	</li>
										<div class="dropdown-content">
											<ul>
												<li><a href="{{route('edit.form')}}" >   تعديل   اسم المستخدم</a> </li>
											</ul>
					
											<ul>
												<li><a href="{{route('password.change')}}" >    تغيير كلمة المرور</a> </li>
											</ul>
											
										</div>
									</div><br> 
								</div>
							</div>
						</div>
					</div>
				</div> 
				

					<div class="col-lg-9">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
							@if(Session::get('success'))
								<div class="alert alert-success" style="font-size:25px">
									{{Session::get('success')}}
								</div>
							@endif
							@if(Session::get('fail'))
								<div class="alert alert-danger" style="font-size:25px">
									{{Session::get('fail')}}
								</div>
							@endif  
							<div>
								<p>
									 <h4>أهلاً و سهلاً  :  {{auth()->user()->name}} &nbsp&nbsp</h4> 
									 <div class="row">
<h5 ><p><a href="{{route('edu')}}" style="color:red"> ملاحظة:يفضل إضافة الشهادات والخبرات لزيادة فرصك بالحصول على العمل انقر هنا</a>  </p></h5><hr>

</div>
									<!-- <li><a href="{{route('edu')}}"  style="color:#000080;font-size:18px">انقر هنا: لإضافة تفاصيل سيرتك الذاتية  </a></li>
									<li><a href="{{route('PersonalInfo.edit')}}"  style="color:#000080;font-size:18px">انقر هنا: لتعديل  سيرتك الذاتية  </a></li> -->
					 			</p>
                            </div> 
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
										<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
											<div class="icon-md text-primary m-b20"><i class="ti-desktop"></i></div>
											<div class="icon-content">
												<h5 class="dlab-tilte text-uppercase">بناء سيرة ذاتية احترافية   </h5>
												<p>  سيرتك الذاتية هي أول و أهم ما تحتاجه لبناء حياتك المهنية الناجحة، حيث إن كل الشركات و أصحاب الأعمال يحتاجون للاطلاع عليها قبل اتخاذ قرار التوظيف. علماً أن سيرتك الذاتية التي تبنيها على موقعنا هي الأكثر إقناعاً لهم بتوظيفك أنت</p>
											</div>
										</div>	
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
										<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
											<div class="icon-md text-primary m-b20"> <i class="ti-desktop"></i></div>
												<div class="icon-content">
													<h5 class="dlab-tilte text-uppercase"> بحث والتقدم لفرص  العمل   </h5>
													<p>  سيرتك الذاتية تمكنك من التقدم مباشرة للشواغر بما يناسب امكانياتك وخبراتك. قم دوماً بالاطلاع على موقعنا وفرص العمل المعروضة عليه للحصول على آخر المستجدات </p>
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



 
    
 @endsection