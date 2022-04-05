@extends('header')
@section('content')
    <!-- Content -->
    @csrf
    
<style>
	h5 {
  color: navy;
  text-align: right;
  
}
textarea{
	resize: none;
	
}
textarea.form-control{
	color: black;
	font-size:17px;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  
 
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 3px solid #ddd;
  padding: 8px;
  font-size:18px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
 
  color: white;
  
}
#customers2 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers2 td, #customers th {
  border: 2px solid #ddd;
  padding: 8px;
  font-size:18px;
}

#customers2 tr:nth-child(even){background-color: #f2f2f2;}

#customers2 tr:hover {background-color: #ddd;}

#customers2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
 
  color: white;
  
}

#resuems tr:hover {background-color: #ddd;}
#resuems th {
		padding:5px;
		text-align: center;
		background-color:#200080;
		color: white;
		}

		#resuems tr {
		padding:5px;
		text-align: center;
		
		color: black;
		font-size:20px;
		}


</style>
    
<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">تفاصيل العمل </h1>
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
									<img src="{{asset('images/blog/grid/6.jpg')}}" alt="">
									</div>
								</div>
										
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-12 col-md-6">
									<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
										<h4 class="text-black font-weight-700 p-t10 m-b15">تفاصيل العمل</h4>
										<ul>
											<li><i  class="ti-location-pin"></i><strong class="font-weight-700 text-black">العنوان: {{$job->city}} </strong><span class="text-black-light"> </span></li>
											<li><i class="ti-money"></i><strong class="font-weight-700 text-black">الراتب : {{$job->budget}}</strong> </li>
											<li><i class="ti-user"></i><strong class="font-weight-700 text-black">عدد الاشخاص المطلوبين:  {{$job->number_of_employess}} </strong></li>
											
											<br>
															@if(auth::user())
												@if(auth()->user()->role == 'a')
												<li><strong class="font-weight-700 text-black">الحالة : {{$job->status}}</strong> </li>
												@if($job->status == 'pending' | $job->status == 'denied')
												
												
							<form action="{{route('accepte_JobStatuse',$job->id)}}" method="POST">
											@csrf
											<button id="viewApplyedJob" type="submit" class="btn btn-primary btn-block w-100">موافقة على النشر</button>
											</form>
											@endif
											@if($job->status == 'pending' | $job->status == 'accepted')
											
											<form action="{{route('denied_JobStatuse',$job->id)}}" method="POST">
											@csrf
											<button id="viewApplyedJob" type="submit" class="btn btn-primary btn-block w-100">عدم الموافقة على النشر</button>
											</form>
											@endif
											@endif
											@endif
											
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
						<h3 class="m-t0 m-b10 font-weight-700 title-head">
							<p style="color:navy;text-align:center"><u><b>{{$job->company_name}}</b></u></p> <br>
							<!-- <p style="color:navy"> {{$job->job_title }} </p><br> -->
							
						</h3>
						<!-- <ul class="job-info">
							<li style="font-size:20px"><strong >الحد الأدنى للمستوى التعليمي:</strong> <i class="ti-stamp text-black m-r5"></i>{{$job->degree}} </li>
							<li style="font-size:20px"><i class="ti-location-pin text-black m-r5"></i> {{$job->city}} </li>
						</ul><br><br> -->

						<!-- @if($job->job_requirement != NULL)
							<h5 class="font-weight-600">متطلبات خاصة بهذه الفرصة</h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<p class="p-t20" style="font-size:20px">{{$job->job_requirement}}</p><br><br>
						@endif -->

						<!-- @if($job->functional_tasks != NULL)
							<h5 class="font-weight-600"></h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<p  style="font-size:20px">{{$job->functional_tasks}}</p><br><br>
						@endif -->

						<!-- @if($job->budget != NULL)
							<h5 class="font-weight-600"></h5>
							<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
							<p style="font-size:20px">{{$job->budget}}</p><br><br>
						@endif -->
				
						<table id="customers2">
							<tr>
								<td><h5 class="font-weight-600"> المسمى الوظيفي</h5></th>
								<td>{{$job->job_title}}</td>
								
							</tr>
							<tr>
							@if($job->functional_tasks != NULL)
								<td><h5 class="font-weight-600"> المهام الوظيفية</h5></th>
								<td>{{$job->functional_tasks}}</td>
							@endif
							</tr>
							<tr>
							@if($job->job_requirement != NULL)
								<td><h5 class="font-weight-600"> متطلبات خاصة بهذه الوظيفة</h5></th>
								<td>{{$job->job_requirement}}</td>
							@endif
							</tr>
							
							<tr>
								@if($job->budget != NULL)
								<td><h5 class="font-weight-600"> الراتب والفوائد</h5></th>
								<td>{{$job->budget}}</td>
								@endif
							</tr>
							
						</table>
						<table id="customers">
							<tr>
								<th><h5 class="font-weight-600"> الحد الأدنى للمستوى التعليمي</h5></th>
								<td><p style="font-size:20px"><i class="ti-stamp text-black m-r5"></i>{{$job->degree}}</p></td>
								<th><h5 class="font-weight-600">    مكان العمل  </h5></th>
								<td><p style="font-size:20px"><i class="ti-location-pin text-black m-r5"></i> {{$job->city}}</p></td>
							</tr>
							<tr>
								<th><h5 class="font-weight-600">   الجنس المطلوب للعمل  </h5></th>
								<td><p style="font-size:20px">{{$job->gender}}</p></td>
								<th><h5 class="font-weight-600">   طبيعة العمل  </h5> </th>
								<td><p style="font-size:20px">{{$job->job_type}}</p></td>
							</tr>
							<tr>
								<th><h5 class="font-weight-600">   تم النشر بتاريخ </h5></th>
								<td><p style="font-size:20px">{{$job->created_at->diffForHumans()}}</p></td>
								<th><h5 class="font-weight-600">    تاريخ الانتهاء  </h5></th>
								<td><p style="font-size:20px">{{$job->end_job}}</p></td>
								
							</tr>
							
							<!-- <tr>
								<td><p style="font-size:20px">{{$job->created_at->diffForHumans()}}</p></td>
								<td><p style="font-size:20px">{{$job->end_job}}</p></td>
							</tr> -->
							
							
							<!-- <tr>
								<td><p style="font-size:20px">{{$job->gender}}</p></td>
								<td><p style="font-size:20px">{{$job->job_type}}</p></td>
							</tr> -->
							
						</table>
							
							
							

						

					
							

							@if(auth::user())
								@if(auth()->user()->role == 'p')
									@if ($result == 'exist')
										<div class="card card-default mt-5">  
											<button class="btn btn-success btn-block"><i class="fa fa-check"></i>لقد تقدمت على هذه الوظيفة</button>
										</div>

									@else
										<div class="card card-default mt-5">  
											<form action="{{url("/job/application/$job->id/store")}}" method="POST">
												{{ csrf_field() }}
												<input type="hidden" value="{{$job->id}}" name="job">
												<button type="submit" class="btn btn-primary btn-block" style="width:100%">تقدّم الآن</button>
														
											</form>
										</div>
									@endif
								@endif
							@endif
									

							@if(auth::user())
								@if(auth()->user()->role == 'c')
									<div class="card card-default mt-5">  
										<form action="{{url("/job/applyedToJob/$job->id")}}" method="">
											{{ csrf_field() }}
											<input type="hidden" value="{{$job->id}}" name="job">
											<button id="viewApplyedJob" type="submit" class="btn btn-primary btn-block w-100" >عرض المتقدمين</button>
													
										</form>
									</div>
									
								@endif
								
							

							@endif

							

							<!-- <table>
								<tr>
									<td></td>
									<td></td>
									
									<td></td>
									<td><button type="submit" class="  btn btn-primary" ">رجوع</button></td>
								</tr>
							</table> -->
							
						<ul class="job-info">
							<li style="font-size:20px"></li>
							<li style="font-size:20px"> </li>
						</ul><br><br>
							
						</div>
					</div>
				</div>
			</div>
		</div><br><br>
    </div>
</div>

    
 @endsection





@section('jsplugins')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Readmore.js/2.2.0/readmore.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('article').readmore({
			  afterToggle: function(trigger, element, expanded) {
			    if(! expanded) { // The "Close" link was clicked
			      $('html, body').animate( { scrollTop: element.offset().top }, {duration: 100 } );			  
			    } 
			  }
			});
		});
	</script>
@endsection


