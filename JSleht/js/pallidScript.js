var x = 20, y = 20, kiirus = 10, samm = kiirus, smdown = kiirus;

function joonista() {
    var t = document.getElementById("tahvel");
    var g = t.getContext("2d");
    g.clearRect(0, 0, t.width, t.height);
    g.beginPath();
    g.arc(x, y, 20, 0, 2 * Math.PI);
    g.fillStyle = "red";
    g.fill();
}

function liigu() {
    x = x + samm;
    joonista();
}

function liifudown() {
    y = y + samm;
    joonista();
}

function liifup() {
    y = y - samm;
    joonista();
}

function vasakule() {
    liigu();
    samm = -kiirus;
}

function seis() {
    samm = 0;
}

function paremale() {
    liigu();
    samm = kiirus;
}

function alla() {
    smdown = kiirus;
    liifudown();
}

function ylesale() {
    smdown = -kiirus;
    liifup();
}

function changeColor() {
    var t = document.getElementById("tahvel");
    var g = t.getContext("2d");
    g.fillStyle = getRandomColor();
    g.fill();
}

function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}