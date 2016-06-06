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
            <a id="btn-comecar" href="#comecar" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#inicio-nav');mostrarInicio('#comecar');">Começar</a>
        </div>
        <div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a id="btn-login" href="#login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#inicio-nav');mostrarInicio('#login');">Entrar</a>
        </div>
    </div>
    <div id="comecar" class="inicioOculto">
        <form id='formCriarConta'>
            <input type="text" placeholder="Nome Completo"/>
            <input type="text" placeholder="Nome de Usuário"/>
            <input type="text" placeholder="E-mail"/>
            <input type="password" placeholder="Senha"/>
            <input type="password" placeholder="Confirmar Senha"/>
        </form>
        <div class="inicio-btn btn-amarelo">
            <div class="btn-hover-bkg"></div>
            <a href="#" id="btn-criar-conta" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="document.getElementById('formCriarConta').submit()">Criar Conta</a>
        </div><div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a href="#" id="btn-criar-conta" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#comecar');mostrarInicio('#login')">Entrar</a>
        </div>
    </div>
    <div id="login" class="inicioOculto">
        <form id="formLogin">
            <input type="text" placeholder="E-mail ou nome de usuário"/>
            <input type="password" placeholder="Senha"/>
        </form>
        <div class="inicio-btn btn-amarelo">
            <div class="btn-hover-bkg"></div>
            <a href="#" id="btn-login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="document.getElementById('formLogin').submit()">Entrar</a>
        </div>
        <div class="inicio-btn btn-cinza">
            <div class="btn-hover-bkg"></div>
            <a href="#" id="btn-login" onmouseover="rotateBkg(this, true)" onmouseout="rotateBkg(this, false)" onclick="ocultarInicio('#login');mostrarInicio('#comecar');">Criar Conta</a>
        </div>
    </div>
</div>