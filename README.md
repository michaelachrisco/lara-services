# lara-services

Sample of Laravel Jobs and Services.
For Fresno Laravel Meetup.

## Service Objects
Single purpose models which encapsulate some arbitrary business logic.

### Why?
* Provides Mechanism to slim down controller/models/views.
* Provides easy to maintain Service that can be reused by both System and Users.
* Easily testable and mockable.
* KISS and SOLID as possible.

### What do SO do?
1. Logic is functional as possible.
2. One entry point and one call to process.
3. Contains Business related rules.
4. Uses Dependency Injection to work with other components of you system (like Models and other Services) when need be.

### Examples:
1. Welcome Email Services (POPO With Job):  https://github.com/michaelachrisco/lara-services/blob/master/lara-services/app/Services/SendWelcomeEmailService.php
2. Video Download Service (POPO):
3. Attach Video to Eloquent model and User (Interactor)
4. User Downloads a Video (2+3 as Interactor Organizer within a Job).

## Objects/Patterns:
* POPO: Plain old PHP object. Nothing special except only one entry point. Usually contains only two methods: construct() and call().
* Interactors: Thoughtbot-like-Interactors for Services that need context from other internal models.
* Lara Jobs: Best explanation: https://laravel.com/docs/master/queues
* Command Service: Only job is to set and execute Services. Interactor Organizer is an example.

## Real world services:
* Sending multiple User emails.
* Reporting and failed jobs.
* Timed Cron jobs.

## Libraries:
* deefour/interactor: PHP version of https://github.com/collectiveidea/interactor
* tightenco/Mailthief: Testing Email Service with https://github.com/tightenco/mailthief
* vladahejda/phpunit-assert-exception: Testing Exceptions within Services with https://github.com/VladaHejda/PhpUnitAssertException

## Other Examples:
* http://multithreaded.stitchfix.com/blog/2015/06/02/anatomy-of-service-objects-in-rails
* Similar Command Design Pattern: https://github.com/domnikl/DesignPatternsPHP/tree/master/Behavioral/Command
