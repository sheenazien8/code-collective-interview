## Usage

### Valet/Herd
* cp .env.exapmle .env
* composer install         
* php artisan key:generate
* php artisan migrate --seed

### Access the Application
Open your web browser and navigate to https://domainname.test


### Docker
* cp .env.exapmle .env
* docker-compose up -d --build
* docker-compose exec app composer install
* docker-compose exec app php artisan key:generate
* docker-compose exec app php artisan migrate --seed

### Access the Application
Open your web browser and navigate to http://localhost:8000.


### Login to the application

user: test@example.com
password: password

