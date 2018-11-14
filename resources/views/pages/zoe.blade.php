@extends('layouts.example')
@section('title', 'Zoë | Pretty Lady')
@section('content')
    <header class="v-header">
        <div class="fullscreen-image-wrap">
        </div>
        {{-- autoplay="" loop="" muted="" --}}
        <div class="header-overlay"></div>
        <div class="header-content text-center hide">
            <h1 class="mb-3 text-white hide"><strong> Hi Zoë </strong></h1>
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
            <h3><b class="text-danger">#PrettyLady</b> <b>#MissUniverse</b> <b class="text-warning">#GoodVibes</b></h3>
        </div>
        {{-- <div id="birthday"></div> --}}
    </header>
@endsection