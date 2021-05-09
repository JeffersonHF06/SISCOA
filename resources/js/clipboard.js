


    function copyLink(id) {
      console.log('entre')
      var copyText = document.getElementById(`link${id}`);

      navigator.clipboard.writeText(copyText);
    
      // copyText.select();
      // copyText.setSelectionRange(0, 99999); /* Para dispositivos móviles*/
    
      
      // document.execCommand("copy");
    
      alert("Enlace copiado: " + copyText.value);
    }
