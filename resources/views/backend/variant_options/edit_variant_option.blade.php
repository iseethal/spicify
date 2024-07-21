@include('backend.templates.header')

<!-- InternalFileupload css-->
<link href="{{asset('backend/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

<!-- Main Content-->
<div class="main-content side-content pt-0">
<div class="container-fluid">
<div class="inner-body">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5"> Products</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('variant_options.all')}}"> Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Products</li>
            </ol>
        </div>

    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">

        <div class="col-lg-12 col-md-12">
            <div class="card custom-card">
                <div class="card-body">

                    <form action="{{ route('variant_options.update', [ 'id'=> $variant_options->id ]) }}"  method="POST" enctype="multipart/form-data">

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
                                        <option value={{$category->id}} @if($variant_options->category_id==$category->id) selected @endif> {{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Product Name</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name" id="name" type="text"  value="{{$variant_options->name}}" required>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Description</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10" required>{{$variant_options->description}}</textarea>
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Image</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                                <input type="file" name="image" id="image" value="{{$variant_options->image}}" class="dropify" data-default-file="{{ asset('backend/images/product_images/'.$variant_options->image) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0"> Support Images</label>
                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image1" id="support_image1" class="dropify" data-default-file="{{ asset('backend/images/product_images/'.$variant_options->support_image1) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image2" id="support_image2" class="dropify" data-default-file="{{ asset('backend/images/product_images/'.$variant_options->support_image2) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />

                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image3" id="support_image3" class="dropify" data-default-file="{{ asset('backend/images/product_images/'.$variant_options->support_image3) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                            </div>
                            <div class="col-sm-2">
                                <input type="file" name="support_image4" id="support_image4" class="dropify" data-default-file="{{ asset('backend/images/product_images/'.$variant_options->support_image4) }}" data-height="200" accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" />
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-4">
                                <label class="mg-b-0">Status</label>
                            </div>
                            <div class="col-md-8 mg-t-5 mg-md-t-0">
                            <select class="form-control select select2" name="is_active" id="is_active" required>
                                <option value="1"  @if($variant_options->is_active =='1') selected='selected' @endif>Active</option>
                                <option value="0" @if($variant_options->is_active =='0') selected='selected' @endif>InActive</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-4">
                                <label class="mg-b-0">Is Featured</label>
                            </div>
                            <div class="col-md-8 pl-md-2">
                                <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ $variant_options->is_featured == 1 ? 'checked': '' }} >
                                <span class="tx-13"> &nbsp;&nbsp; <b>Featured</b></span>

                            </div>
                        </div><br><br>

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

                                <table class="table text-nowrap text-md-nowrap table-bordered mg-b-0" id="myTable">
                                    @foreach ($product_amount_options as $item)
                                    <tr>
                                        <td>
                                            <input class="form-control" name="qty_name_{{ $item->id }}" id="qty_name_{{ $item->id }}" type="text" value="{{$item->qty_name}}">
                                        </td>
                                        <td>
                                            <input class="form-control" name="amount_{{ $item->id }}" id="amount_{{ $item->id }}" type="number" value="{{ $item->amount }}" >
                                        </td>
                                        <td>
                                            <!-- <button onclick="deleteRow(this)" class="btn ripple btn-danger">Delete</button> -->
                                            <a href="{{ route('amount_option.delete', $item->id) }}" style="color: green;" onclick="myDelete(event)">
                                                <i class="fa fa-remove" ></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                        <br><br>
                        <!-- ENDS -->

                        <br>
                        <div class="form-group row justify-content-end mb-0">
                            <div class="col-md-8 pl-md-2">
                                <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color: #006677;">Submit</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

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
    cell2.innerHTML = "<input class='form-control' name='amount_"+row_cnt+"' id='amount_"+row_cnt+"' placeholder='Enter amount' type='number'>";
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

<script>
function myDelete(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    console.log('urlToredirect');
    swal({
            title: `Do you want to Delete ?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location.href = urlToRedirect;
            }
        });
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
