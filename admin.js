let upp = document.getElementById("upp");
let del = document.getElementById("del");
let upd = document.getElementById("upd");document.getElementById("info");
let info = document.getElementById("info");

let info_table = document.getElementById("info-tale");



upp.addEventListener("click", function() {
    
    $(".addprod").addClass("show");
    $(".info-table").removeClass("show");
    $(".delprod").removeClass("show");
    $(".updprod").removeClass("show");

  });

del.addEventListener("click", function() {

    $(".delprod").addClass("show");
    $(".info-table").removeClass("show");
    $(".addprod").removeClass("show");
    $(".updprod").removeClass("show");
  });

  upd.addEventListener("click", function() {

    $(".updprod").addClass("show");
    $(".info-table").removeClass("show");
    $(".addprod").removeClass("show");
    $(".delprod").removeClass("show");
    
  });


info.addEventListener("click", function() {
    
    $(".info-table").addClass("show");
    $(".addprod").removeClass("show");
    $(".delprod").removeClass("show");
    $(".updprod").removeClass("show");
    
  });

