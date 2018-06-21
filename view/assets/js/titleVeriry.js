       $("#tLog").blur(function() {
	
	var title = $("#tLog").val();
          
            $.post("index.php", {
                    controller: "Anuncio",
                    action: "titleExists",
                    title: title,
                   
                },

                function (result) {

			if(result == '0'){
				$("#ret").removeClass("libe");
				$("#ret").html(" * "+$("#tLog").val()+" - Indisponível");
				$("#ret").addClass("alerta");
				$("#tLog").val("");
				
				

			}else if(result == '1'){
				$("#ret").removeClass("alerta");
				$("#ret").html(" * Nome disponível para registro");
				$("#ret").addClass("libe");

				
			}else if(result == '3'){
				$("#ret").removeClass("alerta");
				$("#ret").html(" * O Título deve ser preenchido");
				$("#ret").addClass("libe");
				
			} else {
				alert("Erro nde consulta ao sistema.");
				
			}
           
                });
        });

	
 
