@extends('front_layout.master')
@section('content')

<style>
    .dropzone {
    border: 2px dashed #ccc;
    border-radius: 4px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    min-height: 295px;
}

.dropzone p {
    margin: 0;
    font-size: 16px;
    color: #333;
}

.dropzone.dragover {
    border-color: #000;
    background-color: #f0f0f0;
}

/* img {
    max-width: 50%;
} */

.msgTextArea i {
    font-size: 60px;
    margin-bottom: 15px;
}

div#dropzone {
    display: flex;
    justify-content: center;
    align-items: center;
}


/* button.btn.light_dark.submit-btn {
    background-color: rgb(97 65 245) !important;
    width: 100% !IMPORTANT;
    text-align: center;
    margin: auto;
    justify-content: center !important;
    max-width: fit-content;
} */


</style>
<section class="brad_inner">
    <div class="container">
        <div class="">
            <nav class="breadcrumb_wreap" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                {!! Breadcrumbs::render('artwork-upload-form') !!}
                </ol>
            </nav>
        </div>
    </div>
</section>


<section class="inquiry_sec p_100">
    <div class="container">
        <div class="inquiry_content">
            <div class="hd-text">
                <h2>Artwork Upload Form</h2>
            </div>
            <div class="inquiry-form">
                <div class="form_rw d-flex align-items-start">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h5>File Uploader</h5>
                                    <form action="{{ url('/artwork-send-process') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Full Name*</label>
                                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name') }}" />
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email Address*</label>
                                                    <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{ old('email') }}" />
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control form-control-lg" id="phone" value="{{ old('phone') }}" />
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="orderplace">Where did you place the order?*</label>
                                                    <select class="form-control form-control-lg" name="orderplace" id="orderplace">
                                                        <option value="ebay">Ebay</option>
                                                        <option value="etsy">Etsy</option>
                                                        <option value="website">Website</option>
                                                    </select>
                                                    @error('orderplace')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="orderNumber">Order Number If Any</label>
                                                    <textarea class="form-control" rows="2" cols="30" id="orderNumber" name="orderNumber">{{ old('orderNumber') }}</textarea>
                                                    @error('orderNumber')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="file">Upload Files (optional)</label>
                                                    <div id="dropzone" class="dropzone">
                                                        <div class="msgTextArea">
                                                            <span><i class="fa-solid fa-cloud-arrow-up"></i></span>
                                                            <p>Choose Files or drag them here</p>
                                                            <p>Files should be less than or equal to 2.00MB each</p>
                                                        </div>
                                                        <div class="fileIMgArea">
                                                            <input type="file" id="files" name="files[]" multiple />
                                                        </div>
                                                    </div>
                                                    <div id="fileList" style="margin-top: 20px;"></div>
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn light_dark submit-btn">SEND</button>
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                <div class="file-upload-info">
                                    <h5>Sending Big Files:</h5>
                                    <p>If sending files bigger than 2MB</p>
                                    <ul class="QueryContactInfo">
                                        <li>Send your files by email to: <a href="mailto:artwork@cre8iveprinter.co.uk">artwork@cre8iveprinter.co.uk</a></li>
                                        <li>Send via using this link: <a href="https://cre8iveprinter.wetransfer.com" target="_blank">Wetransfer.com</a></li>
                                    </ul>
                                    <h5>For Printing only</h5>
                                    <p>Upload Print Ready file</p>
                                    <h5>For Design & Printing</h5>
                                    <p>Simply provide the following and leave the rest to us:</p>
                                    <ul>
                                        <li>Your logo – vector preferable (i.e Ai, EPS, PDF, PNG etc)</li>
                                        <li>Text information to be placed (typed out, not scanned image)</li>
                                        <li>Your layout style and preferred color, if any</li>
                                        <li>Images you want on the design, if any</li>
                                        <li>Contact details: phone, email, address, social media etc.</li>
                                    </ul>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="get_in_sec contact-us-container">
    <div class="container">
        <div class="get-in-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="get-lft-info">
                        <h1>Get in Touch!</h1>
                        <div class="get-lnks">
                            <p>
                                <span>
                                    <img src="{{ asset('front/img/ml.png') }}" class="img-fluid" alt="Email Icon">
                                </span>
                                <a href="mailto:{{ $homeContent->email ?? 'contact@cre8iveprinter.com' }}">
                                    {{ $homeContent->email ?? 'contact@cre8iveprinter.com' }}
                                </a>
                            </p>
                            <p>
                                <span>
                                    <img src="{{ asset('front/img/lct.png') }}" class="img-fluid" alt="Location Icon">
                                </span>
                                <a href="https://www.google.com/maps?q={{ urlencode($homeContent->address ?? '8975 W Charleston Blvd. Suite 190 Las Vegas, NV 89117') }}" target="_blank">
                                    {{ $homeContent->address ?? '8975 W Charleston Blvd. Suite 190 Las Vegas, NV 89117' }}<br>
                                </a>
                            </p>
                            <p>
                                <span>
                                    <img src="{{ asset('front/img/tel.png') }}" class="img-fluid" alt="Phone Icon">
                                </span>
                                <a href="tel:{{ $homeContent->phone ?? '01234567890' }}">
                                    {{ $homeContent->phone ?? '0 123 4567 890' }}
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="get-lft-loct">
                        <div class="googleMap">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2372.8083665369168!2d-2.45079072325852!3d53.507618572336476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487ba84650c1e79f%3A0x1770d5f1ff195bf0!2sHen%20Fold%20Rd%2C%20Tyldesley%2C%20Manchester%2C%20UK!5e0!3m2!1sen!2sin!4v1721045933042!5m2!1sen!2sin; width=&quot;600&quot; height=&quot;450&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; loading=&quot;lazy&quot; referrerpolicy=&quot;no-referrer-when-downgrade" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="100%" height="400"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<section class="best_price bst_pr p_100 pb-0">
    <div class="container">
        <div class="ways_hd">
            <ul class="shipping">
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_4.svg')}}" alt="" />
                        <div class="text">
                            <p>Best Price</p>
                            <span>Cre8ive Printer offers the industry’s best prices while using only the highest</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_5.svg')}}" alt="" />
                        <div class="text">
                            <p>Free Design Proof</p>
                            <span>Our industry-leading designers provide free proofs so you can be sure</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="ship-box">
                        <img src="{{ asset('front/img/ways_6.svg')}}" alt="" />
                        <div class="text">
                            <p>Best Quality</p>
                            <span>If you’re not satisfied, we’re not satisfied. We’ll reprint or refund your order - guaranteed</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.submit-btn').on('click', function(e){
            let name = $('#fname').val();
            console.log(name);

        });
    });
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    var dropzone = document.getElementById('dropzone');
    var fileInput = document.getElementById('files');
    var fileList = document.getElementById('fileList');

    var validExtensions = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
    var maxFileSize = 2 * 1024 * 1024; // 2 MB
    var maxFiles = 10; // Maximum number of files allowed
    var filesArray = []; // Array to track files

    dropzone.addEventListener('click', function () {
        fileInput.click();
    });

    dropzone.addEventListener('dragover', function (event) {
        event.preventDefault();
        event.stopPropagation();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function (event) {
        event.preventDefault();
        event.stopPropagation();
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function (event) {
        event.preventDefault();
        event.stopPropagation();
        dropzone.classList.remove('dragover');
        handleFiles(event.dataTransfer.files);
    });

    fileInput.addEventListener('change', function () {
        handleFiles(fileInput.files);
    });

    function handleFiles(files) {
        // Check the total number of files before processing
        if (filesArray.length + files.length > maxFiles) {
            iziToast.destroy();
            iziToast.error({
                message: `You can only upload up to ${maxFiles} files.`,
                position: 'topRight'
            });
            return; // Exit the function if file limit is exceeded
        }

        Array.from(files).forEach(file => {
            // if (validExtensions.includes(file.type) && file.size <= maxFileSize) {
            if (file.size <= maxFileSize) {
                if (!filesArray.some(f => f.name === file.name)) {
                    filesArray.push(file);

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var fileItem = document.createElement('div');
                        fileItem.className = 'file-item';
                        fileItem.dataset.fileName = file.name; // Store file name for later removal
                        
                        // Convert file size from bytes to a more readable format
                        var fileSize = (file.size / 1024).toFixed(2) + ' KB';

                        fileItem.innerHTML = `
                            <i class="fa-solid fa-file"></i>
                            <div class="filesDataWrap">
                            <span class="file-name">${file.name}</span> 
                            <span class="file-size">(${fileSize})</span>
                            <button type="button" class="remove-btn"><i class="fa-solid fa-x"></i></button>
                            </div>
                        `;
                        fileList.appendChild(fileItem);
                        
                        // Add event listener to the newly created remove button
                        fileItem.querySelector('.remove-btn').addEventListener('click', function () {
                            removeFile(file.name);
                        });
                    };
                    reader.readAsDataURL(file);
                }
            } else {
                iziToast.destroy();
                iziToast.error({
                    message: 'File size too large. Please upload an image file under 2 MB.',
                    // message: 'Invalid file type or file size too large. Please upload an image file (JPEG, PNG, GIF, SVG) under 2 MB.',
                    position: 'topRight'
                });
                fileInput.value = ''; // Clear the input
            }
        });
    }

    function removeFile(fileName) {
        // Remove from filesArray
        filesArray = filesArray.filter(file => file.name !== fileName);

        // Remove from UI
        var fileItems = Array.from(fileList.getElementsByClassName('file-item'));
        fileItems.forEach(item => {
            if (item.dataset.fileName === fileName) {
                fileList.removeChild(item);
            }
        });

        // Clear input if all files are removed
        if (filesArray.length === 0) {
            fileInput.value = ''; // Clear the input
        }
    }
});



</script>
@endsection