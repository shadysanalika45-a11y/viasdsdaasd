@extends('layouts.app')

@section('title', 'Installer - Admin')

@section('content')
<section class="installer">
    <h1>Step 4: Admin Account</h1>
    <form action="{{ route('install.admin.submit') }}" method="post">
        @csrf
        <label>Name <input type="text" name="name" value="{{ old('name') }}"></label>
        <label>Email <input type="email" name="email" value="{{ old('email') }}"></label>
        <label>Password <input type="password" name="password"></label>
        <label>Confirm Password <input type="password" name="password_confirmation"></label>
        <button type="submit">Continue</button>
    </form>
</section>
@endsection
