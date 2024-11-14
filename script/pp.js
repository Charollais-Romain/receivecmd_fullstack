var centp = document.getElementById("centp");
var centm = document.getElementById("centm");
var dizp = document.getElementById("dizp");
var dizm = document.getElementById("dizm");
var unitp = document.getElementById("unitp");
var unitm = document.getElementById("unitm");

var debit = document.getElementById("debittxt");
var result = 0;

function resultat(result){
    debit.value = result;
}

function ajout(nb){
    if(result + nb >= 1000){} else{
        result = result + nb;
    }
    resultat(result);
}

function moins(nb){
    if(result - nb <= 0){} else{
        result = result - nb;
    }
    console.log(result);
    resultat(result);
}

centp.onclick = function() {
    ajout(100);
};
dizp.onclick = function() {
    ajout(10);
};
unitp.onclick = function() {
    ajout(1);
};

centm.onclick =  function() {
    moins(100);
};
dizm.onclick =  function() {
    moins(10);
};
unitm.onclick =  function() {
    moins(1);
};
