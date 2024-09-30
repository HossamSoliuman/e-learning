@extends('admin.master_layout')
@section('title')
    <title>{{ __('About Section') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('About Section') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('About Section') }}</div>
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
                                                href="{{ route('admin.about-section.edit', ['about_section' => 1, 'code' => $language->code]) }}"><i
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
                                <h4>{{ __('About Section') }}</h4>
                            </div>
                            <div class="card-body">
                                <form
                                    action="{{ route('admin.about-section.update', ['about_section' => $aboutSection->id, 'code' => $code]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    
                                        <div class="col-md-4 {{ $code == $languages->first()->code ? '' : 'd-none' }}">
                                            <div class="form-group">
                                                <label>{{ __('Image') }}<span class="text-danger">*</span></label>
                                                <div id="image-preview" class="image-preview">
                                                    <label for="image-upload" id="image-label">{{ __('Image') }}</label>
                                                    <input type="file" name="image" id="image-upload">
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                  

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }}<span
                                                        class="text-danger">*</span></label>
                                                <input data-translate="true" type="text" id="title" name="title"
                                                    value="{{ $aboutSection->getTranslation($code)?->title }}"
                                                    placeholder="{{ __('Enter Title') }}" class="form-control">
                                                <small>{{ __('wrap your word with [] for highlight and \ for break and {} for bold') }}</small>
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">{{ __('Description') }}<span
                                                        class="text-danger">*</span></label>
                                                <textarea data-translate="true" name="description" class="summernote">{{ $aboutSection->getTranslation($code)?->description }}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        
                                            <div class="col-md-12 {{ $code == $languages->first()->code ? '' : 'd-none' }}">
                                                <div class="form-group">
                                                    <label for="video_url">{{ __('Video url') }}<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="video_url" name="video_url"
                                                        value="{{ $aboutSection->video_url }}"
                                                        placeholder="{{ __('Button Url') }}" class="form-control">
                                                    @error('video_url')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="button_text">{{ __('button text') }}<span class="text-danger">
                                                        ({{ __('leave blank for hide') }})</span></label>
                                                <input data-translate="true" type="text" id="button_text"
                                                    name="button_text"
                                                    value="{{ $aboutSection->getTranslation($code)?->button_text }}"
                                                    placeholder="{{ __('Button Text') }}" class="form-control">
                                                @error('button_text')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                     
                                            <div class="col-md-6 {{ $code == $languages->first()->code ? '' : 'd-none' }}">
                                                <div class="form-group">
                                                    <label for="button_url">{{ __('Button url') }}</label>
                                                    <input type="text" id="button_url" name="button_url"
                                                        value="{{ $aboutSection->button_url }}"
                                                        placeholder="{{ __('Button Url') }}" class="form-control">
                                                    @error('button_url')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                        <div class="text-center col-12">
                                            <x-admin.save-button :text="__('Save')">
                                            </x-admin.save-button>
                                        </div>
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
                'background-image': 'url({{ asset($aboutSection->image) }})',
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
