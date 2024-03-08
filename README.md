# Sales Board

## Introduction
Welcome to SalesBoard, a small sales management system for a car dealership. In SalesBoard, you can view a complete dashboard where you can track your employees' sales in real-time.

## Technologies Used
For the test, the following technologies were used:
- PHP 8.3
- MariaDb 10.11
- Laravel 10.46
- Livewire 3
- Bootstrap 5
- NodeJS 20.11

## Used Architecture

Some concepts of SOLID, Clean Arch, and Object Calisthenics were applied.
The chosen layers for development were:
### Action
In this case, it's Livewire component itself, which is called directly by the route. If Livewire is not used,
an Action would be a class with only one method and the minimum possible business rules. It only serves to
receive the request and return the response (`__invoke` method) that would be called directly by the route.

### Repositories
Layer responsible for handling the system's data. In our case, it is the layer responsible for connecting to
the database using Eloquent, Query Builder, or raw SQL. It is ensured through an interface, where
only the interface is injected into the UseCase layer, decoupling the implementation from the rest of the code.

### UseCase
Layer where all the logic and business rules are written. It is a pure class that has no dependencies or ties
with any external or internal library. Any dependency is injected via interface.

UseCases are injected directly into the action layer/Livewire component or any other layer, like a console
or an API endpoint. This way, we can centralize all the business logic in just one layer.

### Services
This is the layer where external services to the framework are located, such as, in our case, generating charts.
It is also controlled by an interface. This way, if the library needs to be changed, just implement the interface again
and the rest of the system will not suffer any code refactoring impact.

## How to intall
To set up in a development environment, Sail was used to create and manage Docker containers. This way, we could optimize the container to run the Laravel application seamlessly.

First, download the repository directly from Github.

[https://github.com/gilsonreis/trial-bycoders](https://github.com/gilsonreis/trial-bycoders)

Navigate to the downloaded directory, clone and rename `.env.example` to `.env` and execute the following commands one by one:

```bash
./vendor/bin/sail composer install
./vendor/bin/sail up -d --build
./vendor/bin/sail artisan migrate
./vendor/bin/sail db:seed
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## Acessando o dashboard

Users were created using the seeder. By default, use the data from the first user created:

```
E-mail: super@admin.com
Password: password
```

All other users will be created by Faker, and their passwords will be 'password'.

## Command to update dashboard in real-time

A command has been created through the console to update real-time information on the dashboard.
To do this, run the following command in the terminal:

```bash
./vendor/bin/sail php artisan app:insert-sales
```
To facilitate the visualization of information on the dashboard, three optional parameters can be used in the above command:

```
--time-update[=TIME-UPDATE]        Interval time in seconds to insert each sale. [default: "30"]
--days[=DAYS]                      Negative days until today to be inserted in sales. Eg. "-10 days". [default: "-30 days"]
--only-completed[=ONLY-COMPLETED]  Insert sales only completed status. [default: "false"]
```
Tip: Providing --days for the beginning of the current month and --only-completed as true will give a better real-time update 
response on the dashboard.

