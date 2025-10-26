<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Novo Imóvel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('imoveis.store') }}" enctype="multipart/form-data">
                        @csrf <div>
                            <x-input-label for="titulo" :value="__('Título do Anúncio')" />
                            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="descricao" :value="__('Descrição Completa')" />
                            <textarea id="descricao" name="descricao" rows="5" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('descricao') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="endereco" :value="__('Endereço')" />
                            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                            <div>
                                <x-input-label for="preco" :value="__('Preço (R$)')" />
                                <x-text-input id="preco" class="block mt-1 w-full" type="number" step="0.01" name="preco" :value="old('preco')" required />
                            </div>

                            <div>
                                <x-input-label for="tipo" :value="__('Tipo (Venda/Aluguel)')" />
                                <select name="tipo" id="tipo" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Venda" @selected(old('tipo') == 'Venda')>Venda</option>
                                    <option value="Aluguel" @selected(old('tipo') == 'Aluguel')>Aluguel</option>
                                </select>
                            </div>

                            <div>
                                <x-input-label for="categoria" :value="__('Categoria')" />
                                <select name="categoria" id="categoria" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="Casa" @selected(old('categoria') == 'Casa')>Casa</option>
                                    <option value="Apartamento" @selected(old('categoria') == 'Apartamento')>Apartamento</option>
                                    <option value="Terreno" @selected(old('categoria') == 'Terreno')>Terreno</option>
                                    <option value="Chácara" @selected(old('categoria') == 'Chácara')>Chácara</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <x-input-label for="quartos" :value="__('Quartos')" />
                                <x-text-input id="quartos" class="block mt-1 w-full" type="number" name="quartos" :value="old('quartos', 0)" required />
                            </div>
                            <div>
                                <x-input-label for="banheiros" :value="__('Banheiros')" />
                                <x-text-input id="banheiros" class="block mt-1 w-full" type="number" name="banheiros" :value="old('banheiros', 0)" required />
                            </div>
                            <div>
                                <x-input-label for="area" :value="__('Área (m²)')" />
                                <x-text-input id="area" class="block mt-1 w-full" type="number" name="area" :value="old('area')" required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="imagem_principal" :value="__('Imagem Principal (a foto da capa)')" />
                            <x-text-input id="imagem_principal" class="block mt-1 w-full" type="file" name="imagem_principal" accept="image/*" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="galeria_imagens" :value="__('Galeria de Imagens (selecione várias)')" />
                            <x-text-input id="galeria_imagens" class="block mt-1 w-full" type="file" name="galeria_imagens[]" multiple accept="image/*" />
                        </div>


                        <div class="flex items-center justify-end mt-6">
                            <x-primary-button class="ms-4">
                                {{ __('Salvar Imóvel') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>