
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">My Team</div>

    <div class="card-body">
        <div class="card-list">

            @foreach($players_card_data as $player_card_data)
                <div class="card-list-item">
                    <player-card 
                        card-data="{{ json_encode($player_card_data) }}"
                    ></player-card>
                </div>
            @endforeach

        </div>
    </div>
</div>

@endsection
