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



            <h2 class="h2 text-primary">إدارة الأشخاص</h2><br>
            <div class="card card-default text-white">
                <div class="tab-content text-muted p-3">
                    <div class="tab-pane active" id="admin-tabs-1" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-3 col-xs-12 mt-2">
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
                                <button type="submit" class="btn btn-primary searchFreelancer w-100">Search</button>
                            </div>
                            <div class="col-sm-2 col-xs-6 mt-2">
                                <form action=""><input type="button" value="رجوع" onclick="history.back()"
                                        class="btn btn-primary w-100"></form>
                            </div>
                        </div>

                    </div>
                    <div class="row table-responsive freelancerTable">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>الاسم الكامل </th>
                                    <th> الشهادة</th>
                                    <th>مكان الاقامة </th>
                                    <th>رقم الموبايل</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($peopleDetail) > 0)
                                @foreach($peopleDetail as $person)
                                <tr>
                                    <td> <a href="{{route('showPeopleDetail',$person->id)}}">
                                            {{ $person->Fname}} {{ $person->Father_name}}
                                            {{ $person->Lname}}</a> </td>

                                    @if($person->PersonEducation == NULL)
                                    <td>لايوجد</td>
                                    @else
                                    <td>
                                        @foreach( $person->PersonEducation as $edu)
                                        {{$edu['degree_name'] }} <br>
                                        @endforeach
                                    </td>
                                    @endif

                                    <td>{{ $person->city->city_name}}</td>
                                    <td> {{ $person->mobile_number}}</td>
                                    <td>
                                        <h4>
                                            @if($person->users->role == 'p')
                                            <form action="{{route('BanPeople',$person->users->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger banUsers"
                                                    data-id="{{$person->users->id}}">حظر</button>
                                            </form>
                                            @elseif($person->users->role == 'e')
                                            <form action="{{route('unBanPeople',$person->users->id)}}" method="POST">
                                                @csrf
                                                <button class="btn btn-success unbanFreelancer"
                                                    data-id="{{$person->users->id}}">رفع الحظر</button>
                                            </form>
                                            @endif
                                        </h4>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td>لايوجد</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="ml-3"> {{$people->appends($_GET)->links('layouts.paginationlinks')}}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>



@endsection()