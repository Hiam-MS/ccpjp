@extends('header')
@section('content')

<style>
.btn-danger {
    background-image: linear-gradient(to right, #000000 0%, #e74c3c 51%, #000000 100%)
}

.btn-danger {
    padding: 6px 6px;
    width: 100px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
}

.btn-danger:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}

.btn-success {
    background-image: linear-gradient(to right, #34e89e 0%, #0f3443 51%, #34e89e 100%)
}

.btn-success {
    padding: 7px 7px;
    width: 100px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    border-radius: 10px;
    display: block;
}

.btn-success:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}

h2 {
    font-size: 30px;
    background: -webkit-linear-gradient(#000046, #1CB5E0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

@media only screen and (max-width: 768px) {

    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
    }
}
label{
    color:navy;
}
</style>
<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" class="job-info-box">
    <div class="row justify-content-center">
        @if(count($errors)>0)
        <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
            <ul>
                @foreach($errors->all() as $error)
                <li style="list-style: none;">{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-10  my-5">
            <h2 class="h2 text-primary">إدارة الاشخاص</h2><br>
            <div class="card card-default text-white">
                <div class="tab-content text-muted p-3">
                    <div class="tab-pane active" id="admin-tabs-1" role="tabpanel">
                        <form action="" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <h2>المعلومات الاساسية</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">الاسم</label>
                                        <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{$person->Fname}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">اسم الاب</label>
                                        <input type="text" class="form-control" placeholder="" name="Father_name"  value ="{{$person->Father_name}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">الكنية</label>
                                        <input type="text" class="form-control" placeholder="" name="Lname"  value ="{{$person->Lname}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
										<label> الجنس </label>
										<select name="gender" id="gender" class="form-control ">
											<option value="أنثى"{{$person->gender =="أنثى" ? 'selected' : ''}}>أنثى</option>
											<option value="ذكر"{{$person->gender =="ذكر" ? 'selected' : ''}}>ذكر</option>
										</select>
									</div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">الوضع العائلي</label>
                                        <select name="marital_status" id="marital_status" class="form-control">
											<option value="عازب"{{$person->marital_status =="عازب" ? 'selected' : ''}}>عازب/ة</option>
											<option value="متزوج"{{$person->marital_status =="متزوج" ? 'selected' : ''}}>متزوج/ة</option>
											<option value="مطلق"{{$person->marital_status =="مطلق" ? 'selected' : ''}}>مطلق/ة</option>
											<option value="أرمل"{{$person->marital_status =="أرمل" ? 'selected' : ''}}>أرمل/ة</option>
										</select>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">خدمة العلم</label>
                                        <select name="military_service" id="military_service" class="form-control ">
												<option value="منتهية"{{$person->military_service =="منتهية" ? 'selected' : ''}}>منتهية</option>
												<option value="غير منتهية"{{$person->military_service =="غير منتهية" ? 'selected' : ''}}>غير منتهية</option>
												<option value="معفى"{{$person->military_service =="معفى" ? 'selected' : ''}}>معفى</option>
												<option value="أنثى"{{$person->military_service =="أنثى" ? 'selected' : ''}}>أنثى</option>
										</select>                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-2 col-xs-12 mt-2">
                                   
                                </div>
                             
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">تاريخ الميلاد</label>
                                        <input type="date" class="form-control " placeholder=""  value="{{ $person->dob }}" name="dob"  data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">مكان الولادة</label>
                                        <input type="text" class="form-control" placeholder=""  name="place_Of_b" value="{{ $person->place_Of_b }}"  data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">البريد الالكتروني</label>
                                        <input type="email" class="form-control " placeholder="" name="email" value="{{ $person->email }}"   data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                
                                <div class="col-sm-2 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">الهاتف الثابت</label>
                                        <input type="text" class="form-control" placeholder="" name="fixed_phone" value="{{ $person->fixed_phone }}"  data-parsly-trigger="keyup">
                                    </div>
                                </div>
                            </div><br>
                            @if(count($person->PersonEducation) > 0)
                                <div class="dez-divider divider-2px bg-primary mb-4 mt-0"></div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <h2>الشهادات التعليمية</h2>
                                    </div>
                                </div>
                                @foreach($person->PersonEducation as $exp)
                                    <div class="row">
                                        <div class="col-sm-1 col-xs-12 mt-2">
                                        
                                        </div>
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">اسم الشهادة</label>
                                                <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{$exp['degree_name'] }}" data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">المؤسسة التعليمية</label>
                                                <input type="text" class="form-control" placeholder="" name="Father_name"  value ="{{$exp['Institution'] }}" data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">الاختصاص</label>
                                                <input type="text" class="form-control" placeholder="" name="gender"  value ="{{$exp['Major'] }}" data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <div class="row">
                                            <div class="col-sm-2 col-xs-12 mt-2">
                                            </div>
                                            <div class="col-sm-3 col-xs-12 mt-2">
                                                <div class="form-group">
                                                    <label for="">الدرجة</label>
                                                    <input type="text" class="form-control" placeholder="" name="Lname"  value ="{{$exp['Degree'] }}" data-parsly-trigger="keyup">
                                                </div>
                                            </div>
                                        
                                            <div class="col-sm-3 col-xs-12 mt-2">
                                                <div class="form-group">
                                                    <label for="">سنة التخرج</label>
                                                   
                                                    @if($exp['still_study']  != NULL || $exp['Graduation_year']  != NULL)
								

											@if(($exp['still_study']) == 'still study')
                                            <input type="text" class="form-control" placeholder="" name="gender"  value ="مازلت قيد الدراسة" data-parsly-trigger="keyup">

												<td></td>
											@else
												
                                                <input type="text" class="form-control" placeholder="" name="gender"  value ="{{$exp['Graduation_year']}}" data-parsly-trigger="keyup">
											@endif
											
									
										@endif
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div><hr>
                                    @endforeach
                                @endif
                            @if(count($person->PersonExperience) > 0)
                                <div class="dez-divider divider-2px bg-primary mb-4 mt-0"></div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <h2>خبرات العمل</h2>
                                    </div>
                                </div>
                                @foreach($person->PersonExperience as $exp)
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <div class="form-group">
                                            <label for="">المسمى الوظيفي</label>
                                            <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{$exp['Job_title'] }}" data-parsly-trigger="keyup">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <div class="form-group">
                                            <label for="">اختصاص العمل</label>
                                            <input type="text" class="form-control" placeholder="" name="Father_name"  value ="{{$exp['job_Specialize'] }}" data-parsly-trigger="keyup">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <div class="form-group">
                                            <label for="">اسم الشركة</label>
                                            <input type="text" class="form-control" placeholder="" name="gender"  value ="{{$exp['company_name'] }}" data-parsly-trigger="keyup">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                        
                                        </div>
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">تاريخ بدء العمل</label>
                                                <input type="text" class="form-control" placeholder="" name="Lname"  value ="{{$exp['Start_date'] }}" data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">تاريخ انتهاء العمل</label>
                                                @if(($exp['still_work']) == 'still work' )
												    
                                                    <input type="text" class="form-control" placeholder="" name="gender"  value ="مازلت على رأس عملي" data-parsly-trigger="keyup">

											    @else
											
                                                    <input type="date" class="form-control" placeholder="" name="gender"  value ="{{$exp['end_date']}}" data-parsly-trigger="keyup">

											    @endif
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    @endforeach
                                @endif
                            @if(count($person->PersonSkill) > 0)
                                <div class="dez-divider divider-2px bg-primary mb-4 mt-0"></div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <h2>المهارات</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($person->PersonSkill as $exp)
                                        <div class="col-sm-3 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">اسم المهارة</label>
                                                <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{$exp['name'] }} " data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                    @endforeach
                                </div><br>
                            @endif
                            @if(count($person->PersonCousre) > 0)
                                <div class="dez-divider divider-2px bg-primary mb-4 mt-0"></div>
                                <div class="row">
                                    <div class="col-sm-4 col-xs-12 mt-2">
                                        <h2>الدورات التدريبية المتبعة</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($person->PersonCousre as $exp)
                                        <div class="col-sm-4 col-xs-12 mt-2">
                                            <div class="form-group">
                                                <label for="">اسم الدورة</label>
                                                <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{$exp['name'] }}" data-parsly-trigger="keyup">
                                            </div>
                                        </div>
                                    @endforeach
                                </div><br>
                            @endif
                            <div class="dez-divider divider-2px bg-primary mb-4 mt-0"></div>
                            @if(!empty($person->lang))
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <h2>اللغات</h2>
                                </div>
                            </div>
                            <div class="row">
                            
                            @foreach($person->lang as $lan)
                                <div class="col-sm-3 col-xs-12 mt-2">
                                
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="" name="Fname"  value ="{{ $lan}}" data-parsly-trigger="keyup">

                                      
                                    </div>
                               
                                </div>
                                @endforeach
                                @else
                                <p>لايوجد</p>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-xs-6 mt-2">
                                </div>
                                <div class="col-sm-3 col-xs-6 mt-2">
                                    <button type="submit" class="btn btn-primary searchFreelancer w-100">حفظ التعديل</button>
                                </div>
                                <div class="col-sm-3 col-xs-6 mt-2">
                                    <form action=""><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary w-100" ></form>
                                   
                                </div>
                            </div>
                        </form>
                        



                    </div>

                </div>

            </div>
        </div>
    </div>

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

   
  })
 
</script>

@endsection()