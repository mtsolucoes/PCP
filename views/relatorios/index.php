
<div class="col-sm-12 col-lg-12 p-0">
    <h2 class="pl-3 font-weight-light mb-4">Relatório de Demanda</h2>
</div>
<div class="col-sm-12 col-lg-12 p-0">
    <div class="row p-0 m-0">
        <div class="col-sm-11  grafic-container shadow-container p-0">
            <div class="text-left pl-5 grafic-title mb-3 col-sm-12 mt-3"><h4 class="font-weight-light">Demanda</h4></div>
            <div class="col-sm-12 ct-chart ct-perfect-fourth"></div>
        </div>
    </div>    
</div>
<!-- ATRIBUIR OS VALORES SETADOS PARA O JS -->
<script type="text/javascript">
var um = Number('<?php echo $viewData['um'] ?>');
var dois = Number('<?php echo $viewData['dois'] ?>');
var tres = Number('<?php echo $viewData['tres'] ?>');
var quatro = Number('<?php echo $viewData['quatro'] ?>');
var cinco = Number('<?php echo $viewData['cinco'] ?>');
var seis = Number('<?php echo $viewData['seis'] ?>');
var sete = Number('<?php echo $viewData['sete'] ?>');
var oito = Number('<?php echo $viewData['oito'] ?>');
var nove = Number('<?php echo $viewData['nove'] ?>');
var dez = Number('<?php echo $viewData['dez'] ?>');
var onze = Number('<?php echo $viewData['onze'] ?>');
var doze = Number('<?php echo $viewData['doze'] ?>');
var treze = Number('<?php echo $viewData['treze'] ?>');
var quatorze = Number('<?php echo $viewData['quatorze'] ?>');
var quinze = Number('<?php echo $viewData['quinze'] ?>');
var dezesseis = Number('<?php echo $viewData['dezesseis'] ?>');
var dezessete = Number('<?php echo $viewData['dezessete'] ?>');
var dezoito = Number('<?php echo $viewData['dezoito'] ?>');
var dezenove = Number('<?php echo $viewData['dezenove'] ?>');
var vinte = Number('<?php echo $viewData['vinte'] ?>');
var vinteUm = Number('<?php echo $viewData['vinte-um'] ?>');
var vinteDois = Number('<?php echo $viewData['vinte-dois'] ?>');
var vinteTres = Number('<?php echo $viewData['vinte-tres'] ?>');
var vinteQuatro = Number('<?php echo $viewData['vinte-quatro'] ?>');
var vinteCinco = Number('<?php echo $viewData['vinte-cinco'] ?>');
var vinteSeis = Number('<?php echo $viewData['vinte-seis'] ?>');
var vinteSete = Number('<?php echo $viewData['vinte-sete'] ?>');
var vinteOito = Number('<?php echo $viewData['vinte-oito'] ?>');
var vinteNove = Number('<?php echo $viewData['vinte-nove'] ?>');
var trinta = Number('<?php echo $viewData['trinta'] ?>');
var trintaUm = Number('<?php echo $viewData['trinta-um'] ?>');
/*
/*
** SETAR DIAS E MÊS DO GRÁFICO
*/
let day = new Date();
let today = day.getDate();
let month = day.getMonth() + 1;

//------GRÁFICO--------\\
var data = {
    // A labels array that can contain any sort of values
    labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31],
    // Our series array that contains series objects or in this case series data arrays
    series: 
    [
        [
            um,
            dois,
            tres,
            quatro, 
            cinco, 
            seis, 
            sete, 
            oito, 
            nove, 
            dez, 
            onze, 
            doze, 
            treze, 
            quatorze, 
            quinze,
            dezesseis,
            dezessete,
            dezoito,
            dezenove,
            vinte,
            vinteUm,
            vinteDois,
            vinteTres,
            vinteQuatro,
            vinteCinco,
            vinteSeis,
            vinteSete,
            vinteOito,
            vinteNove,
            trinta,
            trintaUm
        ]
    ]
};

  
  var options = {
    width: 1000,
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