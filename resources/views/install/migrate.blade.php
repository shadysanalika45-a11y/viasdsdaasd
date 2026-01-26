@extends('layouts.app')

@section('title', 'Installer - Migrate')

@section('content')
<section class="installer">
    <h1>Step 5: Run Migrations</h1>
    <p>This will create the database tables and seed default data.</p>
    <form action="{{ route('install.migrate.submit') }}" method="post">
        @csrf
        <button type="submit">Run Migrations</button>
    </form>
</section>
@endsection
