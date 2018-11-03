
# Laravel Caching Example

## Installation

##### Navigate to the project directory and set the environment file
```
cd /go/to/root/project/directory
cp .env.example .env
```

### Docker Installation
If Docker is available on the target machine, you can run it by doing the following:

##### Build containers and initialise
```
docker-compose build; docker-compose up -d;
```

##### Call a script which logs you into the docker machine shell
```
docker/tools/shell.sh
```

##### Install all composer dependencies
```
composer install
```

#### Run DB migrations
```
artisan migrate
```

## Seed the database tables
The example below will generate 100 companies each with 10000 associated reports totalling 100 Company records and 1,000,000 report records in the database.
This will take some time to complete. You can run and re-run this command or have multiple terminal windows running the same command which will insert records a little quicker.
```
artisan seed:companyreports {totalCompanies?} {totalReportsPerCompany?}
artisan seed:companyreports 100 10000
```

## Run the query command
Run the following command in terminal and follow the instructions.

```
artisan test:querycache
```