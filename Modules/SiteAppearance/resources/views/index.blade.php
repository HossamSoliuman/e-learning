@extends('admin.master_layout')
@section('title')
    <title>{{ __('Themes') }}</title>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/css/colorpicker.css') }}">
@endpush
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Themes') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h6 class="text-center">{{ __('Theme One') }}</h6>
                        <div class="screen">
                            <img src="{{ asset('uploads/website-images/theme-one.png') }}">
                        </div>

                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <h6 class="text-center">{{ __('Theme Two') }}</h6>
                        <div class="screen-two">
                            <img src="{{ asset('uploads/website-images/theme-two.png') }}">
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-6">
                        <div class="card appearance_card_margin">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('admin.site-appearance.update', 1) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>{{ __('Select Theme') }}</label>
                                                <select class="form-control" name="theme">
                                                    <option @selected(Cache::get('setting')?->site_theme == 'theme-one' ? true : false) value="theme-one">
                                                        {{ __('Theme One') }}</option>
                                                    <option @selected(Cache::get('setting')?->site_theme == 'theme-two' ? true : false) value="theme-two">
                                                        {{ __('Theme Two') }}</option>
                                                </select>
                                                <div class="form-group">
                                                    <label class="custom-switch p-0 mt-3">
                                                        <input type="checkbox" name="show_all_homepage" value="1"
                                                            class="custom-switch-input" @checked(@Cache::get('setting')?->show_all_homepage == 1)>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span
                                                            class="custom-switch-description">{{ __('Show all home pages') }}</span>
                                                    </label>

                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')
    <script src="{{ asset('backend/js/colorpicker.js') }}"></script>
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
