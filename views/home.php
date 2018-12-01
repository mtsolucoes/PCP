
<div class="col-sm-12 col-lg-12 p-0">
    <h2 class="pl-3 font-weight-light mb-4">Dashboard</h2>
</div>
<div class="col-sm-12 col-lg-12 p-0">
    <div class="row p-0 m-0">
        <div class="col-sm-8  grafic-container shadow-container p-0">
            <div class="text-left pl-5 grafic-title mb-3 col-sm-12 mt-3"><h4 class="font-weight-light">Demanda</h4></div>
            <div class="col-sm-12 ct-chart ct-perfect-fourth"></div>
        </div>
        <div class="col-sm-3">
            <div class="col-sm-12 menu-secondary">
                <div class="col-sm-12 p-4">
                    <h5>Pedidos Abertos</h5>
                </div>
                <div class="col-sm-12 text-center">
                    <h3><?php echo $vmData['pedidos']; ?> pedidos</h3>
                </div>
            </div>
            <div class="col-sm-12 menu-secondary">

            </div>
            <div class="col-sm-12 menu-secondary">

            </div>
        </div>
    </div>    
</div>
<!-- ATRIBUIR OS VALORES SETADOS PARA O JS -->
<script type="text/javascript">
var um = Number("<?php echo $vmData['um'] ?>");
var dois = Number("<?php echo $vmData['dois'] ?>");
var tres = Number('<?php echo $vmData['tres'] ?>');
var quatro = Number('<?php echo $vmData['quatro'] ?>');
var cinco = Number('<?php echo $vmData['cinco'] ?>');
var seis = Number('<?php echo $vmData['seis'] ?>');
var sete = Number('<?php echo $vmData['sete'] ?>');
/*
** SETAR DIAS E MÊS DO GRÁFICO
*/
day = new Date();
today = day.getDate();
month = day.getMonth() + 1;

//------GRÁFICO--------\\
var data = {
    // A labels array that can contain any sort of values
    labels: [
               today +'/'+ month, 
              (today + 1) +'/'+ month, 
              (today + 2) +'/'+ month, 
              (today + 3) +'/'+ month, 
              (today + 4) +'/'+ month, 
              (today + 5) +'/'+ month, 
              (today + 6) +'/'+ month
            ],
    // Our series array that contains series objects or in this case series data arrays
    series: [
      [um, dois, tres, quatro, cinco, seis, sete]
    ]
};

  
  var options = {
    width: 650,
    height: 400,
    seriesBarDistance: 0
  };
  
  var responsiveOptions = [
    ['screen and (min-width: 641px) and (max-width: 1024px)', {
      seriesBarDistance: 10,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value;
        }
      }
    }],
    ['screen and (max-width: 640px)', {
      seriesBarDistance: 5,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value[0];
        }
      }
    }]
  ];

new Chartist.Line('.ct-chart', data, options, responsiveOptions);
///----------FIM GRÁFICO-----------\\\


</script>