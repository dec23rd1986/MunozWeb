


var Feed = new Instafeed({
    get: 'user',
    userId: '4950173594',
    clientId: '0a8d7d566c7a4049bdba43a03d1cfd66',
    accessToken: '4950173594.0a8d7d5.b61e3c7e54024b2ca1d3b74399b63d9f',
    resolution: 'standard_resolution',
    sortBy: 'most-recent',
    limit: 4,
    links: false,
    template: '<a href="{{link}}"><img src="{{image}}" /></a>',
});
   
  
  userFeed.run();

};