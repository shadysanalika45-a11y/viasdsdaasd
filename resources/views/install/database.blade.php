@extends('layouts.app')

@section('title', 'Installer - Database')

@section('content')
<section class="installer">
    <h1>Step 2: Database</h1>
    <form action="{{ route('install.database.submit') }}" method="post">
        @csrf
        <label>Host <input type="text" name="db_host" value="{{ old('db_host', '127.0.0.1') }}"></label>
        <label>Port <input type="text" name="db_port" value="{{ old('db_port', '3306') }}"></label>
        <label>Database <input type="text" name="db_name" value="{{ old('db_name') }}"></label>
        <label>User <input type="text" name="db_user" value="{{ old('db_user') }}"></label>
        <label>Password <input type="password" name="db_pass"></label>
        <button type="submit">Continue</button>
    </form>
</section>
@endsection
