@extends('header')
@section('content')

<style>
.btn-grad {
    background-image: linear-gradient(to right, #00bf8f 0%, #001510 51%, #00bf8f 100%)
}

.btn-grad {

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

.btn-grad:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}



.btn-grad2 {
    background-image: linear-gradient(to right, #AA076B 0%, #61045F 51%, #AA076B 100%)
}

.btn-grad2 {
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

.btn-grad2:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}

.btn-grad3 {
    background-image: linear-gradient(to right, #000046 0%, #1CB5E0 51%, #000046 100%)
}

.btn-grad3 {
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

.btn-grad3:hover {
    background-position: right center;
    /* change the direction of the change here */
    color: #fff;
    text-decoration: none;
}

.btn-grad4 {
    background-image: linear-gradient(to right, #870000 0%, #190A05 51%, #870000 100%)
}

.btn-grad4 {
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

.btn-grad4:hover {
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

            <h2 class="h2 text-primary">إدارة فرص العمل</h2><br>
            <div class="card card-default text-white">
                <div class="tab-content text-muted p-3">
                    <div class="tab-pane active" id="admin-tabs-1" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-5 col-xs-12 mt-2">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search Freelancers"
                                        name="search_freelancer" id="searchFreelancer">
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
                                <button type="submit" class="btn-primary searchFreelancer w-100">Search</button>
                            </div>
                        </div>
                        <div class="row table-responsive freelancerTable">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>المسمى الوظيفي </th>
                                        <th> اختصاص العمل</th>
                                        <th>الشركة </th>
                                        <th>طبيعة العمل</th>
                                        <th></th>
                                        <th>الحالة</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($jobs) > 0)
                                    @foreach($jobs as $item)

                                    <tr>




                                        <td> <a href="{{route('JobDetails',$item->id)}}"> {{$item->job_title}} </a></td>

                                        <td>{{$item->name}}</td>
                                        <td>{{$item->company_name}}</td>
                                        <td>{{$item->job_type}}</td>

                                        <td>
                                            <h4>
                                                @if($item->status == 'pending')
                                        <td>
                                            <form action="{{route('accepte_JobStatuse',$item->id)}}" method="POST">
                                                @csrf
                                                <button class="btn-grad unbanFreelancer"
                                                    data-id="{{$item->id}}">قبول</button>
                                            </form>
                                        </td>
                                        <td>

                                            <form action="{{route('denied_JobStatuse',$item->id)}}" method="POST">
                                                @csrf
                                                <button class="btn-grad2 banUsers" data-id="{{$item->id}}">رفض</button>
                                            </form>
                                        </td>
                                        <!-- <td>  	
												
															<a href="{{route('JobDetails',$item->id)}}" class="btn btn-primary"> معلّقة</a>
								</td> -->



                                        @elseif($item->status == 'accepted')
                                        <td>

                                            <button class="btn btn-grad3 unbanFreelancer"
                                                data-id="{{$item->id}}">مقبولة</button>

                                        </td>
                                        @elseif($item->status == 'denied')
                                        <td>


                                            <button class="btn-grad4 unbanFreelancer"
                                                data-id="{{$item->id}}">مرفوضة</button>

                                        </td>

                                        @endif
                                        </h4>
                                        </td>
                                    </tr>

                                    @endforeach
                                    @else
                                    <tr>
                                        <td> لايوجد فرص عمل سابقة لعرضها</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="ml-3"> {{$jobs->appends($_GET)->links('layouts.paginationlinks')}}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection()