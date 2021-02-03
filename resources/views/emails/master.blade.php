<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME', 'Laravel') }}</title>
</head>
<body style="margin: 0px; background-color: #74babd; padding: 0px; ">
    
    
    
    <div style="max-width: 700px; width: 60%; margin: 0px auto; display: block;">
       
        <img src="http://mycms.laravel/static/images/correo.png" width="100%" alt="Tienda Online">

        @yield('content')

        <hr>
        <p>Nuestras Redes sociales:
            
    </div>
</body>
</html>