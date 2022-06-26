# System Requirements
- PHP 7.1
- MySQL 5.7

# Setup Instructions
1. Copy .env.example and save as .env
2. Create new database and update DB_DATABASE in .env
3. Update DB_USERNAME and DB_PASSWORD in .env
4. Run php artisan key:generate
5. Run php artisan migrate --seed

# Environments
- Staging environments (will consists of two docker containers: web and db. web container composed of nginx and php-fpm)
- Production environments (Same as Staging)
- Orchestrator/Host environment (will have Beanstalkd services that can be connected by both Staging and Production environment, along with orchestrator code-base from branch orchestrator)
- Production environment will have web container to use symlink and map to volume /code inside nginx container. Orchestrator will update. the symlink for each deployment and. restart web container in Production environment

# Staging Installation Steps
- Install PHP mbstring, zip, xmlwriter, dom extensions
- Install beanstalkd
- Update /etc/defaults/beanstalkd, set port to internal IP Address (Prevent access from external network by using local network IP)
- Open/bind port 11300 (Default port for beanstalkd)
- Configure mysql CLI to use locally saved username/password using this command: mysql_config_editor set --login-path=local --host=localhost --user=root --password --port=3306
- This way we can use CLI to login to root MySQL without having to specify the password

# Deployment Notes
- For production, set APP_ENV to production. This will disable access to CMS
- It's best to ditch .env file in production, and have all settings set at system environment variables all together
- This app will be deployed to two separated environment (Staging and Production). App instance in Staging will have access to CMS, and will be able to backup and send it to Production environment via Queue to start deployment to Production. App instance in Production won't have access to CMS. It needs additional environment variables (DEPLOYMENT_DB_USERNAME and DEPLOYMENT_DB_PASSWORD) to enable automatic deployment (Deployment credentials needs to be able to create new DB, while normal credentials only needs READ access to most content tables)
- Also set env variables NGINX_RELOAD_CONFIG_COMMAND to docker-compose restart command (Example: "docker-compose -f ~/docker.compose.yml restart web")
- Also set env variables DEPLOYMENT_DB_LOGIN_PATH and PROD_BEANSTALKD_HOST
- Set env variables PROD_SSH_ROOT for both  production and staging
- Set env variables PROD_SSH_KEY_PATH for staging only (Pointing to path of SSH key used to login to Production SSH)
- Set env variables PROD_WEBROOT for symlink location that will be used by nginx docker

# Development Notes
- Upon migration, run artisan db:seed to create default user. 

# Copyright
tapriandi&reg; 2022
