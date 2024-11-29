@extends('website.layouts.app')

@section('title','Humanitarian Strtegy')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        section{
            margin-top: 160px;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px;
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .icon {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        h2 {
            color: #333;
            font-size: 1.2em;
            margin: 10px 0;
        }

        p {
            color: #666;
            font-size: 0.9em;
            line-height: 1.6;
        }

        .criteria-section {
            padding: 40px;
            width: 50%;
            /*background-color: #f8f8f8;*/
            animation: fadeInLeft 1.5s ease-out;
        }

        .criteria-section h2 {
            font-size: 2em;
            color: #333;
        }

        .criteria-section span {
            /*font-size: 2em;*/
            color: #2ecc71;
        }

        .criteria-section hr {
            width: 50px;
            height: 4px;
            background-color: #2ecc71;
            border: none;
            margin: 10px 0 20px 80px;
            animation: slideIn 1.5s ease-out;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideIn {
            from {
                width: 0;
            }
            to {
                width: 50px;
            }
        }

    </style>
@endpush

@section('content')
    <section>
        <div class="container">
            <div class="criteria-section">
                <h2>Humanitarian <span>Strtegies</span></h2>
                    <hr>
            </div>
                <div class="cards">
                @forelse($humanitarian_strtegies as $humanitarian_strtegy)
                    <div class="card">
                        <i class="fa-solid fa-{{$humanitarian_strtegy->icon}} fa-3x" style="color: #2ecc71"></i>
                        <p>{{ $humanitarian_strtegy->title }}</p>
                    </div>
                @empty
                    <section class="interior-hero">
                        <div class="container ">
                            <div class="interior-hero__content no-image">
                                <div class="interior-hero__backdrop no-image" role="presentation">
                                    <div class="interior-hero__pattern" role="presentation"></div>
                                </div>
                                <h1 class="interior-hero__heading">
                                    Humanitarian Strtegies Not Found
                                </h1>
                            </div>
                        </div>
                    </section>

                    <section class="body-text ">
                        <div class="container">

                            <div class="body-text__content">
                                <a class="button button--primary" style="background:#2ecc71;color: #fff" href="/" target=""><span>Return to Homepage</span></a>
                            </div>
                        </div>
                    </section>
                @endforelse
            </div>
            </div>
    </section>
@endsection
