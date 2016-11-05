@extends('master')

@section('title', 'Welcome!')

@section('content')
    @if (isset($message))
        <div class="alert alert-info" role="alert">{{ $message }}</div>
    @endif

    @if (empty($user))
        @include('auth')
    @else
        @include('profile')
    @endif
@endsection