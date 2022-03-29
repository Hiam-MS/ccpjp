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
                    <h3 class="text-white">اضافة شهادة تعليمية جديدة</h3>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->

        <div  class="content-block">
			<!-- Submit Resume -->
			<div class="section-full bg-white submit-resume content-inner-2">
				<div dir="rtl" lang="ar" class="container" style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;">
					<form action="/resume/storePersonEdu" method="POST" id="resume" >
                    @csrf
                    
                    

						<div class="form-group">
							<label> اسم الشهادة</label>
							<input type="text" class="form-control" placeholder="Your Full Name" name="degree_name"  data-parsly-trigger="keyup">
						</div>
						<div class="form-group">
							<label> المؤسسة التعليمية</label>
							<input type="text" class="form-control" placeholder="info@gmail.com" name="Institution" data-parsly-trigger="keyup"> 
						</div>
                        <div class="form-group">
							<label>الاختصاص </label>
							<input type="text" class="form-control" placeholder="" name="Major" data-parsly-trigger="keyup">
						</div>
						<div class="form-group" >
							<label>    الدرجة/ الشهادة              </label>
                            <label> &nbsp                    </label>
                            <label> &nbsp                    </label>
                            <label> &nbsp                    </label>
							<select name="Degree" >
                            <option  >يرجى الاختيار</option>
								
                                <option value="f+"  > أقل من ثانوية عامة </option>
                                <option value="f"  > ثانوية عامة </option>
                                <option value="a"  > معهد متوسط </option>
                                <option value="B"  > بكالوريوس / اجازة </option>
                                <option value="m"  > دبلوم دراسات عليا </option>
                                <option value="M"  > ماجستير </option>
								<option value="D"  > دكتوراه </option>
                                
								
							</select>
                            <spam> &nbsp                                     </spam>
                            <label> &nbsp                    </label>
                            <label> &nbsp                    </label>
                            <label> &nbsp                    </label>
                            
                            

                            
						</div>
                       
						<div class="form-group">
							<label>سنة التخرج </label>
							<input type="date" class="form-control" placeholder="Web Designer"  name="Graduation_year" >
						</div>
						<div class="form-group">
							<label>دولة الدراسة </label>
							<input type="text" class="form-control" placeholder=""  name="Country">
							
							<input type="hidden" class="form-control" placeholder=""  name="pid" value={{$id}}>
						</div>
                        
						
						
						<button type="submit" class="site-button" > أضف</button>
					</form>
				</div>
			</div>
            <!-- Submit Resume END -->
		</div>
    </div>
    <!-- Content END-->
	<!-- Footer -->
@endsection