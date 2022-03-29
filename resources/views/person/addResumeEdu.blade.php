
@extends('header')
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
	h3{
		color:navy;
	}



	#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size:18px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #000080;
  color: white;
  
}
p{
	font-size:18px;
}
</style>
	
</style>

<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
	<div class="container">
		<div class="dez-bnr-inr-entry">
            <h1 class= "text-white">تعديل و إضافة تعليم ومهارات</h1>
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
							<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>

							<form action="{{route('PersonJobCategory')}}" method="POST" id="resume" >
                               	@csrf
								   <div class="row">
									   <div class="col-sm-6">
										   <div class="form-group">
												<h4 style="color:navy">اختصاص العمل المطلوب</h4><br>
												<p>اختصاص العمل المطلوب هو الاختصاص الذي ترغبه في العمل</p>
												<select class="js-example-basic-multiple" id="category" name="category[]" multiple="multiple" style="width: 80%" >
													@foreach($jobCat as $category)
														<option value="{{$category->cat_id}}" {{(old('category') && in_array($category->cat_id,old('category')) )?'selected':''}}>{{$category->name}}</option>
													@endforeach
												</select>
												<button type="submit" class="btn btn-primary" > أضف</button>	
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												@if(count($person_cat) > 0)
													<table id="customers">
														<tr>
															<th> اختصاص العمل</th>
															<th>خيارات</th>
														</tr>
														@foreach($person_cat as $cat)
															<tr>
																<td >{{$cat->name}} </td>
																<td > <a href="{{url('/resume/deleteCat',$cat->cat_id)}}" style="color:red">  حذف</a></td>
															</tr>
														@endforeach
													</table>
													
												@else
													<p> لم يتم اختيار  اختصاص العمل المطلوب</p>
												@endif
											</div>
										</div>
								   </div>
								
								
								<script> 
									$(document).ready(function() {
										$('.js-example-basic-multiple').select2({
										placeholder: "  يرجى اختيار اختصاص العمل ",
										width: 'resolve',
										allowClear: true ,
										closeOnSelect: false
										
									});
										
									});
								</script><br>
								<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
							</form>

							<h3> الشهادات التعليمية  </h3> <br>
							<form action="{{route('PersonStoreEdu')}}" method="POST" id="resume" >
								@csrf
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>اسم الشهادة <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="degree_name"  value="{{old('degree_name')}} " data-parsly-trigger="keyup">
											@if($errors->any('degree_name'))
												<span>{{$errors->first('degree_name')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label> الاختصاص  <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="Major" value="{{old('Major')}} " data-parsly-trigger="keyup">
											@if($errors->any('Major'))
												<span>{{$errors->first('Major')}}</span>
											@endif
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>   المؤسسة التعليمية <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="Institution" value="{{old('Institution')}} " data-parsly-trigger="keyup">
											@if($errors->any('Institution'))
												<span>{{$errors->first('Institution')}}</span>
											@endif
										</div>
									</div>


									<div class="col-sm-6">
										<div class="form-group">
											<label>   الدرجة/ الشهادة<span>*</span></label>
											<select name="Degree" class="form-control form-control-lg"  >
												<option value="أقل من ثانوية عامة" {{(old('Degree') && old('Degree')=='أقل من ثانوية عامة' )?'selected':''}} selected>أقل من ثانوية عامة</option>
												<option value="ثانوية عامة " {{(old('Degree') && old('Degree')=='ثانوية عامة' )?'selected':''}}>ثانوية عامة</option>
												<option value="معهد متوسط" {{(old('Degree') && old('Degree')=='معهد متوسط' )?'selected':''}}>معهد متوسط</option>
												<option value="بكالوريوس / اجازة" {{(old('Degree') && old('Degree')=='بكالوريوس / اجازة' )?'selected':''}}>بكالوريوس / اجازة</option>
												<option value="دبلوم دراسات عليا" {{(old('Degree') && old('Degree')=='دبلوم دراسات عليا' )?'selected':''}}>دبلوم دراسات عليا</option>
												<option value="ماجستير" {{(old('Degree') && old('Degree')=='ماجستير' )?'selected':''}}>ماجستير</option>
												<option value="دكتوراه" {{(old('Degree') && old('Degree')=='دكتوراه' )?'selected':''}}>دكتوراه</option>
											</select>
											@if($errors->any('Degree'))
												<span style="color:red">{{$errors->first('Degree')}}</span>
											@endif
										</div>
									</div>
								</div>

								

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label >     مازلت  قيد الدراسة</label>
											<input type="checkbox" id="stillstudy" onclick="Enableddl(this)" class="form-control form-control-lg" placeholder="" name="still_study[]" value="still study " data-parsly-trigger="keyup">
											
										</div>
									</div>
									<div class="col-sm-6" >
										<div class="form-group" >
											<label>     سنة التخرج <span></span></label>
											<input type="date"  id="DDL" class="form-control form-control-lg" placeholder="" name="Graduation_year" value="{{old('Graduation_year')}} " data-parsly-trigger="keyup" enabled="enabled">
											@if($errors->any('Graduation_year'))
												<span>{{$errors->first('Graduation_year')}}</span>
											@endif
										
										</div>
									</div>

									
									<script>
										function Enableddl(stillstudy) {
											var ddl=document.getElementById("DDL");
											ddl.disabled=stillstudy.checked ? true : false;
											if(!ddl.disabled)
											{
												ddl.foucs();
											}
										}
									</script>
									
								</div><br>
								<table>
									<tr>
										<td><button type="submit"  class="btn btn-primary" style="width:200px "> أضف شهادة تعليمية جديدة</button></td>
									</tr>
								</table>
							</form>

							@if(count($person->PersonEducation) > 0)
								<table id="customers">
									<tr >
										<th>اسم الشهادة</th>
										<th>الاختصاص</th>
										<th>سنة التخرج</th>
										<th>خيارات</th>
									</tr>

									@foreach($person->PersonEducation as $edu)
										<tr>
											<td >{{$edu['degree_name']}} </td>
											<td >{{$edu['Major']}}</td>
											@if(($edu['still_study']) == 'still study')
												<td>مازلت قيد الدراسة</td>
											@else
												<td >{{$edu['Graduation_year']}} </td>
											@endif
											
											<td ><a href="{{url('/resume/editEdu',$edu['edu_id'])}}" >تعديل</a> / <a href="{{url('/resume/deleteEdu',$edu['edu_id'])}}" style="color:red">  حذف</a></td>
										</tr>
									@endforeach
								</table>
							@else
								<p>لاتوجد شهادات تعليمية مذكورة حالياً - أضف الشهادات التعليمية في حال وجودها </p>
							@endif
							<br>

							<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
							<h3 >المهارات </h3>	<br>

							<form action="{{route('PersonStoreSkill')}}" method="POST" >
								@csrf
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label> اسم المهارة <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="name"  value="{{old('name')}} " data-parsly-trigger="keyup">
											@if($errors->any('name'))
												<span>{{$errors->first('name')}}</span>
											@endif
										</div><br><br>
										<button type="submit" class="btn btn-primary" style="width:200px "> أضف مهارة جديدة</button>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											@if(count($person->PersonSkill) > 0)
												<table id="customers">
													<tr >
														<th> المهارة</th>
														<th>خيارات</th>
													</tr>

													@foreach($person->PersonSkill as $edu)
													<tr>
														<td>{{$edu['name']}} </td>
														<td ><a href="{{url('/resume/editSkill',$edu['id'])}}" >تعديل</a> / <a href="{{url('/resume/deleteSkill',$edu['id'])}}" style="color:red">  حذف</a></th>
													</tr>
													@endforeach
												</table><br>
											@else
												<p>لا توجد مهارات مذكورة ضمن سيرتك الذاتية</p>
											@endif
										</div>
									</div>
								</div>
							</form><br>
							<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
							<h3 class="font-weight-600">الدورات التدريبية المتبعة  </h3><br>
							<form action="{{route('PersonStoreCourse')}}" method="POST" id="resume" >
							@csrf
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label> اسم الدورة <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="name"  value="{{old('name')}} " data-parsly-trigger="keyup">
											@if($errors->any('name'))
												<span>{{$errors->first('name')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											@if(count($person->PersonCousre) > 0)
												<table id="customers">
													<tr >
														<th> اسم الدورة</th>
														<th>خيارات</th>
													</tr>
													@foreach($person->PersonCousre as $edu)
														<tr>
															<td >{{$edu['name']}} </td>
															<!-- <td ><a href="{{url('/resume/editCourse',$edu['id'])}}"><i class="ti-eye" style="font-size:20px;text-align:center"></i></a></td> -->
															<td ><a href="{{url('/resume/editCourse',$edu['id'])}}" >تعديل</a> / <a href="{{url('/resume/deleteCourse',$edu['id'])}}"  style="color:red">  حذف</a></td>
														</tr>
													@endforeach
									
												</table>
											@else
												<p>لاتوجد دورات مذكورة حالياً - أضف الدورات المتبعة في حال وجودها</p>
											@endif
										</div>
									</div>	
								</div><br>
								<button type="submit" class="btn btn-primary" style="width:200px " > أضف دورة تدريبية جديدة</button>
							</form><br>

							<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div>
							<h3 class="font-weight-600">خبرات العمل </h3><br>
						
							<form action="{{route('PersonStoreExp')}}" method="POST" id="" >
								@csrf
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label> المنصب الوظيفي <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="Job_title"  value="{{old('Job_title')}} " data-parsly-trigger="keyup">
											@if($errors->any('Job_title'))
												<span>{{$errors->first('Job_title')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label> اختصاص عملك<span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="job_Specialize" value="{{old('job_Specialize')}} " data-parsly-trigger="keyup">
											@if($errors->any('job_Specialize'))
												<span>{{$errors->first('job_Specialize')}}</span>
											@endif
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>   اسم الشركة <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="company_name" value="{{old('company_name')}} " data-parsly-trigger="keyup">
											@if($errors->any('company_name'))
												<span>{{$errors->first('company_name')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>  المهام الوظيفية <span>*</span>  </label>
											<textarea name="Responsibilities" id="Responsibilities" class="form-control" >{{old('Responsibilities')}}</textarea>
											@if($errors->any('Responsibilities'))
												<span >{{$errors->first('Responsibilities')}}</span>
											@endif
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<label>    تاريخ الالتحاق <span>*</span></label>
											<input type="date" class="form-control form-control-lg" placeholder="" name="Start_date" value="{{old('Start_date')}} " data-parsly-trigger="keyup">
											@if($errors->any('Start_date'))
												<span>{{$errors->first('Start_date')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>     مازلت على رأس عملي</label>
											<input type="checkbox" id="stillwork" onclick="Enablewo(this)" class="form-control form-control-lg" placeholder="" name="still_work[]" value="still work " data-parsly-trigger="keyup">

											
											@if($errors->any('still_work'))
												<span>{{$errors->first('still_work')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>    تاريخ الانتهاء <span></span></label>
											<input type="date"  id ="FIN" class="form-control form-control-lg" placeholder="" name="end_date" value="{{old('end_date')}} " data-parsly-trigger="keyup" enabled="enabled">
											@if($errors->any('end_date'))
												<span>{{$errors->first('end_date')}}</span>
											@endif
										</div>
									</div>
								
									

									
									<script>
										function Enablewo(stillwork) {
											var ddl=document.getElementById("FIN");
											ddl.disabled=stillwork.checked ? true : false;
											if(!ddl.disabled)
											{
												ddl.foucs();
											}
										}
									</script>
								</div>
								<table>
									<tr>
										<td><button type="submit" class="btn btn-primary" style="width:200px ">أضف خبرة عمل جديدة</button></td>
									</tr>
								</table>
                   			</form>

							@if(count($person->PersonExperience) > 0)
								<table id="customers">
									<tr >
										<th> اسم الشركة </th>
										<th> اختصاص العمل</th>
										<th> تاريخ الالتحاق  </th>
										<th> تاريخ الانتهاء </th>
										<th>خيارات</th>
									</tr>
									@foreach($person->PersonExperience as $edu)
										<tr>
											<td >{{$edu['company_name']}} </td>
											<td >{{$edu['job_Specialize']}}</td>
											<td >{{$edu['Start_date']}} </td>
											@if(($edu['still_work']) == 'still work' )
											<td>مازلت على رأس عملي</td>
												
											@else
											<td>{{$edu['end_date']}} </td>
												
											@endif
											
											<td ><a href="{{url('/resume/editExperience',$edu['id'])}}" >تعديل</a> / <a href="{{url('/resume/deleteExperience',$edu['id'])}}" style="color:red"> حذف </a></td>
										</tr>
									@endforeach
								</table>
							@else
								<p>لايوجد خبرات عمل مذكورة حالياً - أضف خبراتك في حال وجودها</p>
							@endif <br>
							<div class="dez-divider divider-2px bg-primary-dark mb-4 mt-0"></div><br>
						</div><br>
					</div>
				</div>
			</div><br><br>
		</div>
	</div>
</div>

@endsection