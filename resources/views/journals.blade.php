@extends('layouts.frontend')

@section('content')

    <div id="fh5co-work-section" style="padding-bottom: 25px; margin-top: 50px;">
        <div class="container">
            <div class="row" style="padding-bottom: 0px; margin-bottom: 20px;">
                <div class="col-md-6 col-md-offset-3 text-center animate-box">
                    <div class="heading-section" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <h2 style="padding-bottom: 0px; margin-bottom: 0px;">OUR JOURNALS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($journals as $journal)
                    <div class="col-md-12 text-justify animate-box" style="padding-top: 0px; margin-top: 0px;">
                        <div class="services" style="margin-top: 20px;">
                            <h3 class="text-center">{{ $journal->name }}</h3>
                            <p> <strong>Volume:</strong> {{ $journal->volume }} &nbsp;&nbsp;&nbsp;&nbsp; <strong>Number:</strong> {{ $journal->number }}</p>
                            <p> <strong>Keywords:</strong> {{ $journal->keywords }}</p>
                            <p><strong>Abstract:</strong> {{ $journal->abstract }}</p>
                            <p class="animate-box">
                                <a href="{{ asset('documents/' . $journal->doc_path) }}" class="btn btn-primary btn-outline">Download</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection