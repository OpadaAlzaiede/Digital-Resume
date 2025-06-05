# Deployment Instructions

This document provides step-by-step instructions for deploying the Single Page Digital Resume application.

## Prerequisites

- PHP >= 8.1
- Composer
- Node.js & NPM
- Git
- Web server (Apache/Nginx)

## Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/OpadaAlzaiede/Digital-Resume.git
   cd Digital-Resume

2. **Install PHP Dependencies
    ```bash
   composer install

3. **Install Node Dependencies
    ```bash
   npm install

4. **Environment Setup
    ```bash
    cp .env.example .env
    php artisan key:generate

5. **Configure Environment Variables Edit the .env file and set the following variables:
    APP_NAME="Digital Resume"
    APP_ENV=production
    APP_DEBUG=false
    APP_URL=your-domain.com

6. **Create Storage Link
    ```bash
   php artisan storage:link

7. **Add Your Resume Data
- Create a JSON file named resume.json in the storage/app/public directory
- Follow the JSON structure for your CV data

8. **Build Assets
    ```bash
    npm run build

9. **Set Permissions (Linux/Unix systems)
    ```bash
    chmod -R 755 storage
    chmod -R 755 storage bootstrap/cache

10. **Cache Configuration (Optional but recommended for production)
    ```bash
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

## Server Requirements
- Apache or Nginx web server
- URL Rewrite enabled
- PHP extensions:
    - BCMath
    - Ctype
    - JSON
    - Mbstring
    - OpenSSL
    - PDO
    - Tokenizer
    - XML

## Apache Configuration
If using Apache, ensure the .htaccess file is present in the public directory and mod_rewrite is enabled.

## Nginx Configuration
If using Nginx, use this configuration in your server block:

server {
    listen 80;
    server_name your-domain.com;
    root /path/to/your/project/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}

## Troubleshooting
1. PDF Generation Issues
    - Ensure the dompdf directory in storage has write permissions
    - Check PHP memory limit if generating large PDFs

2. Asset Loading Issues
    - Run npm run build again
    - Clear browser cache
    - Check file permissions on the public directory

3. Resume Not Loading
    - Verify resume.json exists in the correct location
    - Check file permissions
    - Validate JSON structure
