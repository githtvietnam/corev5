<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Setup Môi trường

- use Git Bash: git clone https://github.com/githtvietnam/corev5.git
- Set up PHP 8.1 và MySQL >= 5.7


## Cài đặt

1. Đối với Open Server thì đổi tên folder chứa thành corev4.com
2. Install Composer: composer install
3. Tạo file Autoload của Composer: composer dump-autoload
4. Tạo file .env từ file .env.example: cp .env.example .env
5. Chỉnh sửa file .env, sửa thông tin DB và tên miền = của mình
6. Tạo bảng trong CSDL: php artisan migrate
7. Khởi tạo DB demo: php artisan db:seed
8. Tạo key bảo mật: php artisan key:generate
