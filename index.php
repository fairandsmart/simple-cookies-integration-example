<?php
function get_conf()
{
    $config = parse_ini_file(key_exists("CONFIG_FILE_PATH", $_ENV) ? $_ENV["CONFIG_FILE_PATH"] : "config.ini");
    $config["api_url"] = key_exists("API_URL", $_ENV) ? $_ENV["API_URL"] : $config["api_url"];
    $config["organisation_id"] = key_exists("ORGANISATION_ID", $_ENV) ? $_ENV["ORGANISATION_ID"] : $config["organisation_id"];
    $config["model_id"] = key_exists("MODEL_ID", $_ENV) ? $_ENV["MODEL_ID_OR_ALIAS"] : $config["model_id"];
    return $config;
}

function get_cookie_conf_url()
{
    return get_conf()["api_url"] . "/ext/cookies/config/" . get_conf()["organisation_id"] . "/" . get_conf()["model_id"] . "/script";
}

function get_cookie_style_url()
{
    return get_conf()["api_url"] . "/ext/cookies/config/" . get_conf()["organisation_id"] . "/" . get_conf()["model_id"] . "/style";
}

function get_cookie_code_url()
{
    return "https://assets.fairandsmart.tech/tarteaucitron//tarteaucitron.js";
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Simple Cookies Integration Example</title>
        <meta name="language" content="fr">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <style>
            h2 { text-align: center; margin-bottom: 100px; }
            .left { display: flex; flex-direction: column; }
            .share { display: flex; flex-direction: row; }
            .content { width: 100%; display: flex; flex-direction: row; justify-content: space-evenly; }
            .button-wrapper { margin-top: 100px; }
        </style>
        <!-- Balises copiées-collées -->
        <script type="text/javascript" src="<?php echo get_cookie_code_url();?>"></script>
        <script type="text/javascript" src="<?php echo get_cookie_conf_url();?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo get_cookie_style_url();?>">
        <!-- Ouverture manuelle du panneau de configuration des cookies -->
        <script> function openPanel() { document.location.hash = "#cookie_demo"; } </script>
    </head>
    <body>
    <h2>Simple Cookies Integration Example</h2>
    <!-- Balises spécifiques des services -->
        <div class="content">
            <div class="left">
                <div class="share">
                    <div class="fb-like" data-layout="standard" data-action="like" data-share="TRUE"></div>
                    <span class="tacTwitter"></span>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-size="LARGE" data-via="@FairandSmart" data-count="VERTICAL" data-dnt="true"></a>
                </div>
                <div class="twitterembed-canvas" tweetid="1336270558577745921" theme="light" cards="SHOW" conversation="NONE" data-align="LEFT"></div>
            </div>
            <div class="right">
                <div class="youtube_player" videoID="Rzrk9kDbJvs" width="600" height="400" theme="LIGHT" rel="0" controls="0" showinfo="0" autoplay="0"></div>
            </div>
        </div>
    </body>
</html>
