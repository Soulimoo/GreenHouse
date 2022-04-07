<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="#">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Graphes </title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
     <link href="fontawesome-free-5.13.0-web/css/all.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

  <link href="assets/css/my-style.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700"
      rel="stylesheet"
    />
    </head>
<body>
<div class="content">
      <div class="container-fluid">
              <div class="row">
                      <div id="wrapper">
<div class="content-area">
  <div class="container-fluid">

    <div class="main">
      <div class="row sparkboxes mt-4 mb-4">

      </div>

      <div class="row mt-5 mb-4">
        <div class="col-md-6">
          <div class="box">
            <div id="bar"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div id="donut"></div>
          </div>
        </div>
      </div>

      <div class="row mt-4 mb-4">
        <div class="col-md-6">
          <div class="box">
            <div id="area"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div id="line"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

              </div>
          </div>
      </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- installing few libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/downloadjs/1.4.8/download.min.js"></script>
    <script src="data.js"></script>

</body>

    
    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="#"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script> 

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! 
    <script src="assets/js/demo.js"></script> -->

          <script type="text/javascript">
        //CONNECTION BASE DE DONNE
        <?php
  /* Database connection settings */
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'mghdatabase';
  $mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
  $sol ='';
  $air ='';
  $temp ='';
  $r_eau='';
  $r_gaz='';
  $ecl='';
  $carb='';
  $elec='';

  //query to get data from the table
  $sql = "SELECT * FROM `datasets` ";
    $result = mysqli_query($mysqli, $sql);

  //loop through the returned data
  while ($row = mysqli_fetch_array($result)) {
    
    $sol = $sol . '"'. $row['humiditesol'].'",';
    $air = $air . '"'. $row['humiditeaire'] .'",';
    $temp = $temp . '"'.$row['tempirature'] . '",';
    $r_eau = $r_eau . '"'.$row['reservoireau'] . '",';
    $r_gaz = $r_gaz . '"'.$row['reservoirgaz'] . '",';
    $ecl = $ecl . '"'.$row['eclairage'] . '",';
    $carb = $carb . '"'.$row['carburant'] . '",';
    $elec = $elec . '"'.$row['electriscite'] . '",';
  }

  $sol = trim($sol,",");
  $air = trim($air,",");
  $temp = trim($temp,",");
  $r_eau = trim($r_eau,",");
  $r_gaz = trim($r_gaz,",");
  $ecl = trim($ecl,",");
  $carb = trim($carb,",");
  $elec = trim($elec,",");


?>
        //END OF CONNECTION

      Apex.grid = {
  padding: {
    right: 0,
    left: 0
  }
}

Apex.dataLabels = {
  enabled: false
}

var randomizeArray = function (arg) {
  var array = arg.slice();
  var currentIndex = array.length, temporaryValue, randomIndex;

  while (0 !== currentIndex) {

    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }

  return array;
}

// data for the sparklines that appear below header area
var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

// the default colorPalette for this dashboard
//var colorPalette = ['#01BFD6', '#5564BE', '#F7A600', '#EDCD24', '#F74F58'];
var colorPalette = ['#00D8B6','#008FFB',  '#FEB019', '#FF4560', '#775DD0']

var spark1 = {
  chart: {
    id: 'sparkline1',
    group: 'sparklines',
    type: 'area',
    height: 160,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight'
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Sales',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2020-03-0${n+1}`),
  yaxis: {
    min: 0
  },
  xaxis: {
    type: 'datetime',
  },
  colors: ['#DCE6EC'],
  title: {
    text: '$445,652',
    offsetX: 30,
    style: {
      fontSize: '24px',
      cssClass: 'apexcharts-yaxis-title'
    }
  },
  subtitle: {
    text: 'Sales',
    offsetX: 30,
    style: {
      fontSize: '14px',
      cssClass: 'apexcharts-yaxis-title'
    }
  }
}

var spark2 = {
  chart: {
    id: 'sparkline2',
    group: 'sparklines',
    type: 'area',
    height: 160,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight'
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Expenses',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2020-03-0${n+1}`),
  yaxis: {
    min: 0
  },
  xaxis: {
    type: 'datetime',
  },
  colors: ['#DCE6EC'],
  title: {
    text: '$235,312',
    offsetX: 30,
    style: {
      fontSize: '24px',
      cssClass: 'apexcharts-yaxis-title'
    }
  },
  subtitle: {
    text: 'Expenses',
    offsetX: 30,
    style: {
      fontSize: '14px',
      cssClass: 'apexcharts-yaxis-title'
    }
  }
}

var spark3 = {
  chart: {
    id: 'sparkline3',
    group: 'sparklines',
    type: 'area',
    height: 160,
    sparkline: {
      enabled: true
    },
  },
  stroke: {
    curve: 'straight'
  },
  fill: {
    opacity: 1,
  },
  series: [{
    name: 'Profits',
    data: randomizeArray(sparklineData)
  }],
  labels: [...Array(24).keys()].map(n => `2020-03-0${n+1}`),
  xaxis: {
    type: 'datetime',
  },
  yaxis: {
    min: 0
  },
  colors: ['#008FFB'],
  //colors: ['#5564BE'],
  title: {
    text: '$130,965',
    offsetX: 30,
    style: {
      fontSize: '24px',
      cssClass: 'apexcharts-yaxis-title'
    }
  },
  subtitle: {
    text: 'Profits',
    offsetX: 30,
    style: {
      fontSize: '14px',
      cssClass: 'apexcharts-yaxis-title'
    }
  }
}

var monthlyEarningsOpt = {
  chart: {
    type: 'area',
    height: 260,
    background: '#eff4f7',
    sparkline: {
      enabled: true
    },
    offsetY: 20
  },
  stroke: {
    curve: 'straight'
  },
  fill: {
    type: 'solid',
    opacity: 1,
  },
  series: [{
    data: randomizeArray(sparklineData)
  }],
  xaxis: {
    crosshairs: {
      width: 1
    },
  },
  yaxis: {
    min: 0,
    max: 130
  },
  colors: ['#dce6ec'],

  title: {
    text: 'Total Earned',
    offsetX: -30,
    offsetY: 100,
    align: 'right',
    style: {
      color: '#7c939f',
      fontSize: '16px',
      cssClass: 'apexcharts-yaxis-title'
    }
  },
  subtitle: {
    text: '$135,965',
    offsetX: -30,
    offsetY: 100,
    align: 'right',
    style: {
      color: '#7c939f',
      fontSize: '24px',
      cssClass: 'apexcharts-yaxis-title'
    }
  }
}


new ApexCharts(document.querySelector("#spark1"), spark1).render();
new ApexCharts(document.querySelector("#spark2"), spark2).render();
new ApexCharts(document.querySelector("#spark3"), spark3).render();

var monthlyEarningsChart = new ApexCharts(document.querySelector("#monthly-earnings-chart"), monthlyEarningsOpt);


var optionsArea = {
   
  series: [{
          name: 'etat de reservoir d eau',
          data: [<?php echo $r_eau; ?>]
        }, {
          name: 'etat de reservoir gaz',
          data: [<?php echo $r_gaz; ?>]
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: ["2020-03-06T00:00:00.000Z", "2020-03-06T01:30:00.000Z", "2020-03-06T02:30:00.000Z", "2020-03-06T03:30:00.000Z", "2020-03-06T04:30:00.000Z", "2020-03-06T05:30:00.000Z", "2020-03-06T06:30:00.000Z"]
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
       
        },
        title: {
            text: 'Reservoir',
            align: 'left',
            style: {
            fontSize: '18px'
            }
        }
}

var chartArea = new ApexCharts(document.querySelector('#area'), optionsArea);
chartArea.render();

var optionsBar = {
  chart: {
    type: 'bar',
    height: 380,
    width: '100%',
    stacked: true,
  },
  plotOptions: {
    bar: {
      columnWidth: '45%',
    }
  },
  colors: colorPalette,
  series: [{
    name: "tampirature",
    data: [<?php echo $temp; ?>],
  }, {
    name: "eclairage",
    data: [<?php echo $elec; ?>],
  }],
  labels: [10,11,12,13,14,15,16,17,18,19,20,21,22,23],
  xaxis: {
    labels: {
      show: false
    },
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
  },
  yaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    labels: {
      style: {
        colors: '#78909c'
      }
    }
  },
  title: {
    text: 'ATMOSPHERE DE LA SERRES',
    align: 'left',
    style: {
      fontSize: '18px'
    }
  }

}

var chartBar = new ApexCharts(document.querySelector('#bar'), optionsBar);
chartBar.render();


var optionDonut = {
  chart: {
      type: 'donut',
      width: '100%',
      height: 400
  },
  dataLabels: {
    enabled: false,
  },
  plotOptions: {
    pie: {
      customScale: 0.8,
      donut: {
        size: '75%',
      },
      offsetY: 20,
    },
    stroke: {
      colors: undefined
    }
  },
  colors: colorPalette,
  title: {
    text: 'consommation energetique',
    style: {
      fontSize: '18px'
    }
  },
  series: [21, 29, 50],
  labels: [ 'electricite', 'gaz', 'carburant'],
  legend: {
    position: 'left',
    offsetY: 80
  }
}

var donut = new ApexCharts(
  document.querySelector("#donut"),
  optionDonut
)
donut.render();


function trigoSeries(cnt, strength) {
  var data = [];
  for (var i = 0; i < cnt; i++) {
      data.push((Math.sin(i / strength) * (i / strength) + i / strength+1) * (strength*2));
  }

  return data;
}



var optionsLine = {
  chart: {
    height: 340,
    type: 'line',
    zoom: {
      enabled: false
    }
  },
  plotOptions: {
    stroke: {
      width: 4,
      curve: 'smooth'
    },
  },
  colors: colorPalette,
  series: [
    {
      name: "humidter de l air",
      data: [<?php echo $air; ?>]
    },
    {
      name: "humiditer du sol",
      data: [<?php echo $sol; ?>],
    },
  ],
  title: {
    floating: false,
    text: 'humidite',
    align: 'left',
    style: {
      fontSize: '18px'
    }
  },
  subtitle: {
    text: '',
    align: 'center',
    margin: 30,
    offsetY: 40,
    style: {
      color: '#222',
      fontSize: '24px',
    }
  },
  markers: {
    size: 0
  },

  grid: {

  },
  xaxis: {
    labels: {
      show: false
    },
    axisTicks: {
      show: false
    },
    tooltip: {
      enabled: false
    }
  },
  yaxis: {
    tickAmount: 2,
    labels: {
      show: false
    },
    axisBorder: {
      show: false,
    },
    axisTicks: {
      show: false
    },
    min: 0,
  },
  legend: {
    position: 'top',
    horizontalAlign: 'left',
    offsetY: -20,
    offsetX: -30
  }

}

var chartLine = new ApexCharts(document.querySelector('#line'), optionsLine);

// a small hack to extend height in website sample dashboard
chartLine.render().then(function () {
  var ifr = document.querySelector("#wrapper");
  if (ifr.contentDocument) {
    ifr.style.height = ifr.contentDocument.body.scrollHeight + 20 + 'px';
  }
});


// on smaller screen, change the legends position for donut
var mobileDonut = function() {
  if($(window).width() < 768) {
    donut.updateOptions({
      plotOptions: {
        pie: {
          offsetY: -15,
        }
      },
      legend: {
        position: 'bottom'
      }
    }, false, false)
  }
  else {
    donut.updateOptions({
      plotOptions: {
        pie: {
          offsetY: 20,
        }
      },
      legend: {
        position: 'left'
      }
    }, false, false)
  }
}

$(window).resize(function() {
  mobileDonut()
});

/* fusionexport integrations START */
(() => {
  const btn = document.getElementById('fusionexport-btn')
  btn.addEventListener('click', async function() {
    const endPoint = 'https://www.fusioncharts.com/demos/dashboards/fusionexport-apexcharts/api/export-dashboard'
    const information = {
      dashboardName: 'modern'
    };

    this.setAttribute('disabled', true);
    const { data } = await axios.post(endPoint, information, {
      responseType: 'blob'
    });
    await download(data, 'apexCharts-modern-dashboard.pdf', 'application/pdf')
    this.removeAttribute('disabled')
  });
}
)();
    </script>
</html>