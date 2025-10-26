<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Imovel;
use Illuminate\Support\Str;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imoveis = Imovel::all();
        return view('welcome', [
            'imoveis' => $imoveis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('imoveis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'quartos' => 'required|integer|min:0',
            'banheiros' => 'required|integer|min:0',
            'endereco' => 'required|string',
            'area' => 'required|integer|min:0',
            'tipo' => 'required|in:Venda,Aluguel',
            'categoria' => 'required|in:Casa,Apartamento,Terreno,Chácara',
            'imagem_principal' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'galeria_imagens.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $caminhoImagemPrincipal = null;
        $caminhosGaleria = [];

        if ($request->hasFile('imagem_principal')) {
            $imagem = $request->file('imagem_principal');
            $nomeArquivo = 'imovel_' . time() . '_' . Str::slug($request->titulo) . '.' . $imagem->getClientOriginalExtension();
            $caminhoImagemPrincipal = $imagem->storeAs('imoveis', $nomeArquivo, 'public');
        }

        if ($request->hasFile('galeria_imagens')) {
            foreach ($request->file('galeria_imagens') as $index => $foto) {

                $nomeFoto = 'galeria_' . time() . '_' . $index . '_' . Str::slug($request->titulo) . '.' . $foto->getClientOriginalExtension();
                $caminhoFoto = $foto->storeAs('imoveis/galeria', $nomeFoto, 'public');
                $caminhosGaleria[] = $caminhoFoto;
            }
        }

        Imovel::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'quartos' => $request->quartos,
            'banheiros' => $request->banheiros,
            'endereco' => $request->endereco,
            'area' => $request->area,
            'status' => $request->status,
            'tipo' => $request->tipo,
            'categoria' => $request->categoria,
            'imagem_principal' => $caminhoImagemPrincipal,
            'galeria_imagens' => $caminhosGaleria
        ]);

        return redirect()->route('dashboard')->with('success', 'Imóvel cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imovel = Imovel::findOrFail($id);

        return view('imoveis.show', [
            'imovel' => $imovel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
