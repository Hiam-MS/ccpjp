@extends('header')

@section('content')


    <!-- Content -->
   
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">  
            
        @if(Session::get('erorrMsg'))
						<div class="alert alert-danger">
							{{Session::get('erorrMsg')}}
						</div>
					@endif
           
            <div class="card card-default">
                <div class="btn btn-primary" style="width:100%""><h3 class="h3">  تغيير كلمة المرور</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">  كلمة المرور القديمة </label>

                            <div class="col-md-6">
                                <input id="oldpassword" type="password" placeholder="" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword"  required autofocus>

                                @if ($errors->has('oldpassword'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                     


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور الجديدة </label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">   تأكيد كلمة المرور الجديدة</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                 حفظ
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>

@endsection
