@extends('front_layout/index')
@section('content')
<style>
/* Add your custom styles here */
body {
    font-family: Poppins, sans-serif;
    font-size: 18px;
    line-height: 20px;
    color: #333f53;
    font-weight: 500;
    background-color: #f7f9fc;
}

.sidebar {
    background-color: #f8f9fa;
    min-height: 100vh;
}

.list-group-item:hover {
    cursor: pointer;
}

li.list-item {
    border: 1px solid;
    padding: 5px;
    list-style: none;
    cursor: pointer;
}

.active {
    background-color: red;
}
</style>
<div class="mainWarp" style="height: 10rem !important;">
    <div class="container editTool" style="height: 8rem;">
        <!-- <button onclick="saveTemplate()">Save</button> -->
        <div class=" row d-flex " style="justify-content: space-around;">
            <div class=" d-flex">
                <ul class="d-flex">
                    <li class="list-item mr-2 undo" id="undoButton" title="Undo" data-toggle="tooltip"><i
                            class="fa-solid fa-rotate-left"></i></li>
                    <li class="list-item mr-2 redo" id="redoButton" title="Redo" data-toggle="tooltip"><i
                            class="fa-solid fa-rotate-right"></i></li>
                    <li class="list-item mr-2 copy" onclick="copySelected()" title="copy" data-toggle="tooltip"><i
                            class="fa-solid fa-copy"></i></li>
                    <li class="list-item mr-2 cut" onclick="cutSelected()" title="cut" data-toggle="tooltip"><i
                            class="fa-solid fa-scissors"></i></li>
                    <li class="list-item mr-2 paste" onclick="paste()" title="paste" data-toggle="tooltip"><i
                            class="fa-solid fa-paste"></i></li>
                    <li class="list-item mr-2 delete" onclick="deleteSelected()" deleteSelectedtitle="delete"
                        data-toggle="tooltip"><i class="fa-solid fa-x"></i>
                    </li>
                    <li class="list-item mr-2 rotate" onclick="rotate()" title="rotate" data-toggle="tooltip"><i
                            class="fa-solid fa-rotate"></i></li>
                    <li class="list-item mr-2 rotate" onclick="flipHorizontal()" title="Flip Horizontal"
                        data-toggle="tooltip"><i class="fa-solid fa-arrows-left-right"></i></li>
                    <li class="list-item mr-2 rotate" onclick="flipVertical()" title="Flip Vertical"
                        data-toggle="tooltip">
                        <i class="fa-solid fa-arrows-up-down"></i>
                    </li>
                    <!-- Add these HTML elements to your existing code -->
                    <li class="list-item mr-2 rotate" onclick="bringForward()" title="Forward" data-toggle="tooltip"><i
                            class="fa-solid fa-arrow-up"></i></li>
                    <li class="list-item mr-2 rotate" onclick="sendBackward()" title="Backward" data-toggle="tooltip"><i
                            class="fa-solid fa-arrow-down"></i></li>

                </ul>
            </div>
        </div>
        <div class="row d-flex" style="justify-content: center;">
            <div class="font-size-container">
                <div class="d-flex">
                    <div class="">
                        <label for="font-family">Font:</label>
                        <select class="form-control" id="font-family">
                            <option value="Arial">Arial</option>
                            <option value="Courier New">Courier New</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Times New Roman">Times New Roman</option>
                            <option value="monospace">Monospace</option>
                            <option value="system-ui">System-ui</option>
                            <option value="'circular'">Circular</option>
                            <option value="emoji">emoji</option>
                            <option value="math">math</option>
                            <option value="Eurostile LT Std">Eurostile LT Std;</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="font-size">Size:</label>
                        <input type="number" class="form-control" id="font-size" value="24">
                    </div>
                    <div class="form-group">
                        <button id="bold-btn"><i class="fa-solid fa-bold"></i></button>
                    </div>
                    <div class="form-group">
                        <button id="italic-btn"><i class="fa-solid fa-italic"></i></button>
                    </div>
                    <div class="form-group">
                        <button id="underline-btn"><i class="fa-solid fa-underline"></i></button>
                    </div>
                    <div class="form-group">
                        <button id="align-left-btn"><i class="fa-solid fa-align-left"></i></button>
                    </div>
                    <div class="form-group">
                        <button id="align-center-btn"><i class="fa-solid fa-align-center"></i></button>
                    </div>
                    <div class="form-group">
                        <button id="align-right-btn"><i class="fa-solid fa-align-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="changeColor row" style="display: flex; justify-content: center;">
            <!-- <div class="color mr-2" style="background: none; cursor:pointer;" bgColor="none">None</div> -->
            <div class="colorCng mr-2" style="background: red; cursor:pointer;" bgColor="red"></div>
            <div class="colorCng mr-2" style="background: black; cursor:pointer;" bgColor="black"></div>
            <div class="colorCng mr-2" style="background: green; cursor:pointer;" bgColor="green"></div>
            <div class="colorCng mr-2" style="background: yellow; cursor:pointer;" bgColor="yellow"></div>
            <div class="colorCng mr-2" style="background: white; cursor:pointer;" bgColor="white"></div>
            <div class="colorCng mr-2" style="background: blue; cursor:pointer;" bgColor="blue"></div>
            <div class="colorCng mr-2" style="background: lightblue; cursor:pointer;" bgColor="lightblue"></div>
            <div class="colorCng mr-2" style="background: pink; cursor:pointer;" bgColor="pink"></div>
            <div class="colorCngCoustam colorCng mr-2" style="background: ; cursor: pointer;" bgColor=""><b><i
                        style="margin-top: 6px; margin-left: 5px;" class="fa-solid fa-plus"></i></b></div>
        </div>


        <!-- <div class="backgroundColorRow row" style="display: flex; justify-content: center;">
            <div class="color mr-2" style="background: rgba(0, 0, 0, 0); cursor:pointer;" bgColor="rgba(0, 0, 0, 0)">None</div>
            <div class="color mr-2" style="background: red; cursor:pointer;" bgColor="red">Red</div>
            <div class="color mr-2" style="background: black; cursor:pointer;" bgColor="black">Black</div>
            <div class="color mr-2" style="background: green; cursor:pointer;" bgColor="green">Green</div>
            <div class="color mr-2" style="background: yellow; cursor:pointer;" bgColor="yellow">Yellow</div>
            <div class="color mr-2" style="background: white; cursor:pointer;" bgColor="white">White</div>
        </div> -->
    </div>
</div>
<div class="container-fluid mt-5">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-lg-1 sidebar">
            <!-- Sidebar content goes here -->
            <ul class="list-group">
                <li class="list-group-item">Template</li>
                <li class="textList list-group-item">Text</li>
                <li class="list-group-item">Background</li>
                <li class="list-group-item">Shape</li>
                <li class="list-group-item">ClipArt</li>
                <li class="list-group-item">Uploads</li>
                <li class="list-group-item" id="layersButton">Layers</li>

            </ul>
        </div>

        <!-- Main Content -->
        <div class="col-lg-9 main-content">
            <!-- Canvas Container -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Display related content based on the selected option -->
                        <div id="template-content" style="display: none;">
                            <div class="row">
                                @foreach($templates as $temp)

                                <div class="loadSelectedTemplate  col-lg-6 my-2" style="cursor:pointer;"
                                    data-template-data="{{ json_encode($temp->templateData) }}">
                                    <img src="{{ asset('TemplateImage')}}/{{ $temp->template_image ?? 'template.png' }}" alt=""
                                        style="width:100%;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="text-content" style="display: none;">
                            <button id="add-text" class="btn btn-block btn-dark">Add New Text</button>
                            <div class="" id="text-areas">
                                <textarea id="form-control text-input" placeholder="Enter text..."></textarea>
                            </div>
                        </div>
                        <div id="background-content" style="display: none;">
                            <div class="backgroundColorRow row" style="display: flex; justify-content: center;">
                                <div class="color mr-2" style="background: rgba(0, 0, 0, 0); cursor:pointer;"
                                    bgColor="rgba(0, 0, 0, 0)"></div>
                                <div class="color mr-2" style="background: red; cursor:pointer;" bgColor="red"></div>
                                <div class="color mr-2" style="background: black; cursor:pointer;" bgColor="black">
                                </div>
                                <div class="color mr-2" style="background: green; cursor:pointer;" bgColor="green">
                                </div>
                                <div class="color mr-2" style="background: yellow; cursor:pointer;" bgColor="yellow">
                                </div>
                                <!-- <div class="color mr-2" style="background: white; cursor:pointer;" bgColor="white"></div> -->
                                <div class="color mr-2" style="background: blue; cursor:pointer;" bgColor="blue"></div>
                                <div class="color mr-2" style="background: lightblue; cursor:pointer;"
                                    bgColor="lightblue"></div>
                                <div class="colorCngBG color mr-2" style="background: ; cursor: pointer;" bgColor="">
                                    <b><i style="margin-top: 6px; margin-left: 5px;" class="fa-solid fa-plus"></i></b>
                                </div>
                            </div>
                            <div class="row" id="backgroundsContainer">
                                @foreach($backgrounds as $bg)
                                @if ($bg->image)
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer;"
                                    onclick="setBackground('{{ asset('BannerImage')}}/{{ $bg->image }}')">
                                    <img src="{{ asset('BannerImage')}}/{{ $bg->image }}" alt="" style="width:100%;">
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div id="shape-content" style="display: none;">
                            <div class="row">
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ShapeImage')}}/rect.svg">
                                    <img src="{{ asset('ShapeImage/PNG')}}/rec.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ShapeImage')}}/circel.svg">
                                    <img src="{{ asset('ShapeImage/PNG')}}/circel.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ShapeImage')}}/heart.svg">
                                    <img src="{{ asset('ShapeImage/PNG')}}/heart.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ShapeImage')}}/flower.svg">
                                    <img src="{{ asset('ShapeImage/PNG')}}/flower.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ShapeImage')}}/hallowin.svg">
                                    <img src="{{ asset('ShapeImage/PNG')}}/hallowin.png " alt="" style="width:100%;">
                                </div>
                            </div>
                        </div>
                        <div id="clipart-content" style="display: none;">
                            <div class="row">
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ClipArtImage')}}/art1.svg">
                                    <img src="{{ asset('ClipArtImage/PNG')}}/art1.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ClipArtImage')}}/art2.svg">
                                    <img src="{{ asset('ClipArtImage/PNG')}}/art2.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ClipArtImage')}}/art3.svg">
                                    <img src="{{ asset('ClipArtImage/PNG')}}/art3.png " alt="" style="width:100%;">
                                </div>
                                <div class="selectTemp col-lg-6 my-2" style="cursor:pointer; overflow:hidden;"
                                    shapeData="{{ asset('ClipArtImage')}}/art4.svg">
                                    <img src="{{ asset('ClipArtImage/PNG')}}/art4.png " alt="" style="width:100%;">
                                </div>
                            </div>
                        </div>
                        <div id="layers-content" style="display: none;">
                            <div class="row" id="layersList">
                                <!-- Your canvas layers will be displayed here -->
                            </div>
                        </div>

                        <div id="uploads-content" style="display: none;">
                            <div class="row">
                                <input type="file" id="imageUpload" accept="image/*">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Canvas or Image Section -->
                        <div class="canvas-container">
                            <div class="" style="border: 1px solid;width: 52rem;padding: 1rem;">
                                <canvas id="customCanvas" width="800" height="560"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function() {
    $('.changeColor').hide();
    $('.editTool').hide();
    // Attach click event listener to elements with class 'shape'
    $('.shape').on('click', function() {
        // Access the shapeData attribute to get the shape URL
        var shapeData = $(this).attr('data');

        // Log the shape URL (you can perform other actions here)
        // console.log('Shape clicked:', shapeData);
    });
});
document.addEventListener("DOMContentLoaded", function() {
    $('.font-size-container').hide();
    canvas = new fabric.Canvas('customCanvas');
    var canvasData = {!! json_encode($templateData->templateData ?? '') !!};
    if (canvasData) {
        try {
            canvas.loadFromJSON(canvasData, function() {
                canvas.renderAll();
            });
        } catch (error) {
            console.error('Error loading canvas data:', error);
        }
    } else {
        console.error('Canvas data is empty or not provided.');
    }

    // var text = new fabric.IText('Customize me!', {
    //     left: 300,
    //     top: 50,
    //     fontSize: 30,
    //     fill: 'black',
    // });
    // canvas.add(text);


    canvas.on('object:added', function() {
        if (!isRedoing) {
            h = [];
        }
        isRedoing = false;
    });

    var isRedoing = false;
    var h = [];

    function undo() {
        if (canvas._objects.length > 0) {
            h.push(canvas._objects.pop());
            canvas.renderAll();
        }
    }

    function redo() {

        if (h.length > 0) {
            isRedoing = true;
            canvas.add(h.pop());
        }
    }
    // Attach undoCanvas function to undo button click
    $('#undoButton').on('click', function() {
        undo();
    });

    // Attach redoCanvas function to redo button click
    $('#redoButton').on('click', function() {
        redo();
    });

    canvas.on('object:modified', function(options) {
        // Ensure that the modified object is part of the selection
        if (options.target === canvas.getActiveObject()) {}
    });


    canvas.on('text:changed', function(options) {
        if ($('#text-content').css('display') !== 'none') {
            $('.textList').click();
        }
    });
    canvas.on('text:changed', function(options) {
        if ($('#text-content').css('display') !== 'none') {
            $('.textList').click();
        }
    });

    canvas.on('selection:created', function(options) {
        var activeObject = canvas.getActiveObject();
        // console.log(activeObject);
        // console.log(activeObject.type);
        // if(activeObject.type == 'image'){
        //     activeObject.set('globalCompositeOperation', 'source-in');
        // }else{
        //     activeObject.set('globalCompositeOperation', 'source-over');   
        // }
        $('.changeColor').show();
        $('.editTool').show();
        // Set a higher zIndex to bring an object to the front
        // activeObject.set('zIndex', -999);

        // Set globalCompositeOperation to ensure the selected object is rendered above others
        // activeObject.set('globalCompositeOperation', 'lighter');

        if (activeObject && activeObject.type === 'i-text') {
            $('.font-size-container').show();
            updateFontOptions(activeObject);
            updateTextStyleButtons(activeObject);
        } else {
            $('.font-size-container').hide();
        }

        canvas.renderAll(); // Render the canvas to apply changes
    });

    canvas.on('mouse:dblclick', function(options) {
        var clickedObject = options.target;

        // Check if the clicked object is the active object
        if (clickedObject === canvas.getActiveObject()) {
            canvas.discardActiveObject();
            canvas.renderAll();
            // Check if the active object is the background image
            // if (clickedObject && clickedObject.type === 'image' && clickedObject._element.src === currentBgImageSrc) {
            //     // Deselect the object
            //     console.log(clickedObject);

            // }
        }
    });

    canvas.on('selection:cleared', function(options) {
        $('.font-size-container').hide();
        $('.changeColor').hide();
        $('.editTool').hide();
        resetTextStyleButtons();
    });

    // Use mouse:down event to handle the case when a new object is clicked directly
    canvas.on('mouse:down', function(options) {
        var target = canvas.findTarget(options.e);
        if (target && target.type === 'i-text') {
            $('.font-size-container').show();
            updateFontOptions(target);
            updateTextStyleButtons(target);
        } else {
            $('.font-size-container').hide();
            resetTextStyleButtons();
        }
    });

// Function to populate the layers list
function populateLayersList() {
    var layersList = document.getElementById('layersList');
    layersList.innerHTML = ''; // Clear existing layers

    // Loop through canvas objects to create layers
    canvas.getObjects().forEach(function(object, index) {
        var layerElement = document.createElement('div');
        layerElement.className = 'layer';
        layerElement.setAttribute('data-layer', index);
        layerElement.draggable = true;

        // Determine the content type of the layer
        var contentType = object.type === 'i-text' ? object.text : 'Image Layer';

        // Determine the icon to display based on content type
        var iconHTML = '';
        console.log(object.data);
        console.warn(object.type);
        if (object.type === 'i-text') {
            // If it's text, use a default image icon
            iconHTML = '<span class="layer-icon-box"><i class="fas fa-image"></i></span>';
        } else if (object.type === 'image' && !object.fromSVG) {
            // If it's a non-SVG image, create a PNG thumbnail
            var thumbnailURL = object.toDataURL({ format: 'png', multiplier: 0.4 });
            iconHTML = '<span class="layer-icon-box"><img src="' + thumbnailURL + '" alt=""></span>';
        } else if (object.type === 'image' && object.fromSVG) {
            // If it's an SVG image, create a PNG thumbnail
            var thumbnailURL = object.toDataURL({ format: 'png', multiplier: 0.4 });
            iconHTML = '<span class="layer-icon-box"><img src="' + thumbnailURL + '" alt=""></span>';
        } else if (object.fromSVG) {
            console.log(object);
            // If it's an SVG image, use an img tag to display it
            var svgURL = object.toDataURL({ format: 'svg' });
            iconHTML = '<span class="layer-icon-box"><img src="' + svgURL + '" alt="SVG Image"></span>';
        }else{
            iconHTML = '<span class="layer-icon-box"><i class="fas fa-image"></i></span>';
        }

        var lockIcon = object.selectable ? 'fas fa-lock-open' : 'fas fa-lock';
        layerElement.innerHTML = `
            ${iconHTML}
            <span class="layer-text-box">${contentType}</span>
            <span class="layer-icon"><i class="${lockIcon}"></i></span>
        `;

        // Attach click event for locking/unlocking the layer
        layerElement.addEventListener('click', function() {
            object.selectable = !object.selectable; // Toggle lock/unlock
            populateLayersList(); // Refresh layers list
            canvas.discardActiveObject();
        });

        layersList.appendChild(layerElement);
    });
}



    // Attach click event to the "Layers" button
    document.getElementById('layersButton').addEventListener('click', function() {
        // Populate the layers list when the button is clicked
        populateLayersList();
        // Display the layers content
        document.getElementById('layers-content').style.display = 'block';
    });

    // Refresh layers list when canvas objects are modified
    canvas.on('object:added', populateLayersList);
    canvas.on('object:removed', populateLayersList);


    // Rest of your existing code...
    // Assuming you have an active object on canvas
    // Function to update canvas active object color
    function updateActiveObjectColor(newColor) {
        var activeObject = canvas.getActiveObject();
        if (activeObject) {
            if (activeObject.type === 'image') {
                activeObject.setElement(newColor);
            } else {
                activeObject.set('fill', newColor);
            }
            canvas.renderAll();
        }
    }

    // Event handler for your custom color buttons
    $('.colorCng').on('click', function() {
        var newColor = $(this).attr('bgColor');
        updateActiveObjectColor(newColor);
    });

    // Initialize Spectrum on the custom color picker input
    $('.colorCngCoustam').spectrum({
        showPalette: true,
        preferredFormat: "hex",
        hideAfterPaletteSelect: true,
        change: function(color) {
            var selectedColor = color.toHexString();
            $('.colorCngCoustam').css('background', selectedColor).attr('bgColor', selectedColor);
            updateActiveObjectColor(selectedColor);
        }
    });


    // Font size change event
    $('#font-size').on('input', function() {
        var fontSize = parseInt($(this).val());
        updateSelectedTextObject('fontSize', fontSize);
    });
    $('#font-family').on('change', function() {
        var fontFamily = $(this).val();
        updateSelectedTextObject('fontFamily', fontFamily);
    });
    $('#bold-btn').on('click', function() {
        toggleTextStyle('bold');
    });

    // Italic button click event
    $('#italic-btn').on('click', function() {
        toggleTextStyle('italic');
    });

    // Underline button click event
    $('#underline-btn').on('click', function() {
        toggleTextStyle('underline');
    });

    // Alignment buttons click events
    $('#align-left-btn').on('click', function() {
        setAlignment('left');
    });

    $('#align-center-btn').on('click', function() {
        setAlignment('center');
    });

    $('#align-right-btn').on('click', function() {
        setAlignment('right');
    });
    // Other font properties change events can be similarly implemented

});
// Add these JavaScript functions to your existing script
function bringForward() {
    // console.log('bringForward working');
    var activeObjects = canvas.getActiveObjects();
    // console.log('Active Objects:', activeObjects);
    if (activeObjects && activeObjects.length > 0) {
        activeObjects.reverse().forEach(function(object) {
            canvas.bringForward(object);
        });
        canvas.discardActiveObject(); // Deselect the active object
        canvas.renderAll();
    }
}

function sendBackward() {
    // console.log('sendBackward working');
    var activeObjects = canvas.getActiveObjects();
    // console.log('Active Objects:', activeObjects);
    if (activeObjects && activeObjects.length > 0) {
        activeObjects.forEach(function(object) {
            canvas.sendBackwards(object);
        });
        canvas.discardActiveObject(); // Deselect the active object
        canvas.renderAll();
    }
}



function updateTextStyleButtons(activeObject) {
    var styles = {
        fontWeight: activeObject.get('fontWeight'),
        fontStyle: activeObject.get('fontStyle'),
        textDecoration: activeObject.get('underline'),
        textAlign: activeObject.get('textAlign')
    };

    $('#bold-btn').toggleClass('active', styles.fontWeight === 'bold');
    $('#italic-btn').toggleClass('active', styles.fontStyle === 'italic');

    // Check if 'underline' is part of the textDecoration property
    $('#underline-btn').toggleClass('active', styles.textDecoration === true);

    var textAlign = styles.textAlign;
    $('#align-left-btn').toggleClass('active', textAlign === 'left');
    $('#align-center-btn').toggleClass('active', textAlign === 'center');
    $('#align-right-btn').toggleClass('active', textAlign === 'right');
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

            // Explicitly set coordinates to update the rendering
            activeObject.setCoords();
        }

        canvas.renderAll();
        updateTextStyleButtons(activeObject);
    }
}





function resetTextStyleButtons() {
    $('#bold-btn, #italic-btn, #underline-btn, #align-left-btn, #align-center-btn, #align-right-btn').removeClass(
        'active');
}


function setAlignment(align) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set('textAlign', align);
        canvas.renderAll();
        updateTextStyleButtons(activeObject);
    }
}

function updateFontSizeOptions(fontSize) {
    $('#font-size').val(fontSize);
}

// Function to update the selected text object's font properties on the canvas
function updateSelectedTextObject(property, value) {
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'i-text') {
        activeObject.set(property, value);
        canvas.renderAll();
    }
}

function updateFontOptions(activeObject) {
    // Update font size
    updateFontSizeOptions(activeObject.get('fontSize'));

    // Update font family
    updateFontFamilyOptions(activeObject.get('fontFamily'));
}

function updateFontFamilyOptions(fontFamily) {
    // Update the font-family options as needed
    $('#font-family').val(fontFamily);
}


$('.textList').on('click', function() {
    $('#text-areas').empty();

    // Variable to store the last active object
    var lastActiveObject = canvas.getActiveObject();

    // Iterate through all text objects on the canvas
    canvas.forEachObject(function(obj, index) {
        if (obj.type === 'i-text') {
            // console.log(obj.text);
            // Create a new text area for each text object
            var textArea = $(
                '<textarea class="form-control my-2 text-input" placeholder="Enter text..."></textarea>'
            );
            textArea.val(obj.text); // Set the text area content

            // Add an input event listener to update the text object on canvas
            textArea.on('input', function() {
                obj.set('text', $(this).val());

                // Manually set the active object to the updated text object
                canvas.setActiveObject(obj);

                // Render the canvas
                canvas.renderAll();
            });

            // Append the text area to the container
            $('#text-areas').append(textArea);
        }
    });

    // Restore the last active object (if any)
    if (lastActiveObject) {
        canvas.setActiveObject(lastActiveObject);
    }
});

$('#add-text').on('click', function() {
    // Create a new text area
    var newTextArea = $(
        '<textarea class="form-control my-2 text-input" placeholder="Enter text...">Sample Text</textarea>'
    );
    $('#text-areas').append(newTextArea);

    // Create a new text object in the canvas
    var newTextObject = new fabric.IText('Sample Text', {
        left: 100,
        top: 100,
        fontSize: 30,
        fill: 'black',
    });
    canvas.add(newTextObject);

    // Set up an input event listener to update the text object on canvas
    newTextArea.on('input', function() {
        newTextObject.set('text', $(this).val());

        // Manually set the active object to the updated text object
        canvas.setActiveObject(newTextObject);

        // Render the canvas
        canvas.renderAll();
    });
    var colorDivs = document.querySelectorAll('.color');

    colorDivs.forEach(function(colorDiv) {
        colorDiv.addEventListener('click', function() {
            var bgColor = colorDiv.getAttribute('bgColor');
            // Set the background color of the canvas using Fabric.js method
            canvas.setBackgroundColor(bgColor, canvas.renderAll.bind(canvas));
        });
    });
});

// Assume 'canvas' is your Fabric.js canvas instance
$('.selectTemp').on('click', function() {
    var svgIMGShape = $(this).attr('shapeData');

    // Load SVG from URL
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
            selectable: true, // Make it selectable
            hasControls: true, // Show controls (handles)
            hasBorders: true, // Show borders
        });

        // Add the SVG object to the canvas
        canvas.add(svgObject);

        // Make the added object selected
        canvas.setActiveObject(svgObject);
    });
});


var copiedObjects = []; // Array to store copied objects

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

function cutSelected() {
    // Call the copySelected function to copy the selected objects
    copySelected();

    // Remove the selected objects from the canvas
    var activeObjects = canvas.getActiveObjects();
    canvas.remove.apply(canvas, activeObjects);
    canvas.discardActiveObject();
    canvas.renderAll();
}

function paste() {
    if (copiedObjects && copiedObjects.length > 0) {
        // Offset to prevent pasted objects from overlapping with original objects
        var offsetX = 10;
        var offsetY = 10;

        copiedObjects.forEach(function(object) {
            var clonedObject = fabric.util.object.clone(object);

            // Adjust the position of the cloned object
            clonedObject.set({
                left: clonedObject.left + offsetX,
                top: clonedObject.top + offsetY,
            });

            canvas.add(clonedObject);
        });

        canvas.renderAll();
    }
}

function rotate() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        var center = activeObject.getCenterPoint(); // Get the center point of the object
        var currentAngle = activeObject.angle; // Get the current angle

        // Toggle between rotating 180° and 360°
        activeObject.set({
            angle: (currentAngle === 180) ? 360 : 180,
            originX: 'center', // Set the origin to the center
            originY: 'center', // Set the origin to the center
        });

        // Set the position to keep the center at the same position
        activeObject.setPositionByOrigin(center, 'center', 'center');

        canvas.renderAll();
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
// Declare a variable to store the current background image URL
var currentBgImageSrc = null;

function setBackground(imageSrc) {
    // Check if imageSrc is not null or empty
    if (imageSrc) {
        // Check if there's a current background image and remove it
        if (currentBgImageSrc) {
            var existingBgImage = canvas.getObjects().find(function(obj) {
                return obj.type === 'image' && obj._element && obj._element.src === currentBgImageSrc;
            });

            if (existingBgImage) {
                canvas.remove(existingBgImage);
            }
        }

        // Store the new background image URL
        currentBgImageSrc = imageSrc;

        // Create a fabric.Image object for the background
        fabric.Image.fromURL(imageSrc, function(img) {
            // Calculate the aspect ratio of the image
            var aspectRatio = img.width / img.height;

            // Set the width and height of the image to cover the full canvas
            var imgWidth = canvas.width;
            var imgHeight = canvas.width / aspectRatio;

            // Set canvas width and height
            canvas.setDimensions({
                width: imgWidth,
                height: imgHeight
            }, {
                backstoreOnly: false
            });

            // Set the object-fit style to "contain" or "cover"
            var objectFitStyle = aspectRatio > 1 ? 'contain' : 'cover';

            // Apply styles to the image
            img.set({
                left: 0,
                top: 0,
                width: imgWidth,
                height: imgHeight,
                selectable: true, // Make it not selectable (for background)
                hasControls: true,
                hasBorders: false,
                objectFit: objectFitStyle,
                globalCompositeOperation: 'destination-over'
            });

            // Add the background image to the canvas
            canvas.backgroundColor = 'rgba(0, 0, 0, 0)';
            canvas.add(img);
            canvas.sendToBack(img); // Send the background to the back
            canvas.renderAll();
        });
    } else {
        console.error("Invalid image source:", imageSrc);
    }
}
// Initialize Spectrum on the custom color picker input

function updateBgColor(color) {
    canvas.backgroundColor = color;
    canvas.renderAll();
}

$('.color').on('click', function() {
    var color = $(this).attr('bgColor');
    updateBgColor(color);
})
$('.colorCngBG').spectrum({
    showPalette: true,
    preferredFormat: "hex",
    hideAfterPaletteSelect: true,
    change: function(color) {
        var selectedColor = color.toHexString();
        $('.colorCngBG').css('background', selectedColor).attr('bgColor', selectedColor);
        updateBgColor(selectedColor);
    }
});

$('.loadSelectedTemplate').on('click', function() {
    var templateData = $(this).data('template-data');
    if (templateData == null || templateData == '') {
        // Clear all canvas data
        canvas.clear();
    }
    if (templateData !== undefined) {
        // Load the template data into the canvas
        canvas.loadFromJSON(JSON.parse(templateData), function() {
            canvas.renderAll();
            // alert('Template loaded successfully!');
        });
    } else {
        console.log('Please select a template.');
    }
});

function deleteSelected() {
    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        canvas.remove(activeObject);
        canvas.discardActiveObject();
        canvas.renderAll();
    }
}


function saveTemplate() {
    // Prompt the user for a template name
    // var templateName = prompt("Enter a name for the template:");

    // if (templateName !== null) {
    // Serialize the canvas and prepare data
    var canvasData = JSON.stringify(canvas.toJSON());
    // console.log(canvasData);
    // Send an Ajax request to save the template
    //     $.ajax({
    //         type: 'POST',
    //         url: '/saveTemplate',
    //         data: {
    //             _token: "{{ csrf_token() }}",
    //             templateName: templateName,
    //             templateData: canvasData
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             alert('Template saved successfully!');
    //         },
    //         error: function(error) {
    //             console.error('Error saving template:', error);
    //         }
    //     });
    // } else {
    //     alert('Template saving canceled.');
    // }
}
document.getElementById('imageUpload').addEventListener('change', function(e) {
    var file = e.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var img = new Image();
            img.src = event.target.result;
            img.onload = function() {
                var fabricImg = new fabric.Image(img, {
                    left: 100,
                    top: 400,
                    scaleX: 0.5,
                    scaleY: 0.5
                });
                canvas.add(fabricImg);
            };
        };
        reader.readAsDataURL(file);
    }
});
</script>

<script>
// Add your custom JavaScript here
// Use jQuery to show/hide content based on selected option
$(document).ready(function() {
    $('.backgroundColorRow').hide();
    $('.list-group-item').click(function() {
        // Hide all content sections
        $('.col-lg-4 > div').hide();

        // Show content based on selected option
        var selectedOption = $(this).text().toLowerCase();
        if (selectedOption == 'background') {
            $('.backgroundColorRow').show();
        } else {
            $('.backgroundColorRow').hide();
        }
        // console.log(selectedOption);
        $('#' + selectedOption + '-content').show();
    });
});
</script>

@endsection