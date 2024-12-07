<?php

namespace App\Http\Controllers;

use App\Exports\StockReportExport;
use App\Models\Modification;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produit;

class RapportController extends Controller
{

        /**
     * Génère un rapport de stock au format CSV.
     */
    public function exportStockReport()
    {
        return Excel::download(new StockReportExport, 'rapport_stock.csv');
    }

            /**
     * Génère un rapport de stock au format PDF.
     */

     public function exportPDF()
    {
        // Retrieve the product data
        $produits = Produit::select('nom', 'categorie', 'marque', 'quantite_stock', 'prix')->get();

        // Load the Blade view with data
        $pdf = Pdf::loadView('stock_report', compact('produits'));

        // Return the generated PDF for download
        return $pdf->download('rapport_de_stock.pdf');
    }
    
    /**
     * Générer le rapport PDF des modifications
     */
    public function generateModifReport()
    {
        // Récupérer toutes les modifications
        $modifications = Modification::with('produit:id,nom')
            ->get(['action', 'produit_id', 'changes', 'created_at']);
        
        // Passer les données à la vue pour générer le PDF
        $pdf = Pdf::loadView('modifications_report', compact('modifications'));

        // Retourner le PDF au navigateur pour le téléchargement
        return $pdf->download('modifications_report.pdf');
    }
    
}
