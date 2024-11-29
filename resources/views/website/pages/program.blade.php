@extends('website.layouts.app')

@section('title','Programs')

@push('style')
    <style>
        /* إعدادات عامة */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            gap: 40px;
        }

        .program {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .program:first-of-type {
            margin-bottom: 20px;
            margin-top: 120px;
        }

        .program:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .program img {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        
        @media (max-width: 430px) {
            .program img {
                display : none;
            }
        }

        .content {
            max-width: 600px;
        }

        .title {
            font-size: 24px;
            color: #2ecc71;
            margin-bottom: 10px;
        }

        .description {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .learn-more {
            display: inline-block;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .learn-more:hover {
            background-color: #c0392b;
        }
    </style>
@endpush

@section('content')
    @if($programs->count() > 0)
        @foreach($programs as $program)
            <div class="container">
                <div class="program">
                    <img src="{{ asset('images/program/'. $program->image) }}" alt="Rubrix Program">
                    <div class="content">
                        <h2 class="title">{{ $program->title }}</h2>
                        <p class="description">{!! $program->body !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
