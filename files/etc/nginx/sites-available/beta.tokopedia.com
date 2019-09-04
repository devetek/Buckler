upstream tkpwp_app {
    server 127.0.0.1:8080;
    keepalive 64;
}

server {
    listen 80;
    server_name  localhost beta.tokopedia.com;
    root /var/www/wp/public;

    location ~* \.(js|json|html) {
        add_header Cache-Control "public";
        try_files $uri $uri/ /;
    }

    location / {
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
        proxy_pass http://tkpwp_app$request_uri;
    }
}
