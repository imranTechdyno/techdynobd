@php
    $bannerElement = element('banner.element');
@endphp

<!-- slider part starts here -->
<main class="main">

    <section class="home-slider">
        <div class="flexslider">
            <ul class="slides">
                @forelse ($bannerElement as $item)
                    <li class="">
                        <img src="{{ @$item->data->image }}" alt="Slider 1" />
                        <div class="slider-content">
                            <div class="container">
                                <!-- if anything nessesary we will add here slider one -->
                            </div>
                        </div>
                    </li>
                @empty
                    @include('frontend.partial.no_record_found')
                @endforelse

            </ul>
        </div>
    </section>

    <!-- slider end here -->
