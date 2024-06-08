document.addEventListener('DOMContentLoaded', function() {
    const menuLateral = document.querySelector('.menu-lateral');
    const triggerButton = document.querySelector('.trigger-button');
    const RemovMenu = document.querySelector('.logo');
    const profileCircle = document.querySelector('.profile-circle');
    const logoutButton = document.querySelector('.user-profile form'); // Selecionando o formulário de logout

    menuLateral.classList.add('escondido');
    triggerButton.addEventListener('click', function() {
        if (menuLateral.classList.contains('expandido')) {
            menuLateral.classList.remove('expandido');
            menuLateral.classList.add('escondido');
        } else {
            menuLateral.classList.remove('escondido');
            menuLateral.classList.add('expandido');
            triggerButton.classList.remove('removido');
        }
    });
    RemovMenu.addEventListener('click', function() {
        if (menuLateral.classList.contains('expandido')) {
            menuLateral.classList.remove('expandido');
            menuLateral.classList.add('escondido');
        } else {
            triggerButton.classList.add('adicionado');
            menuLateral.classList.remove('escondido');
            menuLateral.classList.add('expandido');
        }
    });

    // Oculta o botão de logout inicialmente
    logoutButton.style.display = 'none';

    // Adiciona um evento de clique ao perfil do usuário
    profileCircle.addEventListener('click', function(event) {
        // Impede o evento de clicar no perfil de se propagar para outros elementos
        event.stopPropagation();
        
        // Verifica se o botão de logout está visível
        if (logoutButton.style.display === 'block') {
            // Se estiver visível, oculta o botão de logout
            logoutButton.style.display = 'none';
        } else {
            // Se estiver oculto, mostra o botão de logout
            logoutButton.style.display = 'block';
        }
    });

    // Adiciona um evento de clique ao documento para ocultar o botão de logout se clicar em qualquer outro lugar da página
    document.addEventListener('click', function() {
        // Oculta o botão de logout
        logoutButton.style.display = 'none';
    });

    function alterarRota(rota) {
        // Remove classes de rota existentes
        document.body.classList.remove('rota1', 'rota2');
        
        // Adiciona a nova classe de rota
        document.body.classList.add(rota);
    }
});
