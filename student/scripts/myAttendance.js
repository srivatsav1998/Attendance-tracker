app.controller("myAttendance", function ($scope, $http) {

    $scope.dateSearch = function () {
        $http.post("backend/date.php", { "login_date": $scope.logindate }).then(function (response) {
            console.log(response);
			$scope.datas = response.data;
        },
        function (error) {
            console.log(error);
        });
    };
});
