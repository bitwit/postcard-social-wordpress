<style>
    a.ios-setup-button {
        display: block;
        width: 220px;
        background-color: #6495ed;
        padding: 20px;
        border-radius: 5px;
        color: white;
        font-size: 24px;
        text-decoration: none;
        text-align: center;
    }

    a.ios-setup-button:hover {
        opacity: 0.9;
    }

    a.ios-setup-button:active {
        opacity: 0.8;
    }

    .postcard-instructions {
        background-color: #FEFEFE;
        border: 1px solid #EFEFEF;
        border-radius: 5px;
        padding: 20px;
        margin: 20px;
    }

    h3 {
        font-size: 18px;
        margin-top: 0;
    }

    dl {
        font-size: 18px;
        line-height: 150%;
    }

    dt {
        font-weight: bold;
    }

    p {
        font-size: 16px;
    }

</style>
<?php
$api_endpoint = postcard_get_api_endpoint();
?>
<h2>Postcard</h2>
<dl>
    <dt>Server API Status</dt>
    <dd id="postcard-server-status">Checking...</dd>
    <dt>Postcard Website URL</dt>
    <dd><?php echo $api_endpoint; ?></dd>
</dl>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        jQuery.get("<?php echo $api_endpoint; ?>", function (data, status) {
            var statusElement = jQuery("#postcard-server-status");
            if (data.success == true) {
                statusElement.html("Online").css({color: "green"});
                return;
            }
            statusElement.html("Error communicating with API").css({color: "red"});
        });
    });
</script>

<div class="postcard-instructions">
    <h3>Instructions</h3>

    <p>
        Thanks for downloading and installing Postcard! Here's how you can get started:
    </p>

    <p>
        Postcard works in unison with the Postcard app (currently for iOS only).
        By entering your login credentials and the 'API Endpoint' listed above you can set this WordPress website and
        user account up
        to receive (and optionally host) all your social content.
    </p>

    <p>
        If you are on your iPhone right now you can click this button for quick setup:
    </p>
    <a class="ios-setup-button"
       href="postcard://setup/?network=custom&username=<?php echo wp_get_current_user()->user_login; ?>&siteUrl=<?php echo urlencode($api_endpoint); ?>">
        Setup in iOS app
    </a>

    <p>
        Once you are posting content to this website, you can use insert short tags in the post/pages editor to retrieve
        your content like so:
    </p>

    <dl>
        <dt>
            [postcard-archive]
        </dt>
        <dd>
            This shortcode will create a feed of content that is queryable using url (a.k.a. GET) parameters such as
            ?tags=interesting
            <br/>
            When you first install Postcard a page is created with this shortcode and used as your permalink url for all
            future
            shared content, should you choose to host picture/video content when sharing to other networks
        </dd>
        <dt>
            [postcard-feed]
        </dt>
        <dd>
            This shortcode will create feed od content that is filterable via attributes such as:
            <br/>
            [postcard-feed tags="interesting,useful"]
        </dd>
        <dt>
            [postcard-gallery]
        </dt>
        <dd>
            This shortcode will create an image gallery and only display image and video content and is filterable via
            attributes such as:
            <br/>
            [postcard-gallery count=20]
        </dd>
        <dt>#profile</dt>
        <dd>
            If you tag a photo upload with #profile or privataely tag it with 'profile' this will become your effective
            new 'profile picture'
            that is used in the gallery overlay
        </dd>
    </dl>
</div>
<?php
