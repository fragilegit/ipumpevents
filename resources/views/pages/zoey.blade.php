@extends('layouts.example')
@section('title', 'Zoë | Pretty Lady')
@section('content')
    <header class="v-header container">
        <div class="fullscreen-video-wrap">
            <img src="https://images.pexels.com/photos/57905/pexels-photo-57905.jpeg?auto=compress&cs=tinysrgb&h=350" autoplay="true" loop="true" muted="true">
        </div>
        {{-- autoplay="" loop="" muted="" --}}
        <div class="header-overlay"></div>
        <div class="header-content">
            <h1>Hi Zoë</h1>
            <p class="lead">Girl, you all mine
                Tryna lock you down, make you full time
                People come and go, I hope you stay for good
                You the sunshine to my morning wood
                (Hah)
                Jokes, I hope you know
                I'd love to see your feet in them open toes
                I'd love to see your back in that backless dress
                I'd love to see that mole when you lookin right
            </p>
            <h3>#PrettyLady #MissUniverse #GoodVibes</h3>
        </div>
    </header>
@endsection