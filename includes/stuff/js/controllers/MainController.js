app.controller('MainController', ['$scope', 'discourse', function($scope, discourse) {
  $scope.data = null;
  discourse.getData(function(dataResponse) {
        $scope.raw = dataResponse;
        $scope.project_name = dataResponse.title
        $scope.author = dataResponse.details.created_by.username
        $scope.topic_content = dataResponse.post_stream.posts[0].cooked
    });

}]);
