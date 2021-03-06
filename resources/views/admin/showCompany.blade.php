@extends('header')
@section('content')

<style>
            .btn-danger {background-image: linear-gradient(to right, #000000 0%, #e74c3c  51%, #000000  100%)}
         .btn-danger{
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

          .btn-danger:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }

          
         .btn-success {background-image: linear-gradient(to right, #34e89e 0%, #0f3443  51%, #34e89e  100%)}
         .btn-success {
          padding: 7px 7px;
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

          .btn-success:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
          }
          h2 {
  font-size: 72px;
  background: -webkit-linear-gradient(#000046, #1CB5E0);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
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
    <script>
    $(function () {
      $('.select2').select2()
	  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
</script>   
<div class="col-md-10  my-5">
   <h2 class="h2 text-primary">?????????? ??????????????</h2><br>
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
    <div class="card card-default text-white">
      <div class="tab-content text-muted p-3">
        <form action="{{route('showCompany')}}" method="GET">
          <div class="row">
            <div class="col-sm-3 col-xs-12 mt-2">
              <div class="form-group">
                <label for="">?????????? ???? ?????????? ???? ?????? ????????????????</label>
                <input type="text" class="form-control" placeholder="" name="comName" id="searchFreelancer">
              </div>
            </div>
            <div class="col-sm-3 col-xs-6 mt-2">
              <label for="" > ?????????? ?????? ???????????? ??????????</label>
              <select name ="activity" id="activity" class="select2bs4 form-control " >
                <option value=""></option>
                  @foreach($activities as $activity)
                    <option value="{{$activity->act_id}}">{{$activity->activity_name}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col-sm-3   col-xs-6 mt-2">
              <label for="">?????????? ?????? ???????????? </label>
              <select name ="city" id="city" class="select2bs4 form-control " >
                <option value=""></option>
                @foreach($cities as $city)
                  <option value="{{$city->city_name}}">{{$city->city_name}}</option>
                @endforeach
			        </select>
            </div>
            <div class="col-sm-1 col-xs-6 mt-2">
              <label for=""></label>
              <button type="submit" class="btn btn-primary searchFreelancer ">??????</button>
            </div>
            <div class="col-sm-1 col-xs-6 mt-2">
              <label for=""></label>
              <form action=""><input type="button" value="????????" onclick="history.back()" class="btn btn-primary " ></form>
            </div>
          </div>
        </form>
            <div class="row table-responsive freelancerTable">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>?????? ????????????</th>
                      <th>???????????? ????????????</th>
                      <th>???????? ????????????</th>  
                      <th>??????????</th>  
                      <th>?????? ????????????????</th>                                 
                      <th></th>    
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($comDetail) > 0)
                    @foreach($comDetail as $com)
                      <tr>
                        <td> <a href="{{route('showCompanyDetail',$com->id)}}">{{ $com->company_name}} </a> </td>
                        <td> {{ $com->Activity->activity_name }} </td>
                        <td> {{ $com->city->city_name }} </td>
                        <td> {{ $com->email}} </td>
                        <td> {{ $com->users->mobile}} </td>
                        <td><h4>
                          @if($com->users->role == 'c')
                          <form action="{{route('BanComany',$com->users->id)}}" method="POST">
        @csrf
                            <button class="btn btn-danger banUsers" data-id="{{$com->users->id}}">??????</button>
</form>
                            @elseif($com->users->role == 'd')
                            <form action="{{route('unBanCompany',$com->users->id)}}" method="POST">
        @csrf
                              <button class="btn btn-success unbanFreelancer" data-id="{{$com->users->id}}">?????? ??????????</button>
</form>
                              @endif
                        </h4></td>  
                       
                      </tr>
                    @endforeach
                    @else
                    <tr>
                      <td>????????????</td>
                    </tr>
                    @endif
                  </tbody>
                </table>
                <div class="ml-3"> {{$comDetail->appends($_GET)->links('layouts.paginationlinks')}}</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



@endsection()