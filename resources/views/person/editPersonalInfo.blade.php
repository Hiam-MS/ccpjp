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

<style>
    .form-control{
        font-size:20px;
        font-family: Arial, Helvetica, sans-serif;

    }
	span{
		font-size:18px;
		color:red;
	}
	</style>
	

<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
	<div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white">لوحة التحكم </h1>
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
										</div><br>  
									</ul>
  								</div>
							</div>
						</div>
					</div>
				</div>
				

					<div class="col-lg-9">
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
						
							<div class="row">
          						<div class="col-md-12">
									<div class="card card-default">
										<div class="card-header ">
											<h3 class="card-title">المعلومات الشخصية</h3>
										</div>

										<div class="card-body p-0">
											<div class="bs-stepper">
												<div class="bs-stepper-header" role="tablist">
													<div class="step" data-target="#logins-part">
														<button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
															<span class="bs-stepper-circle">1</span>
															<span class="bs-stepper-label">المعلومات الأساسية</span>
														</button>
													</div>
													<div class="line"></div>
														<div class="step" data-target="#information-part">
															<button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
																<span class="bs-stepper-circle">2</span>
																<span class="bs-stepper-label">المعلومات الاضافية </span>
															</button>
														</div>
													</div>
													<div class="bs-stepper-content">
														<div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
															<form action="{{route('PersonUpdateInfo')}}" method="POST" id="resume" style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right; padding-right:40px">
																@csrf
																@method('PUT')
																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<label>الاسم </label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="fname" value="{{ $person->Fname }}"  data-parsly-trigger="keyup" >
																			@if($errors->any('fname'))
																				<span>{{$errors->first('fname')}}</span>
																			@endif
																		</div>
																	</div>

																	<div class="col-sm-4">
																		<div class="form-group">
																			<label>اسم الاب </label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="father_name" value="{{ $person->Father_name }}"  data-parsly-trigger="keyup" >
																			@if($errors->any('father_name'))
																				<span>{{$errors->first('father_name')}}</span>
																			@endif
																		</div>
																	</div>

															
																	<div class="col-sm-4">
																		<div class="form-group">
																			<label>الكنية </label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="Lname" value="{{ $person->Lname }}"  data-parsly-trigger="keyup" >
																			@if($errors->any('Lname'))
																				<span>{{$errors->first('Lname')}}</span>
																			@endif
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-sm-4">
																		<div class="form-group">
																			<label> الجنس </label>
																			<select name="gender" id="gender" class="form-control form-control-lg">
																				<option value="أنثى"{{$person->gender =="أنثى" ? 'selected' : ''}}>أنثى</option>
																				<option value="ذكر"{{$person->gender =="ذكر" ? 'selected' : ''}}>ذكر</option>
																				
																			</select>
																			@if($errors->any('gender'))
																				<span>{{$errors->first('gender')}}</span>
																			@endif
																		</div>
																	</div>

																	<div class="col-sm-4">
																		<div class="form-group">
																		<label> خدمة العلم <span>*</span></label>
                        					<!-- <select name="military_service" class="form-control  form-control-lg" data-parsly-trigger="keyup">
												<option value="">{{ $person->military_service }}</option>
												<option value="منتهية" {{(old('military_service') && old('military_service')=='منتهية' )?'selected':''}}>منتهية</option>
												<option value="غير منتهية" {{(old('military_service') && old('military_service')=='غير منتهية' )?'selected':''}}>غير منتهية</option>
												<option value="معفى" {{(old('military_service') && old('military_service')=='معفى' )?'selected':''}}>معفى</option>
												<option value="*" {{(old('military_service') && old('military_service')=='*' )?'selected':''}}>*   </option>
											</select>  -->
											<select name="military_service" id="military_service" class="form-control form-control-lg">
																				<option value="منتهية"{{$person->military_service =="منتهية" ? 'selected' : ''}}>منتهية</option>
																				<option value="غير منتهية"{{$person->military_service =="غير منتهية" ? 'selected' : ''}}>غير منتهية</option>
																				<option value="معفى"{{$person->military_service =="معفى" ? 'selected' : ''}}>معفى</option>
																				<option value="أنثى"{{$person->military_service =="أنثى" ? 'selected' : ''}}>أنثى</option>
																			</select>
																			@if($errors->any('military_service'))
																				<span>{{$errors->first('military_service')}}</span>
																			@endif
																		</div>
																	</div>

																	<div class="col-sm-4">
																		<div class="form-group">
																			<label> الوضع العائلي <span>*</span></label>
																			<!-- <select name="marital_status" class="form-control form-control-lg"   value="{{ $person->marital_status }}">
																				<option value="عازب/ة">عازب/ة</option>
																				<option  value="متزوج/ة"> متزوج/ة</option>
																				<option  value="مطلق/ة">مطلق/ة</option>
																				<option  value="أرمل/ة">أرمل/ة </option>
																			</select>	 -->
																			<select name="marital_status" id="marital_status" class="form-control form-control-lg">
																				<option value="عازب"{{$person->marital_status =="عازب" ? 'selected' : ''}}>عازب</option>
																				<option value="متزوج"{{$person->marital_status =="متزوج" ? 'selected' : ''}}>متزوج</option>
																				<option value="مطلق"{{$person->marital_status =="مطلق" ? 'selected' : ''}}>مطلق</option>
																				<option value="أرمل"{{$person->marital_status =="أرمل" ? 'selected' : ''}}>أرمل</option>
																			</select>
																			@if($errors->any('marital_status'))
																				<span>{{$errors->first('marital_status')}}</span>
																			@endif
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>تاريخ الميلاد</label>
																			<input type="date" class="form-control form-control-lg" placeholder="Web Designer"  value="{{ $person->dob }}" name="dob"  data-parsly-trigger="keyup">
																			@if($errors->any('dob'))
																				<span>{{$errors->first('dob')}}</span>
																			@endif
																		</div>
																	</div>

																	<div class="col-sm-6">
																		<div class="form-group">
																		<label>عنوان الاقامة الحالي<span style="color:red">(اختياري)</span></label>
																		
																		<select class="select2bs4 form-control form-control-lg" name="city" id="city" style="width:100%">
																			@foreach ($cities as $city)
																	
																				<option value="{{$city->city_id}}" {{$city->city_id =="$person->ci_id" ? 'selected' : ''}}>{{$city->city_name}}</option>
																			@endforeach
																		</select>
																			
																		</div>
																	</div>
																</div>

																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>رقم الخليوي <span>*</span></label>
																			<input type="text" class="form-control form-control-lg" placeholder="0933333333"  name="mobile_number"  pattern="[0]{1}[9]{1}[0-9]{8}" value="{{ Auth::user()->mobile }}"  data-parsly-trigger="keyup">
																			@if($errors->any('mobile_number'))
																				<span>{{$errors->first('mobile_number')}}</span>
																			@endif		
																		</div>
																	</div>

																	<div class="col-sm-6">
																		<div class="form-group" >
																			<label>  اللغات <span>*</span></label><br>
																			<select class="js-example-basic-multiple form-control form-control-lg" name="lang[]" multiple="multiple" >
																			<option value="عربي" {{$person->lang =="عربي" ? 'selected' : ''}}>عربي</option>	
																			<option value="عربي" >عربي </option>
																				
																		
																				<option value="انكليزي">انكليزي</option>
																				<option value="اسباني">اسباني</option>
																				<option value="ايطالي">ايطالي</option>
																				<option value="فرنسي">فرنسي</option>
																				<option value="روسي">روسي</option>
																			</select>

																	
																			<!-- <select name="lang[]"  class="select2 form-control form-control-lg" multiple="multiple" >
																				<option value="عربي"{{$person->lang =="عربي" ? 'selected' : ''}}>عربي</option>
																				<option value="انكليزي"{{$person->lang =="انكليزي" ? 'selected' : ''}}>انكليزي</option>
																				<option value="اسباني"{{$person->lang =="اسباني" ? 'selected' : ''}}>اسباني</option>
																				<option value="ايطالي"{{$person->lang =="ايطالي" ? 'selected' : ''}}>ايطالي</option>
																				<option value="فرنسي"{{$person->lang =="فرنسي" ? 'selected' : ''}}>فرنسي</option>
																				<option value="روسي"{{$person->lang =="روسي" ? 'selected' : ''}}>روسي</option>

																			</select> -->
																
									</table>
																			@if($errors->any('lang'))
																				<span>{{$errors->first('lang')}}</span>
																			@endif	
																		</div>
																	</div>
																</div>

									
																<table>
																	<tr >
																	<p style="font-size:18px;; color:red"> ملاحظة:عند تعديل أي حقل يجب ضغط على زر الحفظ  قبل الانتقال للتالي</p> 
																	</tr>
												
																	<tr>
																		<td><form><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></form></td>
																		<td><button type="submit" class="btn btn-primary">حفظ</button></td>
																		<td><form><input type="button" value="التالي" onclick="stepper.next()" class="btn btn-primary"></form></td>
																		
																	</tr>
																</table>
															</form>
														</div>

														<div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
															<form action="{{route('PersonUpdateInfo2')}}" method="POST" id="resume" style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right; padding-right:40px">
																@csrf
																@method('PUT')
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>الهاتف الأرضي <span style="color:red">(اختياري)</span></label>
																			<input type="text" class="form-control form-control-lg" placeholder="" name="fixed_phone" value="{{ $person->fixed_phone }}"  data-parsly-trigger="keyup">
																			<span style="color:red"> @error('fixed_phone'){{$message}}@enderror</span>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label>عنوان البريد الالكتروني<span style="color:red">(اختياري)</span></label>
																			<input type="email" class="form-control form-control-lg" placeholder="info@gmail.com" name="email" value="{{ $person->email }}"   data-parsly-trigger="keyup">
																			<span style="color:red"> @error('email'){{$message}}@enderror</span>
																		</div>
																	</div>
																</div>
																
																<div class="row">
																	<div class="col-sm-6">
																		<div class="form-group">
																		<label>مكان الولادة</label>
																			<input type="text" class="form-control form-control-lg" placeholder=""  name="place_Of_b" value="{{ $person->place_Of_b }}"  data-parsly-trigger="keyup">
																			@if($errors->any('place_Of_b'))
																				<span>{{$errors->first('place_Of_b')}}</span>
																			@endif

														

																			
																			<!-- <input type="text" class="form-control form-control-lg" placeholder=""  name="Current_address" value="{{ $person->Current_address }}"  data-parsly-trigger="keyup"> -->
																			
					
																			<span style="color:red"> @error('Current_address'){{$message}}@enderror</span>
																		</div>
																	</div>
															
																</div>
																
																

																<table>
																<tr>
																	<p style="font-size:18px; color:red">ملاحظة عند الانتهاء من تعبئة الحقول يجب الضغط على زر الحفظ</p>
																</tr>
																		<tr>
																			<td><form action=""><input type="button" value="السابق" onclick="stepper.previous()" class="btn btn-primary"></form></td>
																			<td><button class="btn btn-primary" >حفظ</button></td>
																		</tr>
																		
																	
																</table>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><br><br>
		</div>
	</div>
</div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>

 
    
 @endsection