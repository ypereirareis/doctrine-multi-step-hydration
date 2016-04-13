## Doctrine ORM 2 Step Hydration and Partial select

This repository is an example of how to implement 2 step hydration with Doctrine ORM.
Examples will be provided with the repository itself.
You can read more about the concept behind this repository at https://ocramius.github.io/blog/doctrine-orm-optimization-hydration

**I added another example with 2 step partial hydration**

### Running the examples

Simply open your terminal and run

```sh
./run.sh
```

With Docker:

```sh
docker run --rm -v $(pwd):/app composer/composer install

docker run -it --rm --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:5.6-cli \
        bash -ci "./run.sh"
```

To play around with the amount of records in each table, you can define environment variables:

```sh
USERS=100 SOCIAL_ACCOUNTS=30 SESSIONS=100 ./run.sh
```

With Docker:

```sh
docker run --rm -v $(pwd):/app composer/composer install

docker run -it --rm --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:5.6-cli \
        bash -ci "USERS=100 SOCIAL_ACCOUNTS=30 SESSIONS=100 ./run.sh"
```

## Results

```sh

----------------------------------------------------------------------
Populating Database
----------------------------------------------------------------------
Disabling Logger now (too verbose)

real	0m1.217s
user	0m1.045s
sys	0m0.056s


-----------------------------------
Lazy loading example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=35Mo peak=35Mo

real	0m0.463s
user	0m0.434s
sys	0m0.028s


-----------------------------------
Multi-step hydration example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=38Mo peak=38Mo

real	0m1.046s
user	0m0.994s
sys	0m0.048s


-----------------------------------
Partial multi-step hydration example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=37Mo peak=37Mo

real	0m0.724s
user	0m0.679s
sys	0m0.044s


-----------------------------------
Single PARTIAL fetch-join example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=28Mo peak=28Mo

real	0m8.478s
user	0m8.424s
sys	0m0.040s


-----------------------------------
Single ARRAY fetch-join example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=30Mo peak=30Mo

real	0m17.325s
user	0m17.286s
sys	0m0.028s


-----------------------------------
Single fetch-join example
-----------------------------------

PHP Memory: 2048
Fetched records: 13100
Used Memory: current=44Mo peak=44Mo

real	0m20.299s
user	0m20.235s
sys	0m0.040s


```