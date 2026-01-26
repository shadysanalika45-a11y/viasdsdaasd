@extends('layouts.app')

@section('title', 'Installer - Finish')

@section('content')
<section class="installer">
    <h1>Installation Complete</h1>
    <p>Your application is ready. You can now log in with the admin account.</p>
    <a href="{{ route('login.form') }}">Go to Login</a>
</section>
@endsection
