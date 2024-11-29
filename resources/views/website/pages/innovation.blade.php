@extends('website.layouts.app')

@section('title','Innovation')

@push('style')
    <style>
        a.button--secondary {
            border-color: #E36F1E
        }

        a.button--secondary:hover {
            background: #F4B223;
            border-color: #F4B223;
        }

        .body-text__content ul li::before {
            background: #E36F1E;
            border-color: #E36F1E;
        }
    </style>
@endpush

@section('content')
    @if($innovate)
        <section class="landing-hero">
            <div class="container">

                <div class="landing-hero__content landing-hero__content--light ">
                    <div class="landing-hero__backdrop landing-hero__backdrop--light" role="presentation" style="background: #55efc430">
                        <div class="landing-hero__pattern" role="presentation"></div>
                    </div>

                    <div class="landing-hero__text-wrapper">
                        <h1 class="light"> Innovation </h1>

                        <p class="light"> Using creative problem-solving approaches to address sticky humanitarian and
                            development challenges </p>
                    </div>

                    <div class="landing-hero__image-wrapper">
                        <img loading="lazy" class="landing-hero__image"
                             src="{{ asset('images/innovate/'.$innovate->image) }}"
                             srcset="{{ asset('images/innovate/'.$innovate->image) }}"
                             alt="A woman smiles while holding two brown baby goats.">
                    </div>

                </div>
            </div>
        </section>

        <section class="body-text ">
            <div class="container">

                <div class="body-text__content">

                    <h2>Why we innovate</h2>
                    <p>{!! $innovate->title !!} ​</p>


                </div>
            </div>
        </section>

    @endif

    @if ($sections->count() > 0)
        <section class="body-photo-2-3-up">
            <div class="container">
                <h3 class="body-photo-2-3-up__title"><br>
                    <center>Our innovation portfolio spans {{$sections->count()}} sectors</center>
                </h3>

                <div class="body-photo-2-3-up__content">
                    <div class="body-photo-2-3-up__photos">
                        @php
                            $firstSection = $sections->slice(0, 3); // أول 3 عناصر
                            $remainingSection = $sections->slice(3); // باقي العناصر
                        @endphp
                        @foreach($firstSection as $section)
                            @php
                                if ($section->stories->isNotEmpty()) {
                                    $story = $section->stories->shuffle()->first();
                                }
                            @endphp
                            @if ($section->stories->isNotEmpty())
                                <div class="body-photo-2-3-up__photo-wrapper body-photo-2-3-up__photo-wrapper--3-up">
                                    <div
                                        class="body-photo-2-3-up__photo-wrapper-aspect body-photo-2-3-up__photo-wrapper-aspect--3-up">
                                        <img loading="lazy" class="body-photo-2-3-up__photo" alt="{{ $story->title }}"
                                            src="{{ asset('images/story/'.$story->image) }}" data-aos="fade-up"
                                            data-aos-once="true" data-aos-easing="linear" data-aos-duration="900"
                                            data-aos-delay="0" />
                                    </div>
                                    <div class="body-photo-2-3-up__caption body-photo-2-3-up__caption--3">
                                        <center>
                                            <h4>{{ $section->title }}</h4>{!! $section->body !!}
                                        </center>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="body-photo-2-3-up">
            <div class="container">
                <div class="body-photo-2-3-up__content">
                    <div class="body-photo-2-3-up__photos">
                        @if($remainingSection->count() > 0)
                            @foreach($remainingSection as $section)
                                @php
                                    if ($section->stories->isNotEmpty()) {
                                        $story = $section->stories->shuffle()->first();
                                    }
                                @endphp
                                @if ($section->stories->isNotEmpty())
                                    <div class="body-photo-2-3-up__photo-wrapper body-photo-2-3-up__photo-wrapper--3-up">
                                        <div
                                            class="body-photo-2-3-up__photo-wrapper-aspect body-photo-2-3-up__photo-wrapper-aspect--3-up">
                                            <img loading="lazy" class="body-photo-2-3-up__photo" alt="{{ $story->title }}"
                                                src="{{ asset('images/story/'.$story->image) }}" data-aos="fade-up"
                                                data-aos-once="true" data-aos-easing="linear" data-aos-duration="900"
                                                data-aos-delay="0" />
                                        </div>
                                        <div class="body-photo-2-3-up__caption body-photo-2-3-up__caption--3">
                                            <center>
                                                <h4>{{ $section->title }}</h4>{!! $section->body !!}
                                            </center>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection

@push('script')
    <script>
        // Function to add arrow SVG using <use> after text
        function addArrow() {
            let link = document.getElementById("daf_link"); // Get the link element
            let svg = document.createElementNS("http://www.w3.org/2000/svg", "svg"); // Create SVG element
            svg.setAttribute("class", "arrow-svg");
            let use = document.createElementNS("http://www.w3.org/2000/svg", "use"); // Create <use> element
            use.setAttribute("href", "#arrow-white"); // Set href attribute
            svg.appendChild(use); // Append <use> to SVG
            link.appendChild(svg); // Append SVG to the link
        }

        // Call the function to add arrow after text
        addArrow();
    </script>

@endpush
