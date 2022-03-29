@extends('header')
@section('content')
    @csrf
  <style>
	     .btn-primary {background-image: linear-gradient(to right, #000046 0%, #1CB5E0  51%, #000046  100%)}
         .btn-primary {
            padding: 6px 6px;
            width :100px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }

          .btn-primary:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
	.dropbtn {

  color: white;
  padding: 4px;
  padding-right:50px;
  padding-left:50px;
  font-size: 22px;
  border: none;
  cursor: pointer;
  background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(7,59,154,1) 51%, rgba(0,212,255,1) 100%);
}  
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 8px 8px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
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
								
										
								<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="col-lg-9 ">
									<div  class="widget p-lr20 p-t20  widget_getintuch radius-sm">
                                         <!-- <h4 class="text-black font-weight-700 p-t10 "><a href="{{route('admin.Dash')}}" > لوحة التحكم<a></h4> -->
                    <!-- <ul> -->
											
										
                                                <!-- <li><strong class="font-weight-700 text-black"> <a href="{{route('showCompany')}}" > إدارة الشركات </a></strong><span class="text-black-light"> </span></li>
                                                <li><strong class="font-weight-700 text-black"><a href="{{route('people')}}" >   إدارة الأشخاص</a>  </strong></li>	
												<li><strong class="font-weight-700 text-black"><a href="{{route('pendingJob')}}" >إدارة الوظائف</a>  </strong></li>	
												<li><strong class="font-weight-700 text-black"><a href="{{route('pendingJob')}}" >      وظائف معلقة</a>  </strong></li>	
												<li><strong class="font-weight-700 text-black"><a href="{{route('cities')}}" >إدارة المناطق</a>  </strong></li>	
												<li><strong class="font-weight-700 text-black"><a href="{{route('jobs')}}" >إدارة فرص العمل</a>  </strong></li>	 -->
												<div class="dropdown">
                          <button class="dropbtn"> لوحة التحكم</button>
                          <div class="dropdown-content">
                            <a href="{{route('showCompany')}}">إدارة الشركات</a>
                            <a href="{{route('people')}}">إدارة الأشخاص</a>
                            <a href="{{route('jobs')}}">إدارة فرص العمل</a>
                            <a href="{{route('pendingJob')}}">وظائف معلّقة</a>
                            <a href="{{route('cities')}}">إدارة المناطق</a>
                            <a href="#">إدارة طبيعة النشاطات</a>
                            <a href="#">إدارة اختصاصات العمل</a>
                          </div>
                        </div>

											<!-- </ul> -->
									</div>
								</div>

							</div>
						</div>
					</div>
						

					<div class="col-lg-8">
						<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
                            <div>
                               <h4 ><p>اهلا و سهلا {{Auth::user()->name}}</p></h4> 
                               <hr>
                            </div>    
                            <div class="">
                            <div class="">
				<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
					<div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell text-primary"><i class="ti-image" ></i></a> </div>
						<div class="icon-content">
							<h5 class="dlab-tilte text-uppercase">نشر فرصة عمل الكترونية</h5>
                            <p>يمكن للمؤسسات المسجلة على الموقع و بطريقة سهلة  نشر فرصة عمل الكترونياً, حيث  تمكّن الباحثين عن عمل من الوصول إاليها بسهولة و الاطلاع على تفاصيل هذا العمل بكل بساطة والتقدم لهذا العمل في حال توافرت الشروط المناسبة لهم</p>
							
						</div>
					</div>
				</div>
         
    <hr>
		
           
         
    
            

            </div>   
  

						</div>
					</div>









						
				</div>
			</div>
		</div>
			<br><br>
    </div>
</div>
 
    
 @endsection