# badminton

本專案目標是建立一個羽球揪團系統


## 運行環境需求

* [Composer][] ^2.0
* [GNU Make][]
* [Docker][]
* [Docker Compose][]
* [PHP][] 8.1

## 開發環境設定

1. Build the project and image.

```
    make build
```


2. composer install

```
    composer install --ignore-platform-req=ext-mongodb
```

3. Generate .env

```
    make env
```

4. Create and start all containers.

```
    make up
```

5. Generate DB

```
    make db
```

6. Check whether the service run successfully.

```
    http://[ip]:8080/
```
