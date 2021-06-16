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
| the cookie config id when in dynamic mode (= unsigned and alway take the last version) | DYNAMIC_COOKIE_CONFIG_ID | dynamic_cookie_config_id |
| the cookie config id when in static mode (= signed but take a specific version version)| STATIC_COOKIE_CONTENT_ID | static_cookie_content_id |
| the cookie integrity checksum when in static mode | STATIC_COOKIE_CONTENT_INTEGRITY | static_cookie_content_integrity |


Configuration file is loaded from CONFIG_FILE_PATH (default : "config.ini"). 
 
## run example
Under docker, using a specific config file "my-config.ini" :

`docker run --mount type=bind,source=$PWD/my-config.ini,target=/var/www/html/my-config.ini -e CONFIG_FILE_PATH="my-config.ini" simple-cookies-integration-example`

## using static version

Append "static" as argument : http://localhost/?static instead of http://localhost