# fair[&]smart - simple cookies integration example

Some code to demonstrate how to integrate a cookie config created using Fair and Smart Right Consent platform.

## in a nutshell
* put your own values (organization ID, model ID etc ...) in config.ini ;
* build the image : `docker build --tag simple-cookies-integration-example .`
* run the container : `docker run simple-cookies-integration-example`

## configuration
Configuration can either be done in config.ini or using environment variables (especially useful when running using
docker).

| parameter  | environment variable name  | config file key  | 
|---|---|---|
| api server url | API_URL | api_url |
| organisation id | ORGANISATION_ID | organisation_id |
| model id | MODEL_ID | model_id |

Configuration file is loaded from CONFIG_FILE_PATH (default : "config.ini"). 
 
## run example
Under docker, using a specific config file "my-config.ini" :

`docker run --mount type=bind,source=$PWD/my-config.ini,target=/var/www/html/my-config.ini -e CONFIG_FILE_PATH="my-config.ini" simple-cookies-integration-example`