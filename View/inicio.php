<div id="fundoCapas">
    <div class="fundoCapas-linha">
        <div class="fundoCapa-container">
            <img class="fundoCapa-img"/>
        </div>
    </div>
</div>
<div id="fundoCapas-overlay"></div>
<div id="inicio-container">
    <div id="inicio-logo">
        <img src="img/img_logo_branca.png"/>
    </div>
    <div id="inicio-nav">
        <div class="inicio-btn btn-amarelo">
            <div class="btn-hover-bkg"></div>
            <a href="#criar-conta" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#inicio-nav');mostrarInicio('#comecar');">Começar</a>
        </div>
        <div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a href="#login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#inicio-nav');mostrarInicio('#login');">Entrar</a>
        </div>
    </div>
    <div id="comecar" class="inicioOculto">
        <script type="text/javascript">
            function criarConta(){
                    if(validaSenha()){
                        document.getElementById("formCriarConta").submit();
                    } else {
                        window.alert("Senhas não conferem");
                    }
            }
            
            function validaSenha(){
                var senha = document.getElementById("senhaUsuario");
                var confirm = document.getElementById("confirmaSenhaUsuario");
                
                if((senha.value === confirm.value) && senha.value.length>=6){
                    $(senha).removeClass("senhasDiferentes");
                    $(confirm).removeClass("senhasDiferentes");
                    return true;
                } else {
                    $(senha).addClass("senhasDiferentes");
                    $(confirm).addClass("senhasDiferentes");
                    return false;
                }
            }
        </script>
        <form id='formCriarConta' method="post" action="Acoes/criarConta.php">
            <input id="nomeUsuario" name="nomeUsuario" type="text" placeholder="Nome Completo"/>
            <input id="loginUsuario" name="loginUsuario" type="text" placeholder="Nome de Usuário"/>
            <input id="emailUsuario" name="emailUsuario" type="text" placeholder="E-mail"/>
            <input id="senhaUsuario" name="senhaUsuario"type="password" placeholder="Senha"/>
            <input id="confirmaSenhaUsuario" type="password" placeholder="Confirmar Senha" onkeyup="validaSenha()"/>
        </form>
        <div class="inicio-btn btn-amarelo">
            <div class="btn-hover-bkg"></div>
            <a href="#criar-conta" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="criarConta()">Criar Conta</a>
        </div><div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a href="#login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#comecar');mostrarInicio('#login')">Entrar</a>
        </div>
    </div>
    <div id="login" class="inicioOculto">
        <form id="formLogin" method="post" action="Acoes/login.php">
            <input id="loginUsuario" name="loginUsuario" type="text" placeholder="E-mail ou nome de usuário"/>
            <input id="senhaUsuario" name="senhaUsuario" type="password" placeholder="Senha"/>
        </form>
        <div class="inicio-btn btn-amarelo">
            <div class="btn-hover-bkg"></div>
            <a href="#" id="btn-login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="document.getElementById('formLogin').submit()">Entrar</a>
        </div>
        <div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a href="#criar-conta" id="btn-login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#login');mostrarInicio('#comecar');">Criar Conta</a>
        </div>
    </div>
</div>