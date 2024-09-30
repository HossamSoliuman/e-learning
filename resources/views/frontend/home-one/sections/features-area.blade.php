<section class="features__area">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-xl-6">
              <div class="section__title white-title text-center mb-50">
                  <span class="sub-title">{{ __('How We Start Journey') }}</span>
                  <h2 class="title">{{ __('Start your Learning Journey Today!') }}</h2>
                  <p>{{ __('Discover a World of Knowledge and Skills at Your Fingertips – Unlock Your Potential and Achieve Your Dreams with Our Comprehensive Learning Resources!') }}</p>
              </div>
          </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="features__item">
                <div class="features__icon">
                    <img src="{{ asset($ourFeatures?->image_one) }}" alt="img">
                </div>
                <div class="features__content">
                    <h4 class="title">{{ $ourFeatures?->translation?->title_one }}</h4>
                    <p>{{ $ourFeatures?->translation?->sub_title_one }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="features__item">
                <div class="features__icon">
                    <img src="{{ asset($ourFeatures?->image_two) }}" alt="img">
                </div>
                <div class="features__content">
                    <h4 class="title">{{ $ourFeatures?->translation?->title_two }}</h4>
                    <p>{{ $ourFeatures?->translation?->sub_title_two }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="features__item">
                <div class="features__icon">
                    <img src="{{ asset($ourFeatures?->image_three) }}" alt="img">
                </div>
                <div class="features__content">
                    <h4 class="title">{{ $ourFeatures?->translation?->title_three }}</h4>
                    <p>{{ $ourFeatures?->translation?->sub_title_three }}</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="features__item">
                <div class="features__icon">
                    <img src="{{ asset($ourFeatures?->image_four) }}" alt="img">
                </div>
                <div class="features__content">
                    <h4 class="title">{{ $ourFeatures?->translation?->title_four }}</h4>
                    <p>{{ $ourFeatures?->translation?->sub_title_four }}</p>
                </div>
            </div>
        </div>
    </div>
    
  </div>
</section>