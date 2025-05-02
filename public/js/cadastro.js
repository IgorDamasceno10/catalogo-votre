// Função para exibir ou ocultar o campo de desconto com base na seleção
function toggleDescontoInput() {
    const temDesconto = document.getElementById('tem_desconto').value;
    const descontoContainer = document.getElementById('desconto-container');
    
    if (temDesconto == '1') {
      descontoContainer.style.display = 'block';
    } else {
      descontoContainer.style.display = 'none';
    }
  }
  
  // Aguarda o carregamento completo da página antes de executar a função
  document.addEventListener('DOMContentLoaded', function() {
    // Chama a função para garantir que o estado inicial do campo de desconto seja correto
    toggleDescontoInput();
  
    // Adiciona o evento de alteração para a seleção do desconto
    document.getElementById('tem_desconto').addEventListener('change', toggleDescontoInput);
  });
  