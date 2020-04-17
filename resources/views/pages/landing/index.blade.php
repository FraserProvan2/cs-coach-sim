@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-body text-center">
                  <h2>CS Coach Sim</h2>
                  <p>Consider signing up? blah...</p>

                  <a class="btn btn-lg btn-primary" href="{{ route('login') }}">Login</a>
                  <a class="btn btn-lg btn-secondary" href="{{ route('register') }}">Sign Up</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
