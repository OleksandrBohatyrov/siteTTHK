function tervist(){
    //tekstkast - input type=text
    let name=document.getElementById("nimi");
    let answer=document.getElementById("vastus");
    answer.innerHTML="Tere päevast, "+ name.value;
}
function radioValik() {
    let answer2 = document.getElementById("vastus2");
    let dzass = document.getElementById("dzass");
    let dnb = document.getElementById("dnb");
    let hiphop = document.getElementById("hiphop");
    let lofi = document.getElementById("lofi");
    let hardstyle = document.getElementById("hardstyle");
    let beatbox = document.getElementById("beatbox");

    var style = null;
    if(dzass.checked){
        style=dzass.value;
        answer2.style.color="green";
    }
    else if(dnb.checked){
        style=dnb.value;
        answer2.style.color="red";
    }
    else if(hiphop.checked){
        style=hiphop.value;
        answer2.style.color="pink";
    }
    else if(lofi.checked){
        style=lofi.value;
        answer2.style.color="black";
    }
    else if(hardstyle.checked){
        style=hardstyle.value;
        answer2.style.color="yellow";
    }
    else if(beatbox.checked){
        style=beatbox.value;
        answer2.style.color="brown";
    }
    else{
        style="palun vali endale rühm";
    }
    answer2.innerHTML="Sulle meeldib, " + style;
}
function selectOptionValik(){
    let answer3=document.getElementById("vastus3");
    let music=document.getElementById("music");
    let tekst="Teie valik on ";
    if (music.selectedIndex!==0) {
        tekst+=music.value;
    }
    else {
        answer3.innerHTML="Palun valige väärtus"
    }
    answer3.innerHTML=tekst
}
function radiovalik2(){
    let answer4 = document.getElementById("vastus4");
    let jah = document.getElementById("jah");
    let ei = document.getElementById("ei");

    var ryhm = null;
    if (jah.checked){
        answer4.innerHTML="Ei kuula" ;
        answer4.style.color="red";

    }
    else if(ei.checked){
        answer4.innerHTML="Kuulan" ;
        answer4.style.color="green";

    }
    else {
        answer4.innerHTML="Palun valige väärtus"
    }

}

function selectOptionValik2(){
    let answer5=document.getElementById("vastus5");
    let elu=document.getElementById("elu");
    let tekst="Sinu linn on ";
    let distance=document.getElementById("distance")
    let color=document.getElementById("color")
    if (elu.selectedIndex!==0) {
        tekst+=elu.value;
    }
    else {
        answer5.innerHTML="Palun vali elukoht"
    }
    tekst+=elu.value + "Distanss on "+ distance.value +" km"
    answer5.innerHTML=tekst;
    answer5.style.color=color.value;
}

function odinnull() {
    let answer6 = document.getElementById("vastus6");
    let distance = document.getElementById("points2")


    if (distance.value === "1") {
        answer6.innerHTML = "Ei kuula";
        answer6.style.color="red";
    }
    else if  (distance.value === "2 "){
        answer6.innerHTML = "Harva";
        answer6.style.color="yellow";
    }
    else {
        answer6.innerHTML = "Kuulan";
        answer6.style.color="green";
    }

}

function tervist02(){
    let message=document.getElementById("message");
    let answer02=document.getElementById("vastus02");
    answer02.innerHTML="Sa kirjutasid, "+ message.value;
}

function tervist03(){
    let kontsert=document.getElementById("kontsert");
    let answer03=document.getElementById("vastus03");
    answer03.innerHTML="Sa kirjutasid, "+ kontsert.value;
}

function tervist04(){
    let musik=document.getElementById("musik");
    let answer04=document.getElementById("vastus04");
    answer04.innerHTML="Sa kirjutasid, "+ musik.value;
}

function checkboxValik(){
    let answer8=document.getElementById("vastus8")
    let beatles=document.getElementById("beatles")
    let Micheal=document.getElementById("Micheal")
    let Madonna=document.getElementById("Madonna")
    let BobMarley=document.getElementById("BobMarley")
    let cent=document.getElementById("cent")

    var kes="";
    if(beatles.checked){
        kes+=beatles.value+", ";
    }
    if(Micheal.checked){
        kes+=Micheal.value+", ";
    }
    if(Madonna.checked){
        kes+=Madonna.value+", ";
    }
    if(BobMarley.checked){
        kes+=BobMarley.value+", ";
    }
    if(cent.checked){
        kes+=cent.value+", ";
    }
    answer8.innerHTML="Sellised esinejad nagu: "+kes;
}

function checkboxValik2(){
    let answer10=document.getElementById("vastus10")
    let kitarr=document.getElementById("kitarr")
    let klaver=document.getElementById("klaver")
    let viiul=document.getElementById("viiul")
    let trummid=document.getElementById("trummid")
    let muu=document.getElementById("muu")

    var kes2="";
    if(kitarr.checked){
        kes2+=kitarr.value+", ";
    }
    if(klaver.checked){
        kes2+=klaver.value+", ";
    }
    if(viiul.checked){
        kes2+=viiul.value+", ";
    }
    if(trummid.checked){
        kes2+=trummid.value+", ";
    }
    if(muu.checked){
        kes2+=muu.value+", ";
    }
    answer10.innerHTML="Selliste instrumentide puhul nagu:: "+kes2;
}
/*function koikkokku(){
    let nimi = document.getElementById("nimi");
    let dzass = document.getElementById("dzass");
    let dnb = document.getElementById("dnb");
    let hiphop = document.getElementById("hiphop");
    let lofi = document.getElementById("lofi");
    let hardstyle = document.getElementById("hardstyle");
    let beatbox = document.getElementById("beatbox");
    let music = document.getElementById("music");
    let jah = document.getElementById("jah");
    let ei = document.getElementById("ei");
    let points2 = document.getElementById("points2");
    let message = document.getElementById("message");
    let beatles = document.getElementById("beatles");
    let Micheal = document.getElementById("Micheal");
    let Madonna = document.getElementById("Madonna");
    let BobMarley = document.getElementById("BobMarley");
    let cent = document.getElementById("cent");
    let kitarr = document.getElementById("kitarr");
    let klaver = document.getElementById("klaver");
    let viiul = document.getElementById("viiul");
    let trummid = document.getElementById("trummid");
    let muu = document.getElementById("muu");
    let kontsert = document.getElementById("kontsert");
    let musik = document.getElementById("musik");
    let answer11 = document.getElementById("vastus11");

    let tere = "Tere päevast, " + nimi.value;

    let ryhm = "";
    if(dzass.checked){
        style = dzass.value;
        answer11.style.color = "green";
    }
    else if(dnb.checked){
        style = dnb.value;
    }
    else if(hiphop.checked){
        style = hiphop.value;
    }
    else if(lofi.checked){
        style = lofi.value;
    }
    else if(hardstyle.checked){
        style = hardstyle.value;
    }
    else if(beatbox.checked){
        style = beatbox.value;
    }
    else{
        ryhm = "palun vali endale rühm";
    }

    let grupp = "Sa oled, " + ryhm;

    let sport = "";
    if(ujumine.checked){
        sport += ujumine.value + ", ";
    }
    if(jousaal.checked){
        sport += jousaal.value + ", ";
    }
    if(kasipall.checked){
        sport += kasipall.value + ", ";
    }
    if(vorkpall.checked){
        sport += vorkpall.value + ", ";
    }
    if(korvpall.checked){
        sport += korvpall.value + ", ";
    }
    let sporti = "Sinu spordialad on: " + sport;

    answer4.innerHTML = "<br>"+ tere + "<br>" + grupp + "<br>" + sporti;
}*/

function koikkokku(){
    let answer = document.getElementById("koikkokku");
    let n = document.getElementById("vastus");
    let v = document.getElementById("vastus2");
    let e = document.getElementById("vastus3");
    let c = document.getElementById("vastus4");
    let m = document.getElementById("vastus6");
    let r = document.getElementById("vastus02");
    let q = document.getElementById("vastus8");
    let w = document.getElementById("vastus10");
    let t = document.getElementById("vastus9");
    let y = document.getElementById("vastus04");

    answer.innerHTML = "Info: "+"<br>"+n.innerHTML+"<br>"+v.innerHTML+"<br>"+e.innerHTML+"<br>"+c.innerHTML+"<br>"+m.innerHTML+"<br>"+r.innerHTML+"<br>"+q.innerHTML+"<br>"+w.innerHTML+"<br>"+t.innerHTML+"<br>"+y.innerHTML;
}



