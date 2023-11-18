/*function alpha(ch) {
    for (i=0;i<ch.length;i++) {
        c=ch.charAt(i).toUpperCase();
        if((c<"A")||(c>"Z")){
            return false;
        }
    }
    return true;
}

function num(ch1) {
    for(i=0;i<ch1.length;i++) {
        c=ch1.charAt(i);
        if((c<"0")||(c>"9")){
            return false;
        }
    }
    return true;
}


function verif1(){
    let cin=document.getElementById("cin").value;
	let nom=document.getElementById("nom").value;
    let prenom=document.getElementById("prenom").value;
    let adress=document.getElementById("adress").value;
    let nationalite=document.getElementById("nationalite").value;
    let eta_civil=document.getElementById("eta_civil").value;
    let date_nai=document.getElementById("date").value;
    let lieu=document.getElementById("lieu").value;
    let tel=document.getElementById("tel").value;
    let mail=document.getElementById("mail").value;
    let pwd=document.getElementById("pwd").value;

    if(cin.length==0 || !num(cin)){
        alert("cin invalide");return false;
    }
	if(nom.length==0 || !alpha(nom)){
		alert("nom invalide");return false;
	}
    if(prenom.length==0 || !alpha(prenom)){
		alert("prenom invalide");return false;
	}
    if(adress.length==0){
        alert("adresse invalide");return false;
    }
    if(nationalite.length==0 || !alpha(nationalite)){
        alert("nationalite invalide");return false;
    }
    if(eta_civil==1){
        alert("eta civil invalide");return false;
    }
    let selectedDate=new Date(date_nai);
    let date=new Date();
    if (date_nai.length==0) {
        alert("Date de naissance invalide");return false;
    }
    if(date.getFullYear()-selectedDate.getFullYear()<18){
        alert("date de naissance invalide");return false;
    }
    if(lieu.length==0 || !alpha(lieu)){
		alert("Lieu de naissance invalide");return false;
	}
    if((tel.length==0)||(tel.length!=8)||(!num(tel))||(tel.charAt(0)=='0')){
        alert("numero de telephone invalide");return false;
    }
	at = mail.indexOf("@");
	if(at==-1){
		alert("mail invalide");return false;
	}
    pi = mail.lastIndexOf(".");
    if(pi==-1){
    	alert("mail invalive");return false;
    }
    if(at>pi){
    	alert("mail invalide");return false;
    }
    ch1 = mail.substring(0, at);
    ch2 = mail.substring(at+1, pi);
    ch3 = mail.substring(pi + 1, mail.length);
    if((ch1.length==0)||(ch2.length==0)||(ch3.length==0)||(ch3.length!=2)||(strcmp(ch2,"bizerte.r-iset") || strcmp(ch3,"tn"))){
    	alert("mail invalide");return false;
    }
    if (pwd.length==0 || pwd.length<8){
        alert("password invalide");return false;
    }
    return true;
}*/