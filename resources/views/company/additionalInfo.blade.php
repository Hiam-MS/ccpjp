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
	

    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
		<div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">عرض و تعديل المعلومات الشخصية</h1>
			</div>
        </div>
    </div>
     
    <div class="content-block">
        <div class="section-full content-inner-1">
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
						
							<div class="row">
          						<div class="col-md-12">
									<div class="card card-default">
									

										<div class="card-body p-0">
											<div class="bs-stepper">
												<div class="bs-stepper-header" role="tablist">
													<div class="step" data-target="#view-part">
														<button type="button" class="step-trigger" role="tab" aria-controls="view-part" id="view-part-trigger">
															<span class="bs-stepper-circle">1</span>
															<span class="bs-stepper-label"> عرض ملف الشركة</span>
														</button>
													</div>
													<div class="line"></div>
													<div class="step" data-target="#logins-part">
														<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
															<span class="bs-stepper-circle">2</span>
															<span class="bs-stepper-label">المعلومات الأساسية</span>
														</button>
													</div>
													<!-- <div class="line"></div>
														<div class="step" data-target="#information-part">
															<button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
																<span class="bs-stepper-circle">3</span>
																<span class="bs-stepper-label">المعلومات الاضافية </span>
															</button>
														</div> -->
													</div>
													<div class="bs-stepper-content">
														<div id="view-part" class="content" role="tabpanel" aria-labelledby="view-part-trigger">
															<div class="row">
																<table  id ="gen_info" dir="rtl">
																	<tr>
																		<td>  اسم الشركة </td>
																		<td>{{$company->company_name}}</td>
																	</tr>
																	<tr>
																	
																		
																		<td>طبيعة النشاط (اختصاص الشركة)</td>
																		
																	
																		<td>
																			{{$company->activity->activity_name}}
																		</td>
																		
																			
																	</tr>
																	<tr>
																		<td>  مكان وموقع الشركة  </td>
																		<td>{{$company->city->city_name}}</td>
																	</tr>
																	<tr>
																		<td>    الرقم الثابت  </td>
																		<td>{{$company->fixed_phone}}</td>
																	</tr>
																	<tr>
																		<td>    رقم الموبايل  </td>
																		<td>{{$company->mobile}}</td>
																	</tr>
																	<tr>
																		<td>    البريد الالكتروني </td>
																		<td>{{$company->email}}</td>
																	</tr>
																	<!-- <tr>
																		<td>  السجل التجاري </td>
																		<td>{{$company->commercial_record}}</td>
																	</tr> -->
																	<!-- <tr>
																		<td>   السجل الصناعي </td>
																		<td>{{$company->industria_record}}</td>
																	</tr>
																	<tr>
																		<td>  موقع الانترنت </td>
																		<td>{{$company->website}}</td>
																	</tr> -->
																	<tr>
																		<td><form><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></form></td>
																		<td><form><input type="button" value="التالي" onclick="stepper.next()" class="btn btn-primary"></form></td>
																	</tr>
																</table>
															</div>
														</div>
														<div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
															<form action="{{route('edititing')}}" method="POST">
                                   								@csrf
																@method('PUT')
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>اسم الشركة<span>*</span></label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="company_name"  value ="{{$company->company_name}}" data-parsly-trigger="keyup">
																			@if($errors->any('company_name'))
																				<span>{{$errors->first('company_name')}}</span>
																			@endif
																		</div>
																	</div>

																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>  العنوان  <span style="color:red">*</span></label>
																			<select class="select2bs4 form-control form-control-lg" name="city" id="city" style="width:100%;">
																				@foreach ($cities as $city)
																					<option  value="{{$city->city_id}}" {{$city->city_id =="$company->cci_id" ? 'selected' : ''}}>{{$city->city_name}}</option>
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
																			<select class="select2bs4 form-control form-control-lg" name="activity" id="activity" style="width:100%">
																				@foreach ($activities as $activity)
																					<option value="{{$activity->activity_id}}" {{$activity->activity_id =="$company->act_id" ? 'selected' : ''}}>{{$activity->activity_name}}</option>
																				@endforeach
																			</select>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>عنوان البريد الالكتروني<span>*</span></label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="email"  value="{{$company->email}}" data-parsly-trigger="keyup">
																			@if($errors->any('email'))
																					<span>{{$errors->first('email')}}</span>
																			@endif
																		</div>
																	</div>
																</div>

														
																	
														

																<div class="row">
																	
																	<!-- <div class="col-sm-6">
																		<div class="form-group">
																			<label>  رقم الفاكس <span style="color:red">*</span></label>
																			<input type="text" class="form-control  form-control-lg" placeholder=" 963-11-2222222+" name="fax_phone" value="{{$company->fax_phone}}"  data-parsly-trigger="keyup">
																			@if($errors->any('fax_phone'))
																				<span >{{$errors->first('fax_phone')}}</span>
																			@endif
																		</div>
																	</div> -->


																	<div class="col-sm-6">
																		<div class="form-group">
																		<label>  الهاتف الأرضي<span style="color:red">*</span></label>
																			<input type="text" class="form-control  form-control-lg" placeholder="963-11-2222222+" name="fixed_phone" value="{{$company->fixed_phone}}" data-parsly-trigger="keyup">
																			@if($errors->any('fixed_phone'))
																				<span >{{$errors->first('fixed_phone')}}</span>
																			@endif
																		</div>
																	</div>
																</div>
																<table>
																<tr>
																<p style="font-size:18px;; color:red"> ملاحظة:عند تعديل أي حقل يجب ضغط على زر الحفظ  قبل الانتقال للتالي</p> 
																</tr>
																	<tr>
																		<td><form action=""><input type="button" value="السابق" onclick="stepper.previous()" class="btn btn-primary"></form></td>
																		<td><button class="btn btn-primary" >حفظ</button></td>
																		<!-- <td><form><input type="button" value="التالي" onclick="stepper.next()" class="btn btn-primary"></form></td> -->
																	</tr>
																</table>
															</form>
														</div>

														<div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
															<form action="{{route('edititing2')}}" method="POST">
                                   								@csrf
																@method('PUT')
																<!-- <div class="form-group">
																	<label> السجل التجاري</label>
																	<input type="text" value ="{{$company->commercial_record}}" name="commercial_record"  id="commercial_record" class="form-control"> 
																	<span style="color:red"> @error('fixed_phone'){{$message}}@enderror</span>
																</div> -->
																<!-- <div class="form-group">
																	<label>  السجل الصناعي</label>
																	<input type="text" value ="{{$company->industria_record}}" name="industria_record"  id="industria_record" class="form-control">  
																	<span style="color:red"> @error('Current_address'){{$message}}@enderror</span>
																</div> -->
																<!-- <div class="form-group">
																	<label>  الموقع الالكتروني للشركة</label>
																	<input type="text" value ="{{$company->website}}" name="website"  id="website" class="form-control"> 
																	<span style="color:red"> @error('email'){{$message}}@enderror</span>
																</div> -->
																<table>
																<tr>
																	<p style="font-size:18px; color:red">ملاحظة :عند الانتهاء من تعبئة الحقول يجب الضغط على زر الحفظ</p>
																</tr>
																	<tr>
																		<td><form action=""><input type="button" value="السابق" onclick="stepper.previous()" class="btn btn-primary"></form></td>
																		<td><button class="btn btn-primary" >حفظ</button></td>
																	</tr>
																</table>
															</form>
														</div>
													</div>
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

<script>

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })


</script>

 
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