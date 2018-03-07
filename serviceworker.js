

var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
'/581768/554D638D16E67A67E.css',
'/581768/8D4474ED0D9A7B549.css',
'/',
'/agentur/inbound-marketing/',
'/agentur/social-media/',
'/agentur/seo/',
'/agentur/google-adwords/',
'/agentur/landingpage/',
'/agentur/webdesign/',
'/blog/'
];

self.addEventListener('install', function(event) {
// Perform install steps
event.waitUntil(
caches.open(CACHE_NAME)
.then(function(cache) {
console.log('Opened cache');
return cache.addAll(urlsToCache);
})
);
});