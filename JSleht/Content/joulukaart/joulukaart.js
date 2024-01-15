

function pen(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="saddlebrown";

    k.fillRect(125, 120, 50, 40);
}

function joon() {
    let k = document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.lineWidth = "5";
    k.strokeStyle = "green";

    k.moveTo(10, 120); // alguspunkt
    k.lineTo(145, 10); // kesk-punkt
    k.lineTo(150, 120);
    k.lineTo(10, 120); // lõpp-punkt
    k.fillStyle = "green"
    k.fill(); // taust
}
function joon2(){
    let j=document.getElementById("kanva").getContext("2d");

    j.beginPath();
    j.lineWidth="5";
    j.strokeStyle="green";

    j.moveTo(290,120); // alguspunkt
    j.lineTo(145,10); // kesk-punkt
    j.lineTo(150,120);
    j.lineTo(10,120); // lõpp-punkt
    j.fillStyle="green"
    j.fill(); // taust
}

function elka() {
    pen();
    joon();
    joon2();
}
function ring(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(100, 75, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="red";
    k.fill();
}

function ring2(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(190, 75, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="blue";
    k.fill();
}

function ring3(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(235, 105, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="red";
    k.fill();
}
function ring4(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(60, 105, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="blue";
    k.fill();
}
function ring5(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(147, 100, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="aqua";
    k.fill();
}
function ring6(){
    let k=document.getElementById("kanva").getContext("2d");

    k.beginPath();
    k.arc(147, 50, 8, 0, 2 * Math.PI, true); // x,y alguspunkt radius
    k.stroke();
    k.fillStyle="aqua";
    k.fill();
}
function girlanda() {
    ring();
    ring2();
    ring3();
    ring4();
    ring5();
    ring6();
}
function taht()
{
    let k=document.getElementById("kanva").getContext("2d");


    k.beginPath();
    k.lineWidth="5";


    k.moveTo(146.5, 30.75 - 30.75);
    k.lineTo(151, 40 - 30.75);
    k.lineTo(171.5, 40.5 - 30.75);
    k.lineTo(154.5, 46 - 30.75);
    k.lineTo(161.5, 54.75 - 30.75);
    k.lineTo(145.5, 50.25 - 30.75);
    k.lineTo(128, 56 - 30.75);
    k.lineTo(134, 46.25 - 30.75);
    k.lineTo(116.5, 40.25 - 30.75);
    k.lineTo(138, 39.75 - 30.75);





    k.fillStyle="yellow";
    k.fill();
}
function podarok(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="red";

    k.fillRect(70, 130, 50, 20);
    lenta()
    lenta2()
}
function lenta(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="blue";

    k.fillRect(93, 130, 5, 20);
}
function lenta2(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="blue";

    k.fillRect(70, 138, 50, 3);
}

function podarok2(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="orange";

    k.fillRect(180, 130, 50, 20);
    lenta3()
    lenta4()
}
function lenta3(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="red";

    k.fillRect(203, 130, 5, 20);
}
function lenta4(){
    let k=document.getElementById("kanva").getContext("2d");

    k.fillStyle="red";

    k.fillRect(180, 138, 50, 3);
}
function kokku() {
    pen();
    joon();
    joon2();
    ring();
    ring2();
    ring3();
    ring4();
    ring5();
    ring6();
    podarok();
    podarok2();
    taht();
}
