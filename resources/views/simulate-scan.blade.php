@extends('layouts.app')

@section('content')
<section class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto px-4 py-12">

        <!-- Search Bar -->
        <div class="mb-6">
            <form method="GET" action="{{ route('simulate.scan') }}">
                <div class="flex items-center space-x-4">
                    <input type="text" name="search" value="{{ request()->get('search') }}" class="w-full px-4 py-2 border rounded-md" placeholder="Search by product name, category, or brand...">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Search</button>
                </div>
            </form>
        </div>

        <!-- Loop through filtered products -->
        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                @foreach ($product->etiquetteRFIDs as $rfid)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-lg font-semibold">{{ $product->nom }}</h3>
                        <p class="text-gray-600">Category: {{ $product->categorie ?? 'N/A' }}</p>
                        <p class="text-gray-600">Brand: {{ $product->marque ?? 'N/A' }}</p>
                        <p class="text-gray-600">RFID Code: {{ $rfid->code_rfid }}</p>
                        <p class="text-gray-600">Last Scanned At: 
                            {{ $rfid->last_scanned_at ? $rfid->last_scanned_at : 'Not scanned yet' }}
                        </p>
                        <p class="text-gray-600">Scan Count: {{ $rfid->scan_count }}</p>
                        <button 
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700"
                            onclick="simulateScan({{ $rfid->id }})">Simulate Scan</button>
                    </div>
                @endforeach
            @endforeach
        </div>

        <!-- Hidden form to simulate the scan -->
        <form id="scan-form" action="{{ route('simulate.scan.submit') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="rfid_id" id="rfid_id">
        </form>

        <!-- Display Success or Error Messages -->
        @if(session('success'))
            <div class="mb-4 text-green-600 bg-green-100 p-4 rounded-lg">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="mb-4 text-red-600 bg-red-100 p-4 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <script>
        // Function to handle RFID scan simulation
        function simulateScan(rfidId) {
            // Set the RFID ID to the hidden form field
            document.getElementById('rfid_id').value = rfidId;

            // Submit the form to simulate the scan
            document.getElementById('scan-form').submit();
        }
    </script>
</section>
@endsection