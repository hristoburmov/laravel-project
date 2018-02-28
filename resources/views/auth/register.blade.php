@extends('layouts.main')

@section('title', 'Registration')

@section('content')

@include('shared.message')

<form method="POST">
    <div>
        E-Mail:
	    <input 
		    type="text" name="email" 
		    placeholder="Email..."
		    value="{{old('email')}}"
	    />
    </div>
	<div>
        Name:
	    <input 
		    type="text" name="name" 
		    placeholder="Name..."
		    value="{{old('name')}}"
	    />
    </div>
    <div>
        Password:
	    <input 
	    type="password" name="password"
	    placeholder="Enter password..." 
	    />
    </div>
    <div>
        Repeat password:
	    <input 
	    type="password" name="passwordConfirmed"
	    placeholder="Enter password again..." 
	    />
    </div>
	<input 
		type="submit" class="btn btn-info" 
		value="Submit"
	/>
{{csrf_field()}}
</form>
@endsection
