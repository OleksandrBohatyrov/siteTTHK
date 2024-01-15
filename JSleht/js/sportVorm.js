function tervist(){
    //tekstkast - input type=text
    let name=document.getElementById("nimi");
    let answer=document.getElementById("vastus");

    answer.innerHTML="Tere päevast, "+ name.value;
}

function radioValik(){
    let answer2=document.getElementById("vastus2");
    let tarpv21=document.getElementById("tarpv21");
    let tarpv22=document.getElementById("tarpv22");
    let tarpv23=document.getElementById("tarpv23");
    let logitpv23=document.getElementById("tarpv23.5");
    let pilt=document.getElementById("pilt")

    if(tarpv21.checked){
        ryhm=tarpv21.value;
        answer2.style.color="green";
        pilt.src="img/1.png"
    }
    else if(tarpv22.checked){
        ryhm=tarpv22.value;
        pilt.src="img/2.png"
    }
    else if(tarpv23.checked){
        ryhm=tarpv23.value;
        pilt.src="img/3.png"
    }
    else if(logitpv23.checked){
        ryhm=logitpv23.value;
        pilt.src="img/4.png"
    }
    else{
        ryhm="palun vali endale rühm"
    }
    answer2.innerHTML="sa oled, " + ryhm;
}

function checkboxValik(){
    let answer3=document.getElementById("vastus3")
    let ujumine=document.getElementById("ujumine")
    let jousaal=document.getElementById("jousaal")
    let kasipall=document.getElementById("kasipall")
    let vorkpall=document.getElementById("vorkpall")
    let korvpall=document.getElementById("korvpall")

    var sport="";
    if(ujumine.checked){
        sport+=ujumine.value+", ";
    }
    if(jousaal.checked){
        sport+=jousaal.value+", ";
    }
    if(kasipall.checked){
        sport+=kasipall.value+", ";
    }
    if(vorkpall.checked){
        sport+=vorkpall.value+", ";
    }
    if(korvpall.checked){
        sport+=korvpall.value+", ";
    }
    answer3.innerHTML="Sinu spordialad on: "+sport;
}

function koikkokku(){
    let name = document.getElementById("nimi");
    let tarpv21 = document.getElementById("tarpv21");
    let tarpv22 = document.getElementById("tarpv22");
    let tarpv23 = document.getElementById("tarpv23");
    let logitpv23 = document.getElementById("logitpv23");
    let ujumine = document.getElementById("ujumine");
    let jousaal = document.getElementById("jousaal");
    let kasipall = document.getElementById("kasipall");
    let vorkpall = document.getElementById("vorkpall");
    let korvpall = document.getElementById("korvpall");
    let answer4 = document.getElementById("vastus4");

    let tere = "Tere päevast, " + name.value;

    let ryhm = "";
    if(tarpv21.checked){
        ryhm = tarpv21.value;
        answer2.style.color = "green";
    }
    else if(tarpv22.checked){
        ryhm = tarpv22.value;
    }
    else if(tarpv23.checked){
        ryhm = tarpv23.value;
    }
    else if(tarpv23_5.checked){
        ryhm = tarpv23_5.value;
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
}

function selectOptionValik(event){
    let answer5=document.getElementById("vastus5");
    if (event.target.value==="Tallinn") {
        answer5.innerHTML="Sinnu linnn on Tallinn"
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