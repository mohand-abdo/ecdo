@extends('website.layouts.app')

@section('title','Objective')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css') }}">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
        }


        /* Content Section */
        .content {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            padding: 20px;
            padding-top: 115px;
        }

        /*.content h2 {
            color: #ff5722;
        }

        .content h3 {
            font-weight: normal;
            color: #555;
        }*/
        h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 12px;
        }

        h2 span {
            color: #2ecc71;
        }

        hr{
            width: 50px;
            height: 4px;
            background-color: #2ecc71;
            border: none;
            margin: 10px 0 20px 0;
            animation: slideIn 1.5s ease-out;
        }

        .highlights {
            flex: 1;
        }

        /* Animation for Highlights Box */
        .highlights {
            padding: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f0f0f0;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .highlights ul {
            list-style: none;
            padding: 0;
        }

        .highlights li {
            margin-bottom: 10px;
            color: #333;
            transition: color 0.3s, transform 0.3s;
        }

        .highlights li:hover {
            color: #ff5722; /* Change color on hover */
            transform: scale(1.05); /* Slightly enlarge the item */
        }



        .highlights li::before {
            content: "•";
            color: #ff5722;
            margin-right: 10px;
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
    <!-- Main Content -->
    <div class="container">
        <div class="content">
            <!-- Highlights Section -->
            <div class="highlights">
                <h2>Ecdo <span>Strtegies</span></h2>
                <hr>
                <ul>
                    @if($objectives->count() > 0)
                        @foreach($objectives as $objective)
                            <li>{{$objective->title}}</li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>

@endsection
