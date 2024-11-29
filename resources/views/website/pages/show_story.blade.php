@extends('website.layouts.app')

@section('title','Story')

@push('style')
    <style>
        .button--primary::after{
            background:#F4B223;
        }
        .button--primary:hover span,
        .button--primary:hover svg{
            color: #090015;
        }

        .button--secondary {
            border-color:#E36F1E
        }
        .button--secondary:hover{
            background:#E36F1E;
            border-color:#E36F1E;
        }
        a.button--secondary:hover {
            background:#E36F1E;
            border-color:#E36F1E;
        }

        a.button--secondary {
            border-color: #E36F1E
        }

        .body-text__content ul li::before {
            background: #E36F1E;
            border-color: #E36F1E;
        }

        .body-text__content ol a, .body-text__content p a, .body-text__content ul a{
            box-shadow: inset 0 -2px 0 #2ecc71;
        }

        .body-text__content ol a:hover, .body-text__content p a:hover, .body-text__content ul a:hover{
            box-shadow: inset 0 -8px 0 #2ecc71;
        }

        .three-up__post-title--related-stories{
            background-image: linear-gradient(to right,rgba(255,255,255,0) 50%,#2ecc71 50%);
        }

        .three-up__link-md::before,.three-up__content a::before{
            background: #2ecc71;
        }

        .three-up__link-md:hover::before,.three-up__content a:hover::before{
            background: #2ecc71;
        }

        .back-to-top__button:hover{
            background: #2ecc71;
        }

    </style>
@endpush

@section('content')

    <section class="interior-hero" style="margin-top: 150px">

        <div class="container ">
            <div class="interior-hero__content no-image">
                <div class="interior-hero__backdrop no-image" role="presentation" style="background-color: #55efc430">
                    <div class="interior-hero__pattern" role="presentation" ></div>
                </div>
                <h1 class="interior-hero__heading">{{ $story->title }}</h1>
            </div>
        </div>
    </section>

    <section class="body-photo ">
        <div class="container">
            <div class="body-photo__content body-photo__content--column " data-aos="fade-up" data-aos-once="true"
                 data-aos-easing="linear" data-aos-duration="900">
                <img loading="lazy" class="body-photo__image body-photo__image--column has-attr"
                     src="{{ asset('images/story/big_image/'.$story->image) }}"
                     srcset="{{ asset('images/story/big_image/'.$story->image) }}"
                     alt="{{ $story->title }}/>

            </div>
        </div>
    </section>

    <section class="body-text">
        <div class="container">

            <div class="body-text__content" style="margin-left: 0">

                <p>{!! $story->body !!}</p>

                <h3>About ECDO:</h3>
                <p>Founded in 1945, ECDO is a leading humanitarian organization fighting global poverty. CARE has more
                    than six decades of experience helping people prepare for disasters, providing lifesaving assistance
                    when a crisis hits, and helping communities recover after the emergency has passed. CARE places
                    special focus on women and children, who are often disproportionately affected by disasters. To
                    learn more, visit <a href="{{ route('welcome') }}">www.ecdo-sd.org</a>.</p>
                

            </div>
        </div>
    </section>

    @if($resources->count() > 0)
        <section class="two-col-list">
            <div class="container container--medium">
                <h3 class="two-col-list__heading">Resources</h3>
                <div class="two-col-list__list">
                    @foreach($resources as $resource)
                        <div class="two-col-list__item">
                            <div class="two-col-list__content ">
                                <h4>{{ $resource->title }}</h4>

                                <p>{!! Str::limit(strip_tags($resource->body), 250, '...') !!}
                                </p>

                                <a href="{{ route('$resource.show',$resource->id) }}" target="">Read More</a>
                            </div>
                            <div class="two-col-list__image" style="background-image:url({{ asset('images/resource/'.$resource->image) }})"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($stories->count() > 0 )
        <section class="three-up related-stories">
            <div class="container container--medium">
                <h2 class="three-up__title">Related Stories</h2>
                <div class="three-up__container">
                    @foreach($stories as $story)
                        <div class="three-up__wrap">
                            <div class="three-up__background" role="presentation"
                                 style="background-image:url({{ asset('images/story/'.$story->image) }})">
                            </div>

                            <div class="three-up__content">
                                <h6 class="three-up__term related">News & Stories</h6>
                                <a class="three-up__post-title three-up__post-title--related-stories"
                                   href="{{ route('story.show',$story->id) }}" target="_blank">{{ $story->title }}</a>
                                <p class="three-up__author-date">
                                    By
                                    {{ $story->user->name }}
                                    &middot;
                                    {{ \Carbon\Carbon::parse($story->created_at)->format('F d, Y') }} </p>
                                <p class="three-up__preview">{!! Str::limit(strip_tags($story->body), 50, '...') !!}<a href="{{ route('story.show',$story->id) }}"
                                                                                                                       class="read-more">Read More</a></p>
                                <h4 class="three-up__link">
                                    <a href="{{ route('story.show',$story->id) }}" target="">{{ $story->title }}</a>
                                </h4>
                                <a class="three-up__link-md" href="{{ route('story.show',$story->id) }}"
                                   target="">Read More</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    <div class="back-to-top">
        <div class="back-to-top__button">
            <span>Back to Top</span>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M5.25332 1.79102L5.25257 1.79027L7.04331 -0.000466655L14.0869 7.0431L12.2961 8.83384L8.31287 4.85058L8.31287 14L5.78039 14L5.78039 4.84543L1.79074 8.83508L-3.04042e-07 7.04434L5.25332 1.79102Z"
                      fill="#2ecc71" />
            </svg>
        </div>
    </div>

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
