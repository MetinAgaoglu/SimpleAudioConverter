self.addEventListener('install',  event  => {
    console.log('Service worker has beed installed');
});

// actives service worker

self.addEventListener('active', event => {
    console.log('service worker has been activated');
});
