
# Task Management System API

This is a simple RESTful API built with Lumen that allows users to manage tasks. The API handles basic CRUD (Create, Read, Update, Delete) operations for tasks.

## Requirements

- PHP 7.4+
- Composer
- PostgreSQL

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/mwaniel/task_manger_api.git
   cd lumen


   Install Dependencies: Run the following command to install the PHP dependencies:

   ->composer install then use

   cp .env.example .env  to copy to env



   in your .env file  add database details 


    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=task_management
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

migated all tables to dabe using this command  as well as seed your db 

->php artisan migrate
->php artisan db:seed



Running the Application
Run the Application Locally: Start the Lumen server by running:


->php -S localhost:8000 -t public



The API will be accessible at http://localhost:8000.


## API Endpoints

### Create a Task
URL: `/api/tasks`
Method: `POST`
Request Body:json

## Get All Tasks
URL: /api/tasks
Method: GET
Query Parameters: Optional filters for status and due_date


## Get a Specific Task
URL: /api/tasks/{id}
Method: GET


## Update a Task
URL: /api/tasks/{id}
Method: PUT
Request Body: Optional fields to update (e.g., title, description, status, due_date)


## Delete a Task
URL: /api/tasks/{id}
Method: DELETE



## Bonus Features
Filtering: Filter tasks by status and due_date using query parameters.
Pagination: The task listing endpoint is paginated with 10 tasks per page.
Search: Use the search query parameter to find tasks by title.
