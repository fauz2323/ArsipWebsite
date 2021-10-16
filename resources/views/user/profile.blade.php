@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
              Profile
            </div>
            <div class="card-body">
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" value="{{ $auth->name }}" placeholder="Example input">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" value="{{ $auth->email }}" placeholder="Another input">
                      </div>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
