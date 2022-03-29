@extends('header')
@section('content')


<select class="js-example-basic-multiple" name="states[]" multiple="multiple">
  <option value="AL">Alabama</option>
  <option value="AL">Aldddd</option>
  <option value="WY">Wyoming</option>
  <option value="WY">W2222</option>
</select>


<script> 
$(document).ready(function() {
    $('.js-example-basic-multiple').select2({
    placeholder: "Select a state",
    allowClear: true
});
    
});


</script>


@endsection