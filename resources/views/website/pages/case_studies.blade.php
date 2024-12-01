@extends('website.layouts.app')

@section('title','Case Studies')

@push('style')
    <style>
        .button--primary::after{
            background:#2ecc71;
        }
        .button--primary:hover span,
        .button--primary:hover svg{
            color: #090015;
        }

        .button--secondary {
            border-color:#2ecc71
        }
        .button--secondary:hover{
            background:#2ecc71;
            border-color:#2ecc71;
        }
        a.button--secondary:hover {
            background:#2ecc71;
            border-color:#2ecc71;
        }

        a.button--secondary {
            border-color: #2ecc71
        }

        .body-text__content ul li::before {
            background: #2ecc71;
            border-color: #2ecc71;
        }

        .sb-cta .button--primary {
            background: #2ecc71 !important;
            color: #fff !important;
        }

        .news-hero__wrapper{
            padding-bottom: 90px;
        }

        .news-hero__list-md a{
            border: 2px solid #2ecc71;
        }

        .news-hero__list-md a:hover{
            background: #2ecc71;
        }

        .news-hero__main-link:hover{
            color: #2ecc71;
        }

    </style>
@endpush

@section('content')

    <section class="news-hero" style="margin-top : 100px">
        <div class="container">
            <div class="news-hero__wrapper">
                <div class="news-hero__left">
                    <h1>
                        {{ $story ? 'Case Studies' : 'Not Found Case Studies' }}
                    </h1>
                    @if($story)
                        <article>
                            <div class="news-hero__main-image"
                                 data-background="https://www.care.org/wp-content/uploads/2024/10/PAGE-3.webp"
                                 style="background-image:url({{ asset('images/story/'.$story->image) }})">
                                <div class="news-hero__overlay news-hero__overlay--top"></div>
                                <div class="news-hero__main-content">
                                    <ul>
                                        <li>
                                            {{ $story->section->title }}
                                        </li>
                                    </ul>
                                    <h2>
                                        <a class="news-hero__main-link" href="{{ route('story.show',$story->id) }}">
                                            {{ $story->title }}
                                        </a>
                                    </h2>
                                    <h6>
                                        By
                                        {{ $story->user->name }}
                                        <span class="dot">{{ \Carbon\Carbon::parse($story->created_at)->format('F d, Y') }}</span>
                                    </h6>
                                </div>
                                <div class="news-hero__overlay news-hero__overlay--bottom"></div>
                            </div>
                        </article>
                    @endif
                </div>
                @if(!empty($stories))
                    @if($stories->count() > 0)
                        <div class="news-hero__right">
                            @foreach($stories as $r_story)
                                <article class="news-hero__item">
                                <div class="news-hero__secondary-image" style="background-image:url({{ asset('images/story/'.$r_story->image) }})"></div>
                                <h6>
                                    {{ $r_story->section->title }}
                                </h6>
                                <h4>
                                    <a class="news-hero__main-link"
                                       href="{{ route('story.show',$r_story->id) }}">
                                        {{ $r_story->title }}
                                    </a>
                                </h4>
                                <p>
                                    By
                                    {{$r_story->user->name}}
                                    •
                                    {{ \Carbon\Carbon::parse($story->created_at)->format('F d, Y') }}
                                </p>
                            </article>
                            @endforeach
                        </div>
                    @endif
                @endif
                    @if($sections->count() > 0)
                    <div class="news-hero__bottom">
                        <h4>
                            View news and stories by topic:
                        </h4>
                        @if($story)
                        <ul class="news-hero__list-md">
                            @foreach($sections as $section)
                                <li>
                                    <a href="{{ route('section.story',$section->id) }}">
                                        {{ $section->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                            <div class="news-hero__list-mobile">
                                <select name="All">
                                    <option value="">
                                        All
                                    </option>
                                    @foreach($sections as $section)
                                        <option value="{{ route('section.story',$section->id) }}">
                                            {{$section->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    </div>
                    @endif
                <div class="news-hero__pattern"></div>
            </div>
        </div>
    </section>


    @if($p_stories->count() > 0)
            <section class="news-landing__list-one">
                <div class="container">
                    <div class="news-landing__list-one-posts">
                        @foreach($p_stories as $p_story)
                            <article class="post-teaser">
                            <div class="post-teaser__image"
                                 style="background-image:url({{ asset('images/story/'.$p_story->image) }})">
                            </div>

                            <div class="post-teaser__content">
                                <a href="topic/climate/index.html">
                                    <h6>{{ $p_story->section->title }}</h6>
                                </a>

                                <a class="post-teaser__large-anchor"
                                   href="{{ route('story.show',$p_story->id) }}">
                                    <h3 class="post-teaser__headline">{{ $p_story->title }}</h3>

                                    <p class="post-teaser__author">
                                        <span>{{ \Carbon\Carbon::parse($p_story->created_at)->format('F d, Y') }}</span>
                                    </p>

                                    <p class="post-teaser__excerpt">{!! Str::limit(strip_tags($p_story->body), 250, '...') !!}</p>
                                </a>

                                <h4>
                                    <a href="{{ route('story.show',$p_story->id) }}">
                                        Read More
                                    </a>
                                </h4>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </section>

        <section class="news-landing__pagination">
            <div class="container">
                <div class="news-landing__pagination--wrapper container--large">

                    <div class="pagination">
                       {!! $p_stories->appends(request()->input())->links() !!}
                    </div>

                </div>
            </div>
        </section>
    @endif

@endsection

@push('script')
    <script></script>
@endpush
