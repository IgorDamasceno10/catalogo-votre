document.addEventListener("DOMContentLoaded", () => {
    const desktopSlides = document.querySelectorAll('.desktop-banner');
    const mobileSlides = document.querySelectorAll('.mobile-banner');
    const dots = document.querySelectorAll('.banner-dots .dot');
    let currentSlide = 0;

    // Função para exibir o slide correto, baseado no dispositivo
    function showSlide(index) {
        // Se for tela de desktop (largura > 768px)
        if (window.innerWidth > 768) {
            desktopSlides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none'; // Exibe o slide correto
            });
            mobileSlides.forEach((slide) => {
                slide.style.display = 'none'; // Esconde os slides mobile
            });
        } else { // Se for tela de dispositivo móvel (largura <= 768px)
            mobileSlides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none'; // Exibe o slide correto
            });
            desktopSlides.forEach((slide) => {
                slide.style.display = 'none'; // Esconde os slides desktop
            });
        }

        // Atualiza a classe 'active' nas bolinhas de navegação
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    // Inicializa o carrossel exibindo o primeiro slide, dependendo do dispositivo
    showSlide(currentSlide);

    // Troca automática de slides a cada 4 segundos
    setInterval(() => {
        // Seleciona o conjunto de slides correto com base no dispositivo
        const slidesToUse = (window.innerWidth > 768) ? desktopSlides : mobileSlides;
        currentSlide = (currentSlide === slidesToUse.length - 1) ? 0 : currentSlide + 1;
        showSlide(currentSlide);
    }, 4000);

    // Funcionalidade para navegação através das bolinhas
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Ajusta a exibição de slides se o tamanho da tela for alterado (redimensionamento)
    window.addEventListener('resize', () => {
        showSlide(currentSlide); // Atualiza o slide visível de acordo com a nova largura
    });
});
