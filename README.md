# 223 Wrestling — WordPress Site

## Local Development

Requirements: Docker, Docker Compose, GitHub CLI

```bash
cd docker
docker compose up -d
```

WordPress: http://localhost:8080
phpMyAdmin: http://localhost:8081

First run: complete WordPress setup at http://localhost:8080/wp-admin/install.php

## WP-CLI

```bash
docker compose exec wordpress wp --info --allow-root --path=/var/www/html
```

## Structure

- `docker/` — Docker Compose files and persistent data (`data/` is gitignored)
- `wp-content/themes/wrestling/` — Block theme (tracked)
- `wp-content/plugins/wrestling-core/` — Custom plugin (tracked)
- `wp-content/uploads/` — Media library (gitignored)
