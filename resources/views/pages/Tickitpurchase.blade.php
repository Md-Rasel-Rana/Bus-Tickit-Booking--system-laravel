<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap') }}" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-white m-auto" style="width: 800px">
<!-- Example in a Blade template -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<form action="{{ route('trips.purchasesell') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="Bus_name" class="form-label">Trip Bus Name:</label>
        <input type="text" class="form-control bg-white" id="Bus_name" name="Bus_name" required>
        
    </div>
    <div class="mb-3">
        @foreach ($userid as $user)
        <input type="hidden" class="form-control bg-white" value="{{$user->id}}" id="user_id" name="user_id">
       
    </div>
  
      @endforeach
      @foreach ($Triplocations as $location)
    <div class="mb-3">
        <input type="hidden" class="form-control bg-white" value="{{ $location->from_location_id }}" id="from_location" name="from_location">
    </div>
    <div class="mb-3">
        <input type="hidden" class="form-control bg-white" value="{{ $location->id }}" id="trip_id" name="trip_id">
    </div>
    
    <div class="mb-3">
        <input type="hidden" class="form-control bg-white" value="{{ $location->to_location_id }}" id="to_location" name="to_location">
    </div>
    @endforeach
    <div class="mb-3">
        <label for="selected_seat" class="form-label">Select Seat:</label>
        <select class="form-select bg-white" id="selected_seat" name="seat_number">
            <option value="0"> Number of seat </option>
            <option value="1"> 1</option>
            <option value="2">2</option>
            <option value="3"> 3</option>
            <option value="4"> 4</option>
            <option value="5"> 5</option>
            <option value="6"> 6</option>
            <option value="7"> 7</option>
            <!-- Add other available seats -->
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Purchase Ticket</button>
</form>

        <!-- JavaScript Libraries -->
        <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/chart/chart.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
        <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    
        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
    
    </html>