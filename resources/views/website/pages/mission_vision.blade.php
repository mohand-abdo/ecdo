@extends('website.layouts.app')

@section('title','About Us')

@section('title','About Us)'

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
    <section class="interior-hero" style="margin-top : 125px">

        <div class="container ">
            <div class="interior-hero__content has-image">
                <div class="interior-hero__backdrop has-image" role="presentation" style="background-color: #55efc430">
                    <div class="interior-hero__pattern" role="presentation"></div>
                </div>
                <h1 class="interior-hero__heading">
                    Mission & Vision
                </h1>
                <div class="interior-hero__image-wrapper">
                    <img loading="lazy" class="interior-hero__image"
                         src="{{ asset('images/vision_mission.webp') }}"
                         srcset="{{ asset('images/vision_mission.webp') }}"
                         alt="A CARE staffer wearing a bright orange CARE shirt smiles while holding a young girl wearing a black and white checked dress.">
                </div>
            </div>
        </div>
    </section>

    <section class="introduction" id="introduction">
        <div class="container">
            <div class="introduction__content">


                <div class="introduction__intro no-nav">
                    <h2> ECDO works to save lives, defeat poverty and achieve social justice. </h2>
                </div>
            </div>
        </div>
    </section>

    <section class="body-text ">
        <div class="container">

            <div class="body-text__content">
                @if($indros->count() > 0 )
                    <h2>Who We Are</h2>
                    @foreach($indros as $indro)
                        <p>{{ $indro->title }}</p>
                    @endforeach
                @endif
                @if($missions->count() > 0)
                    <h2>Our Mission</h2>
                    @foreach($missions as $mission)
                        <p>{{ $mission->title }}</p>
                    @endforeach
                @endif
                @if($visions->count() > 0 )
                    <h2>Our Vision</h2>
                    @foreach($visions as $vision)
                        <p>{{ $vision->title }}</p>
                    @endforeach
                @endif
                @if($mottos->count() > 0 )
                    <h2>Our Motto</h2>
                    @foreach($mottos as $motto)
                        <p>{{ $motto->title }}</p>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
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
