function copy() {
    var copyText = document.getElementById("formLink");
  
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* Para dispositivos móviles*/
  
    
    document.execCommand("copy");
  
    alert("Enlace copiado: " + copyText.value);
  }