
function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

        // Pick a remaining element...
        randomIndex = Math.floor(Math.random() * currentIndex);
        currentIndex -= 1;

        // And swap it with the current element.
        temporaryValue = array[currentIndex];
        array[currentIndex] = array[randomIndex];
        array[randomIndex] = temporaryValue;
    }

    return array;
}

function exibeCapas() {
    var xmlhttp = new XMLHttpRequest();
    var capas = new Array();
    var elemento = document.getElementById("fundoCapas");
    var capaAltura = $(".fundoCapa-container").css("height");
    capaAltura = capaAltura.replace(/px/gi, '');
    capaLargura = $(".fundoCapa-container").css("width");
    capaLargura = capaLargura.replace(/px/gi, '');

    nCol = Math.ceil(window.innerWidth / capaLargura);
    var nLin = Math.ceil(window.innerHeight / capaAltura);
    var qtd = nCol * nLin;

    var matrizCapas = [];
    xmlhttp.onreadystatechange = function () {
        matrizCapas = [];
        capas = JSON.parse(xmlhttp.responseText);
        var i, j, ln = new Array(), k = 0;
        for (i = 0; i < nLin; i++) {
            ln = [];
            for (j = 0; j < nCol; j++) {
                ln.push(k);
                k++;
                if (k >= capas.length) {
                    k = 0;
                }
            }
            ln = shuffle(ln);
            matrizCapas.push(ln);
        }
        var conteudo = "";
        matrizCapas.forEach(function (linha) {
            conteudo += "<div class='fundoCapas-linha'>";
            linha.forEach(function (elem) {
                conteudo += "<div class='fundoCapa-container'>";
                conteudo += "<img class='fundoCapa-img' src='Titulos/Capas/" + capas[elem] + "' />";
                conteudo += "</div>";
            });
            linha.forEach(function (elem) {
                conteudo += "<div class='fundoCapa-container'>";
                conteudo += "<img class='fundoCapa-img' src='Titulos/Capas/" + capas[elem] + "' />";
                conteudo += "</div>";
            });
            conteudo += "</div>";
        });
        elemento.innerHTML = conteudo;
        $(".fundoCapas-linha").css("width", capaLargura * nCol * 2);
    };
    xmlhttp.open("GET", "Acoes/listaCapas.php?qtd=" + qtd, true);
    xmlhttp.send();
    dif = 0;
}

window.onload = function () {
    var lastmousex = -1;
    var lastmousey = -1;
    var mousetravel = 0;

    $('html').mousemove(function (e) {
        var mousex = e.pageX;
        var mousey = e.pageY;
        if (lastmousex > -1)
            mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
        lastmousex = mousex;
        lastmousey = mousey;
    });

    dif = 0;
    var passo = 0.05;
    setInterval(function () {
        mousetravel *= 0.9;
        dif += mousetravel * passo + 0.5;
        var lNum = 0;
        $(".fundoCapas-linha").each(function () {
            if (lNum % 2 === 0) {
                $(this).css("left", dif * -1);
            } else {
                $(this).css("left", (nCol * capaLargura * -1) + dif);
            }
            lNum++;
        });
        if (dif >= nCol * capaLargura) {
            dif = 0;
        }
    }, 1000 / 60);
};

function rotateBkg(elem, act) {
    if (act) {
        $(elem).parent().children(".btn-hover-bkg").addClass("btn-hover-bkg-rotate");
    } else {
        $(elem).parent().children(".btn-hover-bkg").removeClass("btn-hover-bkg-rotate");
    }
}

function ocultarInicio(elemento){
    $(elemento).addClass("inicioOculto");
}

function mostrarInicio(elemento){
    $(elemento).removeClass("inicioOculto");
}
