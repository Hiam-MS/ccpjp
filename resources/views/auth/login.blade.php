@extends('header')

@section('content')

<style>
    span{
		font-size:18px;
		color:red;
	}
</style>

        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">تسجيل الدخول</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
    
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">      
        @if(Session::get('successMsg'))
						<div class="alert alert-success">
							{{Session::get('successMsg')}}
						</div>
					@endif  
           
            
            <div class="card card-default">
                <div class="btn-primary" style="background-color:#200080 ;width:100%"><h3 class="h3" style="color:white">تسجيل الدخول</h3>
                
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                   

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label text-md-right"> رقم الموبايل<span>*</span></label>

                            <div class="col-md-6">
                                <input id="mobile" type="tel"  pattern="[0-9]{10}" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" placeholder="ادخل رقم هاتفك" value="{{ old('mobile') }}" required autofocus>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر<span>*</span></i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> حفظ كلمة السر
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color:#200080 ;margin-right:175px">
                                    تسجيل
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    نسيت كلمة السر؟
                                </a>

                                <br>
                                <a class="btn btn-link" href="">
                                      للمساعدة في التسجيل اتصل على 9841
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
