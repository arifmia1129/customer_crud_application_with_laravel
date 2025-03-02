@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h3>Customers</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-2">
                    <a href={{ route('customers.index') }} class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-backward"></i> Back</a>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('customers.index') }}" method="GET">
                        <div class="input-group mb-3">
                            
                            <input name="searchBy" type="text" class="form-control" placeholder="Search anything..." aria-describedby="button-addon2" value="{{ request()->searchBy }}">

                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">

                   <form action="{{ route('customers.index') }}" method="get" class="order-by">
                    <div class="input-group mb-3">
                        <select class="form-select" name="orderBy" id="order-by" onchange="$('.order-by').submit()">
                            <option @selected(request()->orderBy  === 'desc') value="desc">Newest to Oldest</option>
                            <option @selected(request()->orderBy === 'asc') value="asc">Oldest to Newest</option>
                        </select>
                    </div>
                   </form>
                </div>
               
                </div>
                  
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="border: 1px solid #dddddd">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Email</th>
                        <th scope="col">BAN</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($customers as $customer)
                      <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $customer->first_name}}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->bank_account_number }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-edit"></i></a>
                            <a href="{{ route('customers.show', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a>
                            <a href="javascript:;" onclick="if(confirm('Are you want to delete this customer?')) $('.form-{{ $customer->id }}').submit()" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>

                            <form class="form-{{ $customer->id }}" action="{{ route('customers.destroy',$customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection