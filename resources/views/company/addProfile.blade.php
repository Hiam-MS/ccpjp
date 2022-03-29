@extends ('header')
@section('content')

<style>
    .form-control{
        font-size:20px;
        font-family: Arial, Helvetica, sans-serif;

    }
	span{
		font-size:18px;
		color:red;
	}
</style>

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

    <div class="dez-bnr-inr overlay-black-dark" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"> تسجيل المعلومات الأساسية  </h1>
					
            </div>
        </div>
    </div>
    <div class="content-block">
		<div class="section-full  submit-resume content-inner-2">
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
														<a href="{{route('CompanyViewProfile')}}" > عرض الملف الشخصي </a>
													</strong><span class="text-black-light"> </span>
												</li>
												<li>
													<strong class="font-weight-700 text-black"> 
														<a href="{{route('CompanyViewProfile')}}" > اضافة معلومات أخرى   </a>
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
														<strong class="font-weight-700 text-black">
															<h5 ><i class="fa fa-chevron-down"></i>      ادارة الحساب</h5> 
														</strong>
													</li>
											 		<div class="dropdown-content">
											 			<ul>
															<li>
																<a href="{{route('edit.form')}}" >   تعديل   اسم المستخدم</a> 
															</li>
														</ul>
														<ul>
															<li>
																<a href="{{route('edit.formEmail')}}" >   تعديل   البريد الالكتروني </a>
															</li>
														</ul>
														<ul>
															<li>
																<a href="{{route('password.change')}}" >    تغيير كلمة المرور</a> 
															</li>
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
						<div style="margin: right 20px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">	
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
							<div class="card card-warning">
								<div class="card-header">
									<h3 class="card-title" style="color:#200080">المعلومات الأساسية </h3>
								</div>
              				<!-- /.card-header -->
							<div class="card-body">
								<form action="{{url('/company/storeProfile')}}" method="POST" id="resume" >
									@csrf
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>اسم الشركة<span>*</span></label>
												<input type="text" class="form-control form-control-lg" placeholder="" name="company_name"  value="{{old('company_name')}}" data-parsly-trigger="keyup">
												@if($errors->any('company_name'))
													<span>{{$errors->first('company_name')}}</span>
												@endif
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<label>  عنوان [موقع الشركة]  <span style="color:red">*</span></label>
									
												<!-- <input type="text" class="form-control form-control-lg" placeholder="" name="location" value="{{old('location')}} "  data-parsly-trigger="keyup"> -->
												<select class=" form-control form-control-lg select2bs4" name="city" id="city" >
													@foreach ($cities as $city)
														<option value="{{$city->city_id}}" {{(old('city') && old('city')==$city->city_id )?'selected':''}} >{{$city->city_name}}</option>
													@endforeach
												</select>
												
												@if($errors->any('location'))
													<span>{{$errors->first('location')}}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<label>  اختصاص الشركة  <span style="color:red">*</span></label>
												<select class="form-control form-control-lg select2bs4" name="activity" id="activity">
													@foreach ($activities as $activity)
														<option value="{{$activity->activity_id}}" {{(old('activity') && old('activity')==$activity->activity_id )?'selected':''}} >{{$activity->activity_name}}</option>
													@endforeach
												</select>

											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
											<label>عنوان البريد الالكتروني<span>*</span></label>
												<input type="text" class="form-control form-control-lg" placeholder="" name="email"  value="{{old('email')}}" data-parsly-trigger="keyup">
												@if($errors->any('email'))
													<span>{{$errors->first('email')}}</span>
												@endif
											</div>
										</div>
									</div>
									
									
										
									<div class="row">
										

										<div class="col-sm-6">
											<div class="form-group">
												<label>  رقم الموبايل <span style="color:red">*</span></label>
												<input type="text" class="form-control  form-control-lg" placeholder=" " name="mobile" value="{{auth()->user()->mobile}} "  data-parsly-trigger="keyup" readonly>
												@if($errors->any('fax_phone'))
													<span >{{$errors->first('fax_phone')}}</span>
												@endif
											</div>
										</div>


										<div class="col-sm-6">
											<div class="form-group">
											<label>  الهاتف الأرضي<span style="color:red">*</span></label>
												<input type="text" class="form-control  form-control-lg" placeholder="" name="fixed_phone" value="{{old('fixed_phone')}} "  data-parsly-trigger="keyup">
												@if($errors->any('fixed_phone'))
													<span >{{$errors->first('fixed_phone')}}</span>
												@endif
											</div>
										</div>
									</div>

									<button type="submit" class="btn btn-primary" >إرسال</button>
								</form>
							</div>
             			</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

   
  })
 





</script>


@endsection