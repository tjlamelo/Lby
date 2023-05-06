
// Controle de saisie

function verifmail(champ) {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

        if(!regex.test(champ.value)){

            champ.style.backgroundColor="rgb(255,125,125)";

            return false;

        }else{
            champ.style.backgroundColor="";

            return true;
        }


    
}

function veriftel(champ) {
      //  var regex= /^0[1-68]([-. ]?[0-9]{2}){4}$/
        var regex= /^6(9[0-9])| $/
        if(!regex.test(champ.value)){

            champ.style.backgroundColor="rgb(255,125,125)";

            return false;

        }else{
            champ.style.backgroundColor="";

            return true;
        }



}

