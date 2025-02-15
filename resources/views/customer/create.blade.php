@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    
    <div class="col-md-8">
        <h3>Customers</h3>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @endif
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href={{ route('customers.index') }} class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                    </div>

                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input name="image" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input name="first_name" type="text" class="form-control" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input name="last_name" type="text" class="form-control" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>
    
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">Bank Account Number</label>
                                <input name="bank_account_number" type="text" class="form-control" value="{{ old('bank_account_number') }}">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="">About</label>
                                <textarea name="about" class="form-control">{{ old('about') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Create</button>
                        </div>
    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection