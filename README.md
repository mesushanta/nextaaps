# Backend Job Application - TestExercise

## Description of application

Let’s assume we have an application that contains millions of businesses. Each business
has a name, a description, an address, and one or multiple owners.

In the application, you can view the full list of businesses, or you can search through them
using the search bar. You can also view a list of all the countries where at least one business
is located. Each country is a button, so you can select one or more of these countries in
order to only view the businesses within those countries.

When a business is selected, we can view its detail.

## Assignment

First, you need to create the models and database tables that are necessary for this application.

### Secondly, you need to create 3 API calls:
- The first API call returns a list of all countries that have at least one business
- The second API call returns a list of businesses. The list of businesses can be filtered
  by using a search term and/or by providing a list of countries. When a search term is
  provided, we need to search the following data of each business: name, description,
  address street, address country, first name/last name of each owner.
- The third API call returns a specific business.
  Thirdly, you should write the necessary tests that assert the functionality of each API call.

### Running the application
- Run composer Install to install all dependencies
- Run in docker to avoid any version/hardware/software issue.
- Run migration (php artisan migrate)
- Import the countries' table from (./countries.sql)
- Run database seeders php artisan (php artisan db:seed)
- Import database to Indexes (php artisan scout:import "App\Models\Business")

### End points

**Routes without authentication**

- GET: /api/countries-with-business
- GET: /api/business (optional param: limit or Limit & offset)
- GET: /api/business/{businessId}
- GET: /api/search (optional params : term and country) 
    - At least one of these two parameter is required
    - Scout driver is used for full text search using Meilisearch
- POST: /api/login ( email: admin@example.com, password: password)

**Routes without authentication**
- All the above routes except login route with admin prefix works the same way as above routes. But these routes need authentication to be accessed. The login end point returns bearer token which can be passed with header to access these routes
    - GET: /api/admin/countries-with-business
    - GET: /api/admin/business
    - GET: /api/admin/business/{businessId}
    - GET: /api/admin/search

    
*** PS The authentication is quickly created, just for testing purpose. It is not properly structured.
