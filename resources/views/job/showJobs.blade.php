@extends('header')
@section('content')



<style>
	#customers {

  border-collapse: collapse;
  
}

#customers td, #customers th {
  border: 2px solid #ddd;
  padding: 6px;
  font-size:18px;
  text-align: center;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #000080;
  color: white;
  
}

/* #resuems tr:hover {background-color: #ddd;}
#resuems th {
		padding:5px;
		text-align: center;
		background-color:#200080;
		color: white;
		}

		#resuems tr {
		padding:5px;
		text-align: center;
		
		color: black;
		font-size:20px;
		} */


</style>

<div class="dez-bnr-inr overlay-black-middle" style="background-image:url({{asset('images/banner/bnr1.jpg')}});width:100%;height:200px">
    <div class="container">
        <div class="dez-bnr-inr-entry">
            <h1 class="text-white"> فرص العمل المنشورة</h1>
		</div>
    </div>
</div>

       
<div class="content-block">
	
	<div class="container">
		<br><br>
	
		
	<div style="margin: right 30px;align-content:flex-start;text-align: right;justify-content: right;" >
			<!-- <div class="row">
			<div class="form-group">
				<div class="col-md-4">
					<label for="">بحث حسب:</label>
					<input type="text" name="" id="" class="form-group">
				</div>
			</div>
			<div class="form-group">
		<div class="col-md-5">
		<form action="{{route('job')}}" method="GET">
											<h5 class="widget-title font-weight-700 text-uppercase" style="color:blue">اختصاص العمل</h5>
											<select name ="category" id="category" class="select2" >
												<option selected disabled> اختر اختصاص العمل </option>
												@foreach($categories as $category)
												
													<option value="{{$category->id}}">{{$category->name}}</option>
												@endforeach
											</select> <br>
											<button type="submit" class="btn btn-primary">بحث</button>
										</form>
		</div>
										
							

			</div>
			<script>
    $(function () {
      $('.select2').select2()
    });
</script>
			<div class="form-group">
				<div class="col-md-4">
					<label for="">بحث عن المنطقة:</label>
					<input type="text" name="" id="" class="form-group">
				</div>
			</div>
		</div> -->

		<script>
    $(function () {
      $('.select2').select2()
	  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
</script> 

<table>
<form action="{{route('job')}}" method="GET">
	<tr>
		<td>اختصاص العمل المطلوب</td>
		<td>
			<select name ="category" id="category" class="select2bs4 form-control form-control-lg" >
			<option value=""></option>
				@foreach($categories as $category)
					<option value="{{$category->cat_id}}">{{$category->name}}</option>
				@endforeach
			</select>
		</td>
		<td>مكان العمل</td>
		<td>
			<select name ="city" id="city" class="select2bs4 form-control form-control-lg" >
				<option value=""></option>
				@foreach($cities as $city)
					<option value="{{$city->city_name}}">{{$city->city_name}}</option>
				@endforeach
			</select>
		</td>
		<td>طبيعة العمل</td>
		<td>
			<select name="job_type"  class="select2bs4 form-control form-control-lg"  >
				<option  selected disabled>يرجى الاختيار</option>
				<option value=" دوام كامل " >دوام كامل  </option>
				<option value=" دوام جزئي " >دوام جزئي  </option>
				<option value=" تدريب " >تدريب  </option>	
				<option value=" دوام ليلي " >دوام ليلي  </option>
			</select>
		</td>
		<td>
			<button type="submit" class="btn btn-primary">بحث</button>
		</td>
		<td><form><input type="button" value="رجوع" onclick="history.back()" class="btn btn-primary"></form></td>
	</tr>
</form>
</table>   
		<!-- <table>
			<tr>
				<th>حسب المسمى الوظيفي</th>

				<th>حسب اختصاص العمل </th>
				<th>حسب مكان العمل </th>
			</tr>
			<tr>
			<form action="{{route('job')}}" method="GET">
				<td><select name ="title" id="title" class="select2" >
												<option selected disabled> اختر  المسمى الوظيفي </option>
												@foreach($jobs as $job)
												
													<option value="{{$job->job_title}}">{{$job->job_title}}</option>
												@endforeach
											</select>
</td>
				<td>
				
				<select name ="category" id="category" class="select2" >
												<option selected disabled> اختر اختصاص العمل </option>
												@foreach($categories as $category)
												
													<option value="{{$category->cat_id}}">{{$category->name}}</option>
												@endforeach
											</select>

				</td>
				<td><select name ="city" id="city" class="select2" >
												<option selected disabled> اختر اختصاص العمل </option>
												@foreach($cities as $city)
												
													<option value="{{$city->city_id}}">{{$city->city_name}}</option>
												@endforeach
											</select></td>
				<td><button type="submit"	class="btn btn-primary">بحث</button></td>
				
			</tr>
</form>
		</table> -->
									<table class="" id="customers" style="width:100%">
										<thead>
											<tr>
												<th> الرقم</th>
												<th>المسمى الوظيفي</th>
												<th>اختصاص العمل</th>
												<th> الشركة</th>
												<th>طبيعة العمل</th>
												<th>خيارات</th>
											</tr>
										</thead>
										<tbody id="serch-result">
											@if(count($jobs) > 0)
												@foreach($jobs as $item)
													<tr>
														<td>{{$item->id}} </td>
												
														<td> {{$item->job_title}} </td>
														
														<td>{{$item->name}}</td>	
														<td>{{$item->company_name}}</td>
														<td>{{$item->job_type}}</td>
														<td>  	
												
															<a href="{{route('JobDetails',$item->id)}}" class="btn btn-primary"> <i class="ti-eye" style="size:25px"></i></a>
														</td>
													</tr>

												@endforeach
											@else
												<tr><td>  لايوجد فرص عمل سابقة لعرضها</td></tr>
											@endif
										</tbody>
									</table>
								
									<span>{{$jobs->appends($_GET)->links('layouts.paginationlinks')}}</span>	
									
							</div>
						
					
							</div>
							
								</div>




					


					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
    </div>
    <!-- Content END-->
	<!-- Footer -->



<!-- <script>
	$(document).ready(function(){
		$('#search').on('keyup',function(){
			var query=$(this).val();
			$.ajax({
				url:"search",
				type:"GET",
				data:{'search':query},
				success:function(data){
					$('#search_list').html(data);
				}
			}
		});
		//end of ajax call
	});
</script> -->



<script type="text/javascript">

$('body').on( 'keyup', '#search-resume',function(){
       
        var serchQuest = $(this).val();

        $.ajax({
			method: 'POST',
            url: '{{ route("search.Resume")}}',
            dataType: 'json',
			data: {
				'_token' : '{{ csrf_token() }}',
				serchQuest: serchQuest,

			},
            success: function(res){            
               var tableRow = '';
			   $('#serch-result').html('');

			   $.each(res , function(inde, value){
				tableRow ='<tr><td>'+value.Fname+' '+value.Father_name+' '+value.Lname+'</td><td>'+value.degree_name+'</td><td>'+value.gender+'</td><td><a href="Person/details/'+value.id+' class="btn "> تفاصيل</a></td> </tr>';
				$('#serch-result').append(tableRow);
			})
        }
        });
    });

</script>

@endsection


