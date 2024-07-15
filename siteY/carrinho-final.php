<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce DTEC 2024</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="novoMenu">

        <!-- INÍCIO DO CONTEÚDO-->
        <div class="container">

            <!-- INÍCIO NAVEGAÇÃO-->
            <div class="navbar2">

                <div class="logo">
                    <img src="assets/img/logo.png" alt="DESPERTARTEC" width="240px">
                </div>

                <!-- INÍCIO MENU NAVEGAÇÃO -->
                <nav>
                    <ul id="MenuItens">
                        <li><a href="index.php" title="">Início</a></li>
                        <li><a href="produtos.php" title="">Produtos</a></li>
                        <li><a href="#" title="">Empresa</a></li>
                        <li><a href="#" title="">Contatos</a></li>
                        <li><a href="minha-conta.php" title="">Minha Conta</a></li>
                    </ul>
                </nav>
                <!-- FIM   MENU NAVEGAÇÃO -->

                <a href="carrinho.php" title="">
                <img src="assets/img/carrinho.png" alt="" width="120px" height="120px">
                </a>
                <img src="assets/img/menu.png" alt="" class="menu-celular" onclick="menucelular()">

            </div>
            <!-- FIM NAVEGAÇÃO-->

        </div>
        <!-- FIM DO CONTEÚDO-->
        <hr>
        <br>
    </div>


    <div class="corpo-categorias carrinho-compras">

<section class="cart-items" id="cart-items">
<span id="cliente-email"></span>
    <h2>Seu Carrinho de Compras</h2>


    <table>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th></th> <!-- Cabeçalho para o botão de remoção -->
            </tr>
        </thead>
        <tbody id="pedido-table-body">
            <!-- Os pedidos serão adicionados aqui -->
        </tbody>
    </table>
    <div class="total-price" id="total-price"></div>
    <button class="checkout-button" onclick="finalizarPedido()">Finalizar Pedido</button>
</section>


    <!-- INÍCIO RODAPÉ-->
    <footer class="rodape">
        <div class="container">
            <div class="linha">

                <div class="rodape-col-1">
                    <h3>Baixe o nosso App</h3>
                    <p>Baixe nosso aplicativo nas melhores plataformas.</p>
                    <div class="app-logo">
                        <img src="assets/img/google.png" alt="">
                        <img src="assets/img/apple.png" alt="">
                    </div>
                </div>

                <div class="rodape-col-2">
                    <img src="assets/img/logo-2.png" alt="">
                    <p>orem Ipsum is simply dummy text of the </p>
                </div>

                <div class="rodape-col-3">
                    <h3>Mais Informações</h3>
                    <ul>
                        <li>Cupons </li>
                        <li>Blog </li>
                        <li>Política de Privacidade</li>
                        <li>Contatos</li>
                    </ul>
                </div>


                <div class="rodape-col-4">
                    <h3>Redes Sociais</h3>
                    <ul>
                        <li>Facebook </li>
                        <li>Instagram </li>
                        <li>Youtube</li>
                        <li>Twiter</li>
                    </ul>
                </div>

            </div>
            <hr>
            <p class="direitos">
                &#169; Todos os Direitos Reservados. DTEC 2024.
            </p>

        </div>

    </footer>
    <!-- FIM RODAPÉ-->


    <script>
       
        // Função para carregar os pedidos do localStorage
        function carregarPedidos() {
            const tableBody = document.getElementById('pedido-table-body');
            const totalPrice = document.getElementById('total-price');
            const clienteEmail = document.getElementById('cliente-email');
            let cliente = localStorage.getItem('cliente_email');
            clienteEmail.textContent = `Olá, ${cliente || 'Visitante'}`;

            let pedidos = JSON.parse(localStorage.getItem('pedidos')) || [];
            let totalPriceValue = 0;

            tableBody.innerHTML = '';

            pedidos.forEach((pedido, index) => {
                totalPriceValue += parseFloat(pedido.preco);
                const row = tableBody.insertRow();
                const cellNome = row.insertCell(0);
                const cellPreco = row.insertCell(1);
                const cellRemover = row.insertCell(2); // Célula para o botão de remoção
                
                cellNome.textContent = pedido.nome;
                cellPreco.textContent = `R$ ${pedido.preco}`;
                
                // Botão de remoção
                const removeButton = document.createElement('button');
                removeButton.textContent = 'Remover';
                removeButton.onclick = () => removerProduto(index); // Chama a função para remover o produto com o índice correspondente
                cellRemover.appendChild(removeButton);
            });

            totalPrice.textContent = `Total: R$ ${totalPriceValue.toFixed(2)}`;
        }

        // Função para remover o produto do carrinho
        function removerProduto(index) {
            let pedidos = JSON.parse(localStorage.getItem('pedidos')) || [];
            pedidos.splice(index, 1); // Remove o produto com o índice especificado
            localStorage.setItem('pedidos', JSON.stringify(pedidos));
            carregarPedidos(); // Recarrega a lista de pedidos
        }

        // Função para finalizar o pedido
// Variável para armazenar temporariamente os pedidos
let carrinhoTemporario = JSON.parse(localStorage.getItem('pedidos')) || [];

// Função para finalizar o pedido
// Função para finalizar o pedido
function finalizarPedido() {
    let cliente_email = localStorage.getItem('cliente_email');
    let pedidos = JSON.parse(localStorage.getItem('pedidos')) || [];

    // Verifica se há pedidos para finalizar
    if (pedidos.length > 0) {
        // Envia os dados do pedido para o arquivo PHP usando fetch API
        fetch('finalizar_pedido.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                cliente_email: cliente_email,
                pedidos: pedidos,
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro ao finalizar pedido.');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Exibe a mensagem de sucesso ou erro
            // Limpa os dados do localStorage
            localStorage.removeItem('cliente_email');
            localStorage.removeItem('pedidos');
            // Exibe uma mensagem de sucesso
            alert('Pedido finalizado com sucesso!');
            // Redireciona para a página 'index.php'
            window.location.href = 'index.php';
        })
        .catch(error => {
            console.error('Erro:', error);
            // Exibe uma mensagem de erro
            alert('Erro ao finalizar pedido. Por favor, tente novamente.');
        });
    } else {
        // Exibe uma mensagem se não houver pedidos para finalizar
        alert('Não há itens no carrinho.');
    }
}



// Chamando a função para carregar os pedidos ao carregar a página
window.onload = carregarPedidos;
</script>

<script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/app.js