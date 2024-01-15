function kustuta() {
    let k = document.getElementById("kanva").getContext("2d");

    k.clearRect(0, 0, 400, 300);

}
function kustuta2() {
    let k = document.getElementById("kanva2").getContext("2d");

    k.clearRect(0, 0, 500, 400);

}

function joon() {
    let k = document.getElementById("kanva").getContext("2d");
    k.beginPath();
    k.lineWidth = "5";
    k.strokeStyle = "red";

    k.moveTo(50, 100); //alguspunkt
    k.lineTo(100, 50) //keskpunkt
    k.lineTo(150, 100);
    k.lineTo(50, 100); //lõppu=keskpunkt
    k.stroke(); // joon
    k.fillStyle = "green";
    k.fill();


}

function ristkylik() {
    let k = document.getElementById("kanva").getContext("2d");
    let l = document.getElementById("laius").value;
    let kor = document.getElementById("korgus").value;

    //ristkülik
    k.fillStyle = "lightblue";
    k.fillRect(50, 50, l, kor); // x, y, laius, kõrgus
}

function ring() {
    let k = document.getElementById("kanva").getContext("2d");
    k.beginPath();
    k.arc(100, 75, 50, 0, 2 * Math.PI); //x,y -alguspunkt, R
    k.stroke();
    k.fillStyle = "red";
    k.fill();

}


function drawFace(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.arc(200,200,60,0,2*Math.PI);
  
    k.stroke();
    };
    
function drawLeftEye(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.arc(172,200,15,0,2*Math.PI);
    k.stroke();

    k.beginPath();
    k.arc(172,200,7,0,2*Math.PI);
    k.stroke();
};

function drawRightEye(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.arc(228,200,15,0,2*Math.PI);
    k.stroke();

    k.beginPath();
    k.arc(228,200,7,0,2*Math.PI);
    k.stroke();

};
    
function drawLeftEar(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.moveTo(180, 143);  
    k.bezierCurveTo(150,50,120,80,140,190);
    k.stroke();
    
        
    k.beginPath();
    k.moveTo(168, 150);  
    k.bezierCurveTo(150,100,140,80,150,166);
    k.stroke();
    k.fillStyle="white"
    k.fill();

};

function drawRightEar(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.moveTo(257, 180);  
    k.bezierCurveTo(270,50,220,80,210,140);
    k.stroke();
        
    k.beginPath();
    k.moveTo(245, 160);  
    k.bezierCurveTo(250,70,240,100,220,143);
    k.stroke();
    k.fillStyle="white"
    k.fill();
};
    
function drawNose(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.arc(200,217,9,0, 2*Math.PI);
    k.fillStyle="grey";
    k.fill();
    k.stroke();
};

function drawMouth(){
    let k = document.getElementById("kanva2").getContext("2d");
    k.beginPath();
    k.arc(200,235,19,0, Math.PI);
    k.lineTo(219, 235);
    k.stroke();
    
    k.beginPath();
    k.moveTo(215, 247);
    k.bezierCurveTo(215, 240,180,240, 185, 247); 
    k.stroke();

};

function drawBody() {
    let k = document.getElementById("kanva2").getContext("2d");

    k.beginPath();
    k.moveTo(200, 260); 
    k.lineTo(200, 330);
    k.stroke();
}

function drawLegs() {
    let k = document.getElementById("kanva2").getContext("2d");

 
    k.beginPath();
    k.moveTo(200, 330); 
    k.lineTo(180, 370); 
    k.fill()
    k.lineWidth = "5";
    k.stroke();

    k.beginPath();
    k.moveTo(200, 330); 
    k.lineTo(220, 370);
    k.stroke();
}
function drawLeftArm() {
    let k = document.getElementById("kanva2").getContext("2d");

    k.beginPath();
    k.moveTo(200, 260); 
    k.lineTo(180, 270); 
    k.stroke();
}

function drawRightArm() {
    let k = document.getElementById("kanva2").getContext("2d");

    k.beginPath();
    k.moveTo(200, 260); 
    k.lineTo(220, 270); 
    k.stroke();
}
    
function drawall() {
    kustuta2();
    let k = document.getElementById("kanva2").getContext("2d");

    drawFace();
    drawLeftEye();
    drawRightEye();
    drawLeftEar();
    drawRightEar();
    drawNose();
    drawMouth();
    drawBody();
    drawLegs();
    drawLeftArm();
    drawRightArm();

};

