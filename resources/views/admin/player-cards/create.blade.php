@extends('admin.layouts.app')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create Player</h1>
</div>

<div class="row mb-2">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">Player Details</div>
      <div class="card-body">

        <form method="post" action="{{ url('/admin/players/store') }}">
          @csrf

          <div class="row">
            <div class="col-md-6 form-group">
              <label>Custom ID <small>(Non HLTV related ID)</small></label>
              <input type="text" class="form-control" name="id" required>
            </div>
          </div>

          <h5>Player Information</h5>

          <div class="row">
            {{-- Name --}}
            <div class="col-md-6 form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" required>
            </div>

            {{-- Type --}}
            <div class="col-md-6 form-group">
              <label>Type</label>
              <div class="input-group">
                <select class="custom-select" name="type">
                  @foreach($card_types as $type)
                    <option value="normal">{{ $type }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            {{-- Age --}}
            <div class="col-md-6 form-group">
              <label>Age</label>
              <input type="number" class="form-control" name="age" required>
            </div>

            {{-- Team --}}
            <div class="col-md-6 form-group">
              <label>Team</label>
              <input type="text" class="form-control" name="team">
            </div>
          </div>

          <div class="row">
            {{-- Nationality --}}
            <div class="col-md-6 form-group">
              <label>Nationality</label>
              <input type="text" class="form-control" name="nationality" required>
            </div>
          </div>

          <hr>

          <h5>Player Stats</h5>

          <div class="row">
            {{-- Rating --}}
            <div class="col-md-6 form-group">
              <label>Rating</label>
              <input type="text" class="form-control" name="rating" required>
            </div>

            {{-- Headshots --}}
            <div class="col-md-6 form-group">
              <label>Headshots</label>
              <input type="text" class="form-control" name="headshots" required>
            </div>
          </div>

          <div class="row">
            {{-- Kill Death ratio --}}
            <div class="col-md-6 form-group">
              <label>Kill/Death Ratio</label>
              <input type="text" class="form-control" name="kd_ratio" required>
            </div>

            {{-- KPR --}}
            <div class="col-md-6 form-group">
              <label>Kills Per Round</label>
              <input type="text" class="form-control" name="kpr" required>
            </div>
          </div>

          <div class="row">
            {{-- Damage Per Round --}}
            <div class="col-md-6 form-group">
              <label>Damage Per Round</label>
              <input type="text" class="form-control" name="dpr" required>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Create Player</button>
        </form>

      </div>
    </div>
  </div>
</div>

@endsection