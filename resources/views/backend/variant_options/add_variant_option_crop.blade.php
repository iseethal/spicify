@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

<link href="{{asset('assets/css/cropper.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/js/cropper.js')}}"></script>

<style>

.image_area {
  position: relative;
}

img {
    display: block;
    max-width: 100%;
}

.preview {
    overflow: hidden;
    width: 160px; 
    height: 160px;
    margin: 10px;
    border: 1px solid red;
}

.modal-lg{
    max-width: 1000px !important;
}

.overlay {
  position: absolute;
  bottom: 10px;
  left: 0;
  right: 0;
  background-color: rgba(255, 255, 255, 0.5);
  overflow: hidden;
  height: 0;
  transition: .5s ease;
  width: 100%;
}

.image_area:hover .overlay {
  height: 50%;
  cursor: pointer;
}
</style>


<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Add /Edit Product</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('variant_options.all')}}"> Variant Options</a></li>
                <li class="breadcrumb-item active" aria-current="page" >Add New</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('variant_options.store') }}"  method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="">

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Category</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select  class="form-control select2" name="category_id" id="category_id" >
                                <option label="Choose one"></option>

                                @foreach ($categories as $category)
                                    <option value={{$category->id}}> {{ $category->category_name }}</option>
                                @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Product </label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name" id="name" placeholder="Enter product name" type="text" required>
                            </div>
                        </div>
                        
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Description</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            </div>
                        </div>                    

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Image</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <!-- class="dropify" data-height="200"  -->
                                <input type="file" name="image" id="image" accept=".jpg, .png, image/jpeg, image/png" required />
                                <img id='blog_image_preview'  style="height:200px;width:auto;" >
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Support Images</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image1" id="support_image1" class="dropify"  data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image2" id="support_image2" class="dropify"  data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image3" id="support_image3" class="dropify"  data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image4" id="support_image4" class="dropify"  data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                            </div>

                        </div>

                        <div class="row row-xs align-items-center mg-b-20" style="display: none;">
                            <div class="col-md-4">
                                <label class="mg-b-0">Enquiry</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input  type="radio" id="enquiry" name="enquiry" value="1" > <span>Enquire Now</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                <input  type="radio" id="enquiry" name="enquiry" value="0" checked> <span>Add To Cart</span>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="is_active" id="is_active" required>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <input type="checkbox" id="is_featured" name="is_featured"  value="1" ><span class="tx-13"> &nbsp;&nbsp; <b>Featured</b></span>
                            </div>
                        </div><br>

                        <!-- ADD MULTIPLE ROW -->
                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Amount</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <button class="btn ripple btn-success" type="button" onclick="addRow()">Add Row</button>
                                <input  type="hidden" id="row_cnt" name="row_cnt" value="1">
                            </div>
                        </div>
                        <div class="row row-xs align-items-center mg-b-20">                           
                            <div class="col-md-4"><label class="mg-b-0"></label></div>                            
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0" id="myTable"></table>
                            </div>
                        </div>
                        <br><br>
                        <!-- ENDS -->

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color: #006677;">Submit</button>
                                <!-- <button class="btn ripple btn-secondary pd-x-30">Cancel</button> -->
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- MODEL -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                            <!-- loaded image -->
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                            <!-- preview = preview of image(right) in modal -->
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>  
    <!-- MODEL ENDS -->

</div>
</div>
</div>
<!-- End Main Content-->
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!-- Internal Fileuploads js-->
<script src="{{asset('backend/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{asset('backend/assets/plugins/fileuploads/js/file-upload.js')}}"></script>

@include('backend.templates.footer')

<script>
function addRow() {

    let rowcnt   = document.getElementById("row_cnt").value;
    let row_cnt  = Number(rowcnt);

    var table = document.getElementById("myTable");
    var row   = table.insertRow(table.rows.length);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    cell1.innerHTML = "<input class='form-control' name='qty_name_"+row_cnt+"' id='qty_name_"+row_cnt+"' placeholder='Enter Quantity name' type='text'>";
    cell2.innerHTML = "<input class='form-control' name='amount_"+row_cnt+"' id='amount_"+row_cnt+"' placeholder='Enter amount' type='text'>";
    cell3.innerHTML = '<button onclick="deleteRow(this)" class="btn ripple btn-danger">Delete</button>';

    let cnt         = 1;
    let new_cnt     = row_cnt + cnt;
    document.getElementById("row_cnt").value = new_cnt;
}

function deleteRow(button) {
    var row     = button.parentNode.parentNode;
    var table   = row.parentNode;
    table.deleteRow(row.rowIndex);
}
</script>

<!-- <script type="text/javascript">
    
    var $modal = $('#modal');
    var image = document.getElementById('sample_image');
    var cropper;
    $('#image').change(function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            $modal.modal('show');
        };

        //if below ifcondition is true ie user has selected image
        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });
    
    // cropperJs
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1.9,
            viewMode: 2,
            imageSmoothingQuality: 'high',
            preview:'.preview'
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });
    
    //crop button
    $('#crop').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:1020,
            height:686
        });
        //toBlop api will compress the image
        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                $modal.modal('hide');
                $('#blog_image_preview').attr('src', base64data);

                let fileInputElement = document.getElementById('image');
                let container = new DataTransfer();
                let file = new File([blob], "g"+0+".jpg",{type:"image/jpeg", lastModified:new Date().getTime()});
                container.items.add(file);
                fileInputElement.files = container.files;
                
            };
        });
    });
      $('#cancel').click(function(){
        $modal.modal('hide');
        document.getElementById('blog_image_preview').removeAttribute('src');
        document.getElementById('image').value = '';
    });

</script> -->