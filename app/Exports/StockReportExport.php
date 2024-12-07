<?php

namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StockReportExport implements FromCollection, WithHeadings
{
    /**
     * Récupère les données des produits.
     */
    public function collection()
    {
        // Sélectionnez les colonnes souhaitées
        return Produit::select('nom', 'categorie', 'marque', 'quantite_stock', 'prix')->get();
    }

    /**
     * Ajoute les en-têtes au fichier CSV.
     */
    public function headings(): array
    {
        return ['Nom', 'Catégorie', 'Marque', 'Quantité en Stock', 'Prix'];
    }
    

}
