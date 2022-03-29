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
span{
	font-size:18px;
	color:red;
}
</style>

    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
		<div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">لوحة التحكم </h1>
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
								<div class="col-lg-12 col-md-6">
									<div class="m-b30">
										<!-- <img src="images/blog/grid/6.jpg" alt=""> -->
									</div>
								</div>
										
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-12 col-md-6">
									<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                    	<h4 class="text-black font-weight-700 p-t10 m-b15"><a href="{{route('PersonDash')}}" > لوحة التحكم<a></h4>
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
													<ul>
														<li><a href="{{route('profile.delete')}}" >  حذف الحساب </a> </li>
													</ul>	
												</div>
											</div><br> <br> <br>  
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
						





							
<form action="{{route('PersonUpdateExp')}}" method="POST" id="resume" >
                    @csrf
                    @method('PUT')
                    
                    
                    <div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label> المنصب الوظيفي <span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="Job_title"  value="{{ $Exp->Job_title }}" data-parsly-trigger="keyup">
											@if($errors->any('Job_title'))
												<span>{{$errors->first('Job_title')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label> اختصاص عملك<span>*</span></label>
											<input type="text" class="form-control form-control-lg" placeholder="" name="job_Specialize" value="{{ $Exp->job_Specialize }}" data-parsly-trigger="keyup">
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
											<input type="text" class="form-control form-control-lg" placeholder="" name="company_name" value="{{ $Exp->company_name }}" data-parsly-trigger="keyup">
											@if($errors->any('company_name'))
												<span>{{$errors->first('company_name')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>  المهام الوظيفية <span>*</span>  </label>
											<textarea name="Responsibilities" id="Responsibilities" class="form-control" >{{ $Exp->Responsibilities }}</textarea>
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
											<input type="date" class="form-control form-control-lg" placeholder="" name="Start_date" value="{{ $Exp->Start_date }}"  data-parsly-trigger="keyup">
											@if($errors->any('Start_date'))
												<span>{{$errors->first('Start_date')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>     مازلت على رأس عملي</label>
											<input type="checkbox" id="stillwork" onclick="Enablewo(this)" class="form-control form-control-lg" placeholder="" name="still_work[]" value="{{ $Exp->still_work }}" data-parsly-trigger="keyup">

											
											@if($errors->any('still_work'))
												<span>{{$errors->first('still_work')}}</span>
											@endif
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label>    تاريخ الانتهاء <span></span></label>
											<input type="date"  id ="FIN" class="form-control form-control-lg" placeholder="" name="end_date" value="{{ $Exp->end_date }}"data-parsly-trigger="keyup" enabled="enabled">
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
										<td><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></td>
										<td><button type="submit" class="btn btn-primary">تعديل</button></td>
									</tr>
								</table>

						<!-- <div class="form-group">
							<label>   المنصب الوظيفي</label>
							<input type="text" class="form-control" value="{{ $Exp->Job_title }}" name="Job_title" style="width:70%"  >
							<span style="color:red"> @error('Job_title'){{$message}}@enderror</span>
						</div>
						<div class="form-group">
							<label>  اختصاص عملك</label>
							<input type="text" class="form-control" value="{{ $Exp->job_Specialize }}" name="job_Specialize" style="width:70%">
							<span style="color:red"> @error('job_Specialize'){{$message}}@enderror</span>
						</div>
                        <div class="form-group">
							<label> اسم الشركة </label>
							<input type="text" class="form-control" value="{{ $Exp->company_name }}" name="company_name" style="width:70%">
							<span style="color:red"> @error('company_name'){{$message}}@enderror</span>
						</div>
                        <div class="form-group">
							<label>  عنوان الشركة </label>
							<input type="text" class="form-control" value="{{ $Exp->company_address }}" name="company_address" style="width:70%">
							<span style="color:red"> @error('company_address'){{$message}}@enderror</span>
						</div>
						<div class="form-group">
							<label>  تاريخ الالتحاق </label>
							<input type="date" class="form-control"  value="{{ $Exp->Start_date }}"  name="Start_date" style="width:70%">
							<span style="color:red"> @error('Start_date'){{$message}}@enderror</span>
						</div>
                       
						<div class="form-group">
							<label>    تاريخ الانتهاء   </label>
							<input type="date" class="form-control"  value="{{ $Exp->end_date }}"  name="end_date" style="width:70%">
							<span style="color:red"> @error('end_date'){{$message}}@enderror</span>
						</div>
                        
						<div class="form-group">
							<label>    المهام الوظيفية  </label>
							<input type="text" class="form-control" value="{{ $Exp->Responsibilities }}"  name="Responsibilities" style="width:70%">
							<span style="color:red"> @error('Responsibilities'){{$message}}@enderror</span>
							
                            <input type="hidden" class="form-control" placeholder=""  name="cid" value="{{$Exp->id}}">
							
						</div>
                        
						
						
						<button type="submit" class="btn btn-primary" > تعديل</button>
  <form>
                        <input type="button" value="الغاء" onclick="history.back()" class="btn btn-primary">
                        </form> -->
	
					</form>
						</div>
					</div>









						
				</div>
			</div>
		</div>
			<br><br>
    </div>
</div>


 
    
 @endsection