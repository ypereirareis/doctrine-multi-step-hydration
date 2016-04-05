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
docker run -it --rm --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:5.6-cli \
        bash -ci "./run.sh"
```

To play around with the amount of records in each table, you can define environment variables:

```sh
USERS=100 SOCIAL_ACCOUNTS=30 SESSIONS=300 ./run.sh
```

With Docker:

```sh
docker run -it --rm --name my-running-script \
    -v "$PWD":/usr/src/myapp \
    -w /usr/src/myapp php:5.6-cli \
        bash -ci "USERS=100 SOCIAL_ACCOUNTS=30 SESSIONS=300 ./run.sh"
```