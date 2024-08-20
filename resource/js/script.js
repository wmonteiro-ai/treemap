document.addEventListener('DOMContentLoaded', () => {
    const frames = document.querySelectorAll(".frame");
    frames.forEach(frame => {
        const largura = (frame.getAttribute('data-largura')/100) * 600;
        const variacao = frame.getAttribute('data-variacao') * (15/100 * 255) ; // taxa RGB vai de 0 ao 255;

        // Define a largura do elemento
        frame.style.setProperty('--largura-elemento', `${largura}px`);

        // Calcula a variação de cor e aplica ao elemento
        calcularVariacao(frame, variacao);
    });

    function calcularVariacao(frame, variacao) {
        // Intensidade de cores de verde ou vermelho.
        if (variacao > 0) {
            frame.style.setProperty('--green-rate', `${variacao}`);
            frame.style.setProperty('--red-rate', `${0}`);
        } else if (variacao < 0) {
            frame.style.setProperty('--red-rate', `${variacao * (-1)}`);
            frame.style.setProperty('--green-rate', `${0}`);
        }
    }
});