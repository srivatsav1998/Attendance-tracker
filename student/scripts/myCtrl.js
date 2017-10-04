app.controller("myCtrl", function ($scope, $http) {
    $http.get("backend/get.php").then(function (response) {
        $scope.datas = response.data;
    });
	
    $http.get("backend/my_data.php").then(function(response){
        $scope.mydata = response.data;
    });
    $scope.mydata = "not received";

    $scope.deleteData = function (stud) {
        $http.post("backend/remove.php", { "username": stud.user_name }).then(function (data) {
            console.log(data);
        },
        function (error) {
            console.log(error);
        });
    };
    
    

});


