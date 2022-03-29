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
<div class="page-content bg-white">
    <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
        <div class="container">
            <div class="dez-bnr-inr-entry">
                <h1 class="text-white">وظائف المعلقة</h1>
					
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
									
									</div>
								</div>
										
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-12 col-md-6">
									<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
                                         <h4 class="text-black font-weight-700 p-t10 m-b15"><a href="{{route('admin.Dash')}}" > لوحة التحكم<a></h4>
                                            <ul>
											
										
                                                <li><strong class="font-weight-700 text-black"> <a href="{{route('showCompany')}}" > الشركات الحالية </a></strong><span class="text-black-light"> </span></li>
                                                <li><strong class="font-weight-700 text-black"><a href="{{route('resuems')}}" >   عرض السير الذاتية المتاحة</a>  </strong></li>	
                                                <li><strong class="font-weight-700 text-black"><a href="{{route('pendingJob')}}" >      وظائف معلقة</a>  </strong></li>
													
                                               
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
						
                        <!-- <h5 class="widget-title font-weight-700 text-uppercase" style="color:black"> وظائف المعلقة  </h5> -->
							<br>

						
							<ul class="post-job-bx">
                            
                               
                                
								 
                                <li>
								@if(count($job) >0)
                                	@foreach($job as $item)
									
									<a href="{{url('/job/details',$item->id)}}">
										<div class="d-flex m-b30">
											<div class="job-post-company">
												<span><img src="{{asset('images/logo/icon1.png')}}"/></span>
											</div>
											<div class="job-post-info">
											<h4>{{$item-> company_name}}</h4>
                                                <h4>{{$item-> job_title}}</h4>
												<ul>
													
													<li> {{$item->job_type}}</li>
                                                    <li>    </li>

                                                    <li ><h4><span class="badge badge-primary w-100">{{$item->status}}</span></h4></li>
                                                    
													
												</ul>
                                                
											</div>
										</div>
										
										
									</a>
                                    <br><hr>
                                    @endforeach
									@else
										<li> <h5>لايوجد فرص عمل  لعرضها </h5> </li>
									@endif
								</li>
								
                              
								
								
							 
								
								
							
							</ul>
                        </div>
			        </div>
		        </div>
		    </div>
        </div>
	</div>
</div>
 
    
 @endsection