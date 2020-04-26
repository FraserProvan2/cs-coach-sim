@extends('admin.layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{ $player->name }}</h1>
</div>

<div class="row mb-2">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">Player Details</div>
      <div class="card-body">

        <form method="post" action="{{ url('/admin/players/' . $player->id .'/update') }}">
          @csrf

          <h5>Player Information</h5>

          <div class="row">
            {{-- Name --}}
            <div class="col-md-6 form-group">
              <label>Name</label>
              <input type="text" class="form-control" value="{{ $player->name }}" name="name" required>
            </div>

            {{-- Type --}}
            <div class="col-md-6 form-group">
              <label>Type</label>
              <div class="input-group">
                <select class="custom-select" name="type">
                  @foreach($card_types as $type)
                    <option value="normal" {{ ($player->type === $type ? 'selected' : '') }}>{{ $type }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            {{-- Age --}}
            <div class="col-md-6 form-group">
              <label>Age</label>
              <input type="number" class="form-control" value="{{ $player->age }}" name="age" required>
            </div>

            {{-- Team --}}
            <div class="col-md-6 form-group">
              <label>Team</label>
              <input type="text" class="form-control" value="{{ $player->team }}" name="team">
            </div>
          </div>

          <div class="row">
            {{-- Nationality --}}
            <div class="col-md-6 form-group">
              <label>Nationality</label>
              <input type="text" class="form-control" value="{{ $player->nationality }}" name="nationality" required>
            </div>
          </div>

          <hr>

          <h5>Player Stats</h5>

          <div class="row">
            {{-- Rating --}}
            <div class="col-md-6 form-group">
              <label>Rating</label>
              <input type="text" class="form-control" value="{{ $player->rating }}" name="rating" required>
            </div>

            {{-- Headshots --}}
            <div class="col-md-6 form-group">
              <label>Headshots</label>
              <input type="text" class="form-control" value="{{ $player->headshots }}" name="headshots" required>
            </div>
          </div>

          <div class="row">
            {{-- Kill Death ratio --}}
            <div class="col-md-6 form-group">
              <label>Kill/Death Ratio</label>
              <input type="text" class="form-control" value="{{ $player->kd_ratio }}" name="kd_ratio" required>
            </div>

            {{-- KPR --}}
            <div class="col-md-6 form-group">
              <label>Kills Per Round</label>
              <input type="text" class="form-control" value="{{ $player->kpr }}" name="kpr" required>
            </div>
          </div>

          <div class="row">
            {{-- Damage Per Round --}}
            <div class="col-md-6 form-group">
              <label>Damage Per Round</label>
              <input type="text" class="form-control" value="{{ $player->dpr }}" name="dpr" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Update Player</button>
        </form>

      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-header">Player Image</div>
      <div class="card-body">

        <form method="post" action="{{ url('/admin/players/' . $player->id .'/update-image') }}"  enctype="multipart/form-data">
          @csrf

          <img src="{{ asset('storage/images/players/' . $player->id . '.png') }}">

          <div class="input-group mt-3">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="file" name="playerImage">
              <label class="custom-file-label">Select new image</label>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <button type="submit" class="btn btn-primary mt-2">Update Image</button>
            </div>
          </div>

        </form>
    
      </div>
    </div>
  </div>
</div>

@endsection