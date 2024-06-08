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
        
        <h3>Frota e Tecnologia</h3>
        <p>Nossas vans são equipadas com os mais modernos sistemas de segurança e conforto, garantindo uma viagem tranquila para todos os passageiros. Além disso, utilizamos tecnologia avançada de rastreamento e gerenciamento de frota, o que nos permite otimizar rotas, reduzir tempos de espera e oferecer um serviço pontual e confiável.</p>
        
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
            <li><strong>Serviço Executivo:</strong> Para quem busca um serviço premium, oferecemos vans executivas equipadas com Wi-Fi, tomadas USB e outros confortos.</li>
            <li><strong>Transporte Escolar:</strong> Garantimos a segurança e o conforto dos estudantes com rotas planejadas e monitoradas.</li>
            <li><strong>Eventos e Turismo:</strong> Oferecemos serviços de transporte para eventos corporativos, excursões turísticas e outras ocasiões especiais.</li>
        </ul>
        
        <h3>Compromisso com a Comunidade</h3>
        <p>Na Hermes, acreditamos em devolver à comunidade. Por isso, apoiamos diversas iniciativas locais, desde programas de incentivo à educação até projetos de sustentabilidade ambiental. Estamos comprometidos em fazer a diferença não só através do nosso serviço, mas também através do nosso impacto positivo na sociedade.</p>
        
        <h3>Junte-se a Nós</h3>
        <p>Se você procura uma alternativa de transporte público que une conforto, eficiência e segurança, a Hermes é a escolha certa. Junte-se aos milhares de passageiros satisfeitos que já escolheram viajar com a gente. Hermes Transporte Público: Conectando Pessoas, Transformando Cidades.</p>
        <p>Visite nosso site ou baixe nosso aplicativo para saber mais sobre nossos serviços, rotas e horários. Viaje com Hermes e descubra uma nova maneira de se mover pela cidade!</p>
    </main>
</div>
@endsection
