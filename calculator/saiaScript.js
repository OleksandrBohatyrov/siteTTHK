const juustuhind = 1.0;
const magushind = 3.0;
const pontsikhind = 2.0;

function calclate(val, saiatyyp){
    return (val*saiatyyp).toFixed(2);
}

//kontrollib et kogus väli ei ole tühi
function validateForm(){
    let x = document.forms["kalk"]["kogus"].value;
    if (x === "") {
        alert("Palun sisestage kogus");
        return false;
    }
}
function validateForm2(){
    let x = document.forms["kalk2"]["kogus2"].value;
    if (x === "") {
        alert("Palun sisestage kogus");
        return false;
    }
}


//anvutame hind mis sõltub tektist kastist
function inputTextValue(){
    tyhistaSelectValue()
    tyhistaRadio()
    validateForm();
    let answer=document.getElementById("vastus");
    let kogus=document.getElementById("kogus");
    let inputValue=kogus.value;

    if (document.getElementById("saiatyyp").value === "juustu"){
        answer.innerHTML=calclate(inputValue, juustuhind)+" euro";
    }
    else if (document.getElementById("saiatyyp").value === "magus"){
        answer.innerHTML=calclate(inputValue, magushind)+" euro";
    }
    else if (document.getElementById("saiatyyp").value === "pontsik"){
        answer.innerHTML=calclate(inputValue, pontsikhind)+" euro";
    }
    else{
        answer.innerHTML="Saia tüüp ei ole määratud!";
    }
}
//anvutame hind mis sõltub tektist kastist

function inputTextValue3(){
    tyhistaSelectValue2();
    tyhistaRadio2();
    tyhistaRadio2();
    validateForm2();
    let answer2=document.getElementById("vastus2");
    let kogus2=document.getElementById("kogus2");
    let inputValue2=kogus2.value;

    if (document.getElementById("saiatyyp3").value === "juustu"){
        answer2.innerHTML=calclate(inputValue2, juustuhind)+" euro";
    }
    else if (document.getElementById("saiatyyp3").value === "magus"){
        answer2.innerHTML=calclate(inputValue2, magushind)+" euro";
    }
    else if (document.getElementById("saiatyyp3").value === "pontsik"){
        answer2.innerHTML=calclate(inputValue2, pontsikhind)+" euro";
    }
    else{
        answer2.innerHTML="Saia tüüp ei ole määratud!";
    }
}


//puhastab text kasti sisestatud väärtus!
function tyhistaTextValue(){
    document.getElementById("saiatyyp").value="";
}
// 2 table
function tyhistaTextValue2(){
    document.getElementById("saiatyyp3").value="";
}


//puhastab select valiku
function tyhistaSelectValue(){
    document.getElementById("saiatyyp2").selectedIndex=0;
}
function tyhistaSelectValue2(){
    document.getElementById("saiatyyp4").selectedIndex=0;
}


//puhastab radio valiku
function tyhistaRadio(){
    let elem=document.getElementsByName("saiatyyp3");
    for(let i=0;i<length ;i++){
        elem[i].checked=false;
    }
}

//2 table
function tyhistaRadio2(){
    let elem2=document.getElementsByName("saiatyyp5");
    for(let i=0;i<length ;i++){
        elem2[i].checked=false;
    }
}

// puhastab checkbox
function tyhistaCheckbox() {
    let checkboxes = document.getElementsByName("saiatyyp6");
    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = false;
    }
}




function selectOptionChange(){
    tyhistaTextValue();
    tyhistaRadio()
    validateForm();
    let answer=document.getElementById("vastus");
    let kogus=document.getElementById("kogus");
    let inputValue=kogus.value;
    let saiatyyp2 =event.target.value;

    if (saiatyyp2 === "juustu"){
        answer.innerHTML=calclate(inputValue, juustuhind)+" euro";
    }
    else if (saiatyyp2 === "magus"){
        answer.innerHTML=calclate(inputValue, magushind)+" euro";
    }
    else if (saiatyyp2 === "pontsik"){
        answer.innerHTML=calclate(inputValue, pontsikhind)+" euro";
    }
    else{
        answer.innerHTML="Saia tüüp ei ole määratud!";
    }
}
function selectOptionChange4(){
    tyhistaTextValue2();
    tyhistaRadio2();
    tyhistaRadio2();
    validateForm2();
    tyhistaCheckbox();
    let answer2=document.getElementById("vastus2");
    let kogus2=document.getElementById("kogus2");
    let inputValue2=kogus2.value;
    let saiatyyp4 =event.target.value;

    if (saiatyyp4 === "juustu"){
        answer2.innerHTML=calclate(inputValue2, juustuhind)+" euro";
    }
    else if (saiatyyp4 === "magus"){
        answer2.innerHTML=calclate(inputValue2, magushind)+" euro";
    }
    else if (saiatyyp4 === "pontsik"){
        answer2.innerHTML=calclate(inputValue2, pontsikhind)+" euro";
    }
    else{
        answer2.innerHTML="Saia tüüp ei ole määratud!";
    }
}

//radio nuppu valik
function radioChange(event){
    tyhistaTextValue();
    tyhistaSelectValue()
    validateForm();
    let answer=document.getElementById("vastus");
    let kogus=document.getElementById("kogus");
    let inputValue=kogus.value;
    let saiatyyp3=event.target.id;

    if (saiatyyp3 === "juustu"){
        answer.innerHTML=calclate(inputValue, juustuhind)+" euro";
    }
    else if (saiatyyp3 === "magus"){
        answer.innerHTML=calclate(inputValue, magushind)+" euro";
    }
    else if (saiatyyp3 === "pontsik"){
        answer.innerHTML=calclate(inputValue, pontsikhind)+" euro";
    }
    else{
        answer.innerHTML="Saia tüüp ei ole määratud!";
    }
}

function radioChange2(event){
    tyhistaTextValue2();
    tyhistaSelectValue2()
    validateForm2();
    tyhistaCheckbox();
    let answer2=document.getElementById("vastus2");
    let kogus2=document.getElementById("kogus2");
    let inputValue2=kogus2.value;
    let saiatyyp5=event.target.id;

    if (saiatyyp5 === "juustu2"){
        answer2.innerHTML=calclate(inputValue2, juustuhind)+" euro";
    }
    else if (saiatyyp5 === "magus2"){
        answer2.innerHTML=calclate(inputValue2, magushind)+" euro";
    }
    else if (saiatyyp5 === "pontsik2"){
        answer2.innerHTML=calclate(inputValue2, pontsikhind)+" euro";
    }
    else{
        answer2.innerHTML="Saia tüüp ei ole määratud!";
    }
}
//checkbox

function checkChange() {
    tyhistaTextValue2();
    tyhistaSelectValue2();
    tyhistaRadio2();
    validateForm2();
    let answer2 = document.getElementById("vastus2");
    let kogus2 = document.getElementById("kogus2");

    let inputValue = kogus2.value;

    let total = 0;

    if (document.getElementById("juustu3").checked) {
        total += inputValue * juustuhind;
    }
    if (document.getElementById("magus3").checked) {
        total += inputValue * magushind;
    }
    if (document.getElementById("pontsik3").checked) {
        total += inputValue * pontsikhind;
    }

    let formattedTotal = total.toFixed(2);

    answer2.textContent = "Hind on " + formattedTotal + " euro";
}




//Arvutab kindla hinnaga saia hind
function hind(){
    let answer=document.getElementById("vastus");
    let kogus=document.getElementById("kogus");


    answer.innerHTML="Hind on "+(kogus.value*saiahind).toFixed(2)+ " euro";
    //toFixed = round()
}