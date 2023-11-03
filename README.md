## Running the site

- You need to setup a basic MySQL database connection
- Create a database called `canoe_test`
- I've used a docker container for the app, you should run docker using sail command like:
```shell
sail up
```

Once the container is running, you should run:
```shell
sail php artisan migrate --seed
```

## ER Diagram
![Diagram](https://github.com/faiverson/canoe-test/blob/main/resources/readme/er-diagram.png)

## API

You can import the insomnia file if you are familiar with Insomnia App
[Download File](https://github.com/faiverson/canoe-test/blob/main/resources/readme/canoe-insomnia.json)

Or you can find all the end points with:
```shell
sail php artisan route:list
```


### Some considerations:
- This took 3 hours
- It has only basic tests, you can run:
```shell
sail php artisan test
```
