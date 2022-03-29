@extends('header')
@section('content')


<style>
    label{
        font-size:20px;
        
    }
</style>
    <!-- Content -->
    @csrf
    

    

        <!-- inner page banner -->
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white"> المتقدمين </h1>
			</div>
        </div>
    </div>
        <!-- inner page banner END -->
        <!-- contact area -->
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
							<div class="form-group">
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
                                <form action="" style="padding-right:20px;">
                                    @csrf
                                   
                                    <label for="" class="" style="color:blue">  المسمى الوظيفي </label>
                                    <p style="font-size: 20px">{{$job->job_title}}</p><br>
                                    <table class="table">                              
                                        <tbody>
                                        @if(count($applicants) > 0)
                                            @foreach($applicants->sortByDesc('created_at') as $applicant )
                                                <tr>
                                                    @if(!empty($applicant->photo))
                                                        <td class="text-center" ><img src="{{asset('/storage/photo, $applicant->photo')}}" class="p-0 rounded-circle" style="height: 80px"></td> 
                                                    @else 
                                                        <td class="text-center"><i class="ti-user" ></i></td>
                                                    @endif 
                                                    <td class="text-nowrap"><h5 class="h5"> <a class="text-info" href="{{route('personDetail',$applicant->id)}}">{{ $applicant->Fname }} {{ $applicant->Father_name }} {{ $applicant->Lname }}</a></h5>
                                                        <p>{{ $applicant->job_title }}</p>
                                                        <p class="small"> 
                                                            <span class="mr-5"><i class="fa fa-envelope"></i> تم التقدم بتاريخ: {{ $applicant->created_at }}</span>                                            
                                                            <span><i class="fa fa-map-marker-alt"></i> {{ $applicant->city }}</span>
                                                        </p>
                                                    </td>
										
                                                     @if ($applicant->choice == 'hired')
                                                        <td>
                                                            <h4><span class="badge badge-success w-100"><i class="text-white fa fa-check"></i> <strong>مطلوب</strong></span></h4>
                                                        </td>
                                                     @elseif ($applicant->choice == 'rejected')
                                                        <td>
                                                            <h4><span class="badge badge-danger w-100"><i class="text-white fa fa-times"></i> <strong>مرفوض</strong></span></h4>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <a href="{{url("/job/applyedToJob/$job->id/$applicant->id/hire")}}"  data-toggle="tooltip" data-placement="top" title="قبول المرشح">
                                                                <i class="fa fa-thumbs-up fa-3x " style="color:green"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{url("/job/applyedToJob/$job->id/$applicant->id/reject")}}" data-toggle="tooltip" data-placement="top" title="رفض المرشح">
                                                                <i class="fa fa-thumbs-down fa-3x" style="color:red"></i>
                                                            </a>
                                                        </td>
                                                    @endif                                      
                                                </tr>
                                            @endforeach
                                            @else
										<li style="font-size:20px">  لايوجد  متقدمين  لهذه الوظيفة</li>
									@endif
                                        </tbody>
                                    </table>


                              
                                </form>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div><br><br>
    </div>


    
 @endsection








