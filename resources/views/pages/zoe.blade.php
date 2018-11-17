@extends('layouts.example')
@section('title', 'Zoë | Pretty Lady')
@section('content')
    <header class="v-header">
        <div class="fullscreen-image-wrap">
        </div>
        {{-- autoplay="" loop="" muted="" --}}
        <div class="header-overlay"></div>
        <canvas class="fireworks header-overlay"></canvas>
        
        <div class="header-content text-center hide">
            <h1 class="mb-3 text-white hide"><strong> Hi Zoë </strong></h1>
            <div id="icon-play" class="display-4" style="display: none">
                <i class="fa fa-play-circle fa-5x cyan-text" aria-hidden="true"></i>
            </div>
            <p class="lead display-3" id="birthday">Girl, you all mine
                Tryna lock you down, make you full time
                People come and go, I hope you stay for good
                You the sunshine to my morning wood
                (Hah)
                Jokes, I hope you know
                I'd love to see your feet in them open toes
                I'd love to see your back in that backless dress
                I'd love to see that mole when you lookin right
            </p>
            <br>
            <h3 class=""><b class="text-danger hide-hash">#PrettyLady</b> <b class="hide-hash">#MissUniverse</b> <b class="text-warning hide-hash">#GoodVibes</b>
                <br>
            {{-- <img src="https://s3.us-east-2.amazonaws.com/ipumpevents/music/dancing.gif" alt=""> --}}
        </h3>
        </div>
        {{-- <div id="birthday"></div> --}}
    </header>
    <audio id="audio-control">
        <source src="https://s3.us-east-2.amazonaws.com/ipumpevents/music/Masego_Tadow.mp3" type="audio/mpeg">
        Your broswer does not support the audio element.
    </audio>
@endsection