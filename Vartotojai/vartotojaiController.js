app.controller('vartotojaiController', function ($scope, $http) {
    console.log('Meniu kontroleris veikia');

    $http.get('Back-end/select-data.php').then(function (res) {
        $scope.users = res.data;

    })

});