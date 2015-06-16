app.service('discourse', function($http) {
  delete $http.defaults.headers.common['X-Requested-With'];
  this.getData = function(callbackFunc) {
      $http({
          method: 'GET',
          url: 'wp-content/plugins/discourse-topic-integration/includes/stuff/post.json',
          params: 'limit=10, sort_by=created:desc',
          headers: {'Authorization': 'Token token=xxxxYYYYZzzz'}
       }).success(function(data){
          // With the data succesfully returned, call our callback
          callbackFunc(data);
      }).error(function(){
          alert("error while trying to fetch data");
      });
   }
});
