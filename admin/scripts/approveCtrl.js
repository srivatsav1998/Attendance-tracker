app.controller("approveCtrl", function ($scope, $http) {
    $http.get("backend/wait_get.php").then(function (response) {
        $scope.datas = response.data;
    });
    $scope.displayData=function(){
		$http.get("backend/wait_get.php").then(function(response){
			$scope.datas = response.data;
		});
	}
    $scope.acceptData = function (stud) {
        $http.post("backend/approve.php", { "username": stud.user_name }).then(function (data) {
            console.log(data);
			$scope.displayData();
        },
        function (error) {
            console.log(error);
        });
    };
	$scope.deleteData = function(stud){
		$http.post("backend/disapprove.php",{"username": stud.user_name}).then(function(data){
			console.log(data);
			$scope.displayData();
		},
		function(error){
			console.log(error);
		});
	};
});