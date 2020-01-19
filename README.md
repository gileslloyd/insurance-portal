# Insurance Portal
> Small API driven project to display information on different types of insurance.

## The Task

 * Using the webservice list the products that are available.
 * Handle any errors
 * For each insurance product returned, get more information and display
 * Unfortunately this data is retrieved from an unreliable source and the webservice may return an error. When this occurs, simply re-try the request until it succeeds.
 * Data is provided directly from a third-party and should be sanitised.

## The Solution

The app consists of:
* A Vue.js front end with Bulma. This makes REST calls to -
* The PHP backend application. This is built with a Hexagonal-style architecture using using Lumen to expose the API endpoints.
* The hexagonal architecture keeps the domain and application logic decoupled from whichever framework is used for the delivery 
mechanism. This way if we need to add a CLI interface for example, we could use a different framework more suited to this task (i.e symfony console)
and this could reuse the same domain logic. For this reason I have opted to use the phpleague container, rather than using Lumen's DI container as it is framework agnostic.
* I have followed the coding style outlined in PSR-12

## Setup

* Clone the project,
* Run `make setup` in the root of the project. This will start the containers and install the composer dependencies,
* Go to http://localhost:8081/ to view the UI.
* You can also test the API directly if you wish, the `docs` directory in the root of the project contains postman exports to test the endpoints.
* You can run the tests with `make test`

## Areas for Improvement

* The API key is committed to the repository. This should be moved into a secret store,
* The API authentication is very basic with a static API key. It could be improved using oAuth or similar,
* Errors are not currently being logged anywhere,
* The Vue.js front-end "production" distribution is currently built and committed to the repository. We should really be building that as a step in an automated deployment pipeline,
perhaps using a Continuous Integration server,
* It would be good to include some kind of loading animation on the UI while waiting for API calls to complete,
* Currently the domain model is a little anaemic. The Product Service especially does little but proxy method calls to the
repository,
* If we were to begin to include behaviour on the product entity, it would be bad practice to return those objects to the controller.
It would be better to return immutable DTO response objects instead. This is some additional logic that could be handled by the Product Service.
* Since we are often having to make multiple requests to an unreliable third-party, it may be better to cache valid responses for a short period, perhaps in Redis.


Giles Lloyd – giles@cableandcode.co.uk
