app.controller('vartotojaiController', function ($scope, $http) {
    var id = getUrlParameters().id;

    $http.get('/Back-end/select-data1.php?id=' + id).then(function (res) {
        $scope.user = res.data;
    })

    function getUrlParameters() {
        var pairs = window.location.search.substring(1).split(/[&?]/);
        var res = {}, i, pair;
        for (i = 0; i < pairs.length; i++) {
            pair = pairs[i].split('=');
            if (pair[1])
                res[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
        }
        return res;
    }
});