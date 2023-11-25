function alpha(ch) {
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


function verif(){
    let mail=document.getElementById("mail").value;
    let pwd=document.getElementById("pwd").value;
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
    if((ch1.length==0)||(ch2.length==0)||(ch3.length==0)||(!alpha(ch2))||(!alpha(ch3))||(2>ch3.length>3)){
    	alert("mail invalide");return false;
    }

    if (pwd.length==0 || pwd.length<8){
        alert("password invalide");return false;
    }
}

function verif1(){
    let Last_Name=document.getElementById("Last_Name").value;
    let First_Name=document.getElementById("First_Name").value;
    let date_nai=document.getElementById("date").value;
    let mail=document.getElementById("mail2").value;
    let pwd=document.getElementById("pwd2").value;
    let imageUpload=document.getElementById("imageUpload").value;
    let check=document.getElementById("policy");

    if(Last_Name.length==0 || !alpha(Last_Name)){
		alert("Last Name invalide");return false;
	}
    if(First_Name.length==0 || !alpha(First_Name)){
		alert("First Name invalide");return false;
	}
    if (date_nai.length==0) {
        alert("Date de naissance invalide");return false;
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
    if((ch1.length==0)||(ch2.length==0)||(ch3.length==0)||(!alpha(ch2))||(!alpha(ch3))||(2>ch3.length>3)){
    	alert("mail invalide");return false;
    }
    if (pwd.length==0 || pwd.length<8){
        alert("password invalide");return false;
    }
    if(!check.checked){
        alert("check ");return false;
    }
}