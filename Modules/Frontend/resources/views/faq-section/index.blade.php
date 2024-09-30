@extends('admin.master_layout')
@section('title')
    <title>{{ __('Faq Section') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Faq Section') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Faq Section') }}</div>
                </div>
            </div>
            <div class="section-body row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="service_card">{{ __('Available Translations') }}</h5>

                            <hr>
                            @if ($code !== $languages->first()->code)
                                <button class="btn btn-primary" id="translate-btn">{{ __('Translate') }}</button>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="lang_list_top">
                                <ul class="lang_list">
                                    @foreach ($languages as $language)
                                        <li><a id="{{ request('code') == $language->code ? 'selected-language' : '' }}"
                                                href="{{ route('admin.faq-section.edit', ['faq_section' => 1, 'code' => $language->code]) }}"><i
                                                    class="fas {{ request('code') == $language->code ? 'fa-eye' : 'fa-edit' }}"></i>
                                                {{ $language->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="mt-2 alert alert-danger" role="alert">
                                @php
                                    $current_language = $languages->where('code', request()->get('code'))->first();
                                @endphp
                                <p>{{ __('Your editing mode') }} :
                                    <b>{{ $current_language?->name }}</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Faq Section') }}</h4>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('admin.faq-section.update', ['faq_section' => 1, 'code' => $code]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    
                                        <div class="col-md-4 {{ $code == $languages->first()->code ? '' : 'd-none' }}">
                                            <div class="form-group">
                                                <label>{{ __('Image') }}<span class="text-danger"></span></label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">{{ __('Image') }}</label>
                                                    <input type="file" name="image" id="image-upload">
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }}<span
                                                        class="text-danger"></span></label>
                                                <input data-translate="true" type="text" id="title" name="title"
                                                    value="{{ $faqSection?->getTranslation($code)?->title }}"
                                                    placeholder="{{ __('Enter Title') }}" class="form-control">
                                                <small>{{ __('wrap your word with [] for highlight and \ for break and {} for bold') }}</small>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_title">{{ __('Sub Title') }}<span
                                                        class="text-danger"></span></label>
                                                <input data-translate="true" type="text" id="sub_title" name="sub_title"
                                                    value="{{ $faqSection?->getTranslation($code)?->sub_title }}"
                                                    placeholder="{{ __('Enter Sub Title') }}" class="form-control">
                                                @error('sub_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center col">
                                            <x-admin.save-button :text="__('Save')">
                                            </x-admin.save-button>
                                        </div>
                                </form>
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
            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "{{ __('Choose Icon') }}",
                label_selected: "{{ __('Change Icon') }}",
                no_label: false,
                success_callback: null
            });

            $('#image-preview').css({
                'background-image': 'url({{ asset($faqSection?->image) }})',
                'background-size': 'contain',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            });

            $('#translate-btn').on('click', function() {
                translateAllTo("{{ $code }}");
            })
        });
    </script>
@endpush
