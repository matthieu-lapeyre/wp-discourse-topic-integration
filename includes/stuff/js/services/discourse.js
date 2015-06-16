app.factory('discourse', ['$http', function($http) {
  return $http.get('wp-content/plugins/discourse-topic-integration/includes/stuff/post.json')
  .success(function(data) {
    return data;
    })
  .error(function(err) {
    return err;
    });
}]);

// wp-content/plugins/discourse-topic-integration/includes/stuff/post.json
