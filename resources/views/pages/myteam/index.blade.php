
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">My Team</div>

    <div class="card-body">
        <div class="card-list">

            @foreach($players as $player)
                <div class="card-list-item">
                    <player-card 
                        card-data="{{ json_encode($player) }}"
                    ></player-card>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
