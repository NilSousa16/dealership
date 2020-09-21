$(function() {

    $("input,textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
            console.log("talvez não <<<<<<<<<<<<<<<");
        },
        submitSuccess: function($form, event) {
            console.log("talvez não <<<<<<<<<<<<<<<");
            event.preventDefault(); 
            // prevent default submit behaviour
            // get values from FORM

            //
            var typeForm = ""
            var name = $("input#name").val();
            if(name != "") {
                typeForm = $("input#typeForm").val();
            } 

            // 
            var typeFormSale = ""
            var nameSale = $("input#nameSale").val();
            if(nameSale != "") {
                typeFormSale = $("input#typeFormSale").val();
            } 

            //
            var typeFormFinancial = ""
            var nameSale = $("input#nameFinancial").val();
            if(nameSale != "") {
                typeFormFinancial = $("input#typeFormFinancial").val();
            } 

            if(typeForm == "contactForm"){
                typeForm = "";

                var name = $("input#name").val();
                var email = $("input#email").val();
                var subject = $("input#subject").val();
                var phone = $("input#phone").val();
                var message = $("textarea#message").val();

                dataForm = {
                    name: name,
                    email: email,
                    subject: subject,
                    phone: phone,
                    message: message
                }

                var firstName = name; // For Success/Failure Message
                // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
                    firstName = name.split(' ').slice(0, -1).join(' ');
                }
                $.ajax({                
                    url: "./mail/contact_me.php",
                    type: "POST",
                    data: dataForm,
                    cache: false,
                    success: function() {
                        // Success message
                        $('#success').html("<div class='alert alert-success'>");
                        $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-success')
                            .append("<strong>Sua mensagem foi enviada. </strong>");
                        $('#success > .alert-success')
                            .append('</div>');

                        //clear all fields
                        $('#contactForm').trigger("reset");
                    },
                    error: function() {
                        // Fail message
                        $('#success').html("<div class='alert alert-danger'>");
                        $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                        $('#success > .alert-danger').append('</div>');
                        //clear all fields
                        // $('#contactForm').trigger("reset");
                    },
                })
            } else if(typeFormSale == "saleForm") {
                console.log("saleForm validado");
                typeFormSale = "";

                var nameSale = $("input#nameSale").val();
                var phoneSale = $("input#phoneSale").val();
                var emailSale = $("input#emailSale").val();
                var brandCarsale = $("input#brandCarsale").val();
                var modelSale = $("input#modelSale").val();
                var color = $("input#color").val();
                var board = $("input#board").val();
                var year = $("input#year").val();
                var km = $("input#km").val();
                var messageSale = $("textarea#messageSale").val();

                dataFormSale = {
                    nameSale: nameSale,
                    phoneSale: phoneSale,
                    emailSale: emailSale,
                    brandCarsale: brandCarsale,
                    modelSale: modelSale,
                    color: color,
                    board: board,
                    year: year,
                    km: km,
                    messageSale: messageSale
                }

                var firstName = name; // For Success/Failure Message
                // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
                    firstName = name.split(' ').slice(0, -1).join(' ');
                }
                console.log("Vai entrar no ajax do typeFormSale <<<<<<<<<<<<<<<");
                $.ajax({                
                    url: "./mail/contact_me_sale.php",
                    type: "POST",
                    data: dataFormSale,
                    cache: false,
                    success: function() {
                        // Success message
                        console.log("sucesso sale ajax <<<<<<<<<<<<<<<");
                        $('#successSale').html("<div class='alert alert-success'>");
                        $('#successSale > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#successSale > .alert-success')
                            .append("<strong>Sua mensagem foi enviada. </strong>");
                        $('#successSale > .alert-success')
                            .append('</div>');

                        //clear all fields
                        $('#saleForm').trigger("reset");
                    },
                    error: function() {
                        // Fail message
                        console.log("falha   ajax <<<<<<<<<<<<<<<");
                        $('#successSale').html("<div class='alert alert-danger'>");
                        $('#successSale > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#successSale > .alert-danger').append("<strong>Desculpe " + firstName + ", parece que meu servidor de e-mail não está respondendo. Por favor, tente novamente mais tarde!");
                        $('#successSale > .alert-danger').append('</div>');
                        //clear all fields
                        // $('#contactForm').trigger("reset");
                    },
                })
                
            } else if(typeFormFinancial == "financialForm") {
                console.log("financialForm validado");
                typeFormFinancial = "";

                var nameFinancial = $("input#nameFinancial").val();
                var emailFinancial = $("input#emailFinancial").val();
                var cpfFinancial = $("input#cpfFinancial").val();
                var phoneFinancial = $("input#phoneFinancial").val();
                var brandCarFinancial = $("input#brandCarFinancial").val();
                var modelCarFinancial = $("input#modelCarFinancial").val();
                var entranceFinancial = $("input#entranceFinancial").val();
                var portionFinancial = $("input#portionFinancial").val();
                var messageFinancial = $("textarea#messageFinancial").val();

                dataFormFinancial = {
                    nameFinancial: nameFinancial,
                    emailFinancial: emailFinancial,
                    cpfFinancial: cpfFinancial,
                    phoneFinancial: phoneFinancial,
                    brandCarFinancial: brandCarFinancial,
                    modelCarFinancial: modelCarFinancial,
                    entranceFinancial: entranceFinancial,
                    portionFinancial: portionFinancial,
                    messageFinancial: messageFinancial                    
                }

                var firstName = name; 
                // For Success/Failure Message
                // Check for white space in name for Success/Fail message
                if (firstName.indexOf(' ') >= 0) {
                    firstName = name.split(' ').slice(0, -1).join(' ');
                }
                console.log("Vai entrar no ajax do financialFormSale <<<<<<<<<<<<<<<");
                $.ajax({                
                    url: "./mail/contact_me_financial.php",
                    type: "POST",
                    data: dataFormFinancial,
                    cache: false,
                    success: function() {
                        // Success message
                        console.log("sucesso financial ajax <<<<<<<<<<<<<<<");
                        $('#successFinancial').html("<div class='alert alert-success'>");
                        $('#successFinancial > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#successFinancial > .alert-success')
                            .append("<strong>Sua mensagem foi enviada. </strong>");
                        $('#successFinancial > .alert-success')
                            .append('</div>');

                        //clear all fields
                        $('#financeForm').trigger("reset");
                    },
                    error: function() {
                        // Fail message
                        console.log("falha financial  ajax <<<<<<<<<<<<<<<");
                        $('#successFinancial').html("<div class='alert alert-danger'>");
                        $('#successFinancial > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                            .append("</button>");
                        $('#successFinancial > .alert-danger').append("<strong>Desculpe " + firstName + ", parece que meu servidor de e-mail não está respondendo. Por favor, tente novamente mais tarde!");
                        $('#successFinancial > .alert-danger').append('</div>');
                        //clear all fields
                        // $('#contactForm').trigger("reset");
                    },
                })
                
            }           
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
    $('#success').html('');
});
