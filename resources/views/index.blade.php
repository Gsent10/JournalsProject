@extends('layouts.frontend')

@section('content')

    <div id="fh5co-services-section" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-justify animate-box">
                    <div class="services" style="height: 400px;">
                        <div class="icon text-center">
                            <span><i class="icon-clipboard"></i></span>
                        </div>
                        <h3 class="text-center">VISION/MISSION THRUST</h3>
                        <p >To be a top-class intellectual resource holding, collaboratively and uniquely driving the generation and dissemination of research-based knowledge and allied ideals on a sustainable basis.</p>
                    </div>
                </div>
                <div class="col-md-4 text-justify animate-box">
                    <div class="services" style="height: 400px;">
                        <div class="icon text-center">
                            <span><i class="icon-file-pdf"></i></span>
                        </div>
                        <h3 class="text-center">CORE JOURNALS</h3>
                        <ul style="font-size: medium;">
                            <li>Journal of Finance, Accounting & Management Discovery (JOFAMD)
                                <br> ISSN 2714-2566
                            </li>
                            <li>Journal of Finance, Governance & Strategic Studies (JOFIGSS)
                                <br> ISSN 2714-2574
                            </li>
                            <li>Journal of Art, Business & Civic Advancement (JABCA)
                                <br> ISSN 2714-2558
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 text-justify animate-box">
                    <div class="services" style="height: 400px;">
                        <div class="icon text-center">
                            <span><i class="icon-user-tie"></i></span>
                        </div>
                        <h3 class="text-center">CHIEF EDITORS</h3>
                        <ul style="font-size: medium;">
                            <li>JOFAMD: Professor S.K. Msheliza
                                <br> University of Maiduguri, Borno State, Nigeria
                            </li>
                            <li>JOFIGSS: Professor W. Ugwuanyi 
                                <br> Enugu State University of Science & Technology, Enugu, Nigeria
                            </li>
                            <li>JABCA: Professor U.H.D. Danfulani, 
                                <br> University of Jos, Plateau State, Nigeria.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row services" style="margin-top: 50px;">
                <div class="col-md-6 col-md-offset-3 text-center animate-box">
                    <div class="heading-section">
                        <h2>More Information</h2>
                        <ul class="text-justify">
                            <li>
                                <p>
                                    <strong>STEERING BASE:</strong> 
                                    <br>Department of Banking and Finance Office Complex
                                    <br>Faculty of Humanities, Management and Social Sciences
                                    <br>Federal University Wukari, Taraba State, Nigeria

                                </p>
                            </li>
                            <li>
                                <p>
                                    <strong>EDITOR – RALLY & STRATEGY:</strong> 
                                    <br>Professor P.U.C. Agundu 
                                    <br>Department of Banking and Finance Office Complex
                                    <br>Faculty of Humanities, Management and Social Sciences
                                    <br>Federal University Wukari, Taraba State, Nigeria

                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-md-offset-3 text-center animate-box view-button" style="padding-bottom: 30px; padding-top: 0px;">
                    <a href="#" class="btn btn-primary btn-outline btn-lg">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <div id="fh5co-work-section" style="padding-bottom: 25px; margin-top: 50px;">
        <div class="container">
            <div class="row" style="padding-bottom: 0px; margin-bottom: 20px;">
                <div class="col-md-6 col-md-offset-3 text-center animate-box">
                    <div class="heading-section" style="padding-bottom: 0px; margin-bottom: 0px;">
                        <h2 style="padding-bottom: 0px; margin-bottom: 0px;">OUR LATEST ISSUES</h2>
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

    <div style="padding-bottom: 50px; padding-top: 20px;">
        <p class="text-center view-button animate-box">
            <a href="/journals" class="btn btn-primary btn-outline btn-lg">See All Journals</a>
        </p>
    </div>


@endsection