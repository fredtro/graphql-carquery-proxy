Graphql CarQuery Proxy
=========================

GraphQL proxy app for querying [CarQuery](http://www.carqueryapi.com/documentation/) api, using Symfony 3.4. 

Installation
------------
Clone repo and install dependencies with composer.

```
git clone git@github.com:fredtro/graphql-carquery-proxy.git

```
Download composer.phar and execute in application directory.
```
php composer.phar install
```

Start Server
------------
Start server using symfony's local web server

```
php bin/console server:run
```

It defaults listen on http://127.0.0.1:8000

Endpoint is **/graphql**, with default configuration it would be:
```
http://127.0.0.1:8000/graphql
```



Car Type
--------

```
type Car {
    id
    name
    make
    trim
    power
    topSpeed
    fuelType
    length
    width
    height    
}
    
```

Queries
-------

### Searching cars

You can search for cars with parameters from quoted in searchCars description.

Parameters refer to [CarQuery Documentation](http://www.carqueryapi.com/documentation/api-usage/) described under GetTrims. 

```
searchCars(
    keyword: String
    make: String
    model: String
    fuel_type: String
    min_power: Int
    drive: String): [Car]
```
Example:
```
{
  searchCars(keyword: "Beetle", make: "volkswagen") {
 		id
    name
  }
}
```


### Single car query
Single cars can be fetched by using the model_id from CarQueryApi.

```
car(id: Int!): Car

```

Example:

```
{
  car(id: 57613) {
 		id
    name
    make
  }
}
```
