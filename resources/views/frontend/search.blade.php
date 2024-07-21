
<head>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- <title>Laravel Ajax Autocomplete Dynamic Search with select2</title> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- <style>
        .container {
            max-width: 500px;
        }
        h2 {
            color: white;
        }
    </style> -->
</head>

<div class="container mt-5">
    <select style="width: 198px;" class="livesearch form-control" name="livesearch" onchange="load_products(this.value);"></select>
    <!-- <i class="fas fa-search"></i>     -->
</div>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Search Products',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>

<!-- Include jQuery library (or any other AJAX library you prefer) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
function load_products(pid) {  

    // METHOD 1
    var id  = pid; 
    let url = "{{ route('frontend.single_product', ['id' , ':paramValue']) }}";
    url     = url.replace(':paramValue',id);

    var decodedUrl = decodeURIComponent(url).replace(/&amp;/g, '=');
    document.location.href=decodedUrl;
    // METHOD 1 - ENDS

}
</script>