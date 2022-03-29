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
label{
	font-size:20px;

}
span{
	color:red;
	font-size:20px;
}
</style>

    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
		<div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"> تعديل الشهادة </h1>
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
				
				<div class="col-lg-9">
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

						<form action="{{route('PersonUpdateEdu')}}" method="POST" id="resume" >
                    		@csrf
                   			@method('PUT')
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label> اسم الشهادة<span>*</span></label>
										<input type="text" class="form-control form-control-lg" value="{{ $Edu->degree_name }}" name="degree_name" >
										<span style="color:red"> @error('degree_name'){{$message}}@enderror</span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label> المؤسسة التعليمية<span>*</span></label>
										<input type="text" class="form-control form-control-lg" value="{{ $Edu->Institution }}" name="Institution" >
										<span style="color:red"> @error('Institution'){{$message}}@enderror</span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>الاختصاص <span>*</span></label>
										<input type="text" class="form-control form-control-lg" value="{{ $Edu->Major }}" name="Major" >
										<span style="color:red"> @error('Major'){{$message}}@enderror</span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group" >
										<label>   الدرجة/ الشهادة<span>*</span></label>
										<select name="Degree" class="form-control form-control-lg"  >
											<option value="أقل من ثانوية عامة"{{$Edu->Degree =="أقل من ثانوية عامة" ? 'selected' : ''}}>أقل من ثانوية عامة</option>
											<option value="ثانوية عامة " {{$Edu->Degree =="ثانوية عامة" ? 'selected' : ''}}>ثانوية عامة</option>
											<option value="معهد متوسط" {{$Edu->Degree =="معهد متوسط" ? 'selected' : ''}}>معهد متوسط</option>
											<option value="بكالوريوس / اجازة" {{$Edu->Degree =="بكالوريوس / اجازة" ? 'selected' : ''}}>بكالوريوس / اجازة</option>
											<option value="دبلوم دراسات عليا" {{$Edu->Degree =="دبلوم دراسات عليا" ? 'selected' : ''}}>دبلوم دراسات عليا</option>
											<option value="ماجستير" {{$Edu->Degree =="ماجستير" ? 'selected' : ''}}>ماجستير</option>
											<option value="دكتوراه" {{$Edu->Degree =="دكتوراه" ? 'selected' : ''}}>دكتوراه</option>
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
											<input type="checkbox" id="stillstudy"  class="form-control form-control-lg" placeholder="" name="still_study[]" value="{{$Edu->still_study }}" data-parsly-trigger="keyup">
											
										</div>
									</div>
								

									<div class="col-sm-6" >
										<div class="form-group" >
											<label>     سنة التخرج <span></span></label>
											<input type="date" class="form-control form-control-lg"  value="{{ $Edu->Graduation_year }}"  name="Graduation_year">
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
							<!-- <div class="row">
								<div class="col-sm-3">
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										@if(($Edu->still_study) == 'still study')
											<label for=""> مازلت قيد الدراسة</label>
											<input type="checkbox" class="form-control form-control-lg" placeholder="" name="still_study" value="{{old('still_study')}} " data-parsly-trigger="keyup" checked>
										@else
											<label>     سنة التخرج </label><br>
											<input type="date" class="form-control form-control-lg" placeholder="" name="Graduation_year" value="{{ $Edu->Graduation_year }}"  data-parsly-trigger="keyup" >
										@endif
									</div>
								</div>
							</div> -->
						
							<table>
								<tr>
									<td></td>
									<td></td>
									<td><form><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></form></td>
									<td><button type="submit" class="btn btn-primary" > تعديل</button></td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div><br><br>
</div>



 
    
 @endsection