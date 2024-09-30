@extends('admin.master_layout')
@section('title')
    <title>{{ __('More Gateways') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.settings') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{ __('More Gateways') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.settings') }}">{{ __('Settings') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('More Gateways') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column" id="paymentGatewayTab" role="tablist">
                                    @include('paymentgateway::tabs.navbar')
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content" id="myTabContent4">
                                    @include('paymentgateway::sections.razorpay')
                                    @include('paymentgateway::sections.flutterwave')
                                    @include('paymentgateway::sections.paystack')
                                    @include('paymentgateway::sections.mollie')
                                    @include('paymentgateway::sections.instamojo')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('js')

    <script src="{{ asset('backend/js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            var activeTab = localStorage.getItem("activeTab");
            if (activeTab) {
                $('#paymentGatewayTab a[href="#' + activeTab + '"]').tab("show");
            } else {
                $("#paymentGatewayTab a:first").tab("show");
            }

            $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
                var newTab = $(e.target).attr("href").substring(1);
                localStorage.setItem("activeTab", newTab);
            });
        });
    </script>

    <script>
        //input image preview function
        "use strict";
        $(document).ready(function() {            
            $.uploadPreview({
                input_field: "#image-upload-razorpay",
                preview_box: "#image-preview-razorpay",
                label_field: "#image-label-razorpay",
                label_default: "{{ __('Choose Image') }}",
                label_selected: "{{ __('Change Image') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview-razorpay').css({
                'background-image': 'url({{ asset($payment_setting->razorpay_image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });

            $.uploadPreview({
                input_field: "#image-upload-flutterwave",
                preview_box: "#image-preview-flutterwave",
                label_field: "#image-label-flutterwave",
                label_default: "{{ __('Choose Image') }}",
                label_selected: "{{ __('Change Image') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview-flutterwave').css({
                'background-image': 'url({{ asset($payment_setting->flutterwave_image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });

            $.uploadPreview({
                input_field: "#image-upload-paystack",
                preview_box: "#image-preview-paystack",
                label_field: "#image-label-paystack",
                label_default: "{{ __('Choose Image') }}",
                label_selected: "{{ __('Change Image') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview-paystack').css({
                'background-image': 'url({{ asset($payment_setting->paystack_image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });

            $.uploadPreview({
                input_field: "#image-upload-mollie",
                preview_box: "#image-preview-mollie",
                label_field: "#image-label-mollie",
                label_default: "{{ __('Choose Image') }}",
                label_selected: "{{ __('Change Image') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview-mollie').css({
                'background-image': 'url({{ asset($payment_setting->mollie_image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });

            $.uploadPreview({
                input_field: "#image-upload-instamojo",
                preview_box: "#image-preview-instamojo",
                label_field: "#image-label-instamojo",
                label_default: "{{ __('Choose Image') }}",
                label_selected: "{{ __('Change Image') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview-instamojo').css({
                'background-image': 'url({{ asset($payment_setting->instamojo_image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });
        });
 
    </script>
@endpush
