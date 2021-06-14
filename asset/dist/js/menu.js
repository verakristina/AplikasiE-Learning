$(document).ready(function(){

  dashboard_default();


$("a#data_user").click(function(){
  data_user();
});

$("a#data_tujuan").click(function(){
  data_tujuan();
});

$("a#pengiriman").click(function(){
  pengiriman();
});

$("a#laporan").click(function(){
  laporan();
});
});
function dashboard_default(){
  $("#content_main").load("../view/dashboard_default.php");
};

function data_user(){
  $("#content_main").load("../view/data_user.php");
};

function data_tujuan(){
  $("#content_main").load("../view/data_tujuan.php");
};

function pengiriman(){
  $("#content_main").load("../view/pengiriman.php");
};

function laporan(){
  $("#content_main").load("../view/laporan.php");
};
