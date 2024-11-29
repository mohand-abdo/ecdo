@extends('website.layouts.app')

@section('title','Core Values')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css') }}">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            border-radius: 15px;
            /*overflow: hidden;*/
            /*box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);*/
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

        .criteria-section h2 span {
            color: #2ecc71;
        }

        .criteria-section hr {
            width: 50px;
            height: 4px;
            background-color: #2ecc71;
            border: none;
            margin: 10px 0 20px 0;
            animation: slideIn 1.5s ease-out;
        }

        .criteria-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            animation: fadeIn 2s ease-out;
        }

        .icon {
            font-size: 2em;
            color: #2ecc71;
            margin-right: 25px;
            transition: transform 0.3s;
        }

        .criteria-item:hover .icon {
            transform: scale(1.2);
        }

        .criteria-text h3 {
            font-size: 1.3em;
            color: #333;
        }

        .criteria-text p {
            color: #555;
            font-size: 0.95em;
            margin-top: 5px;
        }

        .image-section {
            width: 50%;
            animation: fadeInRight 1.5s ease-out;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0 15px 15px 0;
        }

        /* Animations */
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

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
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

        @media (max-width: 1200px) {
            .image-section img{
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container" style="display: flex;margin-top: 90px;">
        <div class="criteria-section">
            <h2>Core <span>Values</span></h2>
            <hr>
            @if($core_values->count() > 0)
                @foreach($core_values as $core_value)
                    <div class="criteria-item">
                        <i class="fas fa-{{$core_value->icon}} icon"></i>
                        <div class="criteria-text">
                                <h3>{{$core_value->title}}</h3>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="image-section">
            <img src="{{ asset('images/IMG-20241020-WA0202.jpg') }}" alt="Financial Graph">
        </div>
    </div>
@endsection
