# Imobiliária Digital (Projeto)

Este projeto é um site de uma imobiliária digital, desenvolvido com Laravel, Blade, Tailwind CSS e DaisyUI, pensado para oferecer uma experiência prática tanto para administradores quanto para visitantes. Ele permite cadastrar imóveis, listar anúncios em um catálogo, visualizar detalhes de cada imóvel (com galeria "lightbox") e fazer upload de imagens de forma intuitiva.

# Funcionalidades Principais
  * Painel de Admin: Sistema de autenticação (Login e Registro) com área de admin protegida.

  * Cadastro de Imóveis (CRUD): Formulário completo para criar novos imóveis, incluindo campos de texto, números, enum (tipo, categoria) e uploads.
  
  * Upload de Múltiplas Imagens: Suporte para upload de uma "Imagem Principal" (capa) e uma "Galeria de Imagens" (múltiplos arquivos).
  
  * Catálogo de Anúncios: Página inicial pública estilizada com DaisyUI que lista todos os imóveis cadastrados em formato de "cards" de e-commerce.

  * Página de Detalhes: Página individual para cada imóvel, mostrando todas as informações, descrição e a galeria de fotos com um modal "lightbox" (clique para ampliar).

## Como Executar o Projeto

Siga os passos abaixo para configurar e executar o ambiente de desenvolvimento:

**1. Clonar o repositório**
Clone o projeto no seu computador e entre na pasta do projeto.

```bash
git clone https://github.com/joao-gprado/projeto-imobiliaria-digital.git
cd projeto-imobiliaria-digital
```

**2. Instalar dependências**
Instale as dependências do PHP com `composer install` e do Node com `npm install`.

**3. Configurar o ambiente**
Copie o arquivo `.env.example` para `.env` e configure as informações do banco de dados. Depois, gere a chave da aplicação com:

```bash
php artisan key:generate
```

**4. Rodar as migrations**
Execute `php artisan migrate` para criar as tabelas do banco de dados.

**5. Criar o Link de Armazenamento**
Execute `php artisan storage:link` para criar um link de armazenamento, permitindo que as imagens que você faz upload fiquem visíveis no site.

**6. Executar o projeto**
Abra dois terminais:

  * No Terminal 1, rode o Vite (ele vai compilar o CSS/JS e ficar "assistindo" as mudanças):
    `npm run dev`
  * No Terminal 2, rode o servidor do Laravel:
    `php artisan serve`

O site ficará disponível em `http://localhost:8000` e já estará funcional, permitindo cadastrar, listar e visualizar imóveis.

O banco de dados começa sem usuários. Você precisa criar sua conta de administrador.

Acesse a rota de registro: `http://127.0.0.1:8000/register`

Crie sua conta.

Você será redirecionado para o Dashboard (/dashboard).

A partir daí, você pode usar o link "Cadastrar Imóvel" para começar a popular o site.

## Tecnologias Usadas:

### Backend:

  * PHP
  * Laravel

### Frontend:

  * Blade
  * Tailwind CSS
  * DaisyUI
  * Laravel Breeze
  * JavaScript

### Banco de Dados:

  * MySQL

### Tooling:

  * Node.js (Vite), Composer
