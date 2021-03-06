@extends('layouts.app')

@section('content')
    <div class="zero-margin">
        <section class="content-header">
            <div class="row {{ empty(Auth::user()) ? 'guest-page-title' : 'auth-page-title' }}">
                <h1
                        id="title" style="text-align: center;"
                        data-user-slug="{{ $userSlug }}"
                        data-payment-processor-slug="{{ $paymentProcessorSlug }}"
                >{{ $userName }}'s {{ $paymentProcessorName }} Faucet Rotator</h1>
                @include('layouts.partials.social.addthis')
            </div>
        </section>
        @include('layouts.partials.site_wide_alerts._alert-content')
        <div class="content {{ empty(Auth::user()) ? 'content-guest' : '' }}">
            @include('layouts.partials.navigation._breadcrumbs')
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @include('layouts.partials.advertising.ads')
                        @if($faucetsCount != 0)
                        <div class="col-lg-12">
                            @include('users.payment_processors.rotator.partials.nav')
                        </div>
                        <div class="col-lg-12">
                            <iframe sandbox="allow-forms allow-scripts allow-pointer-lock allow-same-origin" src="" id="rotator-iframe"></iframe>
                            @include('layouts.partials.misc._no-iframe-faucet-content')
                            @include('layouts.partials.misc._ajax-data-error-content')
                        </div>
                        @else
                            <div class="col-lg-12">
                                <p>{{ $userName }} has not added any faucets yet.</p>
                            </div>
                        @endif
                    </div>
                    @include('layouts.partials.social.disqus')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset("/assets/js/rotator-scripts/userPaymentProcessorRotator.min.js?" . rand()) }}"></script>
@endpush

@push('google-analytics')
@include('layouts.partials.tracking._google_analytics')
@endpush