<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light"> <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Imobiliária</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-base-200"> <div class="navbar bg-base-100 shadow-lg">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl" href="/">Imobiliária Digital</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}">Painel Admin</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>

        <main class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <h2 class="text-3xl font-bold mb-8 text-center">Nossos Imóveis em Destaque</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @forelse ($imoveis as $imovel)
                        <div class="card w-full bg-base-100 shadow-xl transition-transform hover:scale-105">
                            <figure class="h-56">
                                <img src="{{ Storage::url($imovel->imagem_principal) }}" alt="{{ $imovel->titulo }}" class="w-full h-full object-cover" />
                            </figure>
                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <h2 class="card-title text-xl font-bold">{{ $imovel->titulo }}</h2>
                                    <div class="badge badge-primary font-semibold">{{ $imovel->tipo }}</div>
                                </div>
                                <p class="text-gray-600 text-sm mt-1">{{ $imovel->endereco }}</p>
                                
                                <p class="text-3xl font-bold text-primary my-3">
                                    R$ {{ number_format($imovel->preco, 2, ',', '.') }}
                                </p>

                                <div class="flex justify-around text-gray-700 border-t pt-4">
                                    <span class="text-sm flex items-center gap-1">
                                        <strong>{{ $imovel->quartos }}</strong> Quartos
                                    </span>
                                    <span class="text-sm flex items-center gap-1">
                                        <strong>{{ $imovel->banheiros }}</strong> Banheiros
                                    </span>
                                    <span class="text-sm flex items-center gap-1">
                                        <strong>{{ $imovel->area }}</strong> m²
                                    </span>
                                </div>
                                
                                <div class="card-actions justify-end mt-4">
                                    <a href="{{ route('imoveis.show', $imovel->id) }}" class="btn btn-primary">
                                        Ver Detalhes
                                    </a>
                                </div>
                            </div>
                        </div>
                    
                    @empty
                        <p class="text-gray-700 col-span-3 text-center">Nenhum imóvel cadastrado no momento.</p>
                    @endforelse
                    </div>
            </div>
        </main>

        <footer class="footer p-10 bg-base-300 text-base-content mt-12">
        </footer>
    </body>
</html>