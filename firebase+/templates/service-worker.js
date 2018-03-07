var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
  '/',
  'menu.amp.html',
  'home.amp.html',
  '/css/page.css',
];

self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        return cache.addAll(urlsToCache);
      })
  );  
});

self.addEventListener('activate', function(event) {
  console.log('Finally active. Ready to start serving content!');  
});