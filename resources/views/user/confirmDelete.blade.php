@extends('layouts.no-sidebar')

@section('content')
<h2 class="big-title">Delete account</h2>

<p> Are you sure you want to delete your account ? All personal data will be removed or anonymised</p>
<p>This acction cannot be undone.</p>

<form action="{{ route('account_delete') }}" method="post">
    @csrf
    <div class="d-flex justify-content-around mt-4">
        <a href="{{ route('user_account') }}" class="outlined">Cancel</a>
        <button class="button expanded">Delete Account</button>
    </div>
    
</form>
@endsection  