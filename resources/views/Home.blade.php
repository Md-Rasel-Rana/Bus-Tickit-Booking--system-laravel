@extends('layout.app')

@section('contents')

<div class="container mt-4 text-white" style="width: 800px">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>Create Trip</h1>
    <form action="{{route('trips.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="trip_date">Trip Date:</label>
            <input class="bg-white" style="width: 772px" type="date" class="form-control" id="trip_date" name="trip_date" required>
        </div>

        <div class="form-group">
            <label for="from_location">From:</label>
            <select class="form-control" id="from_location" name="from_location" required>
                <option value="Dhaka">Dhaka</option>
                <option value="Comilla">Comilla</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Cox's Bazaar">Cox's Bazaar</option>
                <!-- Add other locations -->
            </select>
        </div>

        <div class="form-group">
            <label for="to_location">To:</label>
            <select class="form-control" id="to_location" name="to_location" required>
                <option value="Cox's Bazaar">Cox's Bazaar</option>
                <option value="Chittagong">Chittagong</option>
                <option value="Comilla">Comilla</option>
                <option value="Dhaka">Dhaka</option>
               
                <!-- Add other locations -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Trip</button>
    </form>
</div>





@endsection
