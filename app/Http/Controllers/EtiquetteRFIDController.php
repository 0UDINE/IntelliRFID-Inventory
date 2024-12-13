<?php

namespace App\Http\Controllers;

use App\Models\EtiquetteRFID;
use App\Models\Produit;
use Illuminate\Http\Request;

class EtiquetteRFIDController extends Controller
{
    public function showForm()
    {
        // Get all products with their associated RFID tags
        $products = Produit::with('etiquetteRFIDs')->get();

        return view('simulate-scan', compact('products'));
    }

    public function simulateScan(Request $request)
    {
        // Find the RFID tag by its ID (received from the clicked card)
        $rfidTag = EtiquetteRFID::find($request->rfid_id);

        if (!$rfidTag) {
            return redirect()->route('simulate.scan')->with('error', 'RFID tag not found');
        }

        // Simulate the scan
        $rfidTag->update([
            'last_scanned_at' => now(),
            'scan_count' => $rfidTag->scan_count + 1,
        ]);

        return redirect()->route('simulate.scan')->with('success', 'RFID scan simulated successfully');
    }
}

