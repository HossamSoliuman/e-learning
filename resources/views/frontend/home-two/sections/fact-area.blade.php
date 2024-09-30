<section class="fact__area-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="fact__inner-wrap-two">
                    <div class="section__title white-title mb-30">
                        <h2 class="title">
                            {{ __('Thousands of') }} <span class="highlight">{{ __('courses') }}</span> {{ __('authored by industry experts') }}
                        </h2>
                    </div>
                    <div class="fact__item-wrap">
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer"
                                    data-count="{{ $counter?->total_instructor_count }}"></span>+</h2>
                            <p>{{ __('Faculty Courses') }}</p>
                        </div>
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer"
                                    data-count="{{ $counter?->total_courses_count }}"></span>+</h2>
                            <p>{{ __('Best Professors') }}</p>
                        </div>
                        <div class="fact__item">
                            <h2 class="count"><span class="odometer"
                                    data-count="{{ $counter?->total_student_count }}"></span>+</h2>
                            <p>{{ __('Active Students') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
