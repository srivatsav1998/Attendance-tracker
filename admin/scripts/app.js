$(".small").click(function(){
  if($(".logo").css("left") == "0px") {
    $(".logo").css("left","-214px");
    $(".sidebar").css("left","-214px");
    $("#page-content").css("left","56px");
    $(".small").text("»");
  } else {
    $(".logo").css("left","0");
    $(".sidebar").css("left","0");
    $("#page-content").css("left","270px");
    $(".small").text("«");
  }
})
$("#left li").hover(function(){
  $("#left li").removeClass("hover")
  $(this).addClass("hover")
},function(){
  $(this).removeClass("hover")
})
$("#left li").click(function(){
  $("#left li").removeClass("active");
  $(this).addClass("active");
})
if($(window).width() <= 360) {
  $(".logo").css("left","-214px");
  $(".sidebar").css("left","-214px");
  $(".small").text("»");
  $("#profilepic").css("margin-right","10px");
  $("#name i").hide();
  $("#name").css("color","white");
  $("#name span").css("color","black");
  $("#name").css("width","calc(100% - 55px)")
  $("#home-nav li").css({"float":0,"width":"100%"})
}

var app =  angular.module("myApp",['ngRoute']);

app.config(function($routeProvider){
    $routeProvider
      .when('/',{
        templateUrl:'Templates/home.html'
      })
      .when('/members',{
        templateUrl:'Templates/members.html'
      })
	  .when('/approve',{
		  templateUrl: 'Templates/approve.html'
	  })
	  .when('/active',{
		  templateUrl: 'Templates/active.html'
	  })
	  .when('/attendance',{
		  templateUrl: 'Templates/attendance.html'
	  })
      .otherwise('/');
});

app.controller('MainController',function($scope,$location){

  $scope.routeTo = function(route){
      $location.path(route);
  }

});


