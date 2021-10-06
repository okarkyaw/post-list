@extends('layout')

@section('content')
    <form method="POST">
        @csrf
        <label>Phone Number: <input name="phone_number" required/></label></br>
        <label>Password: <input name="password" type="password" required/></label></br>
        <button>login</button>
    </form>
@endsection