# LibroScuola.it

This project is a Laravel based application which provides an API (and a web application) for getting italian's schools yearly books.

## Getting Started

These instructions will guide you on how to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

Ensure you have the following installed on your local system:

- PHP 8.1
- Composer 2.2
- Laravel 10.17.1
- Csv Data Files (You can get them [Here](https://dati.istruzione.it/opendata/opendata/catalogo/#Scuola))

### Which csv files i have to download?

For information about schools you have to download csv files located [here](https://dati.istruzione.it/opendata/opendata/catalogo/elements1/?area=Scuole)
For information about school's books you have to download csv files located [here](https://dati.istruzione.it/opendata/opendata/catalogo/elements1/?area=Adozioni%20libri%20di%20testo)

### Installing

1. Clone the repository to your local machine:
2. Navigate to the project directory:
   ```cd libroscuola.it```
3. Install the project dependencies:
   ```composer install```
4. Migrate database tables:
   ```php artisan migrate```
5. Import schools data:
   ```php artisan import:scuole <filepath>```
6. Import books data:
   ```./import.sh```

The application should now be accessible at http://localhost.

### ENDPOINTS
The application provides a set of endpoints:
- GET / - Display the homepage.
- GET /province/{region} - Get the provinces for the given region.
- GET /citta/{province} - Get the cities for the given province.
- GET /gradi/{city} - Get the grades for the given city.
- GET /scuole/{region}/{grade} - Get the schools for the given region and grade.
- GET /classi/{school} - Get the classes for the given school.
- GET /libri/{codiceScuola}/{class} - Get the books for the given school and class.

### API ENDPOINTS
- GET /api/ - Get the REST Api Documentation page
- POST /api/{codiceScuola} - Get the classes for the given school.
- POST /api/{codiceScuola}/{classe} - Get the books for the given school and class.
Each endpoint is accessed in a RESTful manner, with data returned in a standard JSON format.

### Running the Tests
PHPUnit is being used for testing this application. Run the following command to run the tests:
    ```php artisan test```

### TO-DO:
- Write Better Tests
- Improve database queries
- Migrate to Cassandra / ScyllaDB
- Refactor Controllers
