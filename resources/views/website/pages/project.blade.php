@extends('website.layouts.app')

@section('title','Projects')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css') }}">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
            /*   *****   Storing Colors In Variables   *****  */
            /*--primary-light-clr: #eaf3fa;*/
            /*--links-clr: #186f78;*/
            /*--text-clr: #3f7277;*/

        body{
            width: 100%;
            min-height: 100vh;
        }
        .portfolio{
            width: 100%;
            padding: 50px 8%;
            background-color: #55efc430;
        }
        .portfolio .section-head{
            max-width: 700px;
            margin: 0 auto 25px;
            text-align: center;
        }
        .portfolio .section-head h1{
            position: relative;
            font-size: 32px;
            margin: 10px 0 30px;
            color: #05555c;
        }
       .portfolio .button-group{
            text-align: center;
            margin-bottom: 40px;
        }
        .portfolio .button-group .button{
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: transparent;
            color: #333333;
            font-style: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s;
            border: 2px solid #2ecc71;
            border-radius: 5px;
            outline: none;
            cursor: pointer;
        }

       .portfolio .button-group .button.active{
           background: #2ecc71;
           color: #f6f9fe;
        }
        .portfolio .button-group .button:hover{
            background-color: #2ecc71;
            color: #f6f9fe;
        }
        .portfolio div.gallery{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }
        .portfolio div.gallery .item{
            position: relative;
            margin: 4px;
            width: calc(33.33% - 8px);
            overflow: hidden;
            cursor: pointer;
        }
        .portfolio .item img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: 0.3s;
        }
        .portfolio div.gallery .item:hover img{
            transform: scale(1.15);
        }
        .portfolio .item .overlay{
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(5,85,92,0.7);
            color: #f6f9fe;
            padding: 15px;
            overflow: hidden;
            transition: opacity 0.2s ease-in-out;
            opacity: 0;
        }
        .portfolio .item:hover .overlay{
            opacity: 1;
        }
        .portfolio .item .overlay a{
            display: inline-block;
            padding: 8px 16px;
            border: 2px solid #f6f9fe;
            color: #f6f9fe;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        .portfolio .item .overlay a:hover{
            background-color: #f6f9fe;
            color: #05555c;
        }


        @media(max-width: 1024px){
            .portfolio div.gallery .item{
                width: calc(50% - 8px);
            }
        }

        @media(max-width: 600px){
            .portfolio div.gallery .item{
                width: 100%;
                margin: 4px 0;
            }
        }
    </style>
@endpush

@section('content')
    <section class="portfolio">

        <header class="section-head">
            <h1>Some Of My Latest Works</h1>
        </header>

        <div class="mainContainer">

            <!--  *****  Buttons Section Starts  *****  -->
            <div class="button-group">
                <button class="button active" data-filter="*">All</button>
                @foreach($projects as $project )
                    <button class="button" data-filter=".{{$project->id}}">{{ $project->title }}</button>
                @endforeach
            </div>
            <!--  *****  Buttons Section Ends  *****  -->

            <!--  *****  Gallery Section Starts  *****  -->
            <div class="gallery">

                <!--  *****  Card 1 Starts  *****  -->
                @foreach($projects as $project)
                    @foreach($project->images as $image)
                        <div class="item {{ $project->id }}">
                            <img src="{{ asset('images/project/'.$image->image) }}" alt="{{$project->title}}">
                            <div class="overlay">
                            </div>
                        </div>
                    @endforeach
            @endforeach
                <!--  *****  Card 1 Ends  *****  -->
            </div>
            <!--  *****  Gallery Section Ends  *****  -->

        </div>

    </section>


@endsection


@push('script')
    <!--   *****   JQuery Link   *****   -->

    <!--   *****   Isotope Filter Link   *****  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize Isotope
            let $galleryContainer = $('.gallery').isotope({
                itemSelector: '.item',
                layoutMode: 'fitRows'
            })
            // Filter items on button click
            $('.button-group .button').on('click', function () {
                $('.button-group .button').removeClass('active');
                $(this).addClass('active');

                let value = $(this).attr('data-filter');
                $galleryContainer.isotope({
                    filter: value
                });
            });
        });

    </script>
@endpush
