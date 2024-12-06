<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Display a listing of the products
    public function index()
    {
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('produits.create');
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'quantite_stock' => 'required|integer',
            'seuil_alerte' => 'required|integer',
            'prix' => 'required|integer',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Product created successfully.');
    }

    // Display the specified product
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    // Show the form for editing the specified product
    public function edit(Produit $produit)
    {
        return view('produits.edit', compact('produit'));
    }

    // Update the specified product in storage
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'marque' => 'required|string|max:255',
            'quantite_stock' => 'required|integer',
            'seuil_alerte' => 'required|integer',
            'prix' => 'required|integer',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage
    public function destroy($id)
    {
        // Trouver le produit
        $produit = Produit::findOrFail($id);
        // Supprimer le produit
        $produit->delete();
        // Redirection avec un message de succès
        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
    
}
