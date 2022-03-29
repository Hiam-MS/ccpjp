@extends('header')
@section('content')
<style>
	td{
		font-size:18px;
	}
	h3{
		
		text-align:right;
	}
	.vl {
  border-left: 4px dotted navy;
  height: 275px;
  position: absolute;
  left: 50%;
  margin-left: -3px;
 
}
	

#lii::before{
	content: "\2022";
  color:  #4682B4;
  display: inline-block; 
  margin-left: 1em;
  
}
#lii{
	font-size:18px;
}
	#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 2px solid #ddd;
  padding: 2px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 4px;
  padding-bottom: 4px;
  text-align: center;
  background-color: #4682B4;
  color: white;
  width: 30%;
  font-size:18px;
}

</style>

    


<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
	<div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white"> معاينة السيرة الذاتية</h1>
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
												<li><a href="{{route('edit.formEmail')}}" >   تعديل   البريد الالكتروني </a> </li>
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

				<div class="col-lg-9" style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;">
					<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">				
				
						<h3 class="font-weight-600">  المعلومات الاساسية  </h5><br>
							<!-- <table  id ="customers" dir="rtl" >
								<tr>
									<th > الاسم الكامل</th>
									<td> {{$Person->Fname}} {{$Person->Father_name}} {{$Person->Lname}}</td>
								</tr>
								
								<tr>
									<th> الجنس  </th>
									<td>{{$Person->gender}}</td>
								</tr>
								<tr>
									<th> تاريخ الميلاد  </th>
									<td> {{$Person->dob}} </td>
								</tr>
								<tr>
									<th> مكان الولادة  </th>
									<td> {{$Person->place_Of_b}} </td>
								</tr>
								<tr>
									<th> الوضع  العائلي  </th>
									@if($Person->marital_status == NULL)
										<td>---</td>
									@else
										@if($Person->gender == 'أنثى')
											@if( $Person->marital_status == 'عازب')
												<td>عزباء</td>
											@elseif($Person->marital_status == 'متزوج')
												<td>متزوجة</td>
											@elseif($Person->marital_status == 'مطلق')
												<td>مطلقة</td>
											@else($Person->marital_status == 'أرمل')
												<td>أرملة</td>
											@endif
										@else
											<td>{{$Person->marital_status}}</td>
										@endif
									@endif
								
								</tr>
								<tr>
									<th> خدمة العلم </th>
									@if($Person->military_service == NULL )
										<td>---</td>
									@else
										@if($Person->gender == 'أنثى' )
											<td>---</td>
										@else
											<td> {{$Person->military_service}} </td>
										@endif
									@endif
								</tr>
								<tr>
									<th>  السكن الحالي   </th>
									<td>{{$Person->current_address}}</td>
									
								</tr>
								<tr>
									<th> الهاتف الارضي  </th>
									<td> {{$Person->fixed_phone}} </td>
								</tr>
								<tr>
									<th> رقم الموبايل  </th>
									<td> {{$Person->mobile_number}} </td>
								</tr>
								<tr>
									<th> البريد الالكتروني  </th>
									<td> {{$Person->email}} </td>
								</tr>
							</table> -->
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<table id=customers>
											<tr>
												<th> الاسم الكامل</th>
												<td> {{$Person->Fname}} {{$Person->Father_name}} {{$Person->Lname}}</td>
											</tr>
								
											<tr>
												<th> الجنس  </th>
												<td>{{$Person->gender}}</td>
											</tr>
											@if($Person->dob != NULL)
											<tr>
												<th> تاريخ الميلاد  </th>
												<td> {{$Person->dob}} </td>
											</tr>
											@endif
											<tr>
												<th> مكان الولادة  </th>
												<td> {{$Person->place_Of_b}} </td>
											</tr>
											<tr>
												<th> الوضع  العائلي  </th>
												@if($Person->marital_status == NULL)
													<td>---</td>
												@else
													@if($Person->gender == 'أنثى')
														@if( $Person->marital_status == 'عازب')
															<td>عزباء</td>
														@elseif($Person->marital_status == 'متزوج')
															<td>متزوجة</td>
														@elseif($Person->marital_status == 'مطلق')
															<td>مطلقة</td>
														@else($Person->marital_status == 'أرمل')
															<td>أرملة</td>
														@endif
													@else
														<td>{{$Person->marital_status}}</td>
													@endif
												@endif
											
											</tr>
										</table>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<table id=customers>
											<tr>
												<th> خدمة العلم </th>
												@if($Person->military_service == NULL )
													<td>---</td>
												@else
													@if($Person->gender == 'أنثى' )
														<td>---</td>
													@else
														<td> {{$Person->military_service}} </td>
													@endif
												@endif
											</tr>
											<tr>
												<th>  مكان الاقامة الحالي   </th>
												<td>{{$Person->city->city_name}}</td>
												
											</tr>
											@if($Person->fixed_phone != NULL)
											<tr>
												<th> الهاتف الارضي  </th>
												<td> {{$Person->fixed_phone}} </td>
											</tr>
											@endif
											<tr>
												<th> رقم الموبايل  </th>
												<td> {{$Person->mobile_number}} </td>
											</tr>
											@if($Person->email != NULL)
											<tr>
												<th> البريد الالكتروني  </th>
												<td> {{$Person->email}} </td>
											</tr>
											@endif
										</table>
									</div>
								</div>
							</div>
							
							@if(count($Person->PersonEducation) > 0)
								<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
								<h3 class="font-weight-600">  الشهادات التعليمية </h5><br>
								
								<div class="row">
								@foreach($Person->PersonEducation as $exp)
									<div class="col-sm-6">
										<div class="form-group">
										<table  id ="customers" dir="rtl">
										<tr>
											<th > اسم الشهادة</th>
											<td> {{$exp['degree_name'] }}</td>
										</tr>
										@if($exp['Institution']  != NULL)
											<tr>
												<th > المؤسسة التعليمية  </th>
												<td>{{$exp['Institution'] }} </td>

											</tr>
										@endif
										@if($exp['Degree']  != NULL)
											<tr>
												<th> الدرجة </th>
												<td>{{$exp['Degree'] }}</td>
											</tr>
										@endif
										@if($exp['Major']  != NULL)
											<tr>
												<th> الاختصاص </th>
												<td>{{$exp['Major'] }} </td>
											</tr>
										@endif
										@if($exp['still_study']  != NULL || $exp['Graduation_year']  != NULL)
										<tr>
											<th>سنة التخرج  </th>
											@if(($exp['still_study']) == 'still study')
												<td>مازلت قيد الدراسة</td>
											@else
												<td >{{$exp['Graduation_year']}} </td>
											@endif
											
										</tr>
										@endif

									</table>
										</div>
									</div>
									@endforeach
								</div>
									
								
								<br>
							@endif
							@if(count($Person->PersonExperience) > 0)
								<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
								<h3 class="font-weight-600">  خبرات العمل </h5><br>
								<div class="row">
								@foreach($Person->PersonExperience as $exp)
								<div class="col-sm-6">
										<div class="form-group">
									<table  id ="customers" dir="rtl">
										<tr>
											<th>  المسمى الوظيفي</th>
											<td> {{$exp['Job_title'] }}</td>
										</tr>
										@if($exp['job_Specialize'] != NULL)
										<tr>
											<th> اختصاص العمل  </th>
											<td>{{$exp['job_Specialize'] }} </td>
										</tr>
										@endif
										@if($exp['company_name'] != NULL)
										<tr>
											<th> اسم الشركة </th>
											<td>{{$exp['company_name'] }}</td>
										</tr>
										@endif
										
										<tr>
											<th> تاريخ بدء العمل  </th>
											<td> {{$exp['Start_date'] }} </td>
										</tr>
										<tr>
											<th>  تاريخ انتهاء العمل  </th>
											@if(($exp['still_work']) == 'still work' )
												<td>مازلت على رأس عملي</td>
											@else
												<td>{{$exp['end_date']}} </td>
											@endif
										</tr>
										<!-- <tr>
											<th>  المسؤوليات  </th>
											<td>{{$exp['Responsibilities'] }}</td>
										</tr> -->

									</table>
									</div>
									</div>
									@endforeach
								</div>
							@endif
								<br>

							

							<div class="row">
								@if(count($Person->PersonSkill) > 0)
									<div class="col-sm-6">
										<div class="form-group">
											<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
											<h3 class="font-weight-600">  المهارات </h5><br>
											@foreach($Person->PersonSkill as $exp)
												<!-- <strong>{{$exp['name'] }}<span id="lii"></span></strong> <span>&nbsp;&nbsp&nbsp</span> -->
												<!-- <span id="lii">&nbsp&nbsp&nbsp{{$exp['name'] }}</span> -->
												<li id="lii" style="list-style: none; content:\2022;">{{$exp['name'] }} </li>	
											@endforeach 
														
										</div>
									</div>
								@endif	

								@if(count($Person->PersonCousre) > 0)
									<div class="col-sm-6">
										<div class="form-group">
											<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
											<h3 class="font-weight-600">  الدورات التدريبية المتبعة </h5><br>
											@foreach($Person->PersonCousre as $exp)
												<li id="lii" style="list-style: none; content:\2022;">{{$exp['name'] }} </li>	
											@endforeach
												
										</div>
									</div>
								@endif
							</div>

									
							@if(!empty($Person->lang))
								<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
								<h3 class="font-weight-600">  اللّغات </h5><br>
									<!-- @foreach($Person->lang as $lan)
										<span id="lii">&nbsp{{ $lan}}&nbsp;&nbsp&nbsp</span>
										
									@endforeach -->
									<table>
										<tr>
											@foreach($Person->lang as $lan)
												<td>
													<span id="lii">&nbsp{{ $lan}}&nbsp;&nbsp&nbsp</span>
											
												</td>
											@endforeach
										</tr>
									</table>
								<br>
							@endif
							<br><br>
							<button type="submit" onclick="history.back()" class="  btn btn-primary" ">رجوع</button>
						</div>
					</div>
				</div>
			</div>
		</div><br><br>
    </div>
</div>

    
   @endsection