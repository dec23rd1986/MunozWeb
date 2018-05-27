  
var feed = new Instafeed({
	get: 'user',
	userId: 4950173594,
	clientId: '1467d146c74b40338038e5c5b429be57',
	accessToken: '4950173594.1467d14.cccbf112da254a0eaf666ed024aaea7b',
	sortBy: 'most recent',
	resolution: 'thumbnail',
	limit: 10,
	template: '<a href="{{link}}" title="{{caption}}" orientation="{{orientation}}" target="_blank"><img src="{{image}}" orientation="{{square}}" likes="{{likes}}" alt="{{caption}}"/></a>'
	
	
	
});

feed.run();