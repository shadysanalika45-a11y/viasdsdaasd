@extends('layouts.app')

@section('title', 'Installer - Requirements')

@section('content')
<section class="installer">
    <h1>Step 1: Requirements</h1>
    <h2>PHP Extensions</h2>
    <ul>
        @foreach($checks as $extension => $ok)
            <li>{{ $extension }} - {{ $ok ? 'OK' : 'Missing' }}</li>
        @endforeach
    </ul>

    <h2>Permissions</h2>
    <ul>
        @foreach($permissions as $path => $ok)
            <li>{{ $path }} - {{ $ok ? 'Writable' : 'Not writable' }}</li>
        @endforeach
    </ul>

    <form action="{{ route('install.requirements.submit') }}" method="post">
        @csrf
        <button type="submit">Continue</button>
    </form>
</section>
@endsection
