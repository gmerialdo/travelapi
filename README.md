# travelapi

This is a simple API to handle an unordered set of boarding cards and print a summary of the corresponding trip. 

## Installation

The travelApi uses:

- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

Clone the repository:

```shell script
git clone https://github.com/gmerialdo/travelapi.git
```

Install all the dependencies using composer:

```shell script
cd travelApi
composer update
```

## Files & Folders

- `App.php` - enter here the card filenames
- `TravelApi.php` - contains static function for the internal API
- `src` - contains the BoardingCard classes
- `tests` - contains tests

## How to use the TravelApi

```shell script
composer print travel
```
- You can add json files in the resources folder
- You can define the set of files that you want to be handled in the file App.php in the $setOfCards variable (l.7) 

## Testing

PHPUnit is pre-configured to run tests. PHPUnit can be run using a composer script. To run the unit tests: 

```shell script
composer test
```

Have a nice trip ! 