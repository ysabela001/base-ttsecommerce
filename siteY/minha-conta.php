
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

<!-- INÍCIO MINHA CONTA-->    

<div class="minha-conta">

    <div class="container">
        <div class="linha">

            <div class="col-2">
                <img src="assets/img/banner-1.png" alt="" width="70%">
            </div>

            <div class="col-2">
                <div class="formulario">
                    <div class="btn-form">
                        <span onclick="Entrar()">Entrar</span>
                        <span onclick="Cadastro()">Cadastro</span>
                        <hr id="Indicador">
                    </div>

                    <form action="login.php" method="post" id="EntrarPainel">
                    <input type="email" name="email" id="email" placeholder="E-mail de Acesso">
                    <input type="password" name="senha" id="" placeholder="Digite sua senha">
                    <button type="submit" name="senEntrar" class="btn"> Entrar </button>
                    <a href="" title="">Esqueceu sua senha?</a>
                    </form>


                    <form action="cadastro.php" method="post" id="CadastroSite">
                        <input type="text" name="nome" id="" placeholder="Nome Completo">
                        <input type="email" name="email" id="" placeholder="E-mail de Acesso">
                        <input type="password" name="senha" id="" placeholder="Digite sua senha">
                        <button type="submit" name="sendCad" class="btn"> Cadastre-se </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>


<!-- FIM MINHA CONTA-->    



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

<!-- Adicione o script no final do arquivo -->
<script>
    // Função para salvar o email do cliente na memória
    function salvarEmailCliente() {
        // Seleciona o campo de email pelo ID
        let emailInput = document.getElementById('email');

        // Obtém o valor inserido no campo de email
        let email = emailInput.value;

        // Salva o email no localStorage
        localStorage.setItem('cliente_email', email);
    }

    // Chama a função salvarEmailCliente quando o botão de Entrar é clicado
    document.getElementById('EntrarPainel').addEventListener('submit', salvarEmailCliente);
</script>


    <script>

        // Função para finalizar o pedido
        function finalizarPedido() {
            let pedidos = carrinhoTemporario;
            let cliente = localStorage.getItem('cliente_login'); // Recupera o login do cliente armazenado

            // Verifica se há login do cliente e pedidos para finalizar
            if (cliente && pedidos.length > 0) {
                // Restante do código para finalizar o pedido
                // Aqui você pode enviar os dados do cliente juntamente com os dados do carrinho
            } else {
                // Caso não haja login do cliente ou pedidos, exiba uma mensagem de erro
                alert('Por favor, faça login e adicione itens ao carrinho antes de finalizar o pedido.');
            }
        }

    </script>

    <script>
        function redirecionarParaCarrinho() {
    // Verifica se há dados no carrinho temporário
    if (carrinhoTemporario.length > 0) {
        // Constrói a URL com os dados do carrinho
        let dadosCarrinhoURL = '?pedidos=' + encodeURIComponent(JSON.stringify(carrinhoTemporario));
        // Redireciona para a página "carrinho-final.php" com os dados do carrinho na URL
        window.location.href = 'carrinho-final.php' + dadosCarrinhoURL;
    } else {
        // Caso não haja itens no carrinho temporário, você pode redirecionar sem dados
        window.location.href = 'carrinho-final.php';
    }
}
    </script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/login.js"> </script>
</body>
    
</html>