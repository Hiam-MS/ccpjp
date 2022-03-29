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
                <h1 class="text-white">تعديل المهارة </h1>
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

					<div class="col-lg-8">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
							@if(Session::get('success'))
								<div class="alert alert-success" style="font-size:20px">
									{{Session::get('success')}}
								</div>
							@endif
							@if(Session::get('fail'))
								<div class="alert alert-danger" style="font-size:20px">
									{{Session::get('success')}}
								</div>
							@endif     
							
                            <form action="{{route('PersonUpdateSkill')}}" method="POST" id="resume" >
                    @csrf
                    @method('PUT')
                    
                    

						<div class="form-group">
							<label>     اسم الدورة  </label>
							<input type="text" class="form-control"  name="name" value="{{ $skill->name }}" style="width:80%">
                            <span style="color:red"> @error('name'){{$message}}@enderror</span>
                        </div>
						
                       
                       
                        <input type="hidden" class="form-control" placeholder=""  name="cid" value="{{$skill->id}}">
						
						
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
		</div>
			<br><br>
    </div>
</div>


 
    
 @endsection