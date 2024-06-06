$(document).ready(function (){
    // $('body').css('zoom', '90%');

    $('.common_controls').hide();
    $('#horizontalLine').hide();
    $('#verticalLine').hide();

    $('.acrylc-letter-box').hide();
    $('.sectionCNG').on('change', function (){
        var dataFor = $(this).attr('data-for');
        var dataVal = $(this).val();
        var CNGInput = $('.'+dataFor+'CNGInput').val();
        
        if (CNGInput == '') {
            if(dataVal == 'all'){
                $('.'+dataFor+'Section').show();
            }else{
                $('.'+dataFor+'Section').hide();
                var backgroundName = $(this).find(':selected').attr('data-name'); 
                $('.'+dataFor+'-'+backgroundName).show(); 
            } 
        }
    });

    $('.CNGInput').on('keyup', function(){
        var dataFor = $(this).attr('data-for');
        var CNGInput = $(this).val().toLowerCase();
        if(CNGInput !== ''){
            $('.'+dataFor+'Section').each(function(){
                var dataName = $(this).attr('data-name').toLowerCase();
                if (dataName.includes(CNGInput)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }else{
            if(dataFor == "template"){
                $('.templateCng').trigger('change');
            }else{

                $('.sectionCNG[data-for="'+dataFor+'"]').trigger('change');
            }
           
        }
    });
    
});
// Canvas code start from here ::
var canvas;
var isDragging = false;

document.addEventListener("DOMContentLoaded", function() {
  canvas = new fabric.Canvas('customCanvas');




    document.addEventListener('keydown', function(event) {
        const activeObject = canvas.getActiveObject();
    
        if (!activeObject) return;
    
        switch (event.key) {
            case 'ArrowLeft':
                activeObject.left -= 10;
                canvas.renderAll();
                break;
            case 'ArrowRight':
                activeObject.left += 10;
                canvas.renderAll();
                break;
            case 'ArrowUp':
                activeObject.top -= 10;
                canvas.renderAll();
                break;
            case 'ArrowDown':
                activeObject.top += 10;
                canvas.renderAll();
                break;
            case 'Delete':
                canvas.remove(activeObject);
                break;
            default:
                break;
        }
    
        if (event.ctrlKey) {
            switch (event.key) {
                case 'x':
                    cutSelected()
                    break;
                case 'c':
                    copySelected()
                    break;
                case 'v':
                    paste();
                    break;
                case 'z':
                    undo();
                    break;
                case 'y':
                    redo();
                    break;
                case 'l':
                    leaveElement();
                    break;
                default:
                    break;
            }
        }
    });
    function leaveElement() {
        const activeObject = canvas.getActiveObject();
        if (activeObject) {
            canvas.discardActiveObject();
            canvas.renderAll();
        }
    }

//   this is use for add scalling border in canvas ::
//   var canvas2=document.getElementById("canvasRuler");
//   var ctx2=canvas2.getContext("2d");

//   ctx2.beginPath();
//   for(var i=0;i<canvas.width;i+=10){
//       var y=(i/100==parseInt(i/100))?0:10;
//       ctx2.moveTo(i+15,y);
//       ctx2.lineTo(i+15,15);
//       var x=(i/100==parseInt(i/100))?0:10;
//       ctx2.moveTo(x,i+15);
//       ctx2.lineTo(15,i+15);
//   }
//   ctx2.strokeStyle = "red";
//   ctx2.stroke();

//  scaling border canvas end here

function getPixelsPerUnit(unit) {
    switch (unit) {
        case 'mm': return 3.7795275590551;
        case 'cm': return 37.795275590551;
        case 'in': return 96;
        case 'ft': return 1152;
        default: console.error('Unsupported unit: ' + unit); return null;
    }
}

function updateCustomCanvasDimensions(width, height, unit) {
    let pixelsPerUnit = getPixelsPerUnit(unit);
    // let maxCanvasWidth = 500; // Width of the ruler
    let maxCanvasWidth = canvas.width; // Width of the ruler
    let maxCanvasHeight = canvas.height; // Height of the ruler
    // let maxCanvasHeight = 350; // Height of the ruler

    let naturalCanvasWidth = width * pixelsPerUnit;
    let naturalCanvasHeight = height * pixelsPerUnit;

    let scaleWidth = Math.min(maxCanvasWidth / naturalCanvasWidth, 1); // Scale width
    let scaleHeight = Math.min(maxCanvasHeight / naturalCanvasHeight, 1); // Scale height

    // Update ruler dimensions
    $('.ruler.top').width(naturalCanvasWidth * scaleWidth);
    $('.ruler.left').height(naturalCanvasHeight * scaleHeight);

    drawRulers(width, height, unit, scaleWidth, scaleHeight, pixelsPerUnit);
}

function drawRulers(width, height, unit, scaleWidth, scaleHeight, pixelsPerUnit) {
    let widthGap = chooseGap(width, width / (width * pixelsPerUnit));
    let heightGap = chooseGap(height, height / (height * pixelsPerUnit));

    drawRulerLine(width, widthGap, 'horizontal', unit, scaleWidth, pixelsPerUnit);
    drawRulerLine(height, heightGap, 'vertical', unit, scaleHeight, pixelsPerUnit);
}

function drawRulerLine(length, gap, orientation, unit, scale, pixelsPerUnit) {
    let ruler = orientation === 'horizontal' ? '.ruler.top' : '.ruler.left';
    let numMajorTicks = Math.min(Math.floor(length / gap), 10); // Limit major ticks to maximum 10
    if (length < 10) {
        numMajorTicks = length; // Set numMajorTicks to length if it's less than 10
    }

    $(ruler).empty(); // Clear previous ticks
    for (let i = 0; i <= numMajorTicks; i++) {
        let position = i * gap * pixelsPerUnit;

        // Calculate the label based on width or height and the current position
        let label = Math.round(position / pixelsPerUnit);

        $(ruler).append(`<div class="tick major" style="${orientation === 'horizontal' ? 'left' : 'top'}: ${position * scale}px;"><span>${label}</span></div>`);

        // Draw minor ticks if needed
        for (let j = 1; j < 10; j++) {
            let minorPosition = position + j * (gap * pixelsPerUnit / 10);
            if (minorPosition < length * pixelsPerUnit) {
                $(ruler).append(`<div class="tick minor" style="${orientation === 'horizontal' ? 'left' : 'top'}: ${minorPosition * scale}px;"></div>`);
            }
        }
    }
}
canvas.on('mouse:move', function(event) {
    let rect = canvas.lowerCanvasEl.getBoundingClientRect();
    let x = event.e.clientX - rect.left;
    let y = event.e.clientY - rect.top;

    // Draw a line at the current mouse position
    // let ctx = canvas.getContext('2d');
    // ctx.beginPath();
    // ctx.moveTo(x, 0); // Start of the vertical line (x, 0)
    // ctx.lineTo(x, canvas.height); // End of the vertical line (x, canvas height)
    // ctx.stroke();

    // Ensure ruler lines exist and update their positions
    let rulerTopLine = $('.ruler.top .top-line');
    let rulerLeftLine = $('.ruler.left .left-line');
    if (rulerTopLine.length === 0) {
        $('.ruler.top').prepend('<div class="top-line"></div>');
        rulerTopLine = $('.ruler.top .top-line');
    }
    if (rulerLeftLine.length === 0) {
        $('.ruler.left').prepend('<div class="left-line"></div>');
        rulerLeftLine = $('.ruler.left .left-line');
    }
    
    rulerTopLine.css('left', x + 'px');
    rulerLeftLine.css('top', y + 'px');
});



function chooseGap(length, unitPixels, maxLabels = 10) {
    let minGap = 1; // start with the smallest gap
    let numLabels;
    do {
        numLabels = Math.floor(length / minGap);
        if (numLabels > maxLabels) {
            minGap *= 2; // increase the gap
        }
    } while (numLabels > maxLabels);
    return minGap;
}



// Example usage

$('#select_size').change(function() {
    selectedSize();
    // const selectedOption = $(this).find('option:selected');
    // const sizeValues = selectedOption.val().split('X');
    // if(sizeValues != 'custom'){
    //     const width = parseFloat(sizeValues[0]);
    //     const height = parseFloat(sizeValues[1]);
    //     const unit = $('#size_unit option:selected').val().toLowerCase();
    //     updateCustomCanvasDimensions(width, height, unit);
    // }
  });
  function selectedSize(){
    const selectedOption = $('#select_size').find('option:selected');
    const sizeValues = selectedOption.html().split('X');
    if(sizeValues != 'custom'){
        const width = parseFloat(sizeValues[0]);
        const height = parseFloat(sizeValues[1]);
        const unit = $('#size_unit option:selected').val().toLowerCase();
        updateCustomCanvasDimensions(width, height, unit);
        updateMeasurementDisplay(width, height, unit);

    }else{
        customSizeChange();
    }
  }
//   $('#size_unit').change(function() {
//     console.log('working');
//     if (document.getElementById('custom_size_div').style.display === 'none') {
//         selectedSize();
//       } else {
//         customSizeChange();
//       }
//   });
// updateCustomCanvasDimensions(6, 8, 'ft');
if (document.getElementById('custom_size_div').style.display === 'none') {
    selectedSize();
  } else {
    customSizeChange();
  }
// customSizeChange();
// selectedSize();
$('.applyBtn').on('click', function() {
    customSizeChange();
});
function customSizeChange(){
    var width = $('#custom_width').val();
    var height = $('#custom_height').val();
    // var unit = $('#size_unit').val().toLowerCase(); 
    var unit = ($('#size_unit').val() || 'ft').toLowerCase(); 


    updateCustomCanvasDimensions(width, height, unit);
    updateMeasurementDisplay(width, height, unit);

}
function updateMeasurementDisplay(width, height, unit) {
    var widthBox = $('.measurement-top-box .feetlabel-box');
    var heightBox = $('.measurement-left-box .feetlabel-box');
    
    widthBox.text(width + ' ' + unit);
    heightBox.text(height + ' ' + unit);
}

// zooming code start from here :



$('#zoomSelect').change(function (){
    var percent = $(this).val();
    zoomCanvasScreen(percent);
});
$('#zoomIn').click(function() {
    zoomIn();
    // updateZoomSelect();
});
$('#zoomOut').click(function() {
    zoomOut();
    // updateZoomSelect();
});

function zoomIn() {
    zoom(20);
}

function zoomOut() {
    zoom(-20);
}

function zoomCanvasScreen(percentage) {
    // var selectedValue = percentage !== undefined ? percentage : parseFloat($('#zoomSelect').val());
    var selectedValue = percentage !== undefined ? percentage : 100;

    var mainWidth = 500;
    var mainHeight = 300;

    var width = mainWidth * (selectedValue / 100);
    // var width = (mainWidth * (selectedValue / 100))-50;
    var height = mainHeight * (selectedValue / 100);

    canvasWidthHeightChange(width, height);
}

function canvasWidthHeightChange(width, height) {
    // Get the current (old) dimensions of the canvas
    const oldWidth = canvas.getWidth();
    const oldHeight = canvas.getHeight();

    // Calculate the scale ratios
    const scaleX = width / oldWidth;
    const scaleY = height / oldHeight;

    canvas.getObjects().forEach(function(object) {
        object.set({
            left: object.left * scaleX,
            top: object.top * scaleY,
            scaleX: object.scaleX * scaleX,
            scaleY: object.scaleY * scaleY,
        });

        object.setCoords();
    });

    canvas.setWidth(width);
    canvas.setHeight(height);

    canvas.renderAll();

    if (document.getElementById('custom_size_div').style.display === 'none') {
        selectedSize();
    } else {
        customSizeChange();
    }
}

function zoom(step) {
    var select = $('#zoomSelect');
    var currentZoom = parseInt(select.val());
    var newZoom = currentZoom + step;
    if (newZoom >= 800) {
        newZoom = 800;
        $('#zoomIn').prop('disabled', true);
    } else if (newZoom <= 25) {
        newZoom = 25;
        $('#zoomOut').prop('disabled', true);
    } else {
        $('#zoomOut').prop('disabled', false);
        $('#zoomIn').prop('disabled', false);
    }
    

    $('.newZoomOption').remove();
        select.append(
            $("<option>")
             .addClass("newZoomOption")
             .val(newZoom)
             .text(newZoom + "%")
             .prop("selected", true)
    );

          zoomCanvasScreen(newZoom);    
}






//  zooming code end here : 






  // Check if there is canvas data in the templateData variable
  var templateData = $(".saveTemplate").attr('template-data');
  if (templateData !== undefined) {
      canvas.loadFromJSON(JSON.parse(templateData), function() {
          // Iterate through all objects after loading
          canvas.forEachObject(function(obj) {
              if (obj.stroke === 'clrChangeShape') {
                  obj.set('shapeObjectData', true);
              }
          });
          canvas.renderAll();
      });
      
  } else {
      var text = new fabric.IText('Customize me!', {
          left: 300,
          top: 100,
          fontSize: 30,
          fill: 'white',
      });
      canvas.add(text);
  }
  
    
    canvas.on('text:changed', function(options) {
        textListFromCanvas();
        changeState();

    });

var countObj = 0;
    canvas.on('selection:created', function(options) {
        

        var activeObject = canvas.getActiveObject();
        countObj = 1;
        if(activeObject && activeObject.get('shapeObjectData')){
            $('.acrylc-letter-box').hide();
            $('.color').addClass('changeShapeClr');
            $('#hidden_color_picker').addClass('changeShapeClr');
            $('.color_pickers').show();

        }else if(activeObject.type === 'i-text'){
            // activeObject.set('globalCompositeOperation','destination-over');
        // if (activeObject && activeObject.type === 'i-text') {
            $('.acrylc-letter-box').show();
            $('.color_pickers').hide();
            $('.color').removeClass('changeShapeClr');
            $('#hidden_color_picker').removeClass('changeShapeClr');
            // $('.font-size-container').show();
            updateFontOptions(activeObject);
            updateTextStyleButtons(activeObject);
        } else {
            $('.acrylc-letter-box').hide();
            $('.color_pickers').show();
            $('.color').removeClass('changeShapeClr');
            $('#hidden_color_picker').removeClass('changeShapeClr');
            // $('.font-size-container').hide();
        }
        
        updateOpacitySlider(activeObject);

        changeState();
        canvas.renderAll();
    });

    
    canvas.on('mouse:down', function(options) {
     
        var target = canvas.findTarget(options.e);
        // console.log(target);
        if(target && target.get('shapeObjectData')){
            $('.acrylc-letter-box').hide();
            $('.color').addClass('changeShapeClr');
            $('#hidden_color_picker').addClass('changeShapeClr');

            $('.color_pickers').show();
        }else if (target && target.type === 'i-text') {
            $('.acrylc-letter-box').show();
            $('.color_pickers').hide();
            $('.color').removeClass('changeShapeClr');
            $('#hidden_color_picker').removeClass('changeShapeClr');
            updateFontOptions(target);
            updateTextStyleButtons(target);
           
        } else {
            
            $('.acrylc-letter-box').hide();
            $('.color').removeClass('changeShapeClr');
            $('#hidden_color_picker').removeClass('changeShapeClr');
            // resetTextStyleButtons();
        }
        if(target == null){
          
            $('.common_controls').hide();
        }else{
            updateFontOptions(target);
            $('.common_controls').show();
        }
        changeState();

    });
    canvas.on('selection:cleared', function(options) {
        $('.acrylc-letter-box').hide();
        $('.color_pickers').show();
        changeState();
    });


    canvas.on('mouse:dblclick', function(options) {
        var clickedObject = options.target;
    
        if (clickedObject === canvas.getActiveObject()) {
            canvas.discardActiveObject();
            canvas.renderAll();
    
        }
    });
   
    // const horizontalLine = document.getElementById('horizontalLine');
    // const verticalLine = document.getElementById('verticalLine');
    // canvas.on('mouse:move', function(options) {
    //     // var activeObject = options.target;
    //     // activeObject.set('globalCompositeOperation','destination-over');
    //     $('#horizontalLine').show();
    //     $('#verticalLine').show();
    //     const canvasElement = canvas.lowerCanvasEl;
    //     const rect = canvasElement.getBoundingClientRect();
    //     const x = options.e.clientX - rect.left;
    //     const y = options.e.clientY - rect.top;
    //     const maxX = canvasElement.width;
    //     const maxY = canvasElement.height;
    //     var disWidth = getWidthDistance();
    //     horizontalLine.style.left = `${parseInt(x) + disWidth}px`;
    //     verticalLine.style.top = `${parseInt(y) + 35}px`;
    // });
    
    canvas.on('mouse:out', function(options) {
        $('#horizontalLine').hide();
        $('#verticalLine').hide();
    });
    // canvas.on('mouse:over', function(options) {
    //     $('#horizontalLine').show();
    //     $('#verticalLine').show();
    // });
    
    // object dragging 

    function updateAlignmentLines(activeObject) {
        // First, remove any existing guidelines
        canvas.getObjects('line').forEach((line) => {
            if (line.id === 'guideLine') canvas.remove(line);
        });
    
        let objBounds = activeObject.getBoundingRect();
        let objects = canvas.getObjects().filter(obj => obj !== activeObject && obj.type !== 'line');
    
        objects.forEach((obj) => {
            let bounds = obj.getBoundingRect();
            let margin = 10; // Adjust this value as needed for your layout
    
            // Check for vertical alignment
            if (Math.abs(bounds.left - objBounds.left) < margin) {
                let startY = Math.min(bounds.top, objBounds.top);
                let endY = Math.max(bounds.top + bounds.height, objBounds.top + objBounds.height);
                addLine([bounds.left, startY, bounds.left, endY], 'guideLine');
            }
            if (Math.abs(bounds.left + bounds.width - (objBounds.left + objBounds.width)) < margin) {
                let startY = Math.min(bounds.top, objBounds.top);
                let endY = Math.max(bounds.top + bounds.height, objBounds.top + objBounds.height);
                addLine([bounds.left + bounds.width, startY, bounds.left + bounds.width, endY], 'guideLine');
            }
    
            // Check for horizontal alignment
            if (Math.abs(bounds.top - objBounds.top) < margin) {
                let startX = Math.min(bounds.left, objBounds.left);
                let endX = Math.max(bounds.left + bounds.width, objBounds.left + objBounds.width);
                addLine([startX, bounds.top, endX, bounds.top], 'guideLine');
            }
            if (Math.abs(bounds.top + bounds.height - (objBounds.top + objBounds.height)) < margin) {
                let startX = Math.min(bounds.left, objBounds.left);
                let endX = Math.max(bounds.left + bounds.width, objBounds.left + objBounds.width);
                addLine([startX, bounds.top + bounds.height, endX, bounds.top + bounds.height], 'guideLine');
            }
        });
    
        canvas.renderAll();
    }
    
    // Attach to the object:moving event
    canvas.on('object:moving', function(e) {
        updateAlignmentLines(e.target);
    });
    
    // Optionally, remove guidelines when the object stops moving
    canvas.on('object:modified', function() {
        canvas.getObjects('line').forEach((line) => {
            if (line.id === 'guideLine') canvas.remove(line);
        });
        canvas.renderAll();
    });


    //  Function for make btn disabled
    
    canvas.on('object:added', canvasStateChange);
    canvas.on('object:removed', canvasStateChange);
    function canvasStateChange() {
        var canvasObjects = canvas.getObjects();    
        if (canvasObjects.length === 0) { 
            $('.previewImage').prop('disabled', true); 
            $('.shareImage').prop('disabled', true);

        } else {
            $('.previewImage').prop('disabled', false);
            $('.shareImage').prop('disabled', false);
        }
    }
    canvasStateChange();


    //  Function for make btn disabled end here 


    function addLine(points, id) {
        var line = new fabric.Line(points, {
            stroke: 'white',
            selectable: false,
            id: id
        });
        canvas.add(line);
    }
    

    // object draggign end here 


});
function getWidthDistance(){
var canvasContainer = $(".canvas-container");
var customCanvas = $("#customCanvas");

// console.warn(canvasContainer.width());
var canvasContainerLeft = canvasContainer.offset().left;
var customCanvasLeft = customCanvas.offset().left;
var widthDistance = customCanvasLeft - canvasContainerLeft;
$("#verticalLine").css("left", `${widthDistance - 15}px`);

// console.log(widthDistance);
return widthDistance;
}
// Canvas code end here ::
//  background function start from here :::
// undo redo start here

var undoStack = [];
var redoStack = [];



function captureState() {
    // Save the current state of the canvas as a JSON string
    var canvasState = canvas.toJSON();
    undoStack.push(canvasState);
    redoStack = []; // Clear the redo stack whenever a new action is performed
}

function undo() {
    if (undoStack.length > 0) {
        // Pop the last state from the undo stack and save the current state in the redo stack
        var currentState = undoStack.pop();
        redoStack.push(canvas.toJSON()); // Save current state for redo
        canvas.loadFromJSON(currentState, function() {
            canvas.renderAll();
            // After undo, trigger any additional actions you need, such as updating UI
        });
    }
}

function redo() {
    if (redoStack.length > 0) {
        // Pop the last state from the redo stack and save the current state in the undo stack
        var currentState = redoStack.pop();
        undoStack.push(canvas.toJSON()); // Save current state for undo
        canvas.loadFromJSON(currentState, function() {
            canvas.renderAll();
            // After redo, trigger any additional actions you need, such as updating UI
        });
    }
}

// Define undo and redo stacks

// Attach undo function to undo button click
$('.undoButton').on('click', function() {
    undo();
});

// Attach redo function to redo button click
$('.redoButton').on('click', function() {
    redo();
});

// end of undo and redo

function changeState(){
    captureState();
}

function cngBackgroungColor(color) {
    // Change button background color
    $('.adjustBtnClr').css({ backgroundColor: color });

    // Set the canvas background color
    canvas.backgroundColor = color;

    // Render the canvas to apply the changes
    canvas.renderAll();
}

$('.colorChange').on('click', function () {
    var bgColor = $(this).attr('bgColor');
    if ($('#hidden_color_picker').hasClass('changeShapeClr')) {
        updateActiveObjectColor(bgColor);
    } else {
        cngBackgroungColor(bgColor);
    }
});

function handleColorInput() {
    var color = document.getElementById('hidden_color_picker').value;
    if ($('#hidden_color_picker').hasClass('changeShapeClr')) {
        updateActiveObjectColor(color);
    } else {
        cngBackgroungColor(color);
    }
}

document.querySelectorAll('#background_color_picker, #trigger_color_picker').forEach(function (button) {
    button.addEventListener('click', function () {
        document.getElementById('hidden_color_picker').click();
    });
});

document.getElementById('hidden_color_picker').addEventListener('input', handleColorInput);

function setBackground(imageSrc) {
    if (imageSrc) {
        // Remove existing background image
        canvas.getObjects().forEach(function (obj) {
            if (obj.stroke === 'imageBgStroke') {
                canvas.remove(obj);
            }
        });

        // Load and set the new background image
        fabric.Image.fromURL(imageSrc, function (img) {
            // Get the scale to fit the image within the canvas
            var scale = Math.min(
                canvas.width / img.width,
                canvas.height / img.height
            );

            // Set the image size and position
            img.set({
                scaleX: scale,
                scaleY: scale,
                left: (canvas.width / 2) - ((img.width * scale) / 2),
                top: (canvas.height / 2) - ((img.height * scale) / 2),
                originX: 'left',
                originY: 'top',
                selectable: true, // Make the background image selectable
                hasControls: true, // Enable controls for resizing
                hasBorders: true,
                stroke: 'imageBgStroke',
            });

            // Add the image to the canvas and send it to the back
            canvas.add(img);
            canvas.sendToBack(img);
            canvas.renderAll();
        });
    } else {
        console.error("Invalid image source:", imageSrc);
    }
}



//  Background function end here ::

$('.addnewtextBtn').on('click', function() {
    // Create a new text area
    var newTextArea = $(
        `<div class="form-group">
        <textarea class="form-control textbox" name="" placeholder="Enter Text Here" >Sample Text</textarea>
        </div>`
    );
    $('.text_box-wrap').append(newTextArea);

    // Create a new text object in the canvas
    var newTextObject = new fabric.IText('Sample Text', {
        left: 100,
        top: 100,
        fontSize: 20,
        fill: 'white',
    });
    canvas.add(newTextObject);

    newTextArea.on('input', function() {
        newTextObject.set('text', $(this).val());

        canvas.setActiveObject(newTextObject);
        canvas.renderAll();
    });
    var colorDivs = document.querySelectorAll('.color');

    colorDivs.forEach(function(colorDiv) {
        colorDiv.addEventListener('click', function() {
            var bgColor = colorDiv.getAttribute('bgColor');
            canvas.setBackgroundColor(bgColor, canvas.renderAll.bind(canvas));
        });
    });
});

$('.textList, .addnewtextBtn').on('click', function () {
    textListFromCanvas();
});

function textListFromCanvas(){
    $('.text_box-wrap').empty();
    var lastActiveObject = canvas.getActiveObject();

    canvas.forEachObject(function(obj, index) {
        if (obj.type === 'i-text') {
            var textArea = $(
                '<textarea class="form-control my-2 text-input textbox" placeholder="Enter text..."></textarea>'
            );
            textArea.val(obj.text); 

            textArea.on('input', function() {
                obj.set('text', $(this).val());
                canvas.setActiveObject(obj);

                canvas.renderAll();
            });
            $('.text_box-wrap').append(textArea);
        }
    });

    if (lastActiveObject) {
        canvas.setActiveObject(lastActiveObject);
    }
}


function updateFontOptions(activeObject) {
    updateFontSizeOptions(activeObject.get('fontSize'));
    updateFontFamilyOptions(activeObject.get('fontFamily'));
    setColorValue(activeObject.get('fill'));
    updateOpacitySlider(activeObject);
    commonControls();
    setrangeValues(); // this is use for update Line Height Letter Spacing range slider 
}
function updateFontSizeOptions(fontSize) {
    $('.font-size').val(fontSize);
}
function updateFontFamilyOptions(fontFamily) {
    $('.font-family').val(fontFamily);
}

$('.font-size').on('input', function() {
    var fontSize = parseInt($(this).val());
    updateSelectedTextObject('fontSize', fontSize);
});
$('.font-family').on('change', function() {
    var fontFamily = $(this).val();
    updateSelectedTextObject('fontFamily', fontFamily);
});

function updateSelectedTextObject(property, value) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set(property, value);
        canvas.renderAll();
    }
}


function updateSelectedTextObject(property, value) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set(property, value);
        canvas.requestRenderAll(); // Use requestRenderAll instead of renderAll for better performance
    }
}


$('.bold-btn').on('click', function() {
    toggleTextStyle('bold');
});
$('.italic-btn').on('click', function() {
    toggleTextStyle('italic');
});

$('.underline-btn').on('click', function() {
    toggleTextStyle('underline');
});

// Alignment buttons click events
$('.align-left-btn').on('click', function() {
    setAlignment('left');
});

$('.align-center-btn').on('click', function() {
    setAlignment('center');
});

$('.align-right-btn').on('click', function() {
    setAlignment('right');
});
$('.btncopy').on('click', function() {
    copySelected();
});
$('.btncut').on('click', function() {
    cutSelected();
});
$('.btnpaste').on('click', function() {
    paste();
}); 
$('.btndelete').on('click', function() {
    deleteSelected();
    refreshFunctions();
}); 
$('.btnrotate').on('click', function() {
    rotate();
}); 
$('.clearAllCanvasData').on('click', function() {
    clearCanvas();
    refreshFunctions();
    undoStack = [];
    redoStack = [];
    copiedObjects = [];
    $('.changeShapeClr').removeClass('changeShapeClr');
    
}); 
$('.flipVertical').on('click', function(){
    flipVertical();
});
$('.flipHorizontal').on('click', function(){
    flipHorizontal();
});
$('.setBackground').on('click', function() {
    var imageSrc = $(this).attr('data-background');
    setBackground(imageSrc);
});
$('.loadSelectedTemplate').on('click', function() {
    var templateData = $(this).data('template-data');
    var decodedTemplateData = templateData === "null" ? null : JSON.parse(templateData || "{}");
    loadTemplateData(decodedTemplateData);
});


$('.cngLetterSpace').on('input', function() {
    var charSpacingValue = parseInt($(this).val(), 10);
    changeLetterSpacing(charSpacingValue);
});

function changeLetterSpacing(charSpacingValue) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set('charSpacing', charSpacingValue);
        canvas.renderAll();
    }
}


$('.cngLetterHeight').on('input', function() {
    var lineSpacingValue = parseInt($(this).val(), 10);
    changeHeightSpacing(lineSpacingValue);
});
function setrangeValues() {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        var charSpacing = activeObject.get('charSpacing');
        var lineHeight = activeObject.get('lineHeight');
        var backgroundColor = activeObject.get('backgroundColor');
        var borderColor = activeObject.get('stroke');
        
        $('.cngLetterSpace').val(charSpacing);
        $('.cngLetterHeight').val(lineHeight);
        $('.highlightBg').val(backgroundColor);
        $('.borderColor').val(borderColor);
    }
}

function changeHeightSpacing(lineSpacingValue) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set('lineHeight', lineSpacingValue);
        canvas.renderAll();
    }
}

$('.highlightBg').on('input', function() {
    var highlightColor = $(this).val();
    changeHighlightColor(highlightColor);
});
$('.borderColor').on('input', function() {
    var borderClr = $(this).val();
    changeBorderColor(borderClr);
});


$('.cngBorderRadious').on('input', function() {
    var borderRadius = $(this).val();
    console.warn(borderRadius);
    changeBorderWidth(borderRadius);
});

function changeBorderWidth(width) {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        if (activeObject.type === 'i-text') {
            activeObject.set({ strokeWidth: width });
            canvas.renderAll();
        }
    }
}


function changeBorderColor(color) {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        if (activeObject.type === 'i-text') {
            // Check if the object is an iText object
            activeObject.set({ stroke: color });
            canvas.renderAll();
        }
    }
}


function changeHighlightColor(color) {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        if (activeObject.type === 'i-text') {
            // Check if the object is an iText object
            activeObject.set({ backgroundColor: color });
            canvas.renderAll();
        }
    }
}



function loadTemplateData(templateData){
    if (templateData && Object.keys(templateData).length > 0) {
        canvas.loadFromJSON(templateData, function() {
            canvas.renderAll();
        });
    } else {
        canvas.clear();
        console.log('No template data available. Canvas has been cleared.');
    }
}
// function loadTemplateData(templateData){
//     if (templateData && Object.keys(templateData).length > 0) {
//         canvas.loadFromJSON(templateData, function() {
//             // After loading, adjust object sizes and positions to fit the current canvas dimensions
//             adjustCanvasObjectsToFit(canvas);
//             canvas.renderAll();
//         });
//     } else {
//         canvas.clear();
//         console.log('No template data available. Canvas has been cleared.');
//     }
// }

function adjustCanvasObjectsToFit(canvas) {
    const canvasWidth = canvas.getWidth();
    const canvasHeight = canvas.getHeight();

    let minX = Infinity;
    let minY = Infinity;
    let maxX = -Infinity;
    let maxY = -Infinity;

    // Find the minimum and maximum coordinates of all objects
    canvas.getObjects().forEach(obj => {
        obj.setCoords(); // Update the coordinates of the object
        const objBoundingBox = obj.getBoundingRect();
        minX = Math.min(minX, objBoundingBox.left);
        minY = Math.min(minY, objBoundingBox.top);
        maxX = Math.max(maxX, objBoundingBox.left + objBoundingBox.width);
        maxY = Math.max(maxY, objBoundingBox.top + objBoundingBox.height);
    });

    // Calculate scale factors based on the difference in object positions
    const scaleX = canvasWidth / (maxX - minX);
    const scaleY = canvasHeight / (maxY - minY);
    const uniformScaleFactor = Math.min(scaleX, scaleY); // Use the smaller scale factor to maintain aspect ratio

    // Calculate translation factors to center the content
    const translateX = (canvasWidth - (maxX - minX) * uniformScaleFactor) / 2 - minX * uniformScaleFactor;
    const translateY = (canvasHeight - (maxY - minY) * uniformScaleFactor) / 2 - minY * uniformScaleFactor;

    // Apply uniform scaling and translation to each object
    canvas.getObjects().forEach(object => {
        object.set({
            left: (object.left - minX) * uniformScaleFactor + translateX,
            top: (object.top - minY) * uniformScaleFactor + translateY,
            scaleX: object.scaleX * uniformScaleFactor,
            scaleY: object.scaleY * uniformScaleFactor,
        });
        object.setCoords(); // Update the coordinates of the object
    });

    canvas.renderAll();
}



function refreshFunctions(){
    textListFromCanvas();
    populateLayersList();
}
function setAlignment(align) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set('textAlign', align);
        canvas.renderAll();
        updateTextStyleButtons(activeObject);
    }
}
function toggleTextStyle(style) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        var currentStyle;

        if (style === 'bold') {
            currentStyle = activeObject.get('fontWeight') === 'bold';
            activeObject.set('fontWeight', currentStyle ? 'normal' : 'bold');
        } else if (style === 'italic') {
            currentStyle = activeObject.get('fontStyle') === 'italic';
            activeObject.set('fontStyle', currentStyle ? 'normal' : 'italic');
        } else if (style === 'underline') {
            currentStyle = activeObject.get('underline') === true;
            activeObject.set('underline', currentStyle ? false : true);

            activeObject.setCoords();
        }

        canvas.renderAll();
        updateTextStyleButtons(activeObject);
    }
}

function updateTextStyleButtons(activeObject) {
    var styles = {
        fontWeight: activeObject.get('fontWeight'),
        fontStyle: activeObject.get('fontStyle'),
        textDecoration: activeObject.get('underline'),
        textAlign: activeObject.get('textAlign')
    };

    $('.bold-btn').toggleClass('pik-text', styles.fontWeight === 'bold');
    $('.italic-btn').toggleClass('pik-text', styles.fontStyle === 'italic');

    // Check if 'underline' is part of the textDecoration property
    $('.underline-btn').toggleClass('pik-text', styles.textDecoration === true);

    var textAlign = styles.textAlign;
    $('.align-left-btn').toggleClass('pik-text', textAlign === 'left');
    $('.align-center-btn').toggleClass('pik-text', textAlign === 'center');
    $('.align-right-btn').toggleClass('pik-text', textAlign === 'right');
}

// color change 
$('.colorCng').on('input', function() {
    var newColor = $(this).val();
    updateActiveObjectColor(newColor);
});
function updateActiveObjectColor(newColor) {
    $('.adjustBtnClr').css({ backgroundColor: newColor });
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        if (activeObject.type === 'group') { 
            activeObject.getObjects().forEach(function(path) {
                if (path.type === 'path') { 
                    path.set({ fill: newColor }); 
                }
            });
        } else {
            activeObject.set('fill', newColor);
        }
        canvas.renderAll();
    }
}


function setColorValue(color) {
    if(color ==  'rgb(0,0,0)'){
        return false;
    }
    if(color == 'white'){
        color = '#e7e4e4';
    }
    $('.colorCngCoustam').val(color);
    updateActiveObjectColor(color);
}


var copiedObjects = []; 

function copySelected() {
    var activeObjects = canvas.getActiveObjects();

    if (activeObjects && activeObjects.length > 0) {
        copiedObjects = [];

        activeObjects.forEach(function(object) {
            // Clone the object and add it to the copiedObjects array
            copiedObjects.push(fabric.util.object.clone(object));
        });
    }
}
function paste() {
    if (copiedObjects && copiedObjects.length > 0) {
        // Offset to prevent pasted objects from overlapping with original objects
        var offsetX = 10;
        var offsetY = 10;

        copiedObjects.forEach(function(originalObject) {
            // Use the clone method to create a deep clone of the object
            originalObject.clone(function(clonedObject) {
                // Adjust the position of the cloned object
                clonedObject.set({
                    left: clonedObject.left + offsetX,
                    top: clonedObject.top + offsetY,
                });

                // If the cloned object is a group, make sure to add it properly
                if (clonedObject.type === 'activeSelection') {
                    // Active selection needs to be added as individual objects
                    clonedObject.canvas = canvas;
                    clonedObject.forEachObject(function(obj) {
                        canvas.add(obj);
                    });
                    // This line is necessary to render the new objects on the canvas
                    clonedObject.setCoords();
                } else {
                    canvas.add(clonedObject);
                }
                //  use this for convert copy object to chnage able color object 
                if (clonedObject.stroke === 'clrChangeShape') {
                    clonedObject.set('shapeObjectData', true);
                }
                canvas.renderAll();
            }, ['sourcePath', 'filters']); // Include any properties that require deep cloning
        });

        // Apply an incremental offset for each object pasted
        offsetX += 10;
        offsetY += 10;
    }
}

function cutSelected() {
    // Call the copySelected function to copy the selected objects
    copySelected();
    
    // Remove the selected objects from the canvas
    var activeObjects = canvas.getActiveObjects();
    canvas.remove.apply(canvas, activeObjects);
    canvas.discardActiveObject();
    canvas.renderAll();
}

function deleteSelected() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        canvas.remove(activeObject);
        canvas.discardActiveObject();
        canvas.renderAll();
    }
}


function rotate() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        var center = activeObject.getCenterPoint(); 
        var currentAngle = activeObject.angle; 

        var newAngle = (currentAngle === 180) ? 360 : 180;
        
        activeObject.set({
            angle: newAngle,
            originX: 'center', 
            originY: 'center',
        });

        $('#rotation').val(newAngle);
        activeObject.setPositionByOrigin(center, 'center', 'center');

        canvas.renderAll();
    } else {
        console.log("No active object selected.");
    }
}


$('#opacity_slider').on('input change', function() {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        var opacityValue = $(this).val() / 100;
        
        // Set the opacity of the active object
        activeObject.set({
            opacity: opacityValue
        });

        // Re-render the canvas to display changes
        canvas.renderAll();
    } else {
        console.log("No active object selected for opacity change.");
    }
});

function updateOpacitySlider(activeObject) {
    if (activeObject) {
        var opacity = activeObject.opacity * 100; // Convert to percentage
        $('#opacity_slider').val(opacity);
    }
}


function clearCanvas() {
    canvas.clear();
    canvas.renderAll();
}


$('.selectTemp').on('click', function() {
    var svgIMGShape = $(this).attr('shapeData');
    var from = $(this).attr('data-from');
    loadShape(svgIMGShape,from);
});
function loadShape(img,from) {
    var svgIMGShape = img;
    var from = from;
    fabric.loadSVGFromURL(svgIMGShape, function(objects, options) {
        var svgObject = fabric.util.groupSVGElements(objects, options);

        // Set a specific size for the SVG object
        var desiredWidth = 200; // Set your desired width
        var scaleFactor = desiredWidth / svgObject.width;
        svgObject.set({
            scaleX: scaleFactor,
            scaleY: scaleFactor,
        });

        // Center the loaded and resized SVG object on the canvas
        svgObject.set({
            left: canvas.width / 2 - svgObject.width / 2 * scaleFactor,
            top: canvas.height / 2 - svgObject.height / 2 * scaleFactor,
            selectable: true, 
            hasControls: true, 
            hasBorders: true, 
        });

        // Add custom property to identify shape objects
        if(from == 'shapes'){
        svgObject.set('shapeObjectData', true);
        svgObject.set('stroke', "clrChangeShape");
            // change color of svg to white :: 
            if (svgObject.type === 'group') { 
                svgObject.getObjects().forEach(function(path) {
                    if (path.type === 'path') { 
                        path.set({ fill: "white" }); 
                    }
                });
            } else {
                svgObject.set('fill', "white");
            }
            // chnage clr end here
        }
        canvas.add(svgObject);
        canvas.setActiveObject(svgObject);
        canvas.renderAll();
    });
}


$('body').on('click', '.uploadedImage', function() {
    var imaegPath = $(this).attr('shapeData');
    addImage(imaegPath, 200, 200);

});
function addImage(imagePath, width, height) {
    var img = new Image();
    img.src = imagePath;
    img.onload = function() {
        var fabricImg = new fabric.Image(img, {
            left: 100,
            top: 100,
            scaleX: width / img.naturalWidth,
            scaleY: height / img.naturalHeight,
        });
        canvas.add(fabricImg);
    };
}


function commonControls() {
    var activeObject = canvas.getActiveObject();
    // for rotate val.
    if (activeObject) {
        var currentAngle = activeObject.angle !== undefined ? activeObject.angle : 0;
        $('#rotation').val(currentAngle);
    } else {
        console.log("No active object found.");
    }
}


function flipVertical() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        activeObject.set({
            flipY: !activeObject.flipY
        });
        canvas.renderAll();
    }
}

function flipHorizontal() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        activeObject.set({
            flipX: !activeObject.flipX
        });
        canvas.renderAll();
    }
}

// Align top edge of active object with top edge of canvas
$('.alignment-bttn').on('click', function () {
    var funName = $(this).attr('fun-for');
    if (typeof window[funName] === 'function') {
        window[funName](); // Call the function using its name
    } else {
        console.error('Function not found:', funName);
    }
});

function alignTopEdge() {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        activeObject.set({
            top: 0  // Align with top edge of canvas
        });
        canvas.renderAll();
    }
}

// Align bottom edge of active object with bottom edge of canvas
function alignBottomEdge() {
    var activeObject = canvas.getActiveObject();
    var canvasHeight = canvas.getHeight();
    if (activeObject) {
        activeObject.set({
            top: canvasHeight - activeObject.height  // Align with bottom edge of canvas
        });
        canvas.renderAll();
    }
}

// Align vertical center of active object with center of canvas
function alignVerticalCenter() {
    var activeObject = canvas.getActiveObject();
    var canvasHeight = canvas.getHeight();
    if (activeObject) {
        activeObject.set({
            top: (canvasHeight - activeObject.height) / 2  // Align vertically centered
        });
        canvas.renderAll();
    }
}

// Align left edge of active object with left edge of canvas
function alignLeftEdge() {
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        activeObject.set({
            left: 0  // Align with left edge of canvas
        });
        canvas.renderAll();
    }
}

// Align right edge of active object with right edge of canvas
function alignRightEdge() {
    var activeObject = canvas.getActiveObject();
    var canvasWidth = canvas.getWidth();
    if (activeObject) {
        activeObject.set({
            left: canvasWidth - activeObject.width  // Align with right edge of canvas
        });
        canvas.renderAll();
    }
}

// Align horizontal center of active object with center of canvas
function alignHorizontalCenter() {
    var activeObject = canvas.getActiveObject();
    var canvasWidth = canvas.getWidth();
    if (activeObject) {
        activeObject.set({
            left: (canvasWidth - activeObject.width) / 2  // Align horizontally centered
        });
        canvas.renderAll();
    }
}




$('.bringForward').on('click', function (){
    bringForward();
    refreshFunctions();
});
$('.sendBackward').on('click', function (){
    sendBackward();
    refreshFunctions();
});

function bringForward() {
    var activeObjects = canvas.getActiveObjects();
    if (activeObjects && activeObjects.length > 0) {
        activeObjects.reverse().forEach(function(object) {
            canvas.bringForward(object);
        });
        canvas.discardActiveObject(); // Deselect the active object
        canvas.renderAll();
    }
}
function sendBackward() {
    var activeObjects = canvas.getActiveObjects();
    if (activeObjects && activeObjects.length > 0) {
        activeObjects.forEach(function(object) {
            canvas.sendBackwards(object);
        });
        canvas.discardActiveObject(); // Deselect the active object
        canvas.renderAll();
    }
}



// Layers code ::
function populateLayersList() {
    var layersList = document.getElementById('sortable');
    layersList.innerHTML = ''; // Clear existing layers

    canvas.getObjects().forEach(function(object, index) {
        var layerElement = document.createElement('li');
        layerElement.className = 'layer';
        layerElement.setAttribute('data-layer', index);
        layerElement.setAttribute('order-number', index);
        layerElement.draggable = true; // Disable draggable behavior

        var contentType = object.type === 'i-text' ? object.text : 'Image Layer';
        var iconHTML = '';
        var url = window.location.origin;

        if (object.type === 'i-text') {
            var imageSrc = url + '/coustomizer/img/design-tool.png';
            // Use default image icon or text if image not available
            iconHTML = '<span class="layer-icon-box"><img src="' + imageSrc + '" alt=""></span>';
        } else {
            // Use image thumbnail if available
            var thumbnailURL = object.toDataURL({ format: 'png', multiplier: 0.4 });
            iconHTML = '<span class="layer-icon-box"><img src="' + thumbnailURL + '" alt=""></span>';
        }

        var lockIcon = object.selectable ? 'fas fa-lock-open' : 'fas fa-lock';
        var viewIcon = object.visible ? 'fas fa-eye' : 'fas fa-eye-slash'; // Fixed icon classes
        layerElement.innerHTML = `
            <button class="view-object-btn" title="View"><i class="${viewIcon}"></i></button>
            ${iconHTML}
            <span class="layer-text-box selectable-layer">${contentType}</span>
            <span class="unlock-layer"><i class="${lockIcon}"></i></span>
            <span class="layer-dragg-box"></span>
        `;

        layerElement.querySelector('.unlock-layer').addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent click event from bubbling up to parent layers
            object.selectable = !object.selectable; // Toggle lock/unlock 
            var lockIconElement = layerElement.querySelector('.unlock-layer i');
            lockIconElement.className = object.selectable ? 'fas fa-lock-open' : 'fas fa-lock'; // Update lock icon
            canvas.discardActiveObject();
        });

        layerElement.querySelector('.view-object-btn').addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent click event from bubbling up to parent layers
            object.visible = !object.visible; // Toggle visibility
            var viewIconElement = layerElement.querySelector('.view-object-btn i');
            viewIconElement.className = object.visible ? 'far fa-eye' : 'far fa-eye-slash'; // Update view icon
            canvas.renderAll(); // Redraw canvas
        });

        layerElement.querySelector('.layer-text-box').addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent click event from bubbling up to parent layers
            canvas.discardActiveObject();
            if (object.selectable) {
                canvas.setActiveObject(object);
            } else {
                canvas.setActiveObject(object);
                canvas.discardActiveObject();
            }
        });

        layersList.appendChild(layerElement);
    });
}

$('li').on('ondrop', function (){
console.log('dragging working..');
});




$(document).ready(function() {
    $('.layersButton').on('click', function() {
        populateLayersList();
    });
});













// Normal js functionality for show and hide things 

$('#v-pills-messages-tab').on('click', function() {
    if ($('.acrylc-letter-box').is(':visible')) {
        $('.acrylc-letter-box').hide();
        $('.color_pickers').show();
    }else{
        $('.color_pickers').show();
    }
});



$(document).ready(function() {
    $('.mainRadiusBox').hide();
    $('#makeArc').change(function() {
        if ($(this).is(':checked')) {
            $('.mainRadiusBox').slideDown();
        } else {
            $('.mainRadiusBox').slideUp();
        }
    });
});




$('#uploadButton').on('click', function() {
    $('#imageUpload').click();
});





// show and hide filter for template section from where we can load template data :
$(document).ready(function(){
    $('.templatesName').hide();
    $('.templateCng').on('change', function (){
        var selectedOption = $(this).find('option:selected');
        var forAttr = selectedOption.data('for');
        var templateName = selectedOption.data('show');
        if(forAttr == 'data-showCat'){
            $('.templatesName').hide(); 
            $('.'+templateName).show(); 
        }else if (forAttr == 'all'){
            var allShow = $('.temMain').find('option:selected').attr('data-templateShow');
            $('.loadSelectedTemplate[data-showCat="' + allShow + '"]').show();

            return false;
        }
        if(templateName === 'all'){
            $('.templatesName').hide();
            $('.temOption').val('all').change();

            $('.loadSelectedTemplate').show();
        }else{
        var templateData = selectedOption.attr('data-templateShow');
            $('.loadSelectedTemplate').hide();
            $('.loadSelectedTemplate['+forAttr+'="'+templateData+'"]').show();
        }
 
       
    });

});
// Download canvas Into png image functionality ::
$(document).ready(function(){
    $("#select-option").find("option").each(function() {
        $(".font-family").css("font-family", '"' + this.value + '"');
    });

    
    $('.downloadCanvasToPng').on('click', function() {
        var canvas = document.getElementById('customCanvas');
        var canvasData = canvas.toDataURL('image/png');
        var a = document.createElement('a');
        a.href = canvasData;
        a.download = 'canvas_image.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    });
});





