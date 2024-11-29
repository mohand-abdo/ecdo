@extends('website.layouts.app')

@section('title',$section->title))

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
        .donate-box .button--primary {
            background: #E36F1E !important;
            color: #fff !important;
        }

        .donate-box .button--primary svg {
            color: #fff !important;
        }

        .donate-box .button--primary::after {
            background: #F4B223 !important;
        }

        .donate-box .button--primary:hover span,
        .donate-box .button--primary:hover svg {
            color: #090015 !important;
        }

        .featured-content::before{
            background: #55efc430;
        }

        .featured-content .fc__item-secondary span::before{
            background: #2ecc71;
        }

        .featured-content .fc__item-secondary span:hover::before,.featured-content .fc__item:hover span::before{
            background: #2ecc71;
        }

    </style>
@endpush

@section('content')

    <section class="landing-hero">
        <div class="container">
            <div class="landing-hero__content landing-hero__content--light landing-hero__content--caption">
                <div class="landing-hero__backdrop landing-hero__backdrop--light" style="background-color: #55efc430" role="presentation">
                    <div class="landing-hero__pattern" role="presentation"></div>
                </div>

                @if($story_php)
                <div class="landing-hero__text-wrapper">
                    <h1 class="light"> {{ $section->title }} </h1>

                    <p class="light"> {!! $section->body !!} </p>
                </div>

                <div class="landing-hero__image-wrapper">
                    <img loading="lazy" class="landing-hero__image"
                         src="{{ asset('images/story/'.$story_php->image) }}"
                         srcset="{{ asset('images/story/'.$story_php->image) }}"
                         alt="{{ $section->title }}">
                </div>

                <div class="landing-hero__image-caption light"> </div>
                @else
                <div class="text-center">
                        <h1>No Stories Found in {{ $section->title }}</h1>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section class="introduction" id="introduction">

        <div class="container">
            <div class="introduction__content">


                <div class="introduction__intro no-nav">
                    <h2> Our 2030 Goal: ECDO provides quality, gender-focused and localized humanitarian assistance to
                        10% of those affected in major crises, reaching at least 50 million people by 2030. </h2>
                </div>
            </div>
        </div>
    </section>

    @if($story_php)
        <section class="body-text ">
            <div class="container">

                <div class="body-text__content">

                    <h3>{{ $story_php->title }}</h3>
                    <p>{!! $story_php->body !!}</p>

                </div>
            </div>
        </section>
    @endif

    @if($stories->count() > 0)
        @foreach($stories as $story)
            @if($story->id != $story_php->id)
                <section class="featured-content">
                <article class="fc__item fc__item-secondary">
                    <a href="{{ route('story.show',$story->id) }}" target="">
                        <div id="content" class="fc__content is-out-viewport" data-aos="fade-right" data-aos-delay="50"
                             data-aos-duration="1000" data-aos-once="true">
                            <h3>{{ $story->title }}</h3>

                            <p>{!! Str::limit(strip_tags($story->body),150,'...') !!}</p>
                            <span>Read more</span>
                        </div>

                        <div class="fc__item-image"
                             style="background-image: url({{ asset('images/story/'.$story->image) }});"
                             data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">
                        </div>
                    </a>
                </article>
            </section>
            @endif
        @endforeach
    @endif

    @include('website.partail.footer_image')
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
