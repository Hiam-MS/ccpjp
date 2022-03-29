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
            <form action=""  method="POST">
                            @csrf
                            @method('PUT')
                            <!-- <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="lFullName" name="catname" value="{{$city->city_name}}" placeholder="Category Name">
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group mb-4">
                                  <input type="text" class="form-control" id="lFullName" name="catname" value="{{$city->governorate->gov_name}}" placeholder="Category Name">
                                </div>
                              </div>
                            </div>
                            </div> -->
                           
                         <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-lg" id="lFullName" name="catname" value="{{$city->city_name}}" placeholder="Category Name">
                            </div>
                         </div>   
                         <div class="col-sm-6">
                            <div class="form-group">
                           
                             
                              <select class="select2bs4 form-control form-control-lg" name="gove" id="gove" style="width:100%">
																			@foreach ($governorates as $gove)
																	
																				<option value="{{$city->gove_id}}" {{$gove->governorate_id =="$city->gove_id" ? 'selected' : ''}}>{{$gove->gov_name}}</option>
																			@endforeach
																		</select>
                            </div>
                         </div> 
                            
                           
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                        </form>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



@endsection()