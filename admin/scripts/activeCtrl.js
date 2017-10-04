app.controller("activeCtrl", function ($scope, $http) {
    $http.get("backend/active.php").then(function (response) {
        $scope.datas = response.data;
    });
    $scope.displayData=function(){
		$http.get("backend/active.php").then(function(response){
			$scope.datas = response.data;
		});
	}
    $scope.deleteData = function (stud) {
        $http.post("backend/remove.php", { "username": stud.user_name }).then(function (data) {
            console.log(data);
			$scope.displayData();
        },
        function (error) {
            console.log(error);
        });
    };
});