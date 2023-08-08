function carregarConteudo(opcao) {
    if (opcao === 'clientes') {
      fetch('../Cliente/listaCliente.php')
        .then(response => response.json())
        .then(clientes => {
          const conteudoDiv = document.getElementById('conteudo');
          conteudoDiv.innerHTML = ''; // Limpar o conteúdo existente
          
          const table = document.createElement('table');
          table.className = 'table table-bordered';
          table.style.width = '100%';
  
          // Cabeçalho da tabela
          const thead = document.createElement('thead');
          const headerRow = document.createElement('tr');
          const headers = ['ID', 'Nome', 'Senha', 'Telefone', 'Endereço', 'CPF', 'Email'];
          headers.forEach(headerText => {
            const th = document.createElement('th');
            th.textContent = headerText;
            headerRow.appendChild(th);
          });
          thead.appendChild(headerRow);
          table.appendChild(thead);
  
          // Corpo da tabela
          const tbody = document.createElement('tbody');
          clientes.forEach(cliente => {
            const row = document.createElement('tr');
            Object.values(cliente).forEach(value => {
              const cell = document.createElement('td');
              cell.textContent = value;
              row.appendChild(cell);
            });
            tbody.appendChild(row);
          });
          table.appendChild(tbody);
  
          conteudoDiv.appendChild(table);
        })
        .catch(error => console.error('Erro ao buscar clientes:', error));
    }
  }
  