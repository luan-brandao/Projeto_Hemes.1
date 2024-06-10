@extends('layouts.main')
@section('title', 'Projeto Hermes')
@section('content')
<nav class="navbar">
    <a class="navbar-brand" href="/">Projeto Hermes</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
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
        <p>Hermes Transporte Público é uma empresa inovadora dedicada a transformar a experiência de transporte urbano. Com uma frota moderna de vans confortáveis e seguras, Hermes se destaca pela eficiência, confiabilidade e compromisso com a satisfação do cliente. Nossa missão é oferecer uma alternativa prática e acessível para quem busca um meio de transporte conveniente e ágil na cidade.</p>
        
        <h3>Nossa Missão</h3>
        <p>A missão da Hermes é conectar pessoas, bairros e comunidades com um serviço de transporte que valoriza o tempo e o conforto dos passageiros. Acreditamos que a mobilidade urbana eficiente é essencial para o desenvolvimento sustentável das cidades e para a qualidade de vida dos cidadãos.</p>
        
        <h3>Benefícios de Escolher a Hermes</h3>
        <ul>
            <li><strong>Conforto e Segurança:</strong> Nossas vans são projetadas para oferecer o máximo de conforto, com assentos espaçosos e ar-condicionado, além de sistemas de segurança de última geração.</li>
            <li><strong>Eficiência:</strong> Com rotas bem planejadas e tecnologia de ponta, garantimos um serviço rápido e pontual.</li>
            <li><strong>Acessibilidade:</strong> Oferecemos tarifas competitivas e opções de pagamento flexíveis, tornando o transporte acessível para todos.</li>
            <li><strong>Sustentabilidade:</strong> Comprometidos com o meio ambiente, estamos investindo em veículos mais eficientes e em práticas operacionais sustentáveis para reduzir nossa pegada de carbono.</li>
        </ul>
        
        <h3>Serviços Oferecidos</h3>
        <ul>
            <li><strong>Transporte Urbano:</strong> Atendemos a diversas regiões da cidade, conectando pontos estratégicos de forma rápida e eficiente.</li>
        </ul>
    </main>
</div>
@endsection
