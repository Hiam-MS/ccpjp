@extends('header')
@section('content')
    <!-- header END -->
    <!-- Content -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-dark" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
        
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">السيرة الذاتية</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
                    <h3 class="text-white">اضافة مهارة  جديدة</h3>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->

        <div  class="content-block">
			<!-- Submit Resume COURSE -->
			<div class="section-full bg-white submit-resume content-inner-2">
				<div dir="rtl" lang="ar" class="container" style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;">
					<form action="/resume/storePersonCourse" method="POST" id="resume" >
                    @csrf
                    
                    

						<div class="form-group">
							<label>     اسم الدورة  </label>
							<input type="text" class="form-control" placeholder="Your Full Name" name="name"  >
                            <span style="color:red"> @error('name'){{$message}}@enderror</span>
                        </div>
						
                       
                        <input type="hidden" class="form-control" placeholder=""  name="pid" value={{$id}}>
						
						
						<button type="submit" class="site-button" > أضف</button>
					</form>
				</div>
			</div>
            <!-- Submit Resume END COURSE-->
		</div>
    </div>
    <!-- Content END-->
	<!-- Footer -->
@endsection