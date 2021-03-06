<!DOCTYPE html>
<?php $isoCode = \App\Models\MainMeta::first()->language()->first()->isoCode(); ?>
<html lang="{{ $isoCode }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name="viewport">

        <!-- START SEO / Meta Tags / Twitter Graph / Open Graph data -->
        @include('layouts.partials.seo._meta-tags-data')
        <!-- END SEO / Meta Tags / Twitter Graph / Open Graph data -->

        {!! \Feed::link(url('users-feed'),'rss','Feed: Users',$isoCode) !!}
        {!! \Feed::link(url('faucets-feed'),'rss','Feed: Faucets',$isoCode) !!}
        {!! \Feed::link(url('payment-processors-feed'),'rss','Feed: Payment Processors',$isoCode) !!}
        {!! \Feed::link(url('alerts-feed'),'rss','Feed: Alerts',$isoCode) !!}

        <link rel="shortcut icon" href="{{ asset("/assets/images/bitcoin-16x16.ico") }}">

        <!-- START Site Styles -->
        @include('layouts.partials.styles._css')
        <!-- END Site Styles -->

        <!-- START Google Analytics tracking -->
        @stack('google-analytics')
        <!-- END Google Analytics tracking -->
    </head>
    <body class="skin-blue sidebar-mini" id="{{ empty(Auth::user()) ? 'guest-bg' : 'auth-bg' }}">
        <div id="main-wrapper">
            <!-- START Main Content -->
            @include('layouts.partials._main_content')
            <!-- END Main Content -->

            <!-- START Main Footer -->
            @include('layouts.partials.content._footer')
            <!-- END Main Footer -->
        </div>

        <!-- START Site Scripts/JS -->
        @include('layouts.partials.scripts._js')
        <!-- END Site Scripts/JS -->
    </body>
</html>