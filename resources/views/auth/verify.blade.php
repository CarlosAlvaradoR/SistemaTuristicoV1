@extends('layouts.login_assets')

@section('title_content')
    {{ __('Verify Your Email Address') }}
@endsection

@section('content')
<br>
    <div class="row">
       
        @if (session('resent'))
            <br>
            <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <br>
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">Por favor!</h4>
            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            <p>{{ __('If you did not receive the email') }},</p>
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit"
                    class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
        </div>
    </div>
@endsection
