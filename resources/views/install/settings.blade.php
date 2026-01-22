@extends('layouts.app')

@section('title', 'Installer - Settings')

@section('content')
<section class="installer">
    <h1>Step 3: App Settings</h1>
    <form action="{{ route('install.settings.submit') }}" method="post">
        @csrf
        <label>App Name <input type="text" name="app_name" value="{{ old('app_name', 'Vidoo') }}"></label>
        <label>App URL <input type="text" name="app_url" value="{{ old('app_url', url('/')) }}"></label>
        <label>Timezone <input type="text" name="app_timezone" value="{{ old('app_timezone', config('app.timezone')) }}"></label>
        <button type="submit">Continue</button>
    </form>
</section>
@endsection
