class TemplateManager {
    constructor() {
        this.saveDesignUrl = window.templateManagerData.saveDesignUrl;
        this.csrfToken = window.templateManagerData.csrfToken;
        this.productId = window.templateManagerData.productId;
        this.shareArtwork = window.templateManagerData.URL+'/shareArtwork';
        // console.log(this.shareArtwork);
        this.initEventListeners();
    }

    initEventListeners() {
        $(document).ready(() => {
            $('.saveTemplate').on('click', () => {
                this.showModal();
            });
           
        
            $('.saveASData').on('click', () => {
                this.checkCanvasAndSave('saveAs');
            });
        
            $('.saveData').on('click', () => {
                this.checkCanvasAndSave('save');
            });
            
            $('.view_my_designs').on('click', () => {
                $('.btncloseleftpanel').click();
                var url = window.templateManagerData.URL + '/my-saved-designs';
                window.open(url, '_blank');
            });

            $('.sendArtworkBtn').on('click', () => {
                this.sendArtwork(); 
            });

            $('.proceesToCheckouts').on('click', (e) => {
                e.preventDefault();
                this.checkCanvasAndSave('checkout');
            });

        });
    }

    sendArtwork() {
        var sendername = $('.sendername').val().trim();
        var senderemail = $('.senderemail').val().trim();
        var sendernotes = $('.sendernotes').val().trim();
        var imageUrl = canvas.toDataURL("image/png");
        // Reset error messages
        $('.senderNameError').text('');
        $('.senderEmailError').text('');
        $('.senderNoteError').text('');
    
        // Validation flags
        var isValid = true;
    
        // Validate name
        if (!sendername) {
            $('.senderNameError').text('Name is required.');
            isValid = false;
        }
    
        // Validate email
        if (!senderemail) {
            $('.senderEmailError').text('Email is required.');
            isValid = false;
        }
        // Validate notes
        if (!sendernotes) {
            $('.senderNoteError').text('Notes are required.');
            isValid = false;
        }
    
        if (isValid) {
            
            $.ajax({
                type: 'POST',
                url: this.shareArtwork,
                data: {
                    _token: this.csrfToken,
                    sendername: sendername, 
                    senderemail: senderemail, 
                    sendernotes: sendernotes, 
                    image: imageUrl, 
                    status: 1
                },
                success: (response) => {
                    $('.btn-close').click();
                    $('.modelErrorData').text(response.message);
                    $('#errorModel').modal('show');                    
                },
                error: (error) => {
                    // Check if the error object contains a specific message property
                    $('.btn-close').click();
                    let errorMessage = "Error saving template!";
                    if (error.responseJSON && error.responseJSON.message) {
                        errorMessage += " " + error.responseJSON.message;
                    } else if (error.responseText) {
                        errorMessage += " " + error.responseText;
                    } else {
                        errorMessage += " " + JSON.stringify(error, null, 2);
                    }
                    
                    // Display the error message in the modal
                    $('.modelErrorData').text(errorMessage);
                    $('#errorModel').modal('show');
                }
                
                
            });

        } else {
            console.log('Validation failed.');
        }
    }
    
    isValidEmail(email) {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }
    
    

    checkCanvasAndSave(action) {
        if (canvas) { // Directly access the global `canvas` variable
            if (canvas.getObjects().length > 0) {
                this.saveTemplate(action);
            } else {
                $('.btn-close').click();
                $('.modelErrorData').text("Your design doesn't have background color or any object, so you aren't allowed to save.");
                $('#errorModel').modal('show');
            }
        } else {
            $('.btn-close').click();
            $('.modelErrorData').text("Canvas element not found!");
            $('#errorModel').modal('show');
        }
    }
    
    showModal() {
        $("#exampleModal22").modal('show');
    }

    saveTemplate(action = 'saveAs') {
        const templateData = JSON.stringify(canvas.toJSON());
        const sizeId = $('#select_size option:selected').data('id');
        const name = $('#templateName').val();
        const dimension = $('#size_unit option:selected').val().toLowerCase() ?? 'ft';
        const sizeValues = $('#select_size').find('option:selected').html().split('X');
        const variations = $('.saveTemplate').attr('tempalte-data-variations');
        const templateId = $('.saveTemplate').attr('template-id');
        console.log(action);
        var status = 1;
      
        let width = '';
        let height = '';

        if (sizeValues != 'Custom') {
            width = parseFloat(sizeValues[0]);
            height = parseFloat(sizeValues[1]);
        } else {
            width = $('#custom_width').val();
            height = $('#custom_height').val();
        }

        if (!name && action !== 'checkout') {
            alert('Template name should not be null');
            return false;
        }
        
        if (!width || !height) {
            alert('Width or Height should not be nullable');
            return false;
        }

        if(action == 'checkout'){
            action = 'save';
            var status = parseInt($('.saveTemplate').attr('template-status'));
        }

        // Convert canvas to image
        const imageUrl = canvas.toDataURL("image/png");

        $.ajax({
            type: 'POST',
            url: this.saveDesignUrl,
            data: {
                _token: this.csrfToken,
                product_id: this.productId,
                template_data: templateData,
                templateId: templateId,
                name: name,
                width: width,
                height: height,
                dimension: dimension,
                size_id: sizeId,
                variations: variations,
                action: action,
                image: imageUrl, 
                status: status
            },
            success: (response) => {
                const templateId = response.template.id;
                $('.saveTemplate').attr('template-id', templateId);
            
                const currentUrl = window.location.href;
                const newUrl = currentUrl.substring(0, currentUrl.lastIndexOf('/') + 1) + templateId;
                
                var checkoutUrl = window.templateManagerData.URL + '/review/designtool/' + templateId;
                $('.proceesToCheckouts').attr('href', checkoutUrl);
            
                window.history.pushState({ path: newUrl }, '', newUrl);
            
                if (status == 1) {
                    $('.btn-close').click();
                    $('.modelErrorData').text('Congratulations, Your design has been saved successfully in "My Designs".');
                    $('#errorModel').modal('show');                   
                } else {
                    window.location.replace(checkoutUrl);
                }
            },            
            error: (error) => {
                $('.modelErrorData').text("Error saving template!"+error);
                $('#errorModel').modal('show');
                console.error('Error saving template:', error);
            }
        });
    }
}

new TemplateManager();
