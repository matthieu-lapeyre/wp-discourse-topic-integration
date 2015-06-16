app.controller('MainController', ['$scope', 'discourse', function($scope, discourse) {
  discourse.success(function(data) {
    $scope.raw = data;
    $scope.project_name = data.title
    $scope.author = data.details.created_by.username
    $scope.topic_content = data.post_stream.posts[0].cooked
  });
}]);
