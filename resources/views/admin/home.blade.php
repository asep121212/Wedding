@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Hero Section -->
            <div class="jumbotron text-center bg-light p-5 rounded-lg">
                <h1 class="display-4">{{ __('Welcome to Your Dashboard!') }}</h1>
                <p class="lead">Manage your profile, view stats, and stay updated.</p>
                <hr class="my-4">
                <p>If you're looking for more features, explore below.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Explore Features</a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Stats Cards -->
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-primary text-white">
                    {{ __('Profile Settings') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('Update your profile') }}</h5>
                    <p class="card-text">{{ __('Manage your account settings and personal information.') }}</p>
                    <a href="#" class="btn btn-primary">Go to Profile</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-success text-white">
                    {{ __('Activity Stats') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('View your activity') }}</h5>
                    <p class="card-text">{{ __('Check your recent activities and statistics.') }}</p>
                    <a href="#" class="btn btn-success">View Stats</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-header bg-info text-white">
                    {{ __('Support') }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ __('Need Help?') }}</h5>
                    <p class="card-text">{{ __('Contact support for any issues or questions.') }}</p>
                    <a href="#" class="btn btn-info">Contact Support</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Latest Notifications') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection