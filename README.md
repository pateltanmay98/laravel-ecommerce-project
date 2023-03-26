# laravel-ecommerce-project

#### Project Key Matrics
- Laravel v10.0

#### Setup Project
```bash
# clone the repo
git clone https://github.com/pateltanmay98/laravel-ecommerce-project.git
# install composer dependency
composer install
# create a environment file
cp .env.example .env
# set the Application key
php artisan key:generate
# Link storage
php artisan storage:link
# install front-end dependencies
npm install && npm run build
# setup the database credentials and migrate database with seeders
php artisan migrate:fresh --seed

```
