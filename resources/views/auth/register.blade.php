@extends('header')

@section('content')
<style>
    select.form-control{
        font-size:18px;
        font-family: Arial, Helvetica, sans-serif;
    }
    span{
		font-size:18px;
		color:red;
	}
</style>


    
<div class="dez-bnr-inr overlay-black-dark" style="background-image:url({{ asset('images/banner/bnr1.jpg')}});">
    <div class="container">
         <div class="dez-bnr-inr-entry">
                <h1 class="text-white"> تسجيل حساب جديد </h1>
		</div>
    </div>
</div>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">        
                    <div class="card card-default">
                        <div class="btn btn-primary" style="width:100%"><h3 class="h3">تسجيل حساب جديد</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">اسم المستخدم<span>*</span></label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" placeholder="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="mobile" class="col-md-4 col-form-label text-md-right"> رقم الموبايل<span>*</span></label>
                                        <div class="col-md-6">
                                            <input id="mobile" type="tel"  pattern="[0]{1}[9]{1}[0-9]{8}" placeholder="0933333333" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('mobile') }}" required>
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر<span>*</span></label>
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
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> تأكيد كلمة السر<span>*</span></label>
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="role" class="col-md-4 col-form-label text-md-right" >الدور<span>*</span></label>
                                        <div class="col-md-6"> 
                                            <select class="form-control form-control-lg" name="role"  class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" required>
                                                <option selected disabled>اختر دور ....</option>
                                                <option value="p">باحث عن عمل</option>
                                                <option value="c">باحث عن موظف</option>
                                            </select>
                                            @if ($errors->has('role'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('role') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">البريد الالكتروني<span>(اختياري)</span></label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" >
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div> -->
                                    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-6" style="padding-right:150px">
                                            <button type="submit" class="btn btn-primary" style="width:100%">انشاء حساب</button>
                                            
                                        </div>
                                    </div>
                                    <a class="btn btn-link" href="">للمساعدة في التسجيل اتصل على 9841</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
