<div class="brand-area brand-area-two">
    <div class="container-fluid">
        <div class="marquee_mode">
            @foreach ($brands as $brand)
                <div class="brand__item">
                    <a href="{{ $brand->url }}"><img src="{{ asset($brand->image) }}" alt="brand"></a>
                    <img src="{{ asset('frontend/img/icons/brand_star.svg') }}" alt="star">
                </div>
            @endforeach
        </div>
    </div>
</div>
