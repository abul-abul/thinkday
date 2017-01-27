@extends('app-user')
@section('user-content')
hello {{Auth::User()->firstname}}
@endsection