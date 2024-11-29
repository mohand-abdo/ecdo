@extends('website.layouts.app')

@section('title','Advocacy')

@push('style')
    <style>
        .sb-cta .button--primary {
            background: #E36F1E !important;
            color: #fff !important;
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

    </style>
@endpush

@section('content')
    @if($advocacy)
        <section class="landing-hero">
            <div class="container">

                <div class="landing-hero__content landing-hero__content--light landing-hero__content--caption">
                    <div class="landing-hero__backdrop landing-hero__backdrop--light" role="presentation" style="background: #55efc430">
                        <div class="landing-hero__pattern" role="presentation"></div>
                    </div>


                    <div class="landing-hero__text-wrapper">
                        <h1 class="light"> Advocacy </h1>

                        <p class="light"> ECDO Action advocates fight poverty, injustice and discrimination to
                            create a better, more just tomorrow. </p>
                    </div>

                    <div class="landing-hero__image-wrapper">
                        <img loading="lazy" class="landing-hero__image"
                             src="{{ asset('images/advocacy/'.$advocacy->image) }}"
                             srcset="{{ asset('images/advocacy/'.$advocacy->image) }}"
                             alt="CARE Action advocates on Capitol Hill.">
                    </div>

                </div>
            </div>
        </section>


        <section class="body-text ">
            <div class="container">

                <div class="body-text__content">

                    <p style="text-align: center;">Interested in getting involved with ECDO?</p>
                    <h2 style="text-align: center;">Our Issues</h2>
                    <h2 style="text-align: center;"></h2>

                </div>
            </div>
        </section>

        <section class="icon-callout">
            <div id="preload-icons" class="hidden">


                <div class="icon-callout__icon icon-callout__icon--disaster-response hover"></div>


                <div class="icon-callout__icon icon-callout__icon--food-nutrition hover"></div>


                <div class="icon-callout__icon icon-callout__icon--health hover"></div>


                <div class="icon-callout__icon icon-callout__icon--education-work hover"></div>
            </div>

            <div class="container">



                <div class="icon-callout__wrap" data-aos-once="true" data-aos="fade-up" data-aos-delay="150"
                     data-aos-easing="linear">

                    <a class="icon-callout__icon-wrapper"
                       href="#"
                       target="">
                        <div class="icon-callout__icon icon-callout__icon--disaster-response"></div>
                    </a>

                    <div class="icon-callout__content">
                        <h3>Crisis<br>
                        </h3>
                    </div>

                </div>



                <div class="icon-callout__wrap" data-aos-once="true" data-aos="fade-up" data-aos-delay="300"
                     data-aos-easing="linear">

                    <a class="icon-callout__icon-wrapper" href="#" target="">
                        <div class="icon-callout__icon icon-callout__icon--food-nutrition"></div>
                    </a>

                    <div class="icon-callout__content">
                        <h3>Food & Water<br>
                        </h3>
                    </div>

                </div>



                <div class="icon-callout__wrap" data-aos-once="true" data-aos="fade-up" data-aos-delay="450"
                     data-aos-easing="linear">

                    <a class="icon-callout__icon-wrapper"
                       href="#"
                       target="">
                        <div class="icon-callout__icon icon-callout__icon--health"></div>
                    </a>

                    <div class="icon-callout__content">
                        <h3>Health<br>
                        </h3>

                    </div>

                </div>



                <div class="icon-callout__wrap" data-aos-once="true" data-aos="fade-up" data-aos-delay="600"
                     data-aos-easing="linear">

                    <a class="icon-callout__icon-wrapper"
                       href="#"
                       target="">
                        <div class="icon-callout__icon icon-callout__icon--education-work"></div>
                    </a>

                    <div class="icon-callout__content">
                        <h3>Education & Work<br>
                        </h3>

                    </div>

                </div>

                <div class="icon-callout__wrap icon-callout__wrap--empty"></div>
                <div class="icon-callout__wrap icon-callout__wrap--empty"></div>
                <div class="icon-callout__wrap icon-callout__wrap--empty"></div>
                <div class="icon-callout__wrap icon-callout__wrap--empty"></div>

            </div>
        </section>



        <section class="body-text not-first">
            <div class="container">

                <div class="body-text__content">

                    <p>{!! $advocacy->title !!}</p>
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
