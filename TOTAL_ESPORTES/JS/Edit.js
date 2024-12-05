

// função para que ao clicar em edit o texto se torne um input na página: "painelDeProdutos.php"

    function EditText(button){

        const tr = button.closest('tr');
        const td = tr.querySelector("td:nth-child(2)");
        const p = td.querySelector('.edit_text');

        if (button.innerText === "Editar"){

            const input = document.createElement('input');
            input.value = p.innerText;

            td.replaceChild(input, p);

            button.innerText = "Salvar";

        } else{ //caso o conteudo do botão não seja "editar".
            const novop = document.createElement('p');
            novop.classList.add('edit_text');
            novop.innerText = td.querySelector('input').value

            td.replaceChild(novop, td.querySelector('input'));

            button.innerText = "Editar"
            location.reload();

            const categoria = novop.innerText;

            if(tr.classList.contains('subcategoria')){ //caso seja uma subcategoria
                fetch('Conexao/salvarEdit.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `subcategoria=${encodeURIComponent(categoria)}&id_subcategoria=${encodeURIComponent(tr.querySelector('td').innerText)}`
                })
                .then(response => {
                    return response.text(); // Lê a resposta como texto
                })
                .then(data => {
                    console.log(data); // Exibe a resposta para depuração
                    try {
                        const parsedData = JSON.parse(data); // Tenta converter em JSON
                        if (parsedData.success) {
                            console.log("Texto salvo com sucesso!");
                        } else {
                            console.error("Erro ao salvar texto:", parsedData.message);
                        }
                    } catch (error) {
                        console.error("Erro ao parsear o JSON:", error);
                        console.log("Resposta do servidor:", data);
                    }
                })
                .catch(error => console.error('Erro de rede:', error));                
            }
            //update na categoria
            fetch('Conexao/salvarEdit.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `categoria=${encodeURIComponent(categoria)}&id_categoria=${encodeURIComponent(tr.querySelector('td').innerText)}`
            })
            .then(response => {
                return response.text(); // Lê a resposta como texto
            })
            .then(data => {
                console.log(data); // Exibe a resposta para depuração
                try {
                    const parsedData = JSON.parse(data); // Tenta converter em JSON
                    if (parsedData.success) {
                        console.log("Texto salvo com sucesso!");
                    } else {
                        console.error("Erro ao salvar texto:", parsedData.message);
                    }
                } catch (error) {
                    console.error("Erro ao parsear o JSON:", error);
                    console.log("Resposta do servidor:", data);
                }
            })
            .catch(error => console.error('Erro de rede:', error));
        }
         
    }
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click',function(){
            EditText(this);
        })
    });