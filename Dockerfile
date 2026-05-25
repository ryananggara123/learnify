# Menggunakan image PHP 8.1 (kamu bisa sesuaikan versinya jika perlu) dengan server Apache
FROM php:8.1-apache

# Mengaktifkan mod_rewrite (berguna jika kamu pakai .htaccess nantinya)
RUN a2enmod rewrite

# Menginstal ekstensi database (mysqli & pdo) agar PHP bisa ngobrol dengan TiDB
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Menyalin semua file proyekmu ke dalam folder publik server
COPY . /var/www/html/

# Memberikan izin akses folder
RUN chown -R www-data:www-data /var/www/html/

# Membuka port 80
EXPOSE 80