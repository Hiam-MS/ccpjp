
@extends('header')
@section('content')
    <!-- header END -->
    <!-- Content -->
   
    

    
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
		
        
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">السيرة الذاتية</h1>
					<div class="breadcrumb-row">
                    <h6 class="text-white">العمل المطلوب</h1>
					</div>
					<!-- Breadcrumb row -->
					<!--<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Job Detail</li>
						</ul>
					</div> -->
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
             <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
					
							<div class="col-lg-4">
								<div class="sticky-top">
									<div class="row">
										<div class="col-lg-12 col-md-6">
											<div class="m-b30">
												<img src="images/blog/grid/6.jpg" alt="">
											</div>
										</div>
										
										<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;"
 class="col-lg-12 col-md-6">
											<div  class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
												<h4 class="text-black font-weight-700 p-t10 m-b15">لوحة التحكم</h4>
												<ul>
													<li><strong class="font-weight-700 text-black"> <a href="#" >عرض الملف الشخصي</a></strong><span class="text-black-light"> </span></li>
													
													<li><strong class="font-weight-700 text-black"><li><a href="#" >تعديل كلمة المرور</a></li></strong> </li>
													<li><strong class="font-weight-700 text-black"><a href="#" >تعديل المعلومات الشخصية  </a>  </strong></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div> 
						
						
							<div class="col-lg-8">
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
									<!-- <h3 class="m-t0 m-b10 font-weight-700 title-head">
										<a href="#" class="text-secondry m-r30"></a>
										<p>
											لدى شركة :
									</h3> -->
                                    <form action="/resume/storePersonJobCat" method="POST" id="resume" >
                                    @csrf

									<br>
									<h3 class="font-weight-600">  اختصاص العمل المطلوب  </h3>
									<p> </p>
									<p>  </p>
                                   
                                   

                                    <select name="category[]" id="category" multiple='multiple' size="13">
                                    @foreach($jobCat as $category)
                                     <option value="{{$category->id}}">{{$category->name}}</option>
                                     @endforeach
                                   </select>
                                   <br>

								
									<br>
                                    <p>
                                    <input type="hidden" class="form-control" placeholder=""  name="pid" value="{{$Person->id}}">
									
                                    <button type="submit" class="site-button" > أضف</button>
									</p>
									
									<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
									
										
                                      </form>
								
                                      <form action="/resume/storelan" method="POST" id="resume" >
									<h3 class="font-weight-600">اللغات </h3>
									<p>
									
									</p>
                                    <select name="lang[]" id="category" multiple='multiple' size="3">
                                    
                                     <option value="{{$category->id}}">عربي</option>
                                     <option value="{{$category->id}}">الماني</option>
                                     <option value="{{$category->id}}">اسباني</option>
                                    
                                   </select>
                                   <br>
									<p>
									<button type="submit" class="site-button" > أضف</button>
									</p>
									<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								
</form>
										
									

                                    
									
									<a href="#" class="site-button">تقدم الآن</a>
								</div>
							</div>
						
					</div>
				</div>
			</div>
			<br><br>
            <!-- Job Detail -->
			<!-- Our Jobs -->
			
			<!-- Our Jobs END -->
		</div>

		
       
    </div>
    <!-- Content END-->
	<!-- Footer -->
    
  @endsection