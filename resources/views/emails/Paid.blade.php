<!DOCTYPE html>
<html class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('output.css') }}" rel="stylesheet">
    

  </head>  

  <body>
    <h1>Voucher</h1>
    <p>Yth. {{ $details['name'] }}</p>
    <p>Berikut adalah kode voucher anda</p>
    <p>{{ $details['kode'] }}</p>



    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
