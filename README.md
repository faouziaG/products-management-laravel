## Setup project

### Clone project and switch to dev branch
```bash
git clone https://github.com/faouziaG/products-management-laravel.git

git checkout dev

```

 

### Install dependencies

 ```bash
composer update
```

### Create database and config your file .env

```bash
cp .env.example .env
```

### Migrate the tables to database

```bash
php artisan migrate
```

### Seed the database

```bash
php artisan db:seed
```

### Run project

```bash
php artisan serve
```
