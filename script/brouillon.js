var decimal,reste,quotient,result;

decimal=parseInt(prompt("valeur entre 0 et 255"));
while (decimal<0 || decimal>255) {
    decimal=parseInt(prompt("j'ai dit entre 0 et 255"));
}

reste=decimal%16;
quotient=(decimal-reste)/16;
console.log("quotient",quotient);
console.log("reste",reste);
hexa=[];

conv_dec_hexa(quotient);
conv_dec_hexa(reste);

function conv_dec_hexa(val){
    if (val<=9)
        hexa.push(val);
    else if(val==10) hexa.push("A");
    else if(val==11) hexa.push("B");
    else if(val==12) hexa.push("C");
    else if(val==13) hexa.push("D");
    else if(val==14) hexa.push("E");
    else if(val==15) hexa.push("F");
}
if (quotient==0) {
    hexa.shift();
    result=String(hexa[0]);
    alert("0x"+result);
    console.log(hexa);
}

else {
    result=String(hexa[0])+String(hexa[1]);
    alert("0x"+result);
    console.log(hexa);
}