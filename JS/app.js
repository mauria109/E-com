let httpRequest = false;

if (window.XMLHttpRequest){
    let httpRequest = new XMLHttpRequest();

    if (httpRequest.overrideMimeType){
        httpRequest.overrideMimeType('text/xml');
    }
}else if(window.ActiveXObject){
    try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP")
    }catch (e) {
        try {
            httpRequest = new ActiveXObject("Microsoft.XMLHTTP")
        }catch (e) {

        }
    }
}


if (!httpRequest){
    alert("Impossible de créer une instance XMLHttpRequest");
    //return false;
}

