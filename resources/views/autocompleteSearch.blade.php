<!DOCTYPE html>
<html>
<head>
  <title>Autocomplete Search Using Typehead | Laravel 8</title>
  <link rel="stylesheet" type="text/css" href="{{asset('Backend')}}/vendors/styles/core.min.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 mt-5">
        <h5>Laravel 8 Autocomplete Search Using Typehead</h5>
        <input type="text" class="form-control typeahead">
      </div>
    </div>
  </div>
</body>

<script src="{{asset('Backend')}}/vendors/scripts/core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
<script type="text/javascript">
  var path = "{{ url('autocomplete-search-query') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
          return $.get(path, { query: query }, function (data) {
              return process(data);
          });
        }
    });
</script>
</html>