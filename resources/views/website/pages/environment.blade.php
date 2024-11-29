@extends('website.layouts.app')

@section('title','Environment')

@push('style')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-6.6.0-web/fontawesome-free-6.6.0-web/css/all.css') }}">
    <style>/* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            padding: 20px;
        }

        .framework {
            text-align: center;
            max-width: 1200px;
            width: 100%;
            margin-top: 50px;
            padding-top: 50px;
        }

        .framework h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        .framework h2 span {
            color: #2ecc71;
        }

        .phase-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Basic Card Style */
        .phase {
            color: #fff;
            padding: 20px;
            width: 250px;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: scale(0.9);
            animation: fadeInZoom 0.8s forwards ease-in-out;
            animation-delay: var(--delay);
        }

        .phase-number {
            color: #fff;
            font-size: 1.5em;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 50%;
            position: absolute;
            top: -20px;
            left: -20px;
            background-color: #ff5722;
        }

        .phase h3 {
            margin-top: 40px;
            font-size: 1.2em;
            font-weight: bold;
            color: #FFFFFF;
        }

        .phase p {
            margin: 10px 0;
            line-height: 1.6;
            color: #FFFFFF
        }

        .phase span {
            display: block;
            margin-top: 20px;
            font-size: 0.9em;
            color: #ccc;
        }

        /* Animation */
        @keyframes fadeInZoom {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Colors matching the image */
        #phase1 { --delay: 0s; background-color: #1e1e1e; }
        #phase2 { --delay: 0.2s; background-color: #666666; }
        #phase3 { --delay: 0.4s; background-color: #1e1e1e; }
        #phase4 { --delay: 0.6s; background-color: #666666; }

        /* Different styles for each card */
        #phase1 .phase-number { background-color: #ff5722; }
        #phase2 .phase-number { background-color: #ff5722; }
        #phase3 .phase-number { background-color: #ff5722; }
        #phase4 .phase-number { background-color: #ff5722; }

        #phase1 {
            border-left: 5px solid #2ecc71;
        }

        #phase2 {
            border-top: 5px solid #2ecc71;
        }

        #phase3 {
            border-right: 5px solid #2ecc71;
        }

        #phase4 {
            border-bottom: 5px solid #2ecc71;
        }

        hr{
            text-align: center;
            width: 50px;
            height: 4px;
            background-color: #2ecc71;
            border: none;
            margin: 10px 0 20px 0;
            margin-left: auto;
            margin-right: auto;
            border: none;
            margin-top: 5px;
            animation: slideIn 1.5s ease-out;
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
    <section class="framework">
        <h2>Environment <span>EHS</span></h2>
        <hr>

        @if($environments->count() > 0)
            <div class="phase-container">
                @foreach($environments as $index => $environment)
                    @php
                        $remainder = $index  % 4;
                        switch ($remainder) {
                            case 0:
                                $counter = 4;
                                break;
                            case 1:
                                $counter = 1;
                                break;
                            case 2:
                                $counter = 2;
                                break;
                            case 3:
                                $counter = 3;
                                break;
                        }
                    @endphp
                    <div class="phase" id="phase{{ $counter }}">
                        <p>{{ $environment->title }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
