@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Terms and conditions</h1>
        <p>These are the terms you agree to by signing up for events:</p>
    </div>

    <p>Upon submission of the signup form, your name and email address will become visible to other users of the system.</p>
    <p>We will NOT sell or distribute your information to any other 3rd party, or use it for any purpose other than this demonstration.</p>
    <p><strong>To Unsubscribe:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi eos ex ipsa mollitia numquam quos similique vitae voluptate voluptatum?</p>

    <a class="btn btn-default" href="{{URL::previous()}}">Go Back</a>
@endsection