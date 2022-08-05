## Japanese Postal Codes

### Features

URL: /postal_codes

1. Upload Postal code data
    1. Method 1: Use the seeder. The seeder will load Postal code data from `database/seed_data/KEN_ALL.CSV`
    2. Method 2: Upload through the web interface (WIP)
2. Search postal codes
    1. Input postal codes into the input field.
    2. Results are real-time updated using HotWire TurboFrames.
3. Analyse postal codes through the admin interface
    1. Identify postal codes that refer to two separate address strings.
    2. Drill down by attributes


### Development environment

run the following command
```
docker compose up
```

### Tests

```
docker compose exec laravel.test ./vendor/bin/phpunit
```
