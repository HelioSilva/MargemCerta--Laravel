<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
        <meta name="csrf-token" content="{{ csrf_token() }}">   
    </head>
    <body>

        <div class="container">


            <div class="row" style="height: 150px">
                <h2>Topo</h2>
                <button onclick="getLocation()">Puxar sua localização</button>
            </div>
        
            

            <div class="row">
                 <div class="conn">
                    <vc-helio></vc-helio>
                 </div>     
            </div>

           

        </div>

        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script>
var x=document.getElementById("divErro");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Geolocalização não é suportada nesse browser.";}
  }
 
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  document.getElementById('lat').value = lat;
  document.getElementById('lon').value = lon;

  }
 
function showError(error)
  {
  switch(error.code)
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Localização indisponível."
      break;
    case error.TIMEOUT:
      x.innerHTML="O tempo da requisição expirou."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Algum erro desconhecido aconteceu."
      break;
    }
  }
</script>

<script type="text/javascript">
    
    $(function(){
      $('#form1 ').bind('submit',function(e){
         e.preventDefault();
         var infor = $(this).serialize() ;
         console.log(infor);

      })
    });

</script>
        

        

        <script src="/js/app.js"></script>
    </body>
</html>
