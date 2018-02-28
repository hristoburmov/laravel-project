@extends('layouts.main')

@section('title', 'Login')

@section('content')

@include('shared.message')

<form method="POST">
    <div>
	    <input 
		    type="text" name="email" 
		    placeholder="Email..."
		    value="{{old('email')}}"
	    />
	</div>
    <div>
	    <input 
	    type="password" name="password"
	    placeholder="Enter password..." 
	    />
    </div>
    <div>
	    <input 
		    type="submit" class="btn btn-info" 
		    value="Submit"
	    />
    </div>
{{csrf_field()}}
</form>
@endsection
