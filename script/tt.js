var bleu = 0, rouge = 255, vert = 0;


var rRouge=document.getElementById("rangeRouge");
var rVert=document.getElementById("rangeVert");
var rBleu=document.getElementById("rangeBleu");

var outRouge=document.getElementById("vRouge");
var outVert=document.getElementById("vVert");
var outBleu=document.getElementById("vBleu");

var inputRouge = document.getElementById("inputRouge");
var inputBleu = document.getElementById("inputBleu");
var inputVert = document.getElementById("inputVert");

var result=document.getElementById("couleur");

var catalogue = document.getElementById("Catalogue");

    // rÃ©cupÃ¨re le radioCatalogue
var radioCatalogue = document.getElementById("radioCatalogue");

    // rÃ©cupÃ¨re le radioPersonnel
var radioPersonnel = document.getElementById("radioPersonnel");


activeDesactiveZone();
// Mise Ã  jour des sliders et des outputs et des inputs (pour le POST
outRouge.value = inputRouge.value = rouge;
outBleu.value = inputBleu.value =  bleu;
outVert.value = inputVert.value = vert;
rRouge.value=255;
rVert.value=255;
rBleu.value=0;
calcul();

radioCatalogue.onclick = function()
{
    activeDesactiveZone();
    catalogue.onchange();
    calcul();
    //alert("catalogue");
};

radioPersonnel.onclick = function()
{
    activeDesactiveZone();
    calcul();
    //alert("radiopersonnel");
};

catalogue.onchange = function()
{ //alert("catalogue chang");

    if (catalogue.value === "jaune")
    {
        rouge = 255;
        vert = 255;
        bleu = 0;
    }
    else if (catalogue.value === "rouge") {
        rouge = 255;
        vert = 0;
        bleu = 0;
    }
    else if (catalogue.value === "bleu") {
        rouge = 0;
        vert = 0;
        bleu = 255;
    }
    else {
        rouge = 0;
        vert = 255;
        bleu = 0;
    }
    // Mise Ã  jour des sliders et des outputs et des inputs (pour le POST
    outRouge.value = rRouge.value = inputRouge.value = rouge;
    outBleu.value = rBleu.value = inputBleu.value = bleu;
    outVert.value = rVert.value = inputVert.value = vert;
    calcul();
};

function calcul() {
    console.log("calcul");
    result.style.backgroundColor = "rgb(" + rouge + "," + vert + "," + bleu + ")";
}

function activeDesactiveZone() {
    if (radioCatalogue.checked)
    {
        catalogue.disabled = false;
        rRouge.disabled = true;
        rVert.disabled = true;
        rBleu.disabled = true;
    }
    else
    {
        catalogue.disabled = true;
        rRouge.disabled = false;
        rVert.disabled = false;
        rBleu.disabled = false;
    }
}

// Action sur le click du slider ROUGE
rRouge.onclick = function()
{   
    
   inputRouge.value = rouge = outRouge.value = rRouge.value;
    inputVert.value = vert = outVert.value = rVert.value;
    inputBleu.value = bleu = outBleu.value = rBleu.value;
    calcul();
    
};


// Action sur le click du slider VERT
rVert.onclick = function()
{    // console.log("vert");
    inputRouge.value = rouge = outRouge.value = rRouge.value;
    inputVert.value = vert = outVert.value = rVert.value;
    inputBleu.value = bleu = outBleu.value = rBleu.value;
    calcul();
};

rBleu.onclick = function()
{    //console.log("bleu");
    inputRouge.value = rouge = outRouge.value = rRouge.value;
    inputVert.value = vert = outVert.value = rVert.value;
    inputBleu.value = bleu = outBleu.value = rBleu.value;
    calcul();
};













// // FONCTIONS GET VALUE COLORS ----------------------------------
// rRouge.onclick =function(){
// outRouge.value=rRouge.value;
// calcul();
// console.log(outRouge)
// };

// rVert.onclick =function(){
//     outVert.value=rVert.value;
//     calcul();
//     console.log(outVert)
// };

// rBleu.onclick =function(){
//     outBleu.value=rBleu.value;
//     calcul();
//     console.log(outBleu)
// };
        
// // -------------------------------------------------------------


// var outVert;
// var outBleu;
// var outRouge;

// function calcul(){
// rouge=rRouge.value;
// vert=rVert.value;
// bleu=rBleu.value;
// couleur.style.backgroundColor = "rgb(" + rouge + "," + vert + "," + bleu + ")";
// }; 