$(document).ready(function () {

    // Code for show canvas image in the model 
    function getCanvasImage(){
        var canvas = document.getElementById('customCanvas');
        if (canvas) {
            var imageUrl = canvas.toDataURL("image/png");
            var img = $('<img>');
            img.attr('src', imageUrl);
            return img;
        }
    }
    $('.previewImage').on('click', function () {
        $('.previewImageBody').html('');
        $('.img-thumb-box').html('');
        
        var img = getCanvasImage();
        
            $('.img-thumb-box').html(img.clone());
            $('.previewImageBody').html(img);
       
    });


    $('.shareImage').on('click', function (){
        var img = getCanvasImage();
        $('.shareImageData').html(img);
    });



    
});