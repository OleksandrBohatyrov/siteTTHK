var x=20, y=20, r=10;
var ysamm=1, xsamm=0, ykiirendus=0.4, kiiruskoef=0.1;  var t, g; //tahvel, graafiline kontekst

function algus2(){
    t=document.getElementById("tahvel2");
    g=t.getContext("2d");
    setInterval('liigu2()', 100);
}

function joonista2(){
    g.clearRect(0, 0, t.width, t.height);
    g.strokeStyle="red";
    g.beginPath()
    g.arc(x, y, r, 0, 2*Math.PI, true);
    g.stroke()



}

function liigu2(){
    ysamm=ysamm+ykiirendus;
    if(kasSees(x+xsamm, y+ysamm)){
        x=x+xsamm;
        y=y+ysamm;
    } else {
        xsamm=0; ysamm=0;
    }
    joonista2();
}
function kasSees(uusX, uusY){
    if(uusX-r<0){return false;}
    if(uusX+r>t.width){return false;}
    if(uusY-r<0){return false;}
    if(uusY+r>t.height){return false;}
    return true;
}
function hiirAlla(e){
    var tahvlikoht=t.getBoundingClientRect();
    var hx=e.clientX-tahvlikoht.left;
    var hy=e.clientY-tahvlikoht.top;
    xsamm=(hx-x)*kiiruskoef;
    ysamm=(hy-y)*kiiruskoef;
}