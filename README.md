## Installation
```git clone https://github.com/dotroo/mctest.git```
## Setup
build a php image from /manychat/docker/php/:

```docker build -t manychat-backend```

launch docker containers from /manychat/:

```docker-compose up -d```

Import the database dump:

```cat manychat/docker/mysql/manychat.sql | docker-compose exec -T manychat-mysql mysql -uroot -padmin manychat```