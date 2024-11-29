@extends('website.layouts.app')

@section('title','ECDO Strtegy')

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
            animation: fadeIn 2s ease-in;
        }


        .content {
            display: flex;
            margin-top: 145px;
        }

        .image img {
            width: 100%;
            border-radius: 15px;
            max-width: 400px;
            animation: slideIn 1.5s ease-out;
        }

        .text {
            margin-left: 40px;
            max-width: 600px;
        }

        h2 {
            font-size: 2em;
            color: #333;
        }

        h2 span {
            color: #2ecc71  ;
        }

        hr{
            width: 50px;
            height: 4px;
            background-color: #2ecc71;
            border: none;
            margin: 10px 0 20px 0;
            animation: slideIn 1.5s ease-out;
        }

        p {
            margin-top: 10px;
            font-size: 1.1em;
            color: #666;
        }

        ul {
            list-style: none;
            margin-top: 20px;
        }

        ul li {
            margin-bottom: 10px;
            font-size: 1em;
            color: #333;
        }

        ul li strong {
            color: #ff4500;
        }

        ul li .colored-icon {
            color: #ff4500; /* لون البرتقالي للأيقونات */
            margin-right: 8px;
            font-size: 0.9em;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }


    </style>
@endpush

@section('content')
    @if($ecdo_strtegies->count() > 0)
        <div class="container" style="margin-top: 90px">
            <section class="content">
                <div class="image">
                    <img src="{{asset('images/IMG-20241020-WA0202.jpg')}}" alt="Computer Animation">
                </div>
                <div class="text">
                    <h2>Ecdo <span>Strtegies</span></h2>
                    <hr>
                    <ul>
                        @foreach($ecdo_strtegies as $strtegy )
                            <li><i class="fas fa-check colored-icon"></i>{{ $strtegy->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
        </div>
    @endif
@endsection
