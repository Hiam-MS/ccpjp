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
    font-size: 72px;
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
            <h2 class="h2 text-primary">إدارة الشركات</h2><br>
            <div class="card card-default text-white">
                <div class="tab-content text-muted p-3">
                    <div class="tab-pane active" id="admin-tabs-1" role="tabpanel">
                        <form action="{{route('updateCompanyDetail',$company->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">اسم الشركة</label>
                                        <input type="text" class="form-control" placeholder="" name="company_name"  value ="{{$company->company_name}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">طبيعة النشاط (اختصاص الشركة)</label>
                                        <select class="select2bs4 form-control " name="activity" id="activity" style="width:100%">
                                            @foreach ($activities as $activity)
                                                <option value="{{$activity->activity_id}}" {{$activity->activity_id =="$company->act_id" ? 'selected' : ''}}>{{$activity->activity_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">مكان وموقع الشركة</label>
                                        <select class="select2bs4 form-control form-control-lg" name="city" id="city" style="width:100%;">
                                            @foreach ($cities as $city)
                                                <option  value="{{$city->city_id}}" {{$city->city_id =="$company->cci_id" ? 'selected' : ''}}>{{$city->city_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">الرقم الثابت</label>
                                        <input type="text" class="form-control" placeholder="" name="fixed_phone"  value ="{{$company->fixed_phone}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">رقم الفاكس</label>
                                        <input type="text" class="form-control" placeholder="" name="fax_phone"  value ="{{$company->fax_phone}}" data-parsly-trigger="keyup">
                                    </div>
                                </div> -->
                                <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">البريد الالكتروني</label>
                                        <input type="text" class="form-control" placeholder="" name="email"  value ="{{$company->email}}" data-parsly-trigger="keyup">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">السجل التجاري</label>
                                        <input type="text" class="form-control" placeholder="" name="commercial_record"  value ="{{$company->commercial_record}}" data-parsly-trigger="keyup">
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">السجل الصناعي</label>
                                        <input type="text" class="form-control" placeholder="" name="industria_record"  value ="{{$company->industria_record}}" data-parsly-trigger="keyup">
                                    </div>
                                </div> -->
                                <!-- <div class="col-sm-4 col-xs-12 mt-2">
                                    <div class="form-group">
                                        <label for="">موقع الانترنت</label>
                                        <input type="text" class="form-control" placeholder="" name="website"  value ="{{$company->website}}" data-parsly-trigger="keyup">
                                    </div>
                                </div> -->
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