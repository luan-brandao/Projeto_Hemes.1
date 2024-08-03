@extends('layouts.main')
@section('title', 'Projeto Hermes')
@section('content')
<nav class="navbar">
    <a class="navbar-brand" href="/">Projeto Hermes</a>
    <ul class="navbar-nav">
        <li class="nav-item hide-on-mobile">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item hide-on-mobile">
            <a class="nav-link" href="/contatos">Contatos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Cadastro</a>
        </li>
    </ul>
</nav>
<div class="container mt-4">
    <main>
        <h1>Seja bem-vindo</h1>
    
        <h2>Hermes Transporte Público: Conectando Pessoas com Eficiência e Conforto</h2>
        <p>Hermes Transporte Público é uma plataforma inovadora dedicada a transformar a experiência de transporte urbano. Servimos como intermediários para motoristas de vans e seus usuários, conectando-os de maneira eficiente e prática. Nossa missão é oferecer uma alternativa prática e acessível para quem busca um meio de transporte conveniente e ágil na cidade.</p>
    
        <h3>Nossa Missão</h3>
        <p>A missão da Hermes é conectar pessoas, bairros e comunidades com um serviço de transporte que valoriza o tempo e o conforto dos passageiros. Acreditamos que a mobilidade urbana eficiente é essencial para o desenvolvimento sustentável das cidades e para a qualidade de vida dos cidadãos.</p>
    
        <h3>Benefícios de Escolher a Hermes</h3>
        <ul>
            <li><strong>Conforto e Segurança:</strong> As vans cadastradas em nossa plataforma são escolhidas criteriosamente para oferecer o máximo de conforto, com assentos espaçosos e ar-condicionado, além de sistemas de segurança de última geração.</li>
            <li><strong>Eficiência:</strong> Com rotas bem planejadas e tecnologia de ponta, garantimos um serviço rápido e pontual.</li>
            <li><strong>Acessibilidade:</strong> Oferecemos tarifas competitivas e opções de pagamento flexíveis, tornando o transporte acessível para todos.</li>
            <li><strong>Sustentabilidade:</strong> Comprometidos com o meio ambiente, estamos investindo em práticas operacionais sustentáveis para reduzir nossa pegada de carbono.</li>
        </ul>
    
        <h3>Serviços Oferecidos</h3>
        <ul>
            <li><strong>Gerenciamento de Rotas de Vans:</strong> Nosso projeto visa conectar motoristas de vans com usuários, similar ao aplicativo Moovit. Atendemos diversas regiões da cidade, conectando pontos estratégicos de forma rápida e eficiente.</li>
        </ul>
    </main>
    
</div>
@endsection
