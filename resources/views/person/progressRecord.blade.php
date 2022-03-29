@extends('header')
@section('content')
<style>
	
	#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size:20px;
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
	font-size:25px;
	text-align:center;
}
</style>
@csrf
    
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
	<div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white"> سجل التقدمات  </h1>
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
													
												</div>
											</div><br> <br> <br>  
										</ul>
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
                           


                            
                                <form action="">
                                    @csrf
									@if(count($jobs) > 0)
                                    <table id="customers">
                                        <thead>
                                            <tr>
                                                <th>المسمى الوظيفي</th>
                                                <th>الحالة</th>
                                              
                                            </tr>
                                            <tbody>
                                                @foreach($jobs as $job)
                                                <tr>
                                                    <td>
                                                        <a href="{{url('/job/details',$job->id)}}" style="font-size:20px">{{ $job->job_title }}</a>
                                                    </td>
                                                    <td>
                                                    @if ($job->choice =='hired')
						      		                    <h4><span class="badge badge-success w-100">تم القبول</span></h4>
						                        	@elseif($job->choice =='rejected')
						      		                    <h4><span class="badge badge-danger w-100">تم الرفض</span></h4>
						      	                    @else
						      		                    <h4><span class="badge badge-primary w-100">في حالة انتظار</span></h4>
						      	                    @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </thead>
                                    </table>
									@else
									<p> لم تتقدم لفرص عمل سابقة </p> 
									@endif
									<br>
									<table>
								<tr>
									<td></td>
									<td></td>
									<td>	<input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></td>
									
								</tr>
							</table>
								
                                </form>

								
                        </div>   
  

					</div>
				

                </div>
			</div>
	    </div>
			<br><br>
   



 
    
 @endsection