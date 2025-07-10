<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home siulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     {{-- <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
      <script type="text/javascript"
		    src="https://app.stg.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
      </script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment --> --}}
    <!-- <script src="index.js"></script> -->
  </head>

<body>

    @include('header')

    @yield('body')
    
    @include('footer')

  
</body>
</html>