@extends('website.layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        .latest-news__container::after {
            background-color: #2ecc71;
        }

        .home-up__container::after,
        .featured-two-up .fc-two-up__item-secondary span::before {
            background-color: #2ecc71;
        }

        a::before,
        .pillars-six__bar {
            background-color: #2ecc71;
        }

        a:hover::before {
            background-color: #2ecc71;
        }

        .featured-two-up .fc-two-up__item:hover span::before {
            background-color: #2ecc71;
        }



        .latest-news__title {
            border-bottom: 6px solid #2ecc71;
        }

        .home-up__subtitle {
            border-bottom: 6px solid #2ecc71;
        }

        @media only screen and (min-width: 576px) {

            .latest-news__title,
            .home-up__subtitle {
                border-bottom: 0;
            }
        }

        .pillars-six__items::before {
            background: url({{ asset('assets/img/pillar-pattern-orange.svg') }}) #f6e58d no-repeat
        }

        .featured-two-up::before {
            background-color: #55efc430;
        }

        .featured-two-up .fc-two-up__item-secondary span:hover::before {
            background-color: #2ecc71;
        }

        .button--secondary {
            border: 4px solid #2ecc71
        }

        .button--secondary:hover {
            background-color: #2ecc71;
        }
    </style>
@endpush

@section('content')
    @if ($indro)
        <section class="hero-home" style="margin-top: 130px">
            <div class="container">

                <div class="hero-home__wrapper">
                    <div class="hero-home__overlay hero-home__overlay--left"></div>
                    <div class="hero-home__overlay hero-home__overlay--mobile hero-home__overlay--mobile--left"></div>


                    <img loading="lazy" class="hero-home__image hero-home__image"
                        src="{{ asset('images/indro/sm_image/' . $indro->image) }}"
                        srcset="{{ asset('images/indro/sm_image/' . $indro->image) }}" alt="{{ $indro->title }}">

                    <img class="hero-home__image-md hero-home__image-md--left"
                        src="{{ asset('images/indro/' . $indro->image) }}"
                        srcset=" {{ asset('images/indro/' . $indro->image) }}" alt="{{ $indro->title }}">
                    <div class="hero-home__pattern hero-home__pattern--left hero-home__pattern--spiral" role="presentation">
                    </div>

                    <div class="hero-home__content hero-home__content--left">
                        <h1 class="hero-home__headline">{{ $indro->title }}</h1>
                        <p class="hero-home__subheadline">{!! $indro->body !!}</p>
                    </div>


                    55efc430
                </div>
            </div>
        </section>
    @endif
    @if ($save_lives->count() > 0)
        <section class=" partner">
            <div class="container container--md">
                <div class="partner__wrapper">
                    <h2 class="partner__headline">
                        <h3>Every day, together with you, ECDO saves lives and helps millions of people find the way to a
                            better life worldwide.</h3>
                    </h2>

                    <div class="partner__col-wrap count-4">
                        @foreach ($save_lives as $save_live)
                            <div class="partner__wrap partner__wrap--md">
                                <div class="partner__image-wrapper">
                                    <div class="partner__background partner__background--md"
                                        style="border-radius: 50%; background-image: url({{ asset('images/save_live/' . $save_live->image) }})">
                                    </div>
                                </div>
                                <div class="partner__content partner__content--no-content">
                                    <h4>
                                        <h3>{{ $save_live->title }}</h3>
                                    </h4>
                                    <p>
                                    <p>{!! $save_live->body !!}</p>
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    @endif


    @if ($stories->count() > 0)
        <section class="latest-news">
            <div class="container container--medium">

                <div class="latest-news__wrapper">
                    <div class="latest-news__backdrop" role="presentation" style="background-color: #55efc430"></div>

                    <h2 class="latest-news__title latest-news__title--md">Latest News & Stories</h2>

                    <div class="latest-news__container">
                        @foreach ($stories as $story)
                            <div class="latest-news__wrap latest-news__wrap--md">
                                <a href="{{ route('story.show', $story->id) }}">
                                    @if (strpos($story->image, '.mp4') !== false ||
                                            strpos($story->image, '.mov') !== false ||
                                            strpos($story->image, '.avi') !== false)
                                        <video id="currentMedia" src="{{ asset('images/story/' . $story->image) }}"
                                            controls style="max-width: 100%; max-height: 100%"></video>
                                    @else
                                        <img id="currentMedia" src="{{ asset('images/story/' . $story->image) }}"
                                            alt="{{ $story->title }}" style="max-width: 100%; max-height: 100%">
                                    @endif
                                    {{-- <div class="latest-news__background latest-news__background--md" style="background-image: url('{{ asset("images/story/".$story->image) }}') !important;"></div> --}}
                                    <div class="latest-news__content latest-news__content--md">
                                        <h3>{{ $story->title }}</h3>
                                        <p>{!! Str::limit(strip_tags($story->body), 200, '...') !!}</p>
                                        <a class="latest-news__link-desktop"
                                            href="{{ route('story.show', $story->id) }}">Read More</a>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <a class="latest-news__button latest-news__button--md" href="{{ route('story.index') }}">
                        <button class="button button--secondary" type="submit" value="Submit">
                            <span>See all stories</span>
                            <svg>
                                <use href="#arrow-black" />
                            </svg>
                        </button>
                    </a>
                </div>

                <h2 class="latest-news__title">Latest News & Stories</h2>
                @foreach ($stories as $story)
                    <div class="latest-news__wrap">
                        <div class="latest-news__background"
                            style="background-image: url('{{ asset('images/story/' . $story->image) }}');"></div>

                        <div class="latest-news__content">
                            <a class="latest-news__link-mobile"
                                href="{{ route('story.show', $story->id) }}">{{ $story->title }}</a>
                        </div>
                    </div>
                @endforeach

                <div class="latest-news__button-wrap">
                    <a class="latest-news__button" href="{{ route('story.index') }}">
                        <button class="button button--secondary" type="submit" value="Submit">
                            <span>See all stories</span>
                            <svg>
                                <use href="#arrow-black" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </section>
    @endif

    @if ($helps->count() > 0)
        <section class="home-up">
            <div class="container container--md">
                <div class="home-up__wrapper">
                    <h2 class="home-up__title home-up__title--md">Here’s how you can help!</h2>
                    <p class="home-up__subtitle home-up__subtitle--md">From advocacy, to donating money, volunteering and
                        more, there are many ways you can help.</p>
                </div>

                <div class="home-up__container">
                    @foreach ($helps as $help)
                        <div class="home-up__wrap home-up__wrap--md">
                            <div class="home-up__background home-up__background--md"
                                style="background-image: url('{{ asset('images/help/' . $help->image) }}');">
                            </div>

                            <div class="home-up__content home-up__content--md">
                                <h3><a class="home-up__content--title" href="#">{{ $help->title }}</a></h3>
                                <p>{!! Str::limit(strip_tags($help->body), 90, '...') !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="container">
                    <h2 class="home-up__title">Here’s how you can help!</h2>
                    <p class="home-up__subtitle">From advocacy, to donating money, volunteering and more, there are many
                        ways you can help.</p>
                    @foreach ($helps as $help)
                        <div class="home-up__wrap">
                            <div class="home-up__background"
                                style="background-image: url('{{ asset('images/help/' . $help->image) }}');">
                            </div>
                            <div class="home-up__content">
                                <h3><a class="home-up__content--title" href="#">{{ $help->title }}</a></h3>
                                <p>{!! Str::limit(strip_tags($help->body), 90, '...') !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($humanitarians->count() > 0)
        <section class="featured-two-up">
            @foreach ($humanitarians as $humanitarian)
                <article class="fc-two-up__item fc-two-up__item-secondary">
                    <a href="{{ route('story.show', $humanitarian->id) }}" target="">
                        <div id="content" class="fc-two-up__content is-out-viewport">
                            <h2>{{ $humanitarian->title }}</h2>
                            <p>{!! Str::limit(strip_tags($humanitarian->body), 190, '...') !!}</p>
                            <span>Learn more</span>
                        </div>

                        <div class="fc-two-up__item-image"
                            style="background-image: url('{{ asset('images/story/' . $humanitarian->image) }}');"
                            data-aos="fade-down" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true"></div>
                    </a>
                </article>
            @endforeach
        </section>
    @endif
    <section data-pillarid="1883277136" class="pillars-six" id="pillars-six-1883277136" style="margin-top: 110px ">

        <div class="container">
            <div class="pillars-six__content">
                <p class="pillars-six__headline">We<br />
                    save lives,<br />
                    defeat poverty,<br />
                    achieve social justice,<br />
                    and fight for women and girls.</p>
            </div>
        </div>
    </section>

    <div class="pillars-six__bar pillars-six__bar--transition" id="pillars-six__bar-1883277136" role="presentation">
    </div>

    <section data-pillarid="146298135" class="pillars-six" id="pillars-six-146298135">

        <div class="pillars-six__items pillars-six__items--white">
            <div class="pillars-six__bar pillars-six__bar--transition" role="presentation"></div>
            <div class="container">
                <div class="pillars-six__items-content">
                    <h2>Here’s how we fight poverty.</h2>
                    <h3>ECDO tackles poverty from multiple angles. See how we focus our efforts in the fight against
                        poverty.</h3>
                </div>
            </div>

            <div class="pillars-six__wrap">
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="300" data-aos-easing="linear"
                    data-aos-offset="0" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p1.jpg') }}') !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Crisis</h3>
                                <div class="pillars-six__icon pillars-six__icon--disaster-response"></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="600" data-aos-easing="linear"
                    data-aos-offset="-100" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p2.jpg') }}') center center no-repeat !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Food & Water</h3>


                                <div class="pillars-six__icon pillars-six__icon--food-nutrition"></div>




                            </div>
                        </div>
                    </a>
                </div>
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="900" data-aos-easing="linear"
                    data-aos-offset="0" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p3.jpg') }}') center center no-repeat !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Health</h3>



                                <div class="pillars-six__icon pillars-six__icon--health"></div>



                            </div>
                        </div>
                    </a>
                </div>
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="1200" data-aos-easing="linear"
                    data-aos-offset="-100" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p4.jpg') }}') center center no-repeat !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Education & Work</h3>




                                <div class="pillars-six__icon pillars-six__icon--education-work"></div>


                            </div>
                        </div>
                    </a>
                </div>
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="1500" data-aos-easing="linear"
                    data-aos-offset="0" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p5.jpg') }}') center center no-repeat !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Climate</h3>





                                <div class="pillars-six__icon pillars-six__icon--climate"></div>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="pillars-six__item" data-aos="fade-up" data-aos-delay="1800" data-aos-easing="linear"
                    data-aos-offset="-100" data-aos-once="true">
                    <a href="#">
                        <div class="pillars-six__item-image"
                            style="background: url('{{ asset('images/poverty/p1.jpg') }}') center center no-repeat !important;">
                            <div class="pillars-six__content-area">
                                <h3 class="pillars-six__item-title">Equality</h3>
                                <div class="pillars-six__icon pillars-six__icon--equality"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="preload">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-disaster-response-fill.svg') }}"
                alt="icon">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-food-nutrition-fill.svg') }}"
                alt="icon">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-health-fill.svg') }}" alt="icon">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-education-work-fill.svg') }}"
                alt="icon">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-climate-fill.svg') }}" alt="icon">
            <img loading="lazy" width="15" height="15"
                src="{{ asset('assets/themes/careorg/assets/img/icon-callout/icon-equality-fill.svg') }}" alt="icon">
        </div>
    </section>

    <div class="pillars-six__bar pillars-six__bar--transition" id="pillars-six__bar-146298135" role="presentation"></div>

    <style>
        /* تأثير hover على العناصر */
        .pillars-six__item {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .pillars-six__item:hover {
            transform: translateY(-10px);
            /* يجعل العنصر يرتفع قليلاً عند التحويم */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            /* إضافة ظل خفيف */
        }

        .pillars-six__item-image {
            background-size: cover;
            background-position: center;
            transition: background-size 0.3s ease;
        }

        .pillars-six__item:hover .pillars-six__item-image {
            background-size: 110%;
            /* تكبير الصورة قليلاً عند التحويم */
        }

        .pillars-six__icon {
            transition: color 0.3s ease;
        }
    </style>


    @include('website.partail.footer_image')
@endsection
