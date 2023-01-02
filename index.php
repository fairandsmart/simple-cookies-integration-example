<?php
function get_conf()
{
    $config = parse_ini_file(key_exists("CONFIG_FILE_PATH", $_ENV) ? $_ENV["CONFIG_FILE_PATH"] : "my-config.ini");
    $config["api_url"] = key_exists("API_URL", $_ENV) ? $_ENV["API_URL"] : $config["api_url"];
    $config["dynamic_cookie_config_id"] = key_exists("DYNAMIC_COOKIE_CONFIG_ID", $_ENV) ? $_ENV["DYNAMIC_COOKIE_CONFIG_ID"] : $config["dynamic_cookie_config_id"];
    $config["static_cookie_content_id"] = key_exists("STATIC_COOKIE_CONTENT_ID", $_ENV) ? $_ENV["STATIC_COOKIE_CONTENT_ID"] : $config["static_cookie_content_id"];
    $config["static_cookie_content_integrity"] = key_exists("STATIC_COOKIE_CONTENT_INTEGRITY", $_ENV) ? $_ENV["STATIC_COOKIE_CONTENT_INTEGRITY"] : $config["static_cookie_content_integrity"];
    return $config;
}

function get_dynamic_cookie_script()
{
    return '<script src="' . get_conf()["api_url"] . '/ext/cookies/clients/' . get_conf()["dynamic_cookie_config_id"] . '"></script>';
}

function get_static_cookie_script()
{
    return '<script src="' . get_conf()["api_url"] . '/ext/cookies/content/' . get_conf()["static_cookie_content_id"] . '" integrity="' . get_conf()["static_cookie_content_integrity"] . '"></script>';;
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Simple Cookies Integration Example</title>
        <meta name="language" content="fr">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <style>
            h2 { text-align: center; margin-bottom: 20px; }
            h3 { text-align: center; margin-bottom: 20px; }
            .left { display: flex; flex-direction: column; margin-left: 100px; }
            .share { display: flex; flex-direction: row; }
            .content { width: 100%; display: flex; flex-direction: row; justify-content: space-evenly; }
            .button-wrapper { margin-top: 100px; }
        </style>
        <?php echo key_exists("static", $_GET) ? get_static_cookie_script() : get_dynamic_cookie_script();?>
        <script> function openPanel() { document.location.hash = "#cookie_demo"; } </script>
    </head>
    <body>

    <h2>Simple Cookies Integration Example</h2>
    <br>
    <h3><a href="#cookies-preferences">Show cookies panel using a link</a></h3>
    <br>
    <h3 onclick="document.location.hash = '#cookies-preferences';">Show cookies panel using a javascript call</h3>
    <br>
    <!-- Balises spécifiques des services -->
        <div class="content">
            <div class="left">
                <br/>
                <div class="fb-like" data-layout="standard" data-action="like" data-share="TRUE"></div>
                <br/>
                <span class="tacTwitter"></span>
                <br/>
                <a href="https://twitter.com/share" class="twitter-share-button" data-size="LARGE" data-via="@FairandSmart" data-count="VERTICAL" data-dnt="true"></a>
                <br/>
                <div class="twitterembed-canvas" tweetid="1336270558577745921" theme="light" cards="SHOW" conversation="NONE" data-align="LEFT"></div>
                <br>
                <span class="tacLinkedin"></span>
                <script type="IN/FollowCompany" data-id="10842147" data-counter="bottom"></script>
            </div>
            <div class="right">
                <div class="youtube_player" videoID="Rzrk9kDbJvs" width="600" height="400" theme="LIGHT" rel="0" controls="0" showinfo="0" autoplay="0"></div>
            </div>
        </div>
        <div id="afscontainer1"></div><div id="tac_adsense_search" pubId="VOTRE_IDENTIFIANT_DE_CLIENT" query="VOTRE_REQUETE" styleId="VOTRE_IDENTIFIANT_DE_STYLE"></div>
    </body>
</html>
