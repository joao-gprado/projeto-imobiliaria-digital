<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $imovel->titulo }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-base-200">

        <div class="navbar bg-base-100 shadow-lg">
            <div class="flex-1">
                <a class="btn btn-ghost text-xl" href="{{ route('imoveis.index') }}">Imobiliária Digital</a>
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
                <div class="bg-base-100 shadow-xl rounded-lg overflow-hidden">
                    
                    <div class="hero h-96" style="background-image: url({{ Storage::url($imovel->imagem_principal) }});">
                        <div class="hero-overlay bg-opacity-60"></div>
                        <div class="hero-content text-center text-neutral-content">
                            <div class="max-w-md">
                                <h1 class="mb-5 text-5xl font-bold">{{ $imovel->titulo }}</h1>
                                <div class="badge badge-primary badge-lg font-semibold">{{ $imovel->tipo }} - {{ $imovel->categoria }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 md:p-12">
                        <div class="flex flex-col md:flex-row justify-between items-start mb-6">
                            <div>
                                <h2 class="text-2xl font-semibold text-gray-700">{{ $imovel->endereco }}</h2>
                            </div>
                            <div class="text-left md:text-right mt-4 md:mt-0">
                                <p class="text-4xl font-bold text-primary">R$ {{ number_format($imovel->preco, 2, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="stats shadow w-full my-8">
                            <div class="stat">
                                <div class="stat-title">Quartos</div>
                                <div class="stat-value text-secondary">{{ $imovel->quartos }}</div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">Banheiros</div>
                                <div class="stat-value text-secondary">{{ $imovel->banheiros }}</div>
                            </div>
                            <div class="stat">
                                <div class="stat-title">Área</div>
                                <div class="stat-value text-secondary">{{ $imovel->area }} m²</div>
                            </div>
                        </div>

                        <div class="mb-10">
                            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sobre este imóvel</h2>
                            <div class="prose max-w-none text-gray-700 leading-relaxed">
                                {!! nl2br(e($imovel->descricao)) !!}
                            </div>
                        </div>

                        <div>
                            <h2 class="text-3xl font-bold text-gray-800 mb-6">Galeria de Fotos</h2>
                            
                            @if($imovel->galeria_imagens && count($imovel->galeria_imagens) > 0)
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    
                                    @foreach($imovel->galeria_imagens as $foto)
                                        <div class="h-56 rounded-lg overflow-hidden shadow-md cursor-pointer" 
                                             onclick="openImageModal('{{ Storage::url($foto) }}')">
                                            
                                            <img src="{{ Storage::url($foto) }}" alt="Galeria do imóvel" class="w-full h-full object-cover transition-transform hover:scale-110">
                                        </div>
                                    @endforeach
                                    </div>
                            @else
                                <p class="text-gray-600">Nenhuma foto adicional na galeria.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <dialog id="image_modal" class="modal">
            <div class="modal-box w-11/12 max-w-5xl p-0 bg-transparent shadow-none">
                <img id="modal_image_src" src="" alt="Galeria do imóvel em tamanho real" class="w-full h-full object-contain">
            </div>
            <form method="dialog" class="modal-backdrop">
                <button>close</button>
            </form>
        </dialog>
        <script>
            function openImageModal(imageUrl) {
                document.getElementById('modal_image_src').src = imageUrl;
                
                var modal = document.getElementById('image_modal');
                
                modal.showModal();
            }
        </script>
        </body>
</html>