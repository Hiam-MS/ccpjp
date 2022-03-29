@extends('header')
@section('content')
    @csrf
    

<style>
    
#jobs tr:hover {background-color: #ddd;}
#jobs th {
		padding:5px;
		text-align: center;
		background-color:#200080;
		color: white;
		}

		#jobs tr {
		padding:5px;
		text-align: center;
		
		color: black;
		}
</style>

    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"> الفرص المنشورة </h1>
					
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

							<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-12 col-md-6">
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
						<form method="post" action="#" id="printJS-form">
                       
							<br>

						
							<ul class="post-job-bx">
                            
                               
                                
								 
                                <li>
								@if(count($jobs)) 
                                	@foreach($jobs as $item)
									
									<a href="{{url('/job/details',$item->id)}}">
									<div class="d-flex">
											<div class="job-time mr-auto">
												<span>{{$item->created_at->diffForHumans()}}</span>
											</div>
										</div>
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{asset('images/logo/icon1.png')}}"/></span>
											</div>

											<div class="job-post-info">
												<h4>{{$item-> job_title}}</h4>
												<ul>
													<li> {{$item->city}}</li>
													<li> {{$item->job_type}}</li>
													<li> {{$item->job_position}}</li>
												</ul>
											</div>
										</div>
										
									@if($item->end_job > NOW())
										<form action="{{url('/company/update_EndJob',$item->id)}}" method="POST">
											@csrf
												<div class="salary-bx">
													
													<button type="submit" class="btn btn-primary">انهاء</button>
												</div>

										</form>
										@else
										<button class="btn btn-danger ">منتهية    </button>
									@endif
										
										<div class="d-flex">
											<div class="job-time mr-auto">
												<span>{{$item->company_name}}</span>
											</div>
										</div>
										
									</a>
                                    <br><hr>
                                    @endforeach
									@else
										<li>  لايوجد فرص عمل  لعرضها</li>
									@endif
								</li>
								
                              
								
								<span>{{$jobs->links('layouts.paginationlinks')}}</span>
								<table>
								<tr>
										
								<td><form><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></form></td>
									
								</tr>
							</table>
								  
   
 </form>
		
								
							
							</ul>
                        </div>
			        </div>
		        </div>
		    </div>
        </div>
	</div>

 
    
 @endsection