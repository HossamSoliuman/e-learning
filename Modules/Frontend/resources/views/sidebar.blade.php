@if (Module::isEnabled('Language') && Route::has('admin.blogs.index'))
    <li
        class="nav-item dropdown {{ isRoute([
            'admin.hero-section.*',
            'admin.about-section.*',
            'admin.featured-course-section.*',
            'admin.counter-section.*',
            'admin.faq-section.*',
            'admin.our-features-section.*',
            'admin.banner-section.*',
            'admin.contact-section.*',
            'admin.newsletter-section.*',
            'admin.featured-instructor-section.*',

        ], 'active') }}">
        <a href="javascript:void()" class="nav-link has-dropdown"><i class="fas fa-puzzle-piece"></i><span>{{ __('Sections') }}</span></a>

        <ul class="dropdown-menu">
            <li class="{{ isRoute('admin.hero-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.hero-section.edit', ['hero_section' => 1, 'code' => 'en']) }}">
                    {{ __('Hero Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.about-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.about-section.edit', ['about_section' => 1, 'code' => 'en']) }}">
                    {{ __('About Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.featured-course-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.featured-course-section.index') }}">
                    {{ __('Featured Course Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.newsletter-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.newsletter-section.index') }}">
                    {{ __('Newsletter Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.featured-instructor-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.featured-instructor-section.edit', ['featured_instructor_section' => 1, 'code' => 'en']) }}">
                    {{ __('Featured Instructor') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.counter-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.counter-section.index') }}">
                    {{ __('Counter Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.faq-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.faq-section.edit', ['faq_section' => 1, 'code' => 'en']) }}">
                    {{ __('Faq Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.our-features-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.our-features-section.edit', ['our_features_section' => 1, 'code' => 'en']) }}">
                    {{ __('Our Features Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.banner-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.banner-section.index') }}">
                    {{ __('Banner Section') }}
                </a>
            </li>
            <li class="{{ isRoute('admin.contact-section.*', 'active') }}">
                <a class="nav-link" href="{{ route('admin.contact-section.index') }}">
                    {{ __('Contact Page Section') }}
                </a>
            </li>
        </ul>
    </li>
@endif
