<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>

<style>
    .container {
        max-width: 500px;
    }
    h2 {
        color: white;
    }
</style>
<body>

    <div class="container mt-5">
        <select class="livesearch form-control" name="livesearch" onchange="load_products(this.value);" style="width: 100%"></select>
    </div>

</body>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select movie',
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

}
</script>
</html>
