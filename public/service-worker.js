// Listen for incoming push notifications
self.addEventListener('push', function(event) {
    // Extract payload as JSON object, default to empty object
    var data = event.data.json() || {};

    // Extract notification image URL
    var image = data.image || 'https://nurulimanalhasanah.com/notif.png';

    // Notification title and body
    var title = data.title || '';
    var body = data.message || '';

    // Notification options
    var options = {
        body: body,
        icon: image,
        badge: image,
        data: {
            url: data.url
        }
    };

    // Wait until notification is shown
    event.waitUntil(self.registration.showNotification(title, options));
});

// Listen for notification click event
self.addEventListener('notificationclick', function(event) {
    // Hide notification
    event.notification.close();

    // Attempt to extract notification URL
    var url = event.notification.data.url;

    // Check if it exists
    if (url) {
        // Open the target URL in a new tab/window
        event.waitUntil(clients.openWindow(url));
    }
});