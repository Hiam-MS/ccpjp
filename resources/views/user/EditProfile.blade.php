@extends('header')

@section('content')


    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white"> ادارة حسابك على موقعنا</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        @if(Session::get('fail'))
						<div class="alert alert-danger">
							{{Session::get('fail')}}
						</div>
					@endif
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">        
           
            <div class="card card-default">
                <div class="btn btn-primary"><h3 class="h3">تعديل   الحساب</h3></div>
                @if(auth::user())
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                       

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">اسم المستخدم</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        
                      

                        


                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  تعديل
                                </button>

                                <form>
 <input type="button" value="الغاء" onclick="history.back()" class="btn btn-primary">
</form>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

@endsection
