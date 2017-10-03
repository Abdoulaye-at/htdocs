$(".cv").on("click", function(){
  $(".page2").slideDown("fast");
  $(".start, .software, .page3, .page4, .cntInfo").fadeOut("fast");
});

$(".home").on("click", function(){
  $(".start").slideDown("fast");
  $(".page2, .software, .page3, .page4, .cntInfo").fadeOut("fast");
});

$(".contact").on("click", function(){
  $(".cntInfo").slideDown("fast");
  $(".start, .software, .page2, .page4, .page3").fadeOut("fast");
});

$(".ee").on("click", function(){
  $(".page3").slideDown("fast");
  $(".start, .software, .page2, .page4, .cntInfo").fadeOut("fast");
});

$(".portfolio").on("click", function(){
  $(".page4").slideDown("fast");
  $(".start, .software, .page2, .page3, .cntInfo").fadeOut("fast");
});


$(".swBtn").on("click", function(){
  $(".software").slideDown("fast");
  $(".start, .page3, .cntInfo").fadeOut("fast");
});

$(".close").click(function(){
  $(".software, .cntPopUp").slideUp("fast");
});
