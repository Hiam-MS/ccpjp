@extends('header')
@section('content')

<style>
	p{
		font-size:19px;
	}
</style>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
		<!-- Section Banner -->
		<div class="dez-bnr-inr dez-bnr-inr-md overlay-black-dark" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m text-white">
					<div class=" job-search-form">
						<h2 class="text-center">أسهل طريقة للحصول على وظيفتك الجديدة</h2>
						<h3>ابحث عن الوظائف والتوظيف وفرص العمل</h3><br><br>
						<h4><p>للمساعدة في التسجيل اتصل على الرقم الرباعي 9841</p></h4>
					</div>
				</div>
            </div>
        </div>
		

		<div  class="content-block">
            <div class="section-full content-inner overlay-middle">
				<div class="container">
					<div id="aboutUs" class="row align-items-center m-b50">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-md-12 col-lg-6 m-b20">
							<h2 class="m-b5" >نبذة عن منصة التوظيف </h2>
							<p class="m-b15" >هي منصة الكترونية تهدف الى ربط الباحثين عن فرص عمل مع أصحاب المنشآت الصناعية والشركات في المدينة الصناعية بعدرا بشكل خاص وريف دمشق بشكل عام</p>
						</div>
						<div class="col-md-12 col-lg-6">
							<img src="{{asset('images/our-work/pic1.jpg')}}" alt=""/>
						</div>
					</div><br>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <i class="ti-cup"></i></div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">بناء سيرة ذاتية احترافية</h5>
									<p>سيرتك الذاتية هي أول و أهم ما تحتاجه لبناء حياتك المهنية الناجحة، حيث إن كل الشركات و أصحاب الأعمال يحتاجون للاطلاع عليها قبل اتخاذ قرار التوظيف. علماً أن سيرتك الذاتية التي تبنيها على موقعنا هي الأكثر إقناعاً لهم بتوظيفك أنت </p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <i class="ti-image"></i></div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">التقدم لفرص العمل</h5>
									<p>سيرتك الذاتية  تمكنك من التقدم مباشرة للشواغر و المبوبات المعلنة بما يناسب امكانياتك و خبراتك.قم دوماً بالاطلاع على موقعنا و فرص العمل المعروضة عليه للحصول على أخر المستجدات</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <i class="ti-desktop" ></i></div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">عرض فرصة عمل الكترونية</h5>
									<p >يمكن للمؤسسات المسجلة على الموقع و بطريقة سهلة  الوصول إلى أنسب الموظفين أينما كانت فرصة العمل و أينما كانت المؤسسة ذلك بواسطة عرض فرصة عمل الكترونية على الموقعة</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		<div class="section-full content-inner-2 call-to-action overlay-black-dark text-white text-center bg-img-fix" style="background-image: url({{asset('images/background/bg4.jpg')}});">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="m-b10">اصنع فرقًا مع سيرتك الذاتية على الإنترنت!</h2><br>
						<h4><p>للمساعدة في التسجيل اتصل على 9841</p></h4>
						<p class="m-b0"></p>
						@if(auth::user())
						@if(auth()->user()->role == 'p')
						<a href="{{asset('/resume/dashboard')}}" class="site-button m-t20 outline outline-2 radius-xl">سجل الآن</a>
						@endif
								@if(auth()->user()->role == 'c')
								<a href="{{ asset('/company/dashboard')}}" class="site-button m-t20 outline outline-2 radius-xl">سجل الآن</a>
								@endif

						@else
						<a href="{{ route('register') }}" class="site-button m-t20 outline outline-2 radius-xl">سجل الآن</a>
						

						@endif
					</div>
				</div>
			</div>
		</div>
		
		
		
		<!-- Our Job END -->	
		<!-- Call To Action -->
		<br>
		
		<!-- Our Latest Blog -->
		<br><br>
	
		<div class="section-full content-inner-1 overlay-middle">
			<div class="container">
				<!--  -->
				
				<div class="row">
					<div class="col-sm-4 ">
						<div class="form-group">
							<div class="dez-post-media dez-img-effect radius-sm"> <img src="{{asset('images/blog/grid/pic5.jpg')}}" alt=""> </div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="dez-post-media dez-img-effect radius-sm"> <img src="{{asset('images/blog/grid/ww.jpg')}}" alt=""> </div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<div class="dez-post-media dez-img-effect radius-sm"> <img src="{{asset('images/blog/grid/4.jpg')}}" alt=""> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	
	
@endsection