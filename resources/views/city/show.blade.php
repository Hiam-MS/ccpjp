@extends('header')
@section('content')


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
      
        <h2 class="h2 text-primary">إدارة المناطق</h2><br>
        <div class="card card-default text-white">
          <div class="tab-content text-muted p-3">
            <div class="tab-pane active" id="admin-tabs-1" role="tabpanel">
              <div class="row">
                <div class="col-sm-5 col-xs-12 mt-2">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search Freelancers" name="search_freelancer" id="searchFreelancer">
                  </div>
                </div>
              <div class="col-sm-3 col-xs-6 mt-2">
                 <select class="form-control" id="filterFreelancer">
                    <option selected disabled>Filter By</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="created_at">Date Registered</option>
                  </select>
              </div>
              <div class="col-sm-2 col-xs-6 mt-2">
                  <select class="form-control" id="sortFreelancer">
                    <option selected disabled>Sort By</option>
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                  </select>
              </div>
              <div class="col-sm-2 col-xs-6 mt-2">
                <button type="submit" class="btn btn-primary searchFreelancer w-100">Search</button>
              </div>
            </div>
            <div class="row table-responsive freelancerTable">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>المنطقة </th>
                      
                      <th>تابعة ل:</th>                                
                      <th></th>    
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($cities as $city)
                      <tr>
                        
                        <td>{{ $city->city_name}}</td>
                       <td>{{ $city->governorate->gov_name}}</td>
                       <td class="text-center"> <button class="btn btn-outline-primary" ><a href="/city/{{ $city->city_id }}/edit">Edit</a></button> </td>
                       <td>
                    
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" type="submit" >Delete</button>
                
                    </td>  
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="ml-3"> {{$cities->links('layouts.paginationlinks')}}</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



@endsection()