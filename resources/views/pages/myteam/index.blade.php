
@extends('layouts.app')

@section('content')

<div class="col-md-9">
    <div class="card">
        <div class="card-header">My Team</div>

        <div class="card-body">
            <inventory
                inventory-data="{{ $inventory }}"
            ></inventory>
        </div>
    </div>
</div>

@endsection
