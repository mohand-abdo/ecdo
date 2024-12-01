@extends('website.layouts.app')

@section('title','Section')

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

        @media only screen and (min-width: 1200px) {
            .interior-hero__content{
                margin-top: 20px;
            }
        }

        .post-teaser__headline{
            background-image: linear-gradient(to right,rgba(255,255,255,0) 50%,#2ecc71 50%);
        }

        .select2-container--default .select2-results__option--highlighted, .select2-container--default .select2-results__option--selected{
            background: #2ecc71;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{
            background: #2ecc71;
        }

        .post-teaser h6:hover{
            color: #2ecc71
        }

        .post-teaser__image::before {
            padding-top: 0
        }

    </style>
@endpush

@section('content')

    <section class="interior-hero" style="margin-top:100px">

        <div class="container ">
            <div class="interior-hero__content no-image">
                <div class="interior-hero__backdrop no-image" role="presentation" style="background: #55efc430;">
                    <div class="interior-hero__pattern" role="presentation"></div>
                </div>
                <h1 class="interior-hero__heading">{{ $section->title }}</h1>
            </div>
        </div>
    </section>


    @if($sections->count() >  0)
        <section class="category-archive__sb">
            <div class="container">
                <aside class="category-archive__sidebar">
                    <div class="category-archive__sidebar-content">
                        <h6 class="category-archive__sb-title">
                            News & Stories
                        </h6>
                        <h4 class="category-archive__sb-form">
                            Filter by topic
                        </h4>
                        <select class="category-archive__go-to-category select2" name="section">
                            @foreach($sections as $section)
                                <option @selected(request()->is('section/'.$section->id.'/stories')) value="{{ route('section.story',$section->id) }}">{{ $section->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </aside>
            </div>
        </section>
    @endif


    @if($stories->count() > 0)
        <section class="category-archive__list-one">
            <div class="container">
                <div class="category-archive__list-one-posts container--large">
                    @foreach($stories as $story)
                        <article class="post-teaser">
                            <div class="post-teaser__image">
                                @if (strpos($story->image, '.mp4') !== false ||
                                        strpos($story->image, '.mov') !== false ||
                                        strpos($story->image, '.avi') !== false)
                                    <video id="currentMedia" src="{{ asset('images/story/' . $story->image) }}" controls
                                        style="max-width: 100%; max-height: 100%"></video>
                                @else
                                    <img id="currentMedia" src="{{ asset('images/story/' . $story->image) }}"
                                        alt="{{ $story->title }}" style="max-width: 100%; max-height: 100%">
                                @endif
                            </div>

                            <div class="post-teaser__content">
                                <a href="{{ route('story.show',$story->id) }}">
                                    <h6>{{ $story->section->title }}</h6>
                                </a>

                                <a class="post-teaser__large-anchor"
                                   href="{{ route('story.show',$story->id) }}">
                                    <h3 class="post-teaser__headline">{{ $story->title }}</h3>

                                    <p class="post-teaser__author">
                                        <span>By
                                            {{ $story->user->name }}</span>
                                        <span>&#183;</span>
                                        <span>{{ \Carbon\Carbon::parse($story->created_at)->format('F d, Y') }}</span>
                                    </p>

                                    <p class="post-teaser__excerpt">
                                        {!! Str::limit(strip_tags($story->body), 250, '...') !!}
                                    </p>
                                </a>

                                <h4>
                                    <a href="{{ route('story.show',$story->id) }}">
                                        Read More
                                    </a>
                                </h4>
                            </div>
                        </article>
                    @endforeach

                </div>
            </div>
            </div>
        </section>

        <section class="news-landing__pagination">
            <div class="container">
                <div class="news-landing__pagination--wrapper container--large">

                    <div class="pagination">
                        {!! $stories->appends(request()->input())->links() !!}
                    </div>

                </div>
            </div>
        </section>
    @endif

@endsection

@push('script')
    <script></script>
@endpush
