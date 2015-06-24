## Dashboarders Heaven.com

Dashboarders Heaven is a group of gamers who just want to have fun, and occasionally rage quit... ok we rage quit often. We come from the age
of when the Xbox 360 had a Dashboard and not a "Home", and that Dashboard worked well. This site aims to collate information about our various group members,
including their game clips, games they play, and more.

## Getting Started

Want to help develop our super amazing site? Here's how you can get things setup:

1. First install [Laravel Homestead](http://laravel.com/docs/5.1/homestead)

2. Clone the repository to your local machine.

3. Configure homestead to map the repository to the vagrant box.

4. Run the following commands to finish the project setup:

```bash
composer install && php artisan ide-helper:generate
```

5. Run the following commands to build front-end files:

```bash
node install && gulp
```

5. (Optional): Run the following command if you are using PHPStorm:

```bash
php artisan ide-helper:meta
```

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
